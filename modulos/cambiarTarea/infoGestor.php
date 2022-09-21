<?php
require "../../acnxerdm/conect.php";

$query = "select * from RegistroGestorClone";
$queryResult = sqlsrv_query($cnx, $query);
$cuenta = sqlsrv_fetch_array($queryResult);
           
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
$cuentaOriginal="SELECT * FROM RegistroGestor";
$cuentaOriginalResult=sqlsrv_query($cnx,$cuentaOriginal);
$cuentaOriginalR=sqlsrv_fetch_array($cuentaOriginalResult);

$cuenta2="SELECT * FROM RegistroGestorClone";
$cuenta2Result=sqlsrv_query($cnx,$cuenta2);
$cuenta2R=sqlsrv_fetch_array($cuenta2Result);

if(isset($_POST['updateAceptado'])){
    $id=$_GET['idGest'];
    $plz = $_GET['plz'];
    $cuentaa = $_GET['cuenta'];
    
$CuentaC = $_POST['cuentaC'];
$IdTareaC = $_POST['idTareaC'];
$FechaAsignacionC = date('Y-m-d H:i:s', strtotime($_POST['fechaAsignacionC']));
$ObservacionesC = $_POST['observacionesC'];
$NombreC = $_POST['nombreC'];
$TelefonoLocalC = $_POST['telefonoLocalC'];
$TelefonoCelularC = $_POST['telefonoCelularC'];
$TelefonoRadioC = $_POST['telefonoRadioC'];
$FechaCapturaC = date('Y-m-d H:i:s', strtotime($_POST['fechaCapturaC']));
$CorreoelectronicoC = $_POST['correoElectronicoC'];
$FechaPromesaPagoC = date('Y-m-d H:i:s', strtotime($_POST['fechaPromesaPagoC']));
$IdEstatusC = $_POST['idEstatusC'];
$CalleC = $_POST['calleC'];
$NumExtC = $_POST['numExtC'];
$NumIntC = $_POST['numIntC'];
$Coloniac = $_POST['coloniaC'];
$PoblacionC = $_POST['poblacionC'];
$CPC = $_POST['cpC'];
$ReferenciaC = $_POST['referenciaC'];
$EntreCalle1C = $_POST['entreCalle1C'];
$EntreCalle2C = $_POST['entreCalle2C'];
$CondatosC = $_POST['conDatosC'];
$LatitudC = $_POST['latitudC'];
$LongitudC = $_POST['longitudC'];
$IdAspUserC = $_POST['idAspUserC'];
$ConDatosValidosC = $_POST['conDatosValidosC'];
$FechaVencimientoC = date('Y-m-d H:i:s', strtotime($_POST['fechaVencimientoC']));
$FechaSincronizacionC = date('Y-m-d H:i:s', strtotime($_POST['fechaSincronizacionC']));
$IdTipoServicioC = $_POST['idTipoServicioC'];
$IdEstatusTomaC = $_POST['idEstatusTomaC'];
$IdTipoTomaC = $_POST['idTipoTomaC'];
$NombrePropietarioC = $_POST['nombrePropietarioC'];
$TelefonoLocalPropietarioC = $_POST['telefonoLocalPropietarioC'];
$TelefonoCelularPropietarioC = $_POST['telefonoCelularPropietarioC'];
$TelefonoRadioPropietarioC = $_POST['telefonoRadioPropietarioC'];
$CorreoElectronicoPropietarioC = $_POST['correoElectronicoPropietarioC'];
$FechaLocalizacionPropietarioC = date('Y-m-d H:i:s', strtotime($_POST['fechaLocalizacionPropietarioC']));
$IdRelacionPropietarioC = $_POST['idRelacionPropietarioC'];
$MotivoNoPagoC = $_POST['motivoNoPagoC'];
$CantidadPagoC = $_POST['CantidadPagoC'];
$IdTipoDeudorC = $_POST['idTipoDeudorC'];
$ProbabilidadPagoC = $_POST['probabilidadPagoC'];
$IdsQuejasReclamacionesC = $_POST['idsQuejasReclamacionesC'];
$OtraQuejaReclamacionC = $_POST['otraQuejaReclamacionC'];
$IdsExpectativasContribuyentes = $_POST['idsExpectativasContribuyenteC'];
$OtraExpectativaContribuyenteC = $_POST['otraExpectativaContribuyenteC'];
$IdsCaracteristicasPredioC = $_POST['idsCaracteristicasPredioC'];
$OtraCaracteristicaPredioC = $_POST['otraCaracteristicaPredioC'];
$IdAccionSugeridaC = $_POST['idAccionSugeridaC'];
$IdUsoSueloPredioC = $_POST['idUsoSueloPredioC'];
$IdTipoPredioC = $_POST['idTipoPredioPredioC'];
$CallePredioC = $_POST['callePredioC'];
$NumExtPredioC = $_POST['numExtPredioC'];
$NumIntPredioC = $_POST['numIntPredioC'];
$ColoniaPredioC = $_POST['coloniaPredioC'];
$PoblacionpredioC = $_POST['poblacionPredioC'];
$CPPredioC = $_POST['cpPredioC'];
$EntreCalle1PredioC = $_POST['entreCalle1PredioC'];
$EntreCalle2PredioC = $_POST['entreCalle2PredioC'];
$ManzanaPredioC = $_POST['manzanaPredioC'];
$LotePredioC = $_POST['lotePredioC'];
$ManzanaC = $_POST['manzanaC'];
$loteC = $_POST['loteC'];
$ReferenciaPredioC = $_POST['referenciaPredioC'];
$SolucionPlanteadaC = $_POST['solucionPlanteadaC'];
$FormaPagoC = $_POST['formaPagoC'];
$ObservacionesGestorC = $_POST['observacionesGestorC'];
$IdMotivoNoPagoC = $_POST['idMotivoNoPagoC'];
$IdServiciosMotivoNoPagoC = $_POST['idServiciosMotivoNoPagoC'];
$ValidoC = $_POST['validoC'];
$ActivoC = $_POST['activoC'];
$NumeroMedidorC = $_POST['numeroMedidorC'];
    
    																																																																
$Update = "UPDATE RegistroGestor SET Cuenta = '$CuentaC', IdTarea='$IdTareaC', FechaAsignacion=convert(date,'$FechaAsignacionC'), Observaciones ='$ObservacionesC', Nombre ='$NombreC', TelefonoLocal ='$TelefonoLocalC', TelefonoCelular = '$TelefonoCelularC', TelefonoRadio ='$TelefonoRadioC', FechaCaptura =convert(date, '$FechaCapturaC'), CorreoElectronico ='$CorreoelectronicoC', FechaPromesaPago =convert(date,'$FechaPromesaPagoC'),IdEstatus='$IdEstatusC', Calle='$CalleC', NumExt ='$NumExtC', NumInt='$NumIntC', Colonia='$Coloniac', Poblacion='$PoblacionC', CP='$CPC', Referencia='$ReferenciaC',EntreCalle1='$EntreCalle1C', EntreCalle2='$EntreCalle2C', ConDatos='$CondatosC', Latitud='$LatitudC', Longitud='$LongitudC', IdAspUser='$IdAspUserC', ConDatosValidos='$ConDatosValidosC', FechaVencimiento ='$FechaVencimientoC',fechaSincronizacion =convert(date,'$FechaSincronizacionC'), idTipoServicio ='$IdTipoServicioC', idEstatusToma ='$IdEstatusTomaC', idTipoToma ='$IdTipoTomaC', NombrePropietario='$NombrePropietarioC',TelefonoLocalPropietario='$TelefonoLocalPropietarioC', TelefonoCelularPropietario='$TelefonoCelularPropietarioC',TelefonoRadioPropietario='$TelefonoRadioPropietarioC', CorreoElectronicoPropietario='$CorreoElectronicoPropietarioC', FechaLocalizacionPropietario=convert(date, '$FechaLocalizacionPropietarioC'), IdRelacionPropietario='$IdRelacionPropietarioC', MotivoNoPago='$MotivoNoPagoC', CantidadPago='$CantidadPagoC', IdTipoDeudor='$IdTipoDeudorC', ProbabilidadPago='$ProbabilidadPagoC', IdsQuejasReclamaciones='$IdsQuejasReclamacionesC', OtraQuejaReclamacion='$OtraQuejaReclamacionC', IdsExpectativasContribuyente='$IdsExpectativasContribuyentes', OtraExpectativaContribuyente='$OtraExpectativaContribuyenteC', IdsCaracteristicasPredio='$IdsCaracteristicasPredioC', OtraCaracteristicaPredio='$OtraCaracteristicaPredioC', IdAccionSugerida='$IdAccionSugeridaC', IdUsoSueloPredio='$IdUsoSueloPredioC', IdTipoPredioPredio='$IdTipoPredioC', CallePredio='$CallePredioC', NumExtPredio ='$NumExtPredioC', NumIntPredio ='$NumIntPredioC', ColoniaPredio ='$ColoniaPredioC', PoblacionPredio ='$PoblacionpredioC', CPPredio ='$CPPredioC', EntreCalle1Predio ='$EntreCalle1PredioC', EntreCalle2Predio ='$EntreCalle2PredioC', ManzanaPredio ='$ManzanaPredioC', LotePredio ='$LotePredioC', Manzana ='$ManzanaC', Lote='$loteC', ReferenciaPredio ='$ReferenciaPredioC', SolucionPlanteada ='$SolucionPlanteadaC', FormaPago ='$FormaPagoC', ObservacionesGestor ='$ObservacionesGestorC', idmotivonopago ='$IdMotivoNoPagoC', idserviciosmotivonopago ='$IdServiciosMotivoNoPagoC', Valido ='$ValidoC', Activo ='$ActivoC', numeroMedidor ='$NumeroMedidorC' WHERE IdRegistroGestor='$id'";
    
     $updateResult = sqlsrv_query ($cnx, $Update);
                    if (!$updateResult) die( print_r( sqlsrv_errors(), true));
                    
                    if($updateResult){
                        
                        $deleteRegistro = "delete from RegistroGestorClone where IdRegistroGestor = '$id'";
                        $deleteRegistroResult = sqlsrv_query ($cnx, $deleteRegistro);
                        echo '<script>alert("Se Aprobo con exito")</script>';
                        echo '<meta http-equiv="refresh" content="0,url=inicio.php?findG='.$cuentaa.'&plz='.$plz.'">';
       
                    } else {
                        echo '<script>alert("No se pudo aprobar ")</script>';
                    }
                    
                }
   
