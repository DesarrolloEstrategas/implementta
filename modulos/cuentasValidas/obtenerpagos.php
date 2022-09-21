<?php

require "../../acnxerdm/conect.php";
require "./Pagosvalidos.php";

$respuesta = [];
try {
    $idPlaza = (isset($_GET['plz'])) ? $_GET['plz'] : 0;
    $pagina = (isset($_POST['pagina'])) ? $_POST['pagina'] : 1;
    $date_range = (isset($_POST['date_range'])) ? $_POST['date_range'] : '';
    $dia = (isset($_POST['dia'])) ? $_POST['dia'] : 90;
    $type = (isset($_POST['type'])) ? $_POST['type'] : '';
    $dates = explode('a', $date_range);

    if($idPlaza == 0) {
        throw new Exception("No encontramos la plaza");
    }

    if($date_range == "" || count($dates) == 0) {
        throw new Exception("Selecciona un rango de fechas");
    };

    $pagosValidos = new Pagosvalidos();
    $pagosValidos->connect = $cnx;

    $pagosValidos->finicial = date('Y-m-d', strtotime(trim($dates[0])));
    $pagosValidos->ffinal = date('Y-m-d', strtotime(trim($dates[1])));
    if($type != "") {
        $pagos = $pagosValidos->getPagos($pagina, false);
    } else {
        $pagos = $pagosValidos->getPagos($pagina);
    }

    if($pagos) {
        $datos = [];
        $i = 0;
        $validos = 0;
        $invalidos = 0;
        $totalpagos = 0;
        while($pago = sqlsrv_fetch_array($pagos)) {
            $isValid = false;
            if($type == "") {
                $datos[$i]['cuenta'] = $pago['Cuenta'];
                $datos[$i]['fechaPago'] = ($pago['FechaPago'] == null) ? '----' : $pago['FechaPago']->format('Y-m-d H:i:s');
                $datos[$i]['recibo'] = $pago['Recibo'];
                $datos[$i]['total'] = number_format($pago['Total'], 2);
                $datos[$i]['isDiffDays'] = false; 
            }
            
            $isValid = $pagosValidos->findFechCaptura($pago, $_POST['dia']);
            
            if(!$isValid) {
                $fCallcenter = $pagosValidos->getFechaCapturaCallCenter($pago['Cuenta']);
                $difCallCenter = null;
                if(isset($fCallcenter)){
                    $difCallCenter = $pagosValidos->getDiferenciaFechas($fCallcenter['FechaCaptura'], $pago['FechaPago'], $_POST['dia']);
                    if(isset($difCallCenter)) {
                        $isValid = true;
                    }
                }
            }

            if(!$isValid) {
                $fPregrabadas = $pagosValidos->getFechaCapturaPregrabadas($pago['Cuenta']);
                $difPregrabadas = null;
                if(isset($fPregrabadas)){
                    $difPregrabadas = $pagosValidos->getDiferenciaFechas($fPregrabadas['FechaCaptura'], $pago['FechaPago'], $_POST['dia']);
                    if(isset($difPregrabadas)) {
                        $isValid = true;
                    }
                }
            }

            if($isValid) {
                if($type == "") $datos[$i]['isDiffDays'] = true; 
                $validos++;
            } else {
                if($type == "") $datos[$i]['isDiffDays'] = false;
                $invalidos++;
            }
            $i++;
        }

        $respuesta = ['type' => 200, 'datos' => $datos, 'pagina' => ($pagina + 1), 'pagosvalidos' => $validos, 'pagosinvalidos' => $invalidos, 'totalpagos' => ($validos+$invalidos)];
        if($i == 0) {
            $respuesta['datos'] = [];
            $respuesta['text'] = "No hay informaci&oacute;n";
        } 
    } else {
        $respuesta = ['type' => 200, 'text' => "No hay pagos", 'datos' => []];
    }
    
    $pagosValidos->closeConnection($cnxa);
    $pagosValidos->closeConnection($cnx);

} catch(Exception $e) {
    $respuesta = ['type' => 500, 'text' => $e->getMessage(), 'datos' => []];
}

echo json_encode($respuesta);