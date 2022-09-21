<?php

class Pagosvalidos {

    public $connect = null;
    public $finicial = null;
    public $ffinal = null;
    public $numRegistros = 20;

    public function getPlazaInformacion($idplz) {
        $plaza = [];
        
        $query = "SELECT * FROM plaza WHERE id_plaza='$idplz'";
        $plz = sqlsrv_query($this->connect, $query);
        if(!$plz) {
            return $plaza;
        }
        $plaza = sqlsrv_fetch_array($plz);
        return (object)$plaza;
    }

    public function getPagos($pagina, $paginacion = true) {
        $pagina = ($pagina - 1) * $this->numRegistros;
        $query = "SELECT * FROM pagos 
            WHERE convert(date,FechaPago) between '". $this->finicial ."' and '". $this->ffinal ."' ORDER BY FechaPago DESC";
        if($paginacion) {
            $query .= " OFFSET $pagina ROWS FETCH NEXT " . $this->numRegistros . " ROWS ONLY";
        }
        $pagos = sqlsrv_query($this->connect, $query);
        return $pagos;
    }

    public function getFechaCaptura($cuenta, $table) {
        $query = "SELECT FechaCaptura, IdAspUser, IdTarea FROM $table 
            WHERE Cuenta='$cuenta' and FechaCaptura = (SELECT Max(FechaCaptura) FROM $table WHERE cuenta='$cuenta')";
        $fecha = sqlsrv_query($this->connect, $query);
        return sqlsrv_fetch_array($fecha);
    }

    public function getFechaCapturaCallCenter($cuenta) {
        $query = "SELECT FechaCaptura, IdAspUser, IdTarea FROM RegistroCallCenter 
            WHERE ((Cuenta='$cuenta') and (FechaCaptura = (SELECT Max(FechaCaptura) FROM RegistroCallCenter WHERE cuenta='$cuenta'))
            and (IdObservacionesLlamadas = 8 or IdObservacionesLlamadas = 9 or IdObservacionesLlamadas = 10 or IdObservacionesLlamadas = 12 
            or IdObservacionesLlamadas = 13 or IdObservacionesLlamadas = 14 or IdObservacionesLlamadas = 15))";
        $call = sqlsrv_query($this->connect, $query);
        return sqlsrv_fetch_array($call);
    }

    public function getFechaCapturaPregrabadas($cuenta) {
        $query = "SELECT FechaCaptura, IdAspUser, IdTarea FROM RegistroPregrabadas
            WHERE ((Cuenta='$cuenta') and (FechaCaptura = (SELECT Max(FechaCaptura) FROM RegistroPregrabadas WHERE cuenta='$cuenta'))
            and (Observaciones like '%PM-Mensaje%' or Observaciones like '%PU-Llamada%'))";
        $pre = sqlsrv_query($this->connect, $query);
        return sqlsrv_fetch_array($pre);
    }

    public function getUser($idUser) {
        $query = "SELECT Nombre FROM AspNetUsers WHERE id ='$idUser'";
        $user = sqlsrv_query($this->connect, $query);
        return sqlsrv_fetch_array($user);
    }

    public function getUserName($idUser) {
        $usuario = $this->getUser($idUser);
        if(isset($usuario)) {
            return $usuario['Nombre'];
        }
        return "";
    }

    public function getTareaName($idTarea) {
        $tarea = $this->getTarea($idTarea);
        if(isset($tarea)) {
            return $tarea['DescripcionTarea'];
        }
        return "";
    }

    public function getTarea($idTarea) {
        $query = "SELECT DescripcionTarea FROM CatalogoTareas WHERE IdTarea = $idTarea ;";
        $user = sqlsrv_query($this->connect, $query);
        return sqlsrv_fetch_array($user);
    }

    public function getDiferenciaFechas($fechaCaptura, $fechaPago, $dias) {
        if ($fechaCaptura < $fechaPago) {
            $fechPago = $fechaPago->format('Y-m-d');
            $FechaCaptura = $fechaCaptura->format('Y-m-d');
            $fecha1 = new DateTime($FechaCaptura);
            $fecha2 = new DateTime($fechPago);
            $diff = $fecha1->diff($fecha2);
            if ($diff->days < $dias) {
                return $diff->days;
            }
        }
    }

    public function closeConnection($connect) {
        sqlsrv_close($connect);
    }

    public function findFechCaptura($pago, $dia) {
        if(!isset($pago['FechaPago'])) return false;
        $roles = ['RegistroGestor', 'RegistroAbogado', 'RegistroReductores'];
        $isValid = false;
        foreach($roles as $rol) {
            $fCapturaRol = $this->getFechaCaptura($pago['Cuenta'], $rol);
            $diffDays = null;
            if(isset($fCapturaRol)){
                $diffDays = $this->getDiferenciaFechas($fCapturaRol['FechaCaptura'], $pago['FechaPago'], $dia);
                if(isset($diffDays)) {
                    $isValid = true;
                    break;
                }
            }
        }
        return $isValid;
    }

}