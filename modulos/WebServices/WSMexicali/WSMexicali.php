<?php
error_reporting(0);
class WSMexicali {

    public $conexionBD; // Mantiene la instancia de la conexion a la BD
    public $total = 0; // Total de Registros enviados al WS
    protected $sleep = 0.3; // Tiempo de espera del siguiente registro a enviar (Se utiliza para darle un respiro al servidor)
    protected $rowsRefresh = 100; // Cada 100 registros se ejecutara un tiempo de espera
    protected $errores; // Almacena los errores que se pueden presentar en la ejecucion del WS
    protected $WSUrl = "http://200.38.16.187:203/ws_publicos/Service.asmx"; // Direccion del WS

    public function __construct()
    {
        $this->conexionBD = null;
        $this->errores = [];
        $this->conectarBD();
    }

    private function conectarBD() {
        try {
            $serverName = "implementta.mx";
            $connectionInfo = array( 'Database'=>'implementtaMexicaliA', 'UID'=>'sa', 'PWD'=>'vrSxHH3TdC');
            $this->conexionBD = sqlsrv_connect($serverName, $connectionInfo);
            date_default_timezone_set('America/Mexico_City');

            if( !$this->conexionBD ) {
                throw new Exception("No se conecto a la Base de Datos");
            }

        } catch(Exception $e) {
            $this->conexionBD = null;
            array_push($this->errores, $e->getMessage());
        }
    }

    private function imgToBase64($urlImage) {
        try {
            $type = pathinfo($urlImage, PATHINFO_EXTENSION);
            $data = file_get_contents($urlImage);
            $base64 = base64_encode($data);
//            $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
    
            return $base64;
        } catch(Exception $e) {
            return "";
        }
    }

    private function solicitudXML($cuenta) {
        $datos_cuenta = explode("-", $cuenta['cuenta']);
        $imagenB64 = ($cuenta['fotoAccion'] == "") ? "" : $this->imgToBase64($cuenta['fotoAccion']);
        $alta = $cuenta['fechaAccion']->format('Y-m-d');
        $xml = "<Envelope xmlns='http://schemas.xmlsoap.org/soap/envelope/'>";
        $xml .= "<Body>";
        $xml .= "<cobext_inserta_accion xmlns='http://tempuri.org/ws_publicos'>";
        $xml .= "<arg_codseg>CESPMCOBEXT26042022</arg_codseg>";
        $xml .= "<arg_pobcta>". $datos_cuenta[0] ."</arg_pobcta>";
        $xml .= "<arg_gpocta>". $datos_cuenta[1] ."</arg_gpocta>";
        $xml .= "<arg_folcta>". $datos_cuenta[2] ."</arg_folcta>";
        $xml .= "<arg_subcta>". $datos_cuenta[3] ."</arg_subcta>";
        $xml .= "<arg_alta>". $alta ."</arg_alta>";
        $xml .= "<arg_tipoaccion>". $cuenta['tipoAccion'] ."</arg_tipoaccion>";
        $xml .= "<arg_obs>". $cuenta['observaciones'] ."</arg_obs>";
        $xml .= "<arg_archivo>". $imagenB64 ."</arg_archivo>";
        $xml .= "</cobext_inserta_accion>";
        $xml .= "</Body>";
        $xml .= "</Envelope>";
        return $xml;
    }

    private function enviarCobext($cuenta) {
        try {
            $curl = curl_init();

            curl_setopt_array($curl, array(
                CURLOPT_URL => $this->WSUrl,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_CUSTOMREQUEST => 'POST',
                CURLOPT_POSTFIELDS => $this->solicitudXML($cuenta),
                CURLOPT_HTTPHEADER => array(
                    'SOAPAction: http://tempuri.org/ws_publicos/cobext_inserta_accion',
                    'Content-Type: text/xml; charset=utf-8'
                ),
            ));

            $response = curl_exec($curl);
            curl_close($curl);
            $response = preg_replace("/(<\/?)(\w+):([^>]*>)/", "$1$2$3", $response);
            $xml = new \SimpleXMLElement($response);
            $array = json_decode(json_encode((array)$xml), TRUE);
			if(is_array($array) && (count($array) > 0) ) {
				if($array['soapBody']['cobext_inserta_accionResponse']['cobext_inserta_accionResult'] == "Exito") {
					$this->total++;
				} else {
					throw new Exception($array['soapBody']['cobext_inserta_accionResponse']['cobext_inserta_accionResult']);
				}
			} else {
				throw new Exception("No hubo respuesta del WebService");
			}
        } catch(Exception $e) {
            array_push($this->errores, "La cuenta " . $cuenta['cuenta'] . " presento el error: " . $e->getMessage());
        }
        
    }

    public function cerrarBD() {
        sqlsrv_close($this->conexionBD);
    }

    public function respuesta($response = 200, $mensaje = "") {
        return json_encode([
            'type' => $response,
            'errores' => $this->errores,
        ]);
    }

    public function enviarDatos() {
        try {
            $contador = 0;
//            $sql = "SELECT * FROM implementtaMexicaliA.dbo.wsAccionesMexicaliA WHERE fechaCargaWS = '" . date('Y-m-d') . "';";
            $sql = "SELECT [id_wsAcciones]
              ,[fechaCargaWS]
              ,REPLACE(cuenta,' ','') as cuenta
              ,[fechaAccion]
              ,[tipoAccion]
              ,SUBSTRING(Observaciones,1,200) as observaciones
              ,[fotoAccion]
            FROM implementtaMexicaliA.dbo.wsAccionesMexicaliA WHERE fechaCargaWS = '" . date('Y-m-d') . "';";
            $query = sqlsrv_query($this->conexionBD, $sql);

            while($cuenta = sqlsrv_fetch_array($query)) {
                $this->enviarCobext($cuenta);
                if($contador == $this->rowsRefresh) {
                    sleep($this->sleep);
                    $contador = 0;
                }
                $contador++;
            }
        } catch (Exception $e) {
            array_push($this->errores, $e->getMessage());
        }
    }

}

if ($_SERVER['REQUEST_METHOD'] === 'POST') { 
    $wsMexicali = new WSMexicali();
    if($wsMexicali->conexionBD != null) {
        $wsMexicali->enviarDatos();
        $wsMexicali->cerrarBD();
        sleep(1);
        echo $wsMexicali->respuesta();
    } else {
        echo $wsMexicali->respuesta(500);
    }
} else {
    die("Sin servicio");
}
