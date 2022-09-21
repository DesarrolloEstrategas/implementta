<?php
require "../../acnxerdm/conect.php";
if(isset($_GET['cuenta'])){
    $editar = $_GET['cuenta'];
    $idReduc=$_GET['reduc'];
    
//    $query = "select * from RegistroReductores where Cuenta = '$editar'";
    $query = "select RegistroReductores.*, CatalogoTareas.DescripcionTarea from RegistroReductores
    inner join CatalogoTareas on CatalogoTareas.IdTarea=RegistroReductores.idTarea
    where Cuenta = '$editar' and idRegistroReductores='$idReduc'";
    $queryResult = sqlsrv_query($cnx, $query);
    
    $fila = sqlsrv_fetch_array($queryResult);
    
} 

//****************CATALOGO TAREAS*****************************
    $ta="SELECT * FROM CatalogoTareas";
    $tar=sqlsrv_query($cnx,$ta);
    $tarea=sqlsrv_fetch_array($tar);
//****************CATALOGO TAREAS*****************************

        if(isset($_POST['actualizar'])){
        $plz = $_GET['plz'];
        $cuenta = $_GET['cuenta'];
    
                    $Id = $_POST['idRR'];
                    $Cuenta = $_POST['cuenta'];
                    $idTarea = $_POST['idTarea'];
                    $IdCatalogoReductores = $_POST['idCatalogoReductores'];
                    $Lectura = $_POST['lectura'];
                    $Medidor= $_POST['medidor'];
                    $Reductor= $_POST['reductor'];
                    $Telefono = $_POST['telefono'];
                    $Contacto = $_POST['contacto'];
                    $IdDescripcionTarea = $_POST['idDescripcionTarea'];
                    $FechaPromesa = $_POST['fechaPromesaPago'];
                    $Latitud = $_POST['latitud'];
                    $Longitud= $_POST['longitud'];
                    $FechaCaptura = $_POST['fechaCaptura'];
                    $FolioSS = $_POST['folioSS'];
                    $IdNiple = $_POST['idNiple'];
                    $HoraInicial = $_POST['horaInicial'];
                    $HoraFinal = $_POST['horaFinal'];
                    $DescripcionTomaDirecta = $_POST['descripcionTomaDirecta'];
                    $IdDescripcionMulta = $_POST['idDescripcionMulta'];
                    $IdDetalle = $_POST['idDetalle'];
                    $IdMedidorTapado = $_POST['idMedidorTapado'];
                    $IdTipoReductor = $_POST['idTipoReductor'];
                    $NoCincho = $_POST['noCincho'];
                    $IdEstatusRequerimiento = $_POST['idEstatusRequerimiento'];
                    $IdAspUser= $_POST['idAspUser'];
                    $FechaAsignacion= $_POST['fechaAsignacion'];
                    $FechaVencimiento = $_POST['fechaVencimiento'];
                    $FolioSelloCorte = $_POST['folioSelloCorte'];
                    $IdTipoCorte = $_POST['idTipoCorte'];
                    $ComentarioNoSuspendeServicio = $_POST['comentarioNoSuspendeServicio'];
                    $ResultadoSuperviso = $_POST['ResultadoSuperviso'];
                    $idTipoServicio = $_POST['idTipoServicio'];	
                    $idEstatusToma =$_POST['idEstatusToma'];	
                    $idTipoToma	= $_POST['idTipoToma'];
                    $fechaSincronizacion = $_POST['fechaSincronizacion'];
                    $Observaciones = $_POST['observaciones'];
                  

                    
                    $updateQuery = "INSERT INTO RegistroReductoresClone (idRegistroReductores, Cuenta, idTarea, idCatalogoreductores, lectura, medidor, reductor, telefono, contacto, observaciones, FechaPromesaPago, fechaAsignacion, fechaVencimiento, fechaCaptura, iddescripciontarea, Latitud, Longitud, FolioSS, IdAspUser, idniple, horainicial, horafinal, idTipoServicio, idEstatusToma, idTipoToma, descripcionTomaDirecta, idDescripcionMulta, fechaSincronizacion, idDetalle, idMedidorTapado, idTipoReductor, noCincho, idEstatusRequerimiento, folioSelloCorte, idTipoCorte, comentarioNoSuspendeServicio, resultadoSuperviso) VALUES ('$Id','$Cuenta','$idTarea','$IdCatalogoReductores','$Lectura','$Medidor','$Reductor','$Telefono','$Contacto', '$Observaciones', '$FechaPromesa','$FechaAsignacion','$FechaVencimiento','$FechaCaptura','$IdDescripcionTarea','$Latitud','$Longitud','$FolioSS', '$IdAspUser','$IdNiple','$HoraInicial','$HoraFinal','$idTipoServicio','$idEstatusToma','$idTipoToma', '$DescripcionTomaDirecta','$IdDescripcionMulta','$fechaSincronizacion','$IdDetalle','$IdMedidorTapado','$IdTipoReductor','$NoCincho','$IdEstatusRequerimiento','$FolioSelloCorte','$IdTipoCorte','$ComentarioNoSuspendeServicio','$ResultadoSuperviso')";
                    $updateQueryResult = sqlsrv_query ($cnx, $updateQuery);
                  if (!$updateQueryResult) die( print_r( sqlsrv_errors(), true));  
    
                    
                    if($updateQueryResult){
                        echo '<script>alert("Se actualizo la tarea con exito")</script>';
                        echo '<meta http-equiv="refresh" content="0,url=inicio.php?findR='.$cuenta.'&plz='.$plz.'">';
       
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
    <title>Modificar Reductor</title>
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
                            <input type="hidden" class="form-control" name="idRR" value="<?php echo $fila['idRegistroReductores']?>" required>
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
                            <input type="text" class="form-control" name="idTarea" value="<?php //echo $fila['idTarea']?>" required>
                        </div>
                    </div>
-->

                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Tarea: *</label>
                        <select class="form-control" name="idTarea" required>
                            <option value="<?php echo $fila['idTarea'] ?>"><?php echo utf8_encode($fila['DescripcionTarea']) ?></option>
                            <?php do{ ?>
                            <option value="<?php echo $tarea['IdTarea'] ?>"><?php echo utf8_encode($tarea['DescripcionTarea']) ?></option>
                            <?php } while($tarea=sqlsrv_fetch_array($tar)); ?>
                        </select>
                    </div>



                    <div class="col">
                        <div class="md-form form-group">
                            <label for="exampleInputEmail1">Fecha de asignacion: *</label>
                            <?php
                            if($fila['fechaAsignacion']<>NULL){
                            $fechaultimo = $fila['fechaAsignacion']->format('Y-m-d H:i:s'); ?>
                            <input type="datetime-local" class="form-control" name="fechaAsignacion" value="<?php echo $fechaultimo ?>">
                            <?php } else{ ?>
                            <input type="datetime-local" class="form-control" name="fechaAsignacion" placeholder="Fecha de ultimo pago">
                            <?php } ?>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="md-form form-group">
                            <label for="exampleInputEmail1">Observaciones: *</label>
                            <input type="text" class="form-control" name="observaciones" value="<?php echo utf8_encode($fila['observaciones'])?>">
                        </div>
                    </div>
                </div>
                <hr>
                <div class="form-row">
                    <div class="col-md-4">
                        <div class="md-form form-group">
                            <label for="exampleInputEmail1">Id Catalogo reductores: *</label>
                            <input type="text" class="form-control" name="idCatalogoReductores" value="<?php echo $fila['idCatalogoreductores']?>">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="md-form form-group">
                            <label for="exampleInputEmail1">Lectura: *</label>
                            <input type="text" class="form-control" name="lectura" value="<?php echo $fila['lectura']?>">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="md-form form-group">
                            <label for="exampleInputEmail1">Medidor: *</label>
                            <input type="text" class="form-control" name="medidor" value="<?php echo $fila['medidor']?>">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="md-form form-group">
                            <label for="exampleInputEmail1">Reductor: *</label>
                            <input type="text" class="form-control" name="reductor" value="<?php echo $fila['reductor']?>">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="md-form form-group">
                            <label for="exampleInputEmail1">Telefono: *</label>
                            <input type="text" class="form-control" name="telefono" value="<?php echo $fila['telefono']?>">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="md-form form-group">
                            <label for="exampleInputEmail1">Contacto: *</label>
                            <input type="text" class="form-control" name="contacto" value="<?php echo $fila['contacto']?>">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="md-form form-group">
                            <label for="exampleInputEmail1">Fecha de captura: *</label>
                            <?php
                            if($fila['fechaCaptura']<>NULL){
                            $fechaultimo = $fila['fechaCaptura']->format('Y-m-d H:i:s'); ?>
                            <input type="datetime-local" class="form-control" name="fechaCaptura" value="<?php echo $fechaultimo ?>">
                            <?php } else{ ?>
                            <input type="datetime-local" class="form-control" name="fechaCaptura" placeholder="Fecha de ultimo pago">
                            <?php } ?>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="md-form form-group">
                            <label for="exampleInputEmail1">Id Descripcion tarea: *</label>
                            <input type="text" class="form-control" name="idDescripcionTarea" value="<?php echo $fila['iddescripciontarea']?>">
                        </div>
                    </div>
                    <div class="col-md-6">
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
                    <div class="col-md-6">
                        <div class="md-form form-group">
                            <label for="exampleInputEmail1">Folio SS: *</label>
                            <input type="text" class="form-control" name="folioSS" value="<?php echo $fila['FolioSS']?>">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="md-form form-group">
                            <label for="exampleInputEmail1">Id niple: *</label>
                            <input type="text" class="form-control" name="idNiple" value="<?php echo $fila['idniple']?>">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="md-form form-group">
                            <label for="exampleInputEmail1">Hora Inicial: *</label>
                            <input type="text" class="form-control" name="horaInicial" value="<?php echo $fila['horainicial']?>">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="md-form form-group">
                            <label for="exampleInputEmail1">Hora final: *</label>
                            <input type="text" class="form-control" name="horaFinal" value="<?php echo $fila['horafinal']?>">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="md-form form-group">
                            <label for="exampleInputEmail1">Descripcion toma directa: *</label>
                            <input type="text" class="form-control" name="descripcionTomaDirecta" value="<?php echo $fila['descripcionTomaDirecta']?>">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="md-form form-group">
                            <label for="exampleInputEmail1">Id descripcion Multa: *</label>
                            <input type="text" class="form-control" name="idDescripcionMulta" value="<?php echo $fila['idDescripcionMulta']?>">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="md-form form-group">
                            <label for="exampleInputEmail1">Id Detalle: *</label>
                            <input type="text" class="form-control" name="idDetalle" value="<?php echo $fila['idDetalle']?>">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="md-form form-group">
                            <label for="exampleInputEmail1">Id medidor tapado: *</label>
                            <input type="text" class="form-control" name="idMedidorTapado" value="<?php echo $fila['idMedidorTapado']?>">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="md-form form-group">
                            <label for="exampleInputEmail1">Id tipo reductor: *</label>
                            <input type="text" class="form-control" name="idTipoReductor" value="<?php echo $fila['idTipoReductor']?>">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="md-form form-group">
                            <label for="exampleInputEmail1"> No cincho: *</label>
                            <input type="text" class="form-control" name="noCincho" value="<?php echo $fila['noCincho']?>">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="md-form form-group">
                            <label for="exampleInputEmail1">Id estatus requerimiento: *</label>
                            <input type="text" class="form-control" name="idEstatusRequerimiento" value="<?php echo $fila['idEstatusRequerimiento']?>">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="md-form form-group">
                            <label for="exampleInputEmail1">Latitud: *</label>
                            <input type="text" class="form-control" name="latitud" value="<?php echo $fila['Latitud']?>" required>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="md-form form-group">
                            <label for="exampleInputEmail1">Longitud: *</label>
                            <input type="text" class="form-control" name="longitud" value="<?php echo $fila['Longitud']?>" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="md-form form-group">
                            <label for="exampleInputEmail1">Id Asp User: *</label>
                            <input type="text" class="form-control" name="idAspUser" value="<?php echo $fila['IdAspUser']?>">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="md-form form-group">
                            <label for="exampleInputEmail1">Folio sello corte: *</label>
                            <input type="text" class="form-control" name="folioSelloCorte" value="<?php echo $fila['folioSelloCorte']?>">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="md-form form-group">
                            <label for="exampleInputEmail1">Fecha de Vencimiento: *</label>
                            <?php
                            if($fila['fechaVencimiento']<>NULL){
                            $fechaultimo = $fila['fechaVencimiento']->format('Y-m-d H:i:s'); ?>
                            <input type="datetime-local" class="form-control" name="fechaVencimiento" value="<?php echo $fechaultimo ?>">
                            <?php } else{ ?>
                            <input type="datetime-local" class="form-control" name="fechaVencimento" placeholder="Fecha de ultimo pago">
                            <?php } ?>
                        </div>
                    </div>
                    <div class="col-md-6">
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
                    <div class="col-md-4">
                        <div class="md-form form-group">
                            <label for="exampleInputEmail1">Id tipo corte: *</label>
                            <input type="text" class="form-control" name="idTipoCorte" value="<?php echo $fila['idTipoCorte']?>">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="md-form form-group">
                            <label for="exampleInputEmail1">Comentario no suspende servicio: *</label>
                            <input type="text" class="form-control" name="comentarioNoSuspendeServicio" value="<?php echo $fila['comentarioNoSuspendeServicio']?>">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="md-form form-group">
                            <label for="exampleInputEmail1">Resultado superviso: *</label>
                            <input type="text" class="form-control" name="ResultadoSuperviso" value="<?php echo $fila['resultadoSuperviso']?>">
                        </div>
                    </div>
                </div>
                <button type="submit" name="actualizar" class="btn btn-primary btn-sm">Modificar <i class="fa fa-eraser" aria-hidden="true"></i></button>
            </div>
            <hr>

            <div style="text-align:center;">
                <input type="hidden" class="form-control" name="id_usuarioNuevo" value="" required>
                <a href="inicio.php?findR=<?php echo $fila['Cuenta'] ?>&plz=<?php echo $_GET['plz'] ?>" class="btn btn-dark btn-sm"><i class="fas fa-chevron-left"></i> Regresar</a>
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
