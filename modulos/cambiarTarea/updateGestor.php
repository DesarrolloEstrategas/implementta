<?php
require "../../acnxerdm/conect.php";
if(isset($_GET['cuenta'])){
    $editar = $_GET['cuenta'];
    $idGest=$_GET['gest'];
    $query = "select RegistroGestor.*, CatalogoTareas.DescripcionTarea from RegistroGestor
    inner join CatalogoTareas on CatalogoTareas.IdTarea=RegistroGestor.IdTarea
    where Cuenta = '$editar' and IdRegistroGestor='$idGest'";
    $queryResult = sqlsrv_query($cnx, $query);
    
    $fila = sqlsrv_fetch_array($queryResult);
    
} 


//****************CATALOGO TAREAS*****************************
    $ta="SELECT * FROM CatalogoTareas";
    $tar=sqlsrv_query($cnx,$ta);
    $tarea=sqlsrv_fetch_array($tar);
//****************CATALOGO TAREAS*****************************

?>
<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cambiar Tarea Gestor</title>
    <link rel="icon" href="../icono/icon.png">
    <!-- Bootstrap -->
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link href="../fontawesome/css/all.css" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="../js/generatePass.js"></script>
    <style>
        body {
            background-image: url(../img/back.jpg);
            background-repeat: repeat;
            background-size: 100%;
            overflow-x: hidden;
            /* ocultar scrolBar horizontal*/
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
            padding-top: 3%;
            padding-bottom: 2%;
        }

        .padding {
            padding-right: 35%;
            padding-left: 35%;
        }

    </style>
    <?php require "include/nav.php"; ?>
</head>

<body>
    <form action="" method="post">
        <div class="container">
            <h4 style="text-shadow: 1px 1px 2px #717171;"><i class="fas fa-user-edit"></i> Actualizar cuenta</h4>

            <div class="jumbotron">
                <div class="form-row">
                    <div class="col-sm-0">
                        <div class="md-form form-group">
                            <input type="hidden" class="form-control" name="idRG" value="<?php echo $fila['IdRegistroGestor']?>" required>
                        </div>
                    </div>
                    <div class="col">
                        <div class="md-form form-group">
                            <label for="exampleInputEmail1">Cuenta: *</label>
                            <input type="text" class="form-control" name="cuenta" value="<?php echo $fila['Cuenta']?>" required>
                        </div>
                    </div>
                    <div class="col">
<!--
                        <div class="md-form form-group">
                            <label for="exampleInputEmail1">Tarea: *</label>
                            <input type="text" class="form-control" name="idTarea" value="<?php// echo $fila['DescripcionTarea']?>" required>
                        </div>
