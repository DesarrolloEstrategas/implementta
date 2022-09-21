<?php
require "../../acnxerdm/conect.php";
if(isset($_GET['cuenta'])){
    $editar = $_GET['cuenta'];
    
    
    if(isset($_GET['cuenta'])){
    $editar = $_GET['cuenta'];
    $idAbo=$_GET['abog'];
    $query = "select RegistroAbogado.*, CatalogoTareas.DescripcionTarea from RegistroAbogado
    inner join CatalogoTareas on CatalogoTareas.IdTarea=RegistroAbogado.IdTarea
    where Cuenta = '$editar' and IdRegistroAbogado='$idAbo'";
    $queryResult = sqlsrv_query($cnx, $query);
    
    $fila = sqlsrv_fetch_array($queryResult);
    
} 


//****************CATALOGO TAREAS*****************************
    $ta="SELECT * FROM CatalogoTareas";
    $tar=sqlsrv_query($cnx,$ta);
    $tarea=sqlsrv_fetch_array($tar);
//****************CATALOGO TAREAS*****************************

}

 if(isset($_POST['actualizar'])){
    $plz = $_GET['plz'];
    $cuenta = $_GET['cuenta'];
     
    $Id = $_POST['idRA'];
    $cuenta = $_POST['cuenta'];
    $idTarea = $_POST['idTarea'];
    $FechaAsignacion = $_POST['fechaAsignacion'].':00.000';
    $Observacion = $_POST['observaciones'];
    $EstatusLegal = $_POST['estatusLegal'];
    $ReporteALegal= $_POST['reporteDeAvanceLegal'];
    $IdAspUser = $_POST['idAspUser'];
    $FechaVencimiento = $_POST['fechaVencimiento'].':00.000';
    $FechaCaptura = $_POST['fechaCaptura'].'.000';
    $HoraVencimiento = $_POST['horaVencimiento'];
    $FechaPromesa = $_POST['fechaPromesa'].':00.000';
    $IdPersona = $_POST['idPersona'];
    $IdResultado = $_POST['idResultado'];
    $Latitud = $_POST['latitud'];
    $Longitud= $_POST['longitud'];
    $TelefonoLocal = $_POST['telefonoLocal'];
    $TelefonoCelular = $_POST['telefonoCelular'];
    $IdTipoServicio = $_POST['idTipoServicio'];
    $IdEstatusToma = $_POST['idEstatusToma'];
    $IdTipoToma = $_POST['idTipoToma'];
    $FechaSincronizacion = $_POST['fechaSincronizacion'].'.000';
    $IdAccion = $_POST['idAccion'];
    $IdRS= $_POST['idRS'];
    $ObservacionPredio = $_POST['observacionPredio'];
                    
    $updateQuery = "INSERT INTO RegistroAbogadoClone (IdRegistroAbogado, Cuenta, IdTarea, ObservacionesLegal, FechaAsignacion, EstatusLegal, ReporteDeAvancesLegal, IdAspUser, FechaVencimiento, FechaCaptura, HoraVencimiento, FechaPromesa, IdPersona, IdResultado, Latitud, Longitud, TelefonoLocal, TelefonoCelular, idTipoServicio, idEstatusToma, idTipoToma, fechaSincronizacion, idAccion, idRS, observacionPredio) VALUES ('$Id','$cuenta','$idTarea','$Observacion','$FechaAsignacion','$EstatusLegal','$ReporteALegal','$IdAspUser','$FechaVencimiento','$FechaCaptura','$HoraVencimiento','$FechaPromesa','$IdPersona','$IdResultado','$Latitud','$Longitud','$TelefonoLocal','$TelefonoCelular','$IdTipoServicio','$IdEstatusToma','$IdTipoToma','$FechaSincronizacion','$IdAccion','$IdRS','$ObservacionPredio')";
    $updateQueryResult = sqlsrv_query ($cnx, $updateQuery);
    if (!$updateQueryResult) die( print_r( sqlsrv_errors(), true));
                    
        if($updateQueryResult){
            echo '<script>alert("Se actualizo la tarea con exito")</script>';
            echo '<meta http-equiv="refresh" content="0,url=inicio.php?findA='.$cuenta.'&plz='.$plz.'">';
       
        } else {
            echo '<script>alert("No se pudo actualizar")</script>';
               }
                    
}

?>
<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Nuevo Ususario | FIDI</title>
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
                            <input type="hidden" class="form-control" name="idRA" value="<?php echo $fila['IdRegistroAbogado']?>" required>
                        </div>
                    </div>
                    <div class="col">
                        <div class="md-form form-group">
                            <label for="exampleInputEmail1">Cuenta: *</label>
                            <input type="text" class="form-control" name="cuenta" value="<?php echo $fila['Cuenta']?>" required>
                        </div>
                    </div>