?>
<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Informacion Gestor</title>
    <link rel="icon" href="../icono/icon.png">
    <!-- Bootstrap -->
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link href="../fontawesome/css/all.css" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <style>
        body {
            background-image: url(../img/back.jpg);
            background-repeat: repeat;
            background-size: 100%;
            overflow-x: hidden;
        }

        body {
            font-family: sans-serif;
            font-style: normal;
            font-weight: bold;
            width: 100%;
            height: 100%;
            margin-top: -1%;
            padding-top: 0px;
        }

        .jumbotron {
            margin-top: 0%;
            margin-bottom: 0%;
            padding-top: 4%;
            padding-bottom: 1%;
        }

        .padding {
            padding-right: 35%;
            padding-left: 35%;
        }

    </style>
    <?php require "include/nav.php"; ?>
</head>

<body>
    <div class="container">
        <h1 style="text-shadow: 1px 1px 2px #717171;">Cuentas modificadas</h1>
        <h3 style="text-shadow: 1px 1px 2px #717171;"> Lista de cuentas modificadas</h3>
        <hr>
        <div class="jumbotron jumbotron-fluid">
            <div class="container">
                <div>
                    <h5>Datos del registro original</h5>
                    <div class="form-row">
                        <div class="col">
                        <div class="md-form form-group">
                            <label for="exampleInputEmail1">Cuenta: </label>
                            <input type="text" class="form-control" name="cuenta" value="<?php echo $cuentaOriginalR['Cuenta']?>" readonly>
                        </div>
                    </div>
                    <div class="col">
                        <div class="md-form form-group">
                            <label for="exampleInputEmail1">Tarea: </label>
                            <input type="text" class="form-control" name="idTarea" value="<?php echo $cuentaOriginalR['IdTarea']?>" readonly>
                        </div>
                    </div>
                    <div class="col">
                        <div class="md-form form-group">
                            <label for="exampleInputEmail1">Fecha de asignacion: </label>
                            <?php
                if($cuentaOriginalR['FechaAsignacion']<>NULL){
                $fechaultimo = $cuentaOriginalR['FechaAsignacion']->format('Y-m-d H:i:s'); ?>
                            <input type="text" class="form-control" name="fechaAsignacion" value="<?php echo $fechaultimo ?>" readonly>
                            <?php } else{ ?>
                            <input type="text" class="form-control" name="fechaAsignacion" placeholder="Fecha de ultimo pago" readonly>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="md-form form-group">
                            <label for="exampleInputEmail1">Observaciones: </label>
                            <input type="text" class="form-control" name="observaciones" value="<?php echo utf8_encode($cuentaOriginalR['Observaciones'])?>" readonly>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="form-row">
                    <div class="col-md-3">
                        <div class="md-form form-group">
                            <label for="exampleInputEmail1">Nombre: </label>
                            <input type="text" class="form-control" name="nombre" value="<?php echo $cuentaOriginalR['Nombre']?>" readonly>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="md-form form-group">
                            <label for="exampleInputEmail1">Telefono Local: </label>
                            <input type="text" class="form-control" name="telefonoLocal" value="<?php echo $cuentaOriginalR['TelefonoLocal']?>" readonly>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="md-form form-group">
                            <label for="exampleInputEmail1">Telefono Celular: </label>
                            <input type="text" class="form-control" name="telefonoCelular" value="<?php echo $cuentaOriginalR['TelefonoCelular']?>" readonly>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="md-form form-group">
                            <label for="exampleInputEmail1">Telefono Radio: </label>
                            <input type="text" class="form-control" name="telefonoRadio" value="<?php echo $cuentaOriginalR['TelefonoRadio']?>" readonly>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="md-form form-group">
                            <label for="exampleInputEmail1">Fecha de captura: </label>
                            <?php
                            if($cuentaOriginalR['FechaCaptura']<>NULL){
                            $fechaultimo = $cuentaOriginalR['FechaCaptura']->format('Y-m-d H:i:s'); ?>
                            <input type="text" class="form-control" name="fechaCaptura" value="<?php echo $fechaultimo ?>" readonly>
                            <?php } else{ ?>
                            <input type="text" class="form-control" name="fechaCaptura" placeholder="Fecha de ultimo pago" readonly>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="md-form form-group">
                            <label for="exampleInputEmail1">Correo electronico: </label>
                            <input type="text" class="form-control" name="correoElectronico" value="<?php echo $cuentaOriginalR['CorreoElectronico']?>" readonly>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="md-form form-group">
                            <label for="exampleInputEmail1">Fecha de Promesa: </label>
                            <?php
                            if($cuentaOriginalR['FechaPromesaPago']<>NULL){
                            $fechaultimo = $cuentaOriginalR['FechaPromesaPago']->format('Y-m-d H:i:s'); ?>
                            <input type="text" class="form-control" name="fechaPromesaPago" value="<?php echo $fechaultimo ?>" readonly>
                            <?php } else{ ?>
                            <input type="text" class="form-control" name="fechaPromesaPago" placeholder="Fecha de ultimo pago" readonly>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="md-form form-group">
                            <label for="exampleInputEmail1">Id Estatus: </label>
                            <input type="text" class="form-control" name="idEstatus" value="<?php echo $cuentaOriginalR['IdEstatus']?>" readonly>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="md-form form-group">
                            <label for="exampleInputEmail1">Calle: </label>
                            <input type="text" class="form-control" name="calle" value="<?php echo $cuentaOriginalR['Calle']?>" readonly>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="md-form form-group">
                            <label for="exampleInputEmail1">NumExt: </label>
                            <input type="text" class="form-control" name="numExt" value="<?php echo $cuentaOriginalR['NumExt']?>" readonly>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="md-form form-group">
                            <label for="exampleInputEmail1">Num Int: </label>
                            <input type="text" class="form-control" name="numInt" value="<?php echo $cuentaOriginalR['NumInt']?>" readonly>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="md-form form-group">
                            <label for="exampleInputEmail1">Colonia: </label>
                            <input type="text" class="form-control" name="colonia" value="<?php echo $cuentaOriginalR['Colonia']?>" readonly>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="md-form form-group">
                            <label for="exampleInputEmail1">Poblacion: </label>
                            <input type="text" class="form-control" name="poblacion" value="<?php echo $cuentaOriginalR['Poblacion']?>" readonly>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="md-form form-group">
                            <label for="exampleInputEmail1">Codigo Postal: </label>
                            <input type="text" class="form-control" name="cp" value="<?php echo $cuentaOriginalR['CP']?>" readonly>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="md-form form-group">
                            <label for="exampleInputEmail1">Referencia: </label>
                            <input type="text" class="form-control" name="referencia" value="<?php echo $cuentaOriginalR['Referencia']?>" readonly>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="md-form form-group">
                            <label for="exampleInputEmail1">Entre calle 1: </label>
                            <input type="text" class="form-control" name="entreCalle1" value="<?php echo $cuentaOriginalR['EntreCalle1']?>" readonly>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="md-form form-group">
                            <label for="exampleInputEmail1">Entre calle 2: </label>
                            <input type="text" class="form-control" name="entreCalle2" value="<?php echo $cuentaOriginalR['EntreCalle2']?>" readonly>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="md-form form-group">
                            <label for="exampleInputEmail1">Con Datos: </label>
                            <input type="text" class="form-control" name="conDatos" value="<?php echo $cuentaOriginalR['ConDatos']?>" readonly>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="md-form form-group">
                            <label for="exampleInputEmail1">Latitud: </label>
                            <input type="text" class="form-control" name="latitud" value="<?php echo $cuentaOriginalR['Latitud']?>" readonly>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="md-form form-group">
                            <label for="exampleInputEmail1">Longitud: </label>
                            <input type="text" class="form-control" name="longitud" value="<?php echo $cuentaOriginalR['Longitud']?>" readonly>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="md-form form-group">
                            <label for="exampleInputEmail1">Id Asp User: </label>
                            <input type="text" class="form-control" name="idAspUser" value="<?php echo $cuentaOriginalR['IdAspUser']?>" readonly>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="md-form form-group">
                            <label for="exampleInputEmail1">Con datos Validos: </label>
                            <input type="text" class="form-control" name="conDatosValidos" value="<?php echo $cuentaOriginalR['ConDatosValidos']?>" readonly>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="md-form form-group">
                            <label for="exampleInputEmail1">Fecha de Vencimiento: </label>
                            <?php
                            if($cuentaOriginalR['FechaVencimiento']<>NULL){
                            $fechaultimo = $cuentaOriginalR['FechaVencimiento']->format('Y-m-d H:i:s'); ?>
                            <input type="text" class="form-control" name="fechaVencimiento" value="<?php echo $fechaultimo ?>" readonly>
                            <?php } else{ ?>
                            <input type="text" class="form-control" name="fechaVencimento" placeholder="Fecha de ultimo pago" readonly>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="md-form form-group">
                            <label for="exampleInputEmail1">Fecha de sincronizacion: </label>
                            <?php
                            if($cuentaOriginalR['fechaSincronizacion']<>NULL){
                            $fechaultimo = $cuentaOriginalR['fechaSincronizacion']->format('Y-m-d H:i:s'); ?>
                            <input type="text" class="form-control" name="fechaSincronizacion" value="<?php echo $fechaultimo ?>" readonly>
                            <?php } else{ ?>
                            <input type="text" class="form-control" name="fechaSincronizacion" readonly>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="md-form form-group">
                            <label for="exampleInputEmail1">Id tipo de servicio: </label>
                            <input type="text" class="form-control" name="idTipoServicio" value="<?php echo $cuentaOriginalR['idTipoServicio']?>" readonly>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="md-form form-group">
                            <label for="exampleInputEmail1">Id estatus toma: </label>
                            <input type="text" class="form-control" name="idEstatusToma" value="<?php echo $cuentaOriginalR['idEstatusToma']?>" readonly>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="md-form form-group">
                            <label for="exampleInputEmail1">Id tipo toma: </label>
                            <input type="text" class="form-control" name="idTipoToma" value="<?php echo $cuentaOriginalR['idTipoToma']?>" readonly>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="md-form form-group">
                            <label for="exampleInputEmail1">Nombre Propietario: </label>
                            <input type="text" class="form-control" name="nombrePropietario" value="<?php echo $cuentaOriginalR['NombrePropietario']?>" readonly>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="md-form form-group">
                            <label for="exampleInputEmail1">Telefono Local Propietario: </label>
                            <input type="text" class="form-control" name="telefonoLocalPropietario" value="<?php echo $cuentaOriginalR['TelefonoLocalPropietario']?>" readonly>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="md-form form-group">
                            <label for="exampleInputEmail1">Telefono Celular Propietario: </label>
                            <input type="text" class="form-control" name="telefonoCelularPropietario" value="<?php echo $cuentaOriginalR['TelefonoCelularPropietario']?>" readonly>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="md-form form-group">
                            <label for="exampleInputEmail1">Telefono Radio Propietario: </label>
                            <input type="text" class="form-control" name="telefonoRadioPropietario" value="<?php echo $cuentaOriginalR['TelefonoRadioPropietario']?>" readonly>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="md-form form-group">
                            <label for="exampleInputEmail1">Correo Electronico Propietario: </label>
                            <input type="text" class="form-control" name="correoElectronicoPropietario" value="<?php echo $cuentaOriginalR['CorreoElectronicoPropietario']?>" readonly>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="md-form form-group">
                            <label for="exampleInputEmail1">Fecha Localizacion Propietario: </label>
                            <?php
                if($cuentaOriginalR['FechaLocalizacionPropietario']<>NULL){
                $fechaultimo = $cuentaOriginalR['FechaLocalizacionPropietario']->format('Y-m-d H:i:s'); ?>
                            <input type="text" class="form-control" name="fechaLocalizacionPropietario" value="<?php echo $fechaultimo ?>" readonly>
                            <?php } else{ ?>
                            <input type="text" class="form-control" name="fechaLocalizacionPropietario" readonly>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="md-form form-group">
                            <label for="exampleInputEmail1">Id Relacion Propietario: </label>
                            <input type="text" class="form-control" name="idRelacionPropietario" value="<?php echo $cuentaOriginalR['IdRelacionPropietario']?>" readonly>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="md-form form-group">
                            <label for="exampleInputEmail1">Motivo no pago: </label>
                            <input type="text" class="form-control" name="motivoNoPago" value="<?php echo utf8_encode($cuentaOriginalR['MotivoNoPago'])?>" readonly>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="md-form form-group">
                            <label for="exampleInputEmail1">Cantidad Pago: </label>
                            <input type="text" class="form-control" name="CantidadPago" value="<?php echo $cuentaOriginalR['CantidadPago']?>" readonly>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="md-form form-group">
                            <label for="exampleInputEmail1">Id Tipo deudor: </label>
                            <input type="text" class="form-control" name="idTipoDeudor" value="<?php echo $cuentaOriginalR['IdTipoDeudor']?>" readonly>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="md-form form-group">
                            <label for="exampleInputEmail1">Probabilidad Pago: </label>
                            <input type="text" class="form-control" name="probabilidadPago" value="<?php echo $cuentaOriginalR['ProbabilidadPago']?>" readonly>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="md-form form-group">
                            <label for="exampleInputEmail1">Id Quejas y Reclamaciones : </label>
                            <input type="text" class="form-control" name="idsQuejasReclamaciones" value="<?php echo $cuentaOriginalR['IdsQuejasReclamaciones']?>" readonly>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="md-form form-group">
                            <label for="exampleInputEmail1">Otra queja o Reclamacion: </label>
                            <input type="text" class="form-control" name="otraQuejaReclamacion" value="<?php echo $cuentaOriginalR['OtraQuejaReclamacion']?>" readonly>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="md-form form-group">
                            <label for="exampleInputEmail1">Ids Expectativas Contribuyentes: </label>
                            <input type="text" class="form-control" name="idsExpectativasContribuyente" value="<?php echo $cuentaOriginalR['IdsExpectativasContribuyente']?>" readonly>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="md-form form-group">
                            <label for="exampleInputEmail1">Otra Expectativas Contribuyentes: </label>
                            <input type="text" class="form-control" name="otraExpectativaContribuyente" value="<?php echo $cuentaOriginalR['OtraExpectativaContribuyente']?>" readonly>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="md-form form-group">
                            <label for="exampleInputEmail1">Ids caracteristicas predio: </label>
                            <input type="text" class="form-control" name="idsCaracteristicasPredio" value="<?php echo $cuentaOriginalR['IdsCaracteristicasPredio']?>" readonly>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="md-form form-group">
                            <label for="exampleInputEmail1">Otra caracteristicas predio: </label>
                            <input type="text" class="form-control" name="otraCaracteristicaPredio" value="<?php echo utf8_encode($cuentaOriginalR['OtraCaracteristicaPredio'])?>" readonly>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="md-form form-group">
                            <label for="exampleInputEmail1">Id accion sugerida: </label>
                            <input type="text" class="form-control" name="idAccionSugerida" value="<?php echo $cuentaOriginalR['IdAccionSugerida']?>" readonly>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="md-form form-group">
                            <label for="exampleInputEmail1">Id uso suelo predio: </label>
                            <input type="text" class="form-control" name="idUsoSueloPredio" value="<?php echo $cuentaOriginalR['IdUsoSueloPredio']?>" readonly>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="md-form form-group">
                            <label for="exampleInputEmail1">Id Tipo Predio predio: </label>
                            <input type="text" class="form-control" name="idTipoPredioPredio" value="<?php echo $cuentaOriginalR['IdTipoPredioPredio']?>" readonly>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="md-form form-group">
                            <label for="exampleInputEmail1">Calle Predio: </label>
                            <input type="text" class="form-control" name="callePredio" value="<?php echo $cuentaOriginalR['CallePredio']?>" readonly>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="md-form form-group">
                            <label for="exampleInputEmail1">Num ext Predio: </label>
                            <input type="text" class="form-control" name="numExtPredio" value="<?php echo $cuentaOriginalR['NumExtPredio']?>" readonly>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="md-form form-group">
                            <label for="exampleInputEmail1">Num int Predio: </label>
                            <input type="text" class="form-control" name="numIntPredio" value="<?php echo $cuentaOriginalR['NumIntPredio']?>" readonly>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="md-form form-group">
                            <label for="exampleInputEmail1">Colonia Predio: </label>
                            <input type="text" class="form-control" name="coloniaPredio" value="<?php echo $cuentaOriginalR['ColoniaPredio']?>" readonly>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="md-form form-group">
                            <label for="exampleInputEmail1">Poblacion Predio: </label>
                            <input type="text" class="form-control" name="poblacionPredio" value="<?php echo $cuentaOriginalR['PoblacionPredio']?>" readonly>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="md-form form-group">
                            <label for="exampleInputEmail1">Codigo postal Predio: </label>
                            <input type="text" class="form-control" name="cpPredio" value="<?php echo $cuentaOriginalR['CPPredio']?>" readonly>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="md-form form-group">
                            <label for="exampleInputEmail1">Entre calle 1 predio: </label>
                            <input type="text" class="form-control" name="entreCalle1Predio" value="<?php echo $cuentaOriginalR['EntreCalle1Predio']?>" readonly>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="md-form form-group">
                            <label for="exampleInputEmail1">Entre calle 2 predio: </label>
                            <input type="text" class="form-control" name="entreCalle2Predio" value="<?php echo $cuentaOriginalR['EntreCalle2Predio']?>" readonly>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="md-form form-group">
                            <label for="exampleInputEmail1">Manzana predio: </label>
                            <input type="text" class="form-control" name="manzanaPredio" value="<?php echo $cuentaOriginalR['ManzanaPredio']?>" readonly>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="md-form form-group">
                            <label for="exampleInputEmail1">Lote predio: </label>
                            <input type="text" class="form-control" name="lotePredio" value="<?php echo $cuentaOriginalR['LotePredio']?>" readonly>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="md-form form-group">
                            <label for="exampleInputEmail1">Manzana: </label>
                            <input type="text" class="form-control" name="manzana" value="<?php echo $cuentaOriginalR['Manzana']?>" readonly>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="md-form form-group">
                            <label for="exampleInputEmail1">Lote: </label>
                            <input type="text" class="form-control" name="lote" value="<?php echo $cuentaOriginalR['Lote']?>" readonly>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="md-form form-group">
                            <label for="exampleInputEmail1">Referenca Predio: </label>
                            <input type="text" class="form-control" name="referenciaPredio" value="<?php echo $cuentaOriginalR['ReferenciaPredio']?>" readonly>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="md-form form-group">
                            <label for="exampleInputEmail1">Solucion planteada: </label>
                            <input type="text" class="form-control" name="solucionPlanteada" value="<?php echo $cuentaOriginalR['SolucionPlanteada']?>" readonly>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="md-form form-group">
                            <label for="exampleInputEmail1">Forma de pago: </label>
                            <input type="text" class="form-control" name="formaPago" value="<?php echo $cuentaOriginalR['FormaPago']?>" readonly>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="md-form form-group">
                            <label for="exampleInputEmail1">Observaciones gestor: </label>
                            <input type="text" class="form-control" name="observacionesGestor" value="<?php echo $cuentaOriginalR['ObservacionesGestor']?>" readonly>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="md-form form-group">
                            <label for="exampleInputEmail1">Id motivo no pago: </label>
                            <input type="text" class="form-control" name="idMotivoNoPago" value="<?php echo $cuentaOriginalR['idmotivonopago']?>" readonly>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="md-form form-group">
                            <label for="exampleInputEmail1">Id servicios motivo no pago: </label>
                            <input type="text" class="form-control" name="idServiciosMotivoNoPago" value="<?php echo $cuentaOriginalR['idserviciosmotivonopago']?>" readonly>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="md-form form-group">
                            <label for="exampleInputEmail1">Valido: </label>
                            <input type="text" class="form-control" name="valido" value="<?php echo $cuentaOriginalR['Valido']?>" readonly>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="md-form form-group">
                            <label for="exampleInputEmail1">Activo: </label>
                            <input type="text" class="form-control" name="activo" value="<?php echo $cuentaOriginalR['Activo']?>" readonly>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="md-form form-group">
                            <label for="exampleInputEmail1">Numero medidor: </label>
                            <input type="text" class="form-control" name="numeroMedidor" value="<?php echo $cuentaOriginalR['numeroMedidor']?>" readonly>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
        <br><br>
        <form method="POST"> 
        <div class="jumbotron jumbotron-fluid">
            <div class="container">
                <h5>Cambios Realizados</h5>
                <hr>
                <div>
                    <div class="form-row">
                        <div class="col">
                        <div class="md-form form-group">
                            <label for="exampleInputEmail1">Cuenta: </label>
                            <input type="text" class="form-control" name="cuentaC" value="<?php echo $cuenta['Cuenta']?>">
                        </div>
                    </div>
                    <div class="col">
                        <div class="md-form form-group">
                            <label for="exampleInputEmail1">Id Tarea: </label>
                            <input type="text" class="form-control" name="idTareaC" value="<?php echo $cuenta['IdTarea']?>">
                        </div>
                    </div>
                    <div class="col">
                        <div class="md-form form-group">
                            <label for="exampleInputEmail1">Fecha de asignacion: </label>
                            <?php
                            if($cuenta['FechaAsignacion']<>NULL){
                            $fechaultimo = $cuenta['FechaAsignacion'] ?>
                            <input type="text" class="form-control" name="fechaAsignacionC" value="<?php echo $fechaultimo ?>">
                            <?php }?>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="md-form form-group">
                            <label for="exampleInputEmail1">Observaciones: </label>
                            <input type="text" class="form-control" name="observacionesC" value="<?php echo utf8_encode($cuenta['Observaciones'])?>">
                        </div>
                    </div>
                </div>
                <hr>
                <div class="form-row">
                    <div class="col-md-3">
                        <div class="md-form form-group">
                            <label for="exampleInputEmail1">Nombre: </label>
                            <input type="text" class="form-control" name="nombreC" value="<?php echo $cuenta['Nombre']?>">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="md-form form-group">
                            <label for="exampleInputEmail1">Telefono Local: </label>
                            <input type="text" class="form-control" name="telefonoLocalC" value="<?php echo $cuenta['TelefonoLocal']?>">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="md-form form-group">
                            <label for="exampleInputEmail1">Telefono Celular: </label>
                            <input type="text" class="form-control" name="telefonoCelularC" value="<?php echo $cuenta['TelefonoCelular']?>">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="md-form form-group">
                            <label for="exampleInputEmail1">Telefono Radio: </label>
                            <input type="text" class="form-control" name="telefonoRadioC" value="<?php echo $cuenta['TelefonoRadio']?>">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="md-form form-group">
                            <label for="exampleInputEmail1">Fecha de captura: </label>
                            <?php
                            if($cuenta['FechaCaptura']<>NULL){
                            $fechaultimo = $cuenta['FechaCaptura'] ?>
                            <input type="text" class="form-control" name="fechaCapturaC" value="<?php echo $fechaultimo ?>">
                            <?php } ?>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="md-form form-group">
                            <label for="exampleInputEmail1">Correo electronico: </label>
                            <input type="text" class="form-control" name="correoElectronicoC" value="<?php echo $cuenta['CorreoElectronico']?>">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="md-form form-group">
                            <label for="exampleInputEmail1">Fecha de Promesa: </label>
                            <?php
                            if($cuenta['FechaPromesaPago']<>NULL){
                            $fechaultimo = $cuenta['FechaPromesaPago']?>
                            <input type="text" class="form-control" name="fechaPromesaPagoC" value="<?php echo $fechaultimo ?>" >
                            <?php } ?>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="md-form form-group">
                            <label for="exampleInputEmail1">Id Estatus: </label>
                            <input type="text" class="form-control" name="idEstatusC" value="<?php echo $cuenta['IdEstatus']?>" >
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="md-form form-group">
                            <label for="exampleInputEmail1">Calle: </label>
                            <input type="text" class="form-control" name="calleC" value="<?php echo $cuenta['Calle']?>">
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="md-form form-group">
                            <label for="exampleInputEmail1">NumExt: </label>
                            <input type="text" class="form-control" name="numExtC" value="<?php echo $cuenta['NumExt']?>">
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="md-form form-group">
                            <label for="exampleInputEmail1">Num Int: </label>
                            <input type="text" class="form-control" name="numIntC" value="<?php echo $cuenta['NumInt']?>">
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="md-form form-group">
                            <label for="exampleInputEmail1">Colonia: </label>
                            <input type="text" class="form-control" name="coloniaC" value="<?php echo $cuenta['Colonia']?>">
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="md-form form-group">
                            <label for="exampleInputEmail1">Poblacion: </label>
                            <input type="text" class="form-control" name="poblacionC" value="<?php echo $cuenta['Poblacion']?>">
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="md-form form-group">
                            <label for="exampleInputEmail1">Codigo Postal: </label>
                            <input type="text" class="form-control" name="cpC" value="<?php echo $cuenta['CP']?>">
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="md-form form-group">
                            <label for="exampleInputEmail1">Referencia: </label>
                            <input type="text" class="form-control" name="referenciaC" value="<?php echo $cuenta['Referencia']?>">
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="md-form form-group">
                            <label for="exampleInputEmail1">Entre calle 1: </label>
                            <input type="text" class="form-control" name="entreCalle1C" value="<?php echo $cuenta['EntreCalle1']?>">
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="md-form form-group">
                            <label for="exampleInputEmail1">Entre calle 2: </label>
                            <input type="text" class="form-control" name="entreCalle2C" value="<?php echo $cuenta['EntreCalle2']?>">
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="md-form form-group">
                            <label for="exampleInputEmail1">Con Datos: </label>
                            <input type="text" class="form-control" name="conDatosC" value="<?php echo $cuenta['ConDatos']?>">
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="md-form form-group">
                            <label for="exampleInputEmail1">Latitud: </label>
                            <input type="text" class="form-control" name="latitudC" value="<?php echo $cuenta['Latitud']?>">
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="md-form form-group">
                            <label for="exampleInputEmail1">Longitud: </label>
                            <input type="text" class="form-control" name="longitudC" value="<?php echo $cuenta['Longitud']?>">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="md-form form-group">
                            <label for="exampleInputEmail1">Id Asp User: </label>
                            <input type="text" class="form-control" name="idAspUserC" value="<?php echo $cuenta['IdAspUser']?>">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="md-form form-group">
                            <label for="exampleInputEmail1">Con datos Validos: </label>
                            <input type="text" class="form-control" name="conDatosValidosC" value="<?php echo $cuenta['ConDatosValidos']?>">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="md-form form-group">
                            <label for="exampleInputEmail1">Fecha de Vencimiento: </label>
                            <?php
                            if($cuenta['FechaVencimiento']<>NULL){
                            $fechaultimo = $cuenta['FechaVencimiento']?>
                            <input type="text" class="form-control" name="fechaVencimientoC" value="<?php echo $fechaultimo ?>">
                            <?php } ?>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="md-form form-group">
                            <label for="exampleInputEmail1">Fecha de sincronizacion: </label>
                            <?php
                            if($cuenta['fechaSincronizacion']<>NULL){
                            $fechaultimo = $cuenta['fechaSincronizacion']?>
                            <input type="text" class="form-control" name="fechaSincronizacionC" value="<?php echo $fechaultimo ?>">
                            <?php } ?>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="md-form form-group">
                            <label for="exampleInputEmail1">Id tipo de servicio: </label>
                            <input type="text" class="form-control" name="idTipoServicioC" value="<?php echo $cuenta['idTipoServicio']?>">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="md-form form-group">
                            <label for="exampleInputEmail1">Id estatus toma: </label>
                            <input type="text" class="form-control" name="idEstatusTomaC" value="<?php echo $cuenta['idEstatusToma']?>">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="md-form form-group">
                            <label for="exampleInputEmail1">Id tipo toma: </label>
                            <input type="text" class="form-control" name="idTipoTomaC" value="<?php echo $cuenta['idTipoToma']?>">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="md-form form-group">
                            <label for="exampleInputEmail1">Nombre Propietario: </label>
                            <input type="text" class="form-control" name="nombrePropietarioC" value="<?php echo $cuenta['NombrePropietario']?>">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="md-form form-group">
                            <label for="exampleInputEmail1">Telefono Local Propietario: </label>
                            <input type="text" class="form-control" name="telefonoLocalPropietarioC" value="<?php echo $cuenta['TelefonoLocalPropietario']?>">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="md-form form-group">
                            <label for="exampleInputEmail1">Telefono Celular Propietario: </label>
                            <input type="text" class="form-control" name="telefonoCelularPropietarioC" value="<?php echo $cuenta['TelefonoCelularPropietario']?>">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="md-form form-group">
                            <label for="exampleInputEmail1">Telefono Radio Propietario: </label>
                            <input type="text" class="form-control" name="telefonoRadioPropietarioC" value="<?php echo $cuenta['TelefonoRadioPropietario']?>">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="md-form form-group">
                            <label for="exampleInputEmail1">Correo Electronico Propietario: </label>
                            <input type="text" class="form-control" name="correoElectronicoPropietarioC" value="<?php echo $cuenta['CorreoElectronicoPropietario']?>">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="md-form form-group">
                            <label for="exampleInputEmail1">Fecha Localizacion Propietario: </label>
                            <?php
                            if($cuenta['FechaLocalizacionPropietario']<>NULL){
                            $fechaultimo = $cuenta['FechaLocalizacionPropietario']?>
                            <input type="text" class="form-control" name="fechaLocalizacionPropietarioC" value="<?php echo $fechaultimo ?>">
                            <?php } ?>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="md-form form-group">
                            <label for="exampleInputEmail1">Id Relacion Propietario: </label>
                            <input type="text" class="form-control" name="idRelacionPropietarioC" value="<?php echo $cuenta['IdRelacionPropietario']?>">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="md-form form-group">
                            <label for="exampleInputEmail1">Motivo no pago: </label>
                            <input type="text" class="form-control" name="motivoNoPagoC" value="<?php echo utf8_encode($cuenta['MotivoNoPago'])?>">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="md-form form-group">
                            <label for="exampleInputEmail1">Cantidad Pago: </label>
                            <input type="text" class="form-control" name="CantidadPagoC" value="<?php echo $cuenta['CantidadPago']?>">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="md-form form-group">
                            <label for="exampleInputEmail1">Id Tipo deudor: </label>
                            <input type="text" class="form-control" name="idTipoDeudorC" value="<?php echo $cuenta['IdTipoDeudor']?>">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="md-form form-group">
                            <label for="exampleInputEmail1">Probabilidad Pago: </label>
                            <input type="text" class="form-control" name="probabilidadPagoC" value="<?php echo $cuenta['ProbabilidadPago']?>">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="md-form form-group">
                            <label for="exampleInputEmail1">Id Quejas y Reclamaciones : </label>
                            <input type="text" class="form-control" name="idsQuejasReclamacionesC" value="<?php echo $cuenta['IdsQuejasReclamaciones']?>">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="md-form form-group">
                            <label for="exampleInputEmail1">Otra queja o Reclamacion: </label>
                            <input type="text" class="form-control" name="otraQuejaReclamacionC" value="<?php echo $cuenta['OtraQuejaReclamacion']?>">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="md-form form-group">
                            <label for="exampleInputEmail1">Ids Expectativas Contribuyentes: </label>
                            <input type="text" class="form-control" name="idsExpectativasContribuyenteC" value="<?php echo $cuenta['IdsExpectativasContribuyente']?>">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="md-form form-group">
                            <label for="exampleInputEmail1">Otra Expectativas Contribuyentes: </label>
                            <input type="text" class="form-control" name="otraExpectativaContribuyenteC" value="<?php echo $cuenta['OtraExpectativaContribuyente']?>">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="md-form form-group">
                            <label for="exampleInputEmail1">Ids caracteristicas predio: </label>
                            <input type="text" class="form-control" name="idsCaracteristicasPredioC" value="<?php echo $cuenta['IdsCaracteristicasPredio']?>">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="md-form form-group">
                            <label for="exampleInputEmail1">Otra caracteristicas predio: </label>
                            <input type="text" class="form-control" name="otraCaracteristicaPredioC" value="<?php echo utf8_encode($cuenta['OtraCaracteristicaPredio'])?>">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="md-form form-group">
                            <label for="exampleInputEmail1">Id accion sugerida: </label>
                            <input type="text" class="form-control" name="idAccionSugeridaC" value="<?php echo $cuenta['IdAccionSugerida']?>">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="md-form form-group">
                            <label for="exampleInputEmail1">Id uso suelo predio: </label>
                            <input type="text" class="form-control" name="idUsoSueloPredioC" value="<?php echo $cuenta['IdUsoSueloPredio']?>">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="md-form form-group">
                            <label for="exampleInputEmail1">Id Tipo Predio predio: </label>
                            <input type="text" class="form-control" name="idTipoPredioPredioC" value="<?php echo $cuenta['IdTipoPredioPredio']?>">
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="md-form form-group">
                            <label for="exampleInputEmail1">Calle Predio: </label>
                            <input type="text" class="form-control" name="callePredioC" value="<?php echo $cuenta['CallePredio']?>">
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="md-form form-group">
                            <label for="exampleInputEmail1">Num ext Predio: </label>
                            <input type="text" class="form-control" name="numExtPredioC" value="<?php echo $cuenta['NumExtPredio']?>">
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="md-form form-group">
                            <label for="exampleInputEmail1">Num int Predio: </label>
                            <input type="text" class="form-control" name="numIntPredioC" value="<?php echo $cuenta['NumIntPredio']?>">
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="md-form form-group">
                            <label for="exampleInputEmail1">Colonia Predio: </label>
                            <input type="text" class="form-control" name="coloniaPredioC" value="<?php echo $cuenta['ColoniaPredio']?>">
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="md-form form-group">
                            <label for="exampleInputEmail1">Poblacion Predio: </label>
                            <input type="text" class="form-control" name="poblacionPredioC" value="<?php echo $cuenta['PoblacionPredio']?>">
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="md-form form-group">
                            <label for="exampleInputEmail1">Codigo postal Predio: </label>
                            <input type="text" class="form-control" name="cpPredioC" value="<?php echo $cuenta['CPPredio']?>">
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="md-form form-group">
                            <label for="exampleInputEmail1">Entre calle 1 predio: </label>
                            <input type="text" class="form-control" name="entreCalle1PredioC" value="<?php echo $cuenta['EntreCalle1Predio']?>">
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="md-form form-group">
                            <label for="exampleInputEmail1">Entre calle 2 predio: </label>
                            <input type="text" class="form-control" name="entreCalle2PredioC" value="<?php echo $cuenta['EntreCalle2Predio']?>">
                        </div>
                    </div>
                    <div class="col-md-2"> 
                        <div class="md-form form-group">
                            <label for="exampleInputEmail1">Manzana predio: </label>
                            <input type="text" class="form-control" name="manzanaPredioC" value="<?php echo $cuenta['ManzanaPredio']?>">
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="md-form form-group">
                            <label for="exampleInputEmail1">Lote predio: </label>
                            <input type="text" class="form-control" name="lotePredioC" value="<?php echo $cuenta['LotePredio']?>">
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="md-form form-group">
                            <label for="exampleInputEmail1">Manzana: </label>
                            <input type="text" class="form-control" name="manzanaC" value="<?php echo $cuenta['Manzana']?>">
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="md-form form-group">
                            <label for="exampleInputEmail1">Lote: </label>
                            <input type="text" class="form-control" name="loteC" value="<?php echo $cuenta['Lote']?>">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="md-form form-group">
                            <label for="exampleInputEmail1">Referenca Predio: </label>
                            <input type="text" class="form-control" name="referenciaPredioC" value="<?php echo $cuenta['ReferenciaPredio']?>">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="md-form form-group">
                            <label for="exampleInputEmail1">Solucion planteada: </label>
                            <input type="text" class="form-control" name="solucionPlanteadaC" value="<?php echo $cuenta['SolucionPlanteada']?>">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="md-form form-group">
                            <label for="exampleInputEmail1">Forma de pago: </label>
                            <input type="text" class="form-control" name="formaPagoC" value="<?php echo $cuenta['FormaPago']?>">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="md-form form-group">
                            <label for="exampleInputEmail1">Observaciones gestor: </label>
                            <input type="text" class="form-control" name="observacionesGestorC" value="<?php echo $cuenta['ObservacionesGestor']?>">
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="md-form form-group">
                            <label for="exampleInputEmail1">Id motivo no pago: </label>
                            <input type="text" class="form-control" name="idMotivoNoPagoC" value="<?php echo $cuenta['idmotivonopago']?>">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="md-form form-group">
                            <label for="exampleInputEmail1">Id servicios motivo no pago: </label>
                            <input type="text" class="form-control" name="idServiciosMotivoNoPagoC" value="<?php echo $cuenta['idserviciosmotivonopago']?>">
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="md-form form-group">
                            <label for="exampleInputEmail1">Valido: </label>
                            <input type="text" class="form-control" name="validoC" value="<?php echo $cuenta['Valido']?>">
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="md-form form-group">
                            <label for="exampleInputEmail1">Activo: </label>
                            <input type="text" class="form-control" name="activoC" value="<?php echo $cuenta['Activo']?>">
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="md-form form-group">
                            <label for="exampleInputEmail1">Numero medidor: </label>
                            <input type="text" class="form-control" name="numeroMedidorC" value="<?php echo $cuenta['numeroMedidor']?>">
                        </div>
                    </div>

                    </div>
                </div>
            </div>
            <button class="btn btn-dark btn-sm" type="submit" name="updateAceptado">Guardar</button>
        </div>
        </form>
    </div>
    <hr>
    <br>
    <div style="text-align:center;">
        <a href="../cambiarTarea/cuentaModificadaGestor.php?cuenta=<?php echo $_GET['cuenta'] ?>&plz=<?php echo $_GET['plz'] ?>" class="btn btn-dark btn-sm"><i class="fas fa-times"></i> Regresar</a>
    </div>

    <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
    <?php 

require "include/footer.php";
    ?>

</body>

<script src="../js/jquery-3.4.1.min.js"></script>
<script src="../js/popper.min.js"></script>
<script src="../js/bootstrap.js"></script>
<script>
    $(function() {
        $('[data-toggle="tooltip"]').tooltip()
    })

</script>
<script>
    function Confirmar(Mensaje) {
        return (confirm(Mensaje)) ? true : false;
    }

</script>

</html>