-->
                        
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Tarea: *</label>
                            <select class="form-control" name="idTarea" required>
                              <option value="<?php echo $fila['IdTarea'] ?>"><?php echo utf8_encode($fila['DescripcionTarea']) ?></option>
                            <?php do{ ?>
                                <option value="<?php echo $tarea['IdTarea'] ?>"><?php echo utf8_encode($tarea['DescripcionTarea']) ?></option>
                            <?php } while($tarea=sqlsrv_fetch_array($tar)); ?>
                            </select>
                        </div>    
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                    </div>
                    <div class="col">
                        <div class="md-form form-group">
                            <label for="exampleInputEmail1">Fecha de asignacion: *</label>
                            <?php
                if($fila['FechaAsignacion']<>NULL){
                $fechaultimo = $fila['FechaAsignacion']->format('Y-m-d H:i:s'); ?>
                            <input type="datetime-local" class="form-control" name="fechaAsignacion" value="<?php echo $fechaultimo ?>">
                            <?php } else{ ?>
                            <input type="datetime-local" class="form-control" name="fechaAsignacion" placeholder="Fecha de ultimo pago">
                            <?php } ?>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="md-form form-group">
                            <label for="exampleInputEmail1">Observaciones: *</label>
                            <input type="text" class="form-control" name="observaciones" value="<?php echo utf8_encode($fila['Observaciones'])?>" required>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="form-row">
                    <div class="col-md-3">
                        <div class="md-form form-group">
                            <label for="exampleInputEmail1">Nombre: *</label>
                            <input type="text" class="form-control" name="nombre" value="<?php echo $fila['Nombre']?>">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="md-form form-group">
                            <label for="exampleInputEmail1">Telefono Local: *</label>
                            <input type="text" class="form-control" name="telefonoLocal" value="<?php echo $fila['TelefonoLocal']?>">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="md-form form-group">
                            <label for="exampleInputEmail1">Telefono Celular: *</label>
                            <input type="text" class="form-control" name="telefonoCelular" value="<?php echo $fila['TelefonoCelular']?>">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="md-form form-group">
                            <label for="exampleInputEmail1">Telefono Radio: *</label>
                            <input type="text" class="form-control" name="telefonoRadio" value="<?php echo $fila['TelefonoRadio']?>">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="md-form form-group">
                            <label for="exampleInputEmail1">Fecha de captura: *</label>
                            <?php
                            if($fila['FechaCaptura']<>NULL){
                            $fechaultimo = $fila['FechaCaptura']->format('Y-m-d H:i:s'); ?>
                            <input type="datetime-local" class="form-control" name="fechaCaptura" value="<?php echo $fechaultimo ?>">
                            <?php } else{ ?>
                            <input type="datetime-local" class="form-control" name="fechaCaptura" placeholder="Fecha de ultimo pago">
                            <?php } ?>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="md-form form-group">
                            <label for="exampleInputEmail1">Correo electronico: *</label>
                            <input type="text" class="form-control" name="correoElectronico" value="<?php echo $fila['CorreoElectronico']?>">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="md-form form-group">
                            <label for="exampleInputEmail1">Fecha de Promesa: *</label>
                            <?php
                            if($fila['FechaPromesaPago']<>NULL){
                            $fechaultimo = $fila['FechaPromesaPago']->format('Y-m-d H:i:s'); ?>
                            <input type="datetime-local" class="form-control" name="fechaPromesaPago" value="<?php echo $fechaultimo ?>">
                            <?php } else{ ?>
                            <input type="datetime-local" class="form-control" name="fechaPromesaPago" placeholder="Fecha de ultimo pago">
                            <?php } ?>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="md-form form-group">
                            <label for="exampleInputEmail1">Id Estatus: *</label>
                            <input type="text" class="form-control" name="idEstatus" value="<?php echo $fila['IdEstatus']?>" required>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="md-form form-group">
                            <label for="exampleInputEmail1">Calle: *</label>
                            <input type="text" class="form-control" name="calle" value="<?php echo $fila['Calle']?>">
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="md-form form-group">
                            <label for="exampleInputEmail1">NumExt: *</label>
                            <input type="text" class="form-control" name="numExt" value="<?php echo $fila['NumExt']?>">
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="md-form form-group">
                            <label for="exampleInputEmail1">Num Int: *</label>
                            <input type="text" class="form-control" name="numInt" value="<?php echo $fila['NumInt']?>">
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="md-form form-group">
                            <label for="exampleInputEmail1">Colonia: *</label>
                            <input type="text" class="form-control" name="colonia" value="<?php echo $fila['Colonia']?>">
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="md-form form-group">
                            <label for="exampleInputEmail1">Poblacion: *</label>
                            <input type="text" class="form-control" name="poblacion" value="<?php echo $fila['Poblacion']?>">
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="md-form form-group">
                            <label for="exampleInputEmail1">Codigo Postal: *</label>
                            <input type="text" class="form-control" name="cp" value="<?php echo $fila['CP']?>">
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="md-form form-group">
                            <label for="exampleInputEmail1">Referencia: *</label>
                            <input type="text" class="form-control" name="referencia" value="<?php echo $fila['Referencia']?>">
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="md-form form-group">
                            <label for="exampleInputEmail1">Entre calle 1: *</label>
                            <input type="text" class="form-control" name="entreCalle1" value="<?php echo $fila['EntreCalle1']?>">
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="md-form form-group">
                            <label for="exampleInputEmail1">Entre calle 2: *</label>
                            <input type="text" class="form-control" name="entreCalle2" value="<?php echo $fila['EntreCalle2']?>">
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="md-form form-group">
                            <label for="exampleInputEmail1">Con Datos: *</label>
                            <input type="text" class="form-control" name="conDatos" value="<?php echo $fila['ConDatos']?>" required>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="md-form form-group">
                            <label for="exampleInputEmail1">Latitud: *</label>
                            <input type="text" class="form-control" name="latitud" value="<?php echo $fila['Latitud']?>" required>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="md-form form-group">
                            <label for="exampleInputEmail1">Longitud: *</label>
                            <input type="text" class="form-control" name="longitud" value="<?php echo $fila['Longitud']?>" required>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="md-form form-group">
                            <label for="exampleInputEmail1">Id Asp User: *</label>
                            <input type="text" class="form-control" name="idAspUser" value="<?php echo $fila['IdAspUser']?>">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="md-form form-group">
                            <label for="exampleInputEmail1">Con datos Validos: *</label>
                            <input type="text" class="form-control" name="conDatosValidos" value="<?php echo $fila['ConDatosValidos']?>">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="md-form form-group">
                            <label for="exampleInputEmail1">Fecha de Vencimiento: *</label>
                            <?php
                            if($fila['FechaVencimiento']<>NULL){
                            $fechaultimo = $fila['FechaVencimiento']->format('Y-m-d H:i:s'); ?>
                            <input type="datetime-local" class="form-control" name="fechaVencimiento" value="<?php echo $fechaultimo ?>">
                            <?php } else{ ?>
                            <input type="datetime-local" class="form-control" name="fechaVencimento" placeholder="Fecha de ultimo pago">
                            <?php } ?>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="md-form form-group">
                            <label for="exampleInputEmail1">Fecha de sincronizacion: *</label>
                            <?php
                            if($fila['fechaSincronizacion']<>NULL){
                            $fechaultimo = $fila['fechaSincronizacion']->format('Y-m-d H:i:s'); ?>
                            <input type="datetime-local" class="form-control" name="fechaSincronizacion" value="<?php echo $fechaultimo ?>">
                            <?php } else{ ?>
                            <input type="datetime-local" class="form-control" name="fechaSincronizacion">
                            <?php } ?>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="md-form form-group">
                            <label for="exampleInputEmail1">Id tipo de servicio: *</label>
                            <input type="text" class="form-control" name="idTipoServicio" value="<?php echo $fila['idTipoServicio']?>" required>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="md-form form-group">
                            <label for="exampleInputEmail1">Id estatus toma: *</label>
                            <input type="text" class="form-control" name="idEstatusToma" value="<?php echo $fila['idEstatusToma']?>" required>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="md-form form-group">
                            <label for="exampleInputEmail1">Id tipo toma: *</label>
                            <input type="text" class="form-control" name="idTipoToma" value="<?php echo $fila['idTipoToma']?>" required>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="md-form form-group">
                            <label for="exampleInputEmail1">Nombre Propietario: *</label>
                            <input type="text" class="form-control" name="nombrePropietario" value="<?php echo $fila['NombrePropietario']?>">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="md-form form-group">
                            <label for="exampleInputEmail1">Telefono Local Propietario: *</label>
                            <input type="text" class="form-control" name="telefonoLocalPropietario" value="<?php echo $fila['TelefonoLocalPropietario']?>">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="md-form form-group">
                            <label for="exampleInputEmail1">Telefono Celular Propietario: *</label>
                            <input type="text" class="form-control" name="telefonoCelularPropietario" value="<?php echo $fila['TelefonoCelularPropietario']?>">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="md-form form-group">
                            <label for="exampleInputEmail1">Telefono Radio Propietario: *</label>
                            <input type="text" class="form-control" name="telefonoRadioPropietario" value="<?php echo $fila['TelefonoRadioPropietario']?>">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="md-form form-group">
                            <label for="exampleInputEmail1">Correo Electronico Propietario: *</label>
                            <input type="text" class="form-control" name="correoElectronicoPropietario" value="<?php echo $fila['CorreoElectronicoPropietario']?>">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="md-form form-group">
                            <label for="exampleInputEmail1">Fecha Localizacion Propietario: *</label>
                            <?php
                            if($fila['FechaLocalizacionPropietario']<>NULL){
                            $fechaultimo = $fila['FechaLocalizacionPropietario']->format('Y-m-d H:i:s'); ?>
                            <input type="datetime-local" class="form-control" name="fechaLocalizacionPropietario" value="<?php echo $fechaultimo ?>">
                            <?php } else{ ?>
                            <input type="datetime-local" class="form-control" name="fechaLocalizacionPropietario">
                            <?php } ?>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="md-form form-group">
                            <label for="exampleInputEmail1">Id Relacion Propietario: *</label>
                            <input type="text" class="form-control" name="idRelacionPropietario" value="<?php echo $fila['IdRelacionPropietario']?>">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="md-form form-group">
                            <label for="exampleInputEmail1">Motivo no pago: *</label>
                            <input type="text" class="form-control" name="motivoNoPago" value="<?php echo utf8_encode($fila['MotivoNoPago'])?>">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="md-form form-group">
                            <label for="exampleInputEmail1">Cantidad Pago: *</label>
                            <input type="text" class="form-control" name="CantidadPago" value="<?php echo $fila['CantidadPago']?>">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="md-form form-group">
                            <label for="exampleInputEmail1">Id Tipo deudor: *</label>
                            <input type="text" class="form-control" name="idTipoDeudor" value="<?php echo $fila['IdTipoDeudor']?>">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="md-form form-group">
                            <label for="exampleInputEmail1">Probabilidad Pago: *</label>
                            <input type="text" class="form-control" name="probabilidadPago" value="<?php echo $fila['ProbabilidadPago']?>">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="md-form form-group">
                            <label for="exampleInputEmail1">Id Quejas y Reclamaciones : *</label>
                            <input type="text" class="form-control" name="idsQuejasReclamaciones" value="<?php echo $fila['IdsQuejasReclamaciones']?>">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="md-form form-group">
                            <label for="exampleInputEmail1">Otra queja o Reclamacion: *</label>
                            <input type="text" class="form-control" name="otraQuejaReclamacion" value="<?php echo $fila['OtraQuejaReclamacion']?>">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="md-form form-group">
                            <label for="exampleInputEmail1">Ids Expectativas Contribuyentes: *</label>
                            <input type="text" class="form-control" name="idsExpectativasContribuyente" value="<?php echo $fila['IdsExpectativasContribuyente']?>">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="md-form form-group">
                            <label for="exampleInputEmail1">Otra Expectativas Contribuyentes: *</label>
                            <input type="text" class="form-control" name="otraExpectativaContribuyente" value="<?php echo $fila['OtraExpectativaContribuyente']?>">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="md-form form-group">
                            <label for="exampleInputEmail1">Ids caracteristicas predio: *</label>
                            <input type="text" class="form-control" name="idsCaracteristicasPredio" value="<?php echo $fila['IdsCaracteristicasPredio']?>">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="md-form form-group">
                            <label for="exampleInputEmail1">Otra caracteristicas predio: *</label>
                            <input type="text" class="form-control" name="otraCaracteristicaPredio" value="<?php echo utf8_encode($fila['OtraCaracteristicaPredio'])?>">
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="md-form form-group">
                            <label for="exampleInputEmail1">Id accion sugerida: *</label>
                            <input type="text" class="form-control" name="idAccionSugerida" value="<?php echo $fila['IdAccionSugerida']?>">
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="md-form form-group">
                            <label for="exampleInputEmail1">Id uso suelo predio: *</label>
                            <input type="text" class="form-control" name="idUsoSueloPredio" value="<?php echo $fila['IdUsoSueloPredio']?>">
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="md-form form-group">
                            <label for="exampleInputEmail1">Id Tipo Predio predio: *</label>
                            <input type="text" class="form-control" name="idTipoPredioPredio" value="<?php echo $fila['IdTipoPredioPredio']?>">
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="md-form form-group">
                            <label for="exampleInputEmail1">Calle Predio: *</label>
                            <input type="text" class="form-control" name="callePredio" value="<?php echo $fila['CallePredio']?>">
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="md-form form-group">
                            <label for="exampleInputEmail1">Num ext Predio: *</label>
                            <input type="text" class="form-control" name="numExtPredio" value="<?php echo $fila['NumExtPredio']?>">
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="md-form form-group">
                            <label for="exampleInputEmail1">Num int Predio: *</label>
                            <input type="text" class="form-control" name="numIntPredio" value="<?php echo $fila['NumIntPredio']?>">
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="md-form form-group">
                            <label for="exampleInputEmail1">Colonia Predio: *</label>
                            <input type="text" class="form-control" name="coloniaPredio" value="<?php echo $fila['ColoniaPredio']?>">
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="md-form form-group">
                            <label for="exampleInputEmail1">Poblacion Predio: *</label>
                            <input type="text" class="form-control" name="poblacionPredio" value="<?php echo $fila['PoblacionPredio']?>">
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="md-form form-group">
                            <label for="exampleInputEmail1">Codigo postal Predio: *</label>
                            <input type="text" class="form-control" name="cpPredio" value="<?php echo $fila['CPPredio']?>">
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="md-form form-group">
                            <label for="exampleInputEmail1">Entre calle 1 predio: *</label>
                            <input type="text" class="form-control" name="entreCalle1Predio" value="<?php echo $fila['EntreCalle1Predio']?>">
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="md-form form-group">
                            <label for="exampleInputEmail1">Entre calle 2 predio: *</label>
                            <input type="text" class="form-control" name="entreCalle2Predio" value="<?php echo $fila['EntreCalle2Predio']?>">
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="md-form form-group">
                            <label for="exampleInputEmail1">Manzana predio: *</label>
                            <input type="text" class="form-control" name="manzanaPredio" value="<?php echo $fila['ManzanaPredio']?>">
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="md-form form-group">
                            <label for="exampleInputEmail1">Lote predio: *</label>
                            <input type="text" class="form-control" name="lotePredio" value="<?php echo $fila['LotePredio']?>">
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="md-form form-group">
                            <label for="exampleInputEmail1">Manzana: *</label>
                            <input type="text" class="form-control" name="manzana" value="<?php echo $fila['Manzana']?>">
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="md-form form-group">
                            <label for="exampleInputEmail1">Lote: *</label>
                            <input type="text" class="form-control" name="lote" value="<?php echo $fila['Lote']?>">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="md-form form-group">
                            <label for="exampleInputEmail1">Referenca Predio: *</label>
                            <input type="text" class="form-control" name="referenciaPredio" value="<?php echo $fila['ReferenciaPredio']?>">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="md-form form-group">
                            <label for="exampleInputEmail1">Solucion planteada: *</label>
                            <input type="text" class="form-control" name="solucionPlanteada" value="<?php echo $fila['SolucionPlanteada']?>">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="md-form form-group">
                            <label for="exampleInputEmail1">Forma de pago: *</label>
                            <input type="text" class="form-control" name="formaPago" value="<?php echo $fila['FormaPago']?>">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="md-form form-group">
                            <label for="exampleInputEmail1">Observaciones gestor: *</label>
                            <input type="text" class="form-control" name="observacionesGestor" value="<?php echo $fila['ObservacionesGestor']?>">
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="md-form form-group">
                            <label for="exampleInputEmail1">Id motivo no pago: *</label>
                            <input type="text" class="form-control" name="idMotivoNoPago" value="<?php echo $fila['idmotivonopago']?>">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="md-form form-group">
                            <label for="exampleInputEmail1">Id servicios motivo no pago: *</label>
                            <input type="text" class="form-control" name="idServiciosMotivoNoPago" value="<?php echo $fila['idserviciosmotivonopago']?>">
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="md-form form-group">
                            <label for="exampleInputEmail1">Valido: *</label>
                            <input type="text" class="form-control" name="valido" value="<?php echo $fila['Valido']?>">
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="md-form form-group">
                            <label for="exampleInputEmail1">Activo: *</label>
                            <input type="text" class="form-control" name="activo" value="<?php echo $fila['Activo']?>">
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="md-form form-group">
                            <label for="exampleInputEmail1">Numero medidor: *</label>
                            <input type="text" class="form-control" name="numeroMedidor" value="<?php echo $fila['numeroMedidor']?>">
                        </div>
                    </div>

                </div>
                <button type="submit" name="actualizar" class="btn btn-primary btn-sm">Modificar <i class="fa fa-eraser" aria-hidden="true"></i></button>
            </div>
            <hr>

            <div style="text-align:center;">
                <input type="hidden" class="form-control" name="id_usuarioNuevo" value="" required>
                <a href="inicio.php?findG=<?php echo $fila['Cuenta'] ?>&plz=<?php echo $_GET['plz'] ?>" class="btn btn-dark btn-sm"><i class="fas fa-chevron-left"></i> Regresar</a>
            </div>


        </div>
    </form>

    <?php
                if(isset($_POST['actualizar'])){
                    $plz = $_GET['plz'];
                    $cuenta = $_GET['cuenta'];
                    
                    
                    $Id = $_POST['idRG'];
                    $Cuenta = $_POST['cuenta'];
                    $idTarea = $_POST['idTarea'];
                    $Observacion = $_POST['observaciones'];
                    $Nombre = $_POST['nombre'];
                    $TelefonoLocal= $_POST['telefonoLocal'];
                    $TelefonoCelular= $_POST['telefonoCelular'];
                    $TelefonoRadio = $_POST['telefonoRadio'];
                    $CorreoElectronico = $_POST['correoElectronico'];
                    $IdEstatus = $_POST['idEstatus'];
                    $FechaPromesa = $_POST['fechaPromesaPago'];
                    $Latitud = $_POST['latitud'];
                    $Longitud= $_POST['longitud'];
                    $FechaCaptura = $_POST['fechaCaptura'];
                    $Calle = $_POST['calle'];
                    $NumExt = $_POST['numExt'];
                    $NumInt = $_POST['numInt'];
                    $Colonia = $_POST['colonia'];
                    $Poblacion = $_POST['poblacion'];
                    $CP = $_POST['cp'];
                    $Referencia = $_POST['referencia'];
                    $EntreCalle1 = $_POST['entreCalle1'];
                    $EntreCalle2	= $_POST['entreCalle2'];
                    $ConDatos = $_POST['conDatos'];
                    $ConDatosValidos = $_POST['conDatosValidos'];
                    $IdAspUser= $_POST['idAspUser'];
                    $FechaAsignacion= $_POST['fechaAsignacion'];
                    $FechaVencimiento = $_POST['fechaVencimiento'];
                    $NombrePropietario= $_POST['nombrePropietario'];
                    $TelefonoLocalPropietario = $_POST['telefonoLocalPropietario'];
                    $TelefonoCelularPropietario	= $_POST['telefonoCelularPropietario'];
                    $TelefonoRadioPropietario = $_POST['telefonoRadioPropietario'];
                    $CorreoElectronicoPropietario= $_POST['correoElectronicoPropietario'];
                    $FechaLocalizacionPropietario = $_POST['fechaLocalizacionPropietario'];
                    $IdRelacionPropietario = $_POST['idRelacionPropietario'];
                    $MotivoNoPago = $_POST['motivoNoPago'];
                    $CantidadPago = $_POST['CantidadPago'];
                    $IdTipoDeudor = $_POST['idTipoDeudor'];
                    $ProbabilidadPago = $_POST['probabilidadPago'];
                    $IdsQuejasReclamaciones = $_POST['idsQuejasReclamaciones'];
                    $OtraQuejaReclamacion = $_POST['otraQuejaReclamacion'];
                    $IdsExpectativasContribuyente = $_POST['idsExpectativasContribuyente'];
                    $OtraExpectativaContribuyente = $_POST['otraExpectativaContribuyente'];
                    $IdsCaracteristicasPredio = $_POST['idsCaracteristicasPredio'];
                    $OtraCaracteristicaPredio = $_POST['otraCaracteristicaPredio'];	
                    $IdAccionSugerida = $_POST['idAccionSugerida'];	
                    $IdUsoSueloPredio = $_POST['idUsoSueloPredio'];
                    $IdTipoPredioPredio = $_POST['idTipoPredioPredio'];	
                    $CallePredio	= $_POST['callePredio'];
                    $NumExtPredio = $_POST['numExtPredio'];	
                    $NumIntPredio = $_POST['numIntPredio'];
                    $ColoniaPredio =$_POST['coloniaPredio'];	
                    $PoblacionPredio = $_POST['poblacionPredio'];	
                    $CPPredio = $_POST['cpPredio'];	
                    $EntreCalle1Predio =$_POST['entreCalle1Predio'];	
                    $EntreCalle2Predio=$_POST['entreCalle2Predio'];	
                    $ManzanaPredio = $_POST['manzanaPredio'];
                    $LotePredio = $_POST['lotePredio'];
                    $Manzana = $_POST['manzana'];
                    $Lote = $_POST['lote'];
                    $ReferenciaPredio = $_POST['referenciaPredio'];
                    $SolucionPlanteada = $_POST['solucionPlanteada'];	
                    $FormaPago = $_POST['formaPago'];
                    $ObservacionesGestor = $_POST['observacionesGestor'];
                    $idmotivonopago = $_POST['idMotivoNoPago'];
                    $idserviciosmotivonopago	=$_POST['idServiciosMotivoNoPago'];
                    $Valido = $_POST['valido'];
                    $Activo = $_POST['activo'];
                    $idTipoServicio=$_POST['idTipoServicio'];	
                    $idEstatusToma=$_POST['idEstatusToma'];	
                    $idTipoToma	=$_POST['idTipoToma'];
                    $fechaSincronizacion	=$_POST['fechaSincronizacion'];
                    $numeroMedidor = $_POST['numeroMedidor'];	

                    
                    $updateQuery = "INSERT INTO RegistroGestorClone (IdRegistroGestor, Cuenta, Nombre, TelefonoLocal, TelefonoCelular, TelefonoRadio, CorreoElectronico, IdEstatus, Observaciones, FechaPromesaPago, Latitud, Longitud, FechaCaptura, Calle, NumExt, NumInt, Colonia, Poblacion, CP, Referencia, EntreCalle1, EntreCalle2, ConDatos, ConDatosValidos, IdAspUser, IdTarea, FechaAsignacion, FechaVencimiento, NombrePropietario, TelefonoLocalPropietario, TelefonoCelularPropietario, TelefonoRadioPropietario, CorreoElectronicoPropietario, FechaLocalizacionPropietario, IdRelacionPropietario, MotivoNoPago, CantidadPago, IdTipoDeudor, ProbabilidadPago, IdsQuejasReclamaciones, OtraQuejaReclamacion, IdsExpectativasContribuyente, OtraExpectativaContribuyente, IdsCaracteristicasPredio, OtraCaracteristicaPredio, IdAccionSugerida, IdUsoSueloPredio, IdTipoPredioPredio, CallePredio, NumExtPredio, NumIntPredio, ColoniaPredio, PoblacionPredio, CPPredio, EntreCalle1Predio, EntreCalle2Predio, ManzanaPredio, LotePredio, Manzana, Lote, ReferenciaPredio, SolucionPlanteada, FormaPago, ObservacionesGestor, idmotivonopago, idserviciosmotivonopago, Valido, Activo, idTipoServicio, idEstatusToma, idTipoToma, fechaSincronizacion, numeroMedidor) VALUES ('$Id','$Cuenta','$Nombre','$TelefonoLocal','$TelefonoCelular','$TelefonoRadio','$CorreoElectronico','$IdEstatus', '$Observacion','$FechaPromesa','$Latitud','$Longitud','$FechaCaptura','$Calle','$NumExt','$NumInt','$Colonia','$Poblacion','$CP','$Referencia','$EntreCalle1','$EntreCalle2','$ConDatos','$ConDatosValidos','$IdAspUser', '$idTarea','$FechaAsignacion','$FechaVencimiento','$NombrePropietario','$TelefonoLocalPropietario','$TelefonoCelularPropietario','$TelefonoRadioPropietario','$CorreoElectronicoPropietario','$FechaLocalizacionPropietario','$IdRelacionPropietario','$MotivoNoPago','$CantidadPago','$IdTipoDeudor','$ProbabilidadPago','$IdsQuejasReclamaciones','$OtraQuejaReclamacion','$IdsExpectativasContribuyente','$OtraExpectativaContribuyente','$IdsCaracteristicasPredio','$OtraCaracteristicaPredio','$IdAccionSugerida','$IdUsoSueloPredio','$IdTipoPredioPredio','$CallePredio','$NumExtPredio','$NumIntPredio','$ColoniaPredio','$PoblacionPredio','$CPPredio','$EntreCalle1Predio','$EntreCalle2Predio','$ManzanaPredio','$LotePredio','$Manzana','$Lote','$ReferenciaPredio','$SolucionPlanteada','$FormaPago','$ObservacionesGestor','$idmotivonopago','$idserviciosmotivonopago','$Valido','$Activo','$idTipoServicio','$idEstatusToma','$idTipoToma','$fechaSincronizacion','$numeroMedidor')";
                    $updateQueryResult = sqlsrv_query ($cnx, $updateQuery);
                    if (!$updateQueryResult) die( print_r( sqlsrv_errors(), true));
                    
                    if($updateQueryResult){
                        echo '<script>alert("Se actualizo la tarea con exito")</script>';
                        echo '<meta http-equiv="refresh" content="0,url=inicio.php?findG='.$cuenta.'&plz='.$plz.'">';
       
                    } else {
                        echo '<script>alert("No se pudo actualizar")</script>';
                    }
                    
                }
            ?>
    <br><br>
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

</html>