<!--
                    <div class="col">
                        <div class="md-form form-group">
                            <label for="exampleInputEmail1">Tarea: *</label>
                            <input type="text" class="form-control" name="idTarea" value="<?php //echo $fila['IdTarea']?>" required>
                        </div>
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
                            <input type="text" class="form-control" name="observaciones" value="<?php echo utf8_encode($fila['ObservacionesLegal'])?>" required>
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-4">
                        <div class="md-form form-group">
                            <label for="exampleInputEmail1">Estatus Legal: *</label>
                            <input type="text" class="form-control" name="estatusLegal" value="<?php echo $fila['EstatusLegal']?>">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="md-form form-group">
                            <label for="exampleInputEmail1">Reporte de avances Legal: *</label>
                            <input type="text" class="form-control" name="reporteDeAvanceLegal" value="<?php echo $fila['ReporteDeAvancesLegal']?>">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="md-form form-group">
                            <label for="exampleInputEmail1">Id Asp User: *</label>
                            <input type="text" class="form-control" name="idAspUser" value="<?php echo $fila['IdAspUser']?>" required>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="md-form form-group">
                            <label for="exampleInputEmail1">Fecha de Vencimiento: *</label>
                            <?php
                            if($fila['FechaVencimiento']<>NULL){
                            $fechaultimo = $fila['FechaVencimiento']->format('Y-m-d H:i:s'); ?>
                            <input type="datetime-local" class="form-control" name="fechaVencimiento" value="<?php echo $fechaultimo ?>">
                            <?php } else{ ?>
                            <input type="datetime-local" class="form-control" name="fechaVencimiento" placeholder="Fecha de ultimo pago">
                            <?php } ?>
                        </div>
                    </div>
                    <div class="col-md-4">
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
                    <div class="col-md-4">
                        <div class="md-form form-group">
                            <label for="exampleInputEmail1">Hora Vencimiento: *</label>
                            <input type="text" class="form-control" name="horaVencimiento" value="<?php echo $fila['HoraVencimiento']?>">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="md-form form-group">
                            <label for="exampleInputEmail1">Fecha de Promesa: *</label>
                            <?php
                            if($fila['FechaPromesa']<>NULL){
                            $fechaultimo = $fila['FechaPromesa']->format('Y-m-d H:i:s'); ?>
                            <input type="datetime-local" class="form-control" name="fechaPromesa" value="<?php echo $fechaultimo ?>">
                            <?php } else{ ?>
                            <input type="datetime-local" class="form-control" name="fechaPromesa" placeholder="Fecha de ultimo pago">
                            <?php } ?>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="md-form form-group">
                            <label for="exampleInputEmail1">Id Persona: *</label>
                            <input type="text" class="form-control" name="idPersona" value="<?php echo $fila['IdPersona']?>" required>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="md-form form-group">
                            <label for="exampleInputEmail1">Id Resultado: *</label>
                            <input type="text" class="form-control" name="idResultado" value="<?php echo $fila['IdResultado']?>" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="md-form form-group">
                            <label for="exampleInputEmail1">Latitud: *</label>
                            <input type="text" class="form-control" name="latitud" value="<?php echo $fila['Latitud']?>" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="md-form form-group">
                            <label for="exampleInputEmail1">Longitud: *</label>
                            <input type="text" class="form-control" name="longitud" value="<?php echo $fila['Longitud']?>" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="md-form form-group">
                            <label for="exampleInputEmail1">Telefono local: *</label>
                            <input type="text" class="form-control" name="telefonoLocal" value="<?php echo $fila['TelefonoLocal']?>">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="md-form form-group">
                            <label for="exampleInputEmail1">Telefono Celular: *</label>
                            <input type="text" class="form-control" name="telefonoCelular" value="<?php echo $fila['TelefonoCelular']?>">
                        </div>
                    </div>
                    <div class="col">
                        <div class="md-form form-group">
                            <label for="exampleInputEmail1">Id tipo de servicio: *</label>
                            <input type="text" class="form-control" name="idTipoServicio" value="<?php echo $fila['idTipoServicio']?>" required>
                        </div>
                    </div>
                    <div class="col">
                        <div class="md-form form-group">
                            <label for="exampleInputEmail1">Id estatus toma: *</label>
                            <input type="text" class="form-control" name="idEstatusToma" value="<?php echo $fila['idEstatusToma']?>" required>
                        </div>
                    </div>
                    <div class="col">
                        <div class="md-form form-group">
                            <label for="exampleInputEmail1">Id tipo toma: *</label>
                            <input type="text" class="form-control" name="idTipoToma" value="<?php echo $fila['idTipoToma']?>" required>
                        </div>
                    </div>
                    <div class="col-md-4">
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
                    <div class="col-md-6">
                        <div class="md-form form-group">
                            <label for="exampleInputEmail1">Id accion: *</label>
                            <input type="text" class="form-control" name="idAccion" value="<?php echo $fila['idAccion']?>">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="md-form form-group">
                            <label for="exampleInputEmail1">Id RS: *</label>
                            <input type="text" class="form-control" name="idRS" value="<?php echo $fila['idRS']?>">
                        </div>
                    </div>
                    <div class="col">
                        <div class="md-form form-group">
                            <label for="exampleInputEmail1">Observacion Predio: *</label>
                            <input type="text" class="form-control" name="observacionPredio" value="<?php echo $fila['observacionPredio']?>">
                        </div>
                    </div>
                </div>
                <button type="submit" name="actualizar" class="btn btn-primary btn-sm">Modificar <i class="fa fa-eraser" aria-hidden="true"></i></button>
            </div>
            <hr>

            <div style="text-align:center;">
                <input type="hidden" class="form-control" name="id_usuarioNuevo" value="" required>
                <a href="inicio.php?findA=<?php echo $fila['Cuenta'] ?>&plz=<?php echo $_GET['plz'] ?>" class="btn btn-dark btn-sm"><i class="fas fa-chevron-left"></i> Regresar</a>
            </div>


        </div>
    </form>

    <?php
               
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