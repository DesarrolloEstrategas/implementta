<?php
require "../../acnxerdm/conect.php";
if(isset($_GET['cuenta'])){
    $editar = $_GET['cuenta'];
    
    
    if(isset($_GET['cuenta'])){
    $editar = $_GET['cuenta'];
    $idCarta=$_GET['idCarta'];
    $query = "select registroCartaInvitacion.*, CatalogoTareas.DescripcionTarea from registroCartaInvitacion
    inner join CatalogoTareas on CatalogoTareas.IdTarea=registroCartaInvitacion.IdTarea
    where Cuenta = '$editar' and idRegistroCartaInvitacion='$idCarta'";
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

$Id = $_POST['idRC'];
$Cuenta = $_POST['cuenta'];
$IdTarea = $_POST['idTarea'];
$FechaCaptura = $_POST['fechaCaptura'].':00.000';
$Latitud = $_POST['latitud'];
$Longitud = $_POST['longitud'];
$IdAspUser = $_POST['idAspUser'];
$FechaSincronizacion = $_POST['fechaSincronizacion'].':00.000';
$IdTipoServicio = $_POST['idTipoServicio'];
$NumMedidor = $_POST['numMedidor'];


$updateQuery = "INSERT INTO registroCartaInvitacionClone (idRegistroCartaInvitacion, Cuenta, idTarea, fechaCaptura, Latitud, Longitud, IdAspUser, fechaSincronizacion, idTipoServicio, numMedidor) VALUES ('$Id','$Cuenta','$IdTarea','$FechaCaptura','$Latitud','$Longitud','$IdAspUser','$FechaSincronizacion','$IdTipoServicio','$NumMedidor')";

    $updateQueryResult = sqlsrv_query ($cnx, $updateQuery);
    if (!$updateQueryResult) die( print_r( sqlsrv_errors(), true));
                    
        if($updateQueryResult){
            echo '<script>alert("Se actualizo la tarea con exito")</script>';
            echo '<meta http-equiv="refresh" content="0,url=inicio.php?findC='.$cuenta.'&plz='.$plz.'">';
       
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
    <title>Actualizacion Carta Invitacion</title>
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
                    <!--                    <div class="col-sm-0">-->
                    <div class="md-form form-group">
                        <input type="hidden" class="form-control" name="idRC" value="<?php echo $fila['idRegistroCartaInvitacion']?>" >
                    </div>
                    <!--                    </div>-->
                    <div class="col-md-4">
                        <div class="md-form form-group">
                            <label for="exampleInputEmail1">Cuenta: *</label>
                            <input type="text" class="form-control" name="cuenta" value="<?php echo $fila['Cuenta']?>" >
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Tarea: *</label>
                            <select class="form-control" name="idTarea" required>
                                <option value="<?php echo $fila['idTarea'] ?>"><?php echo utf8_encode($fila['DescripcionTarea']) ?></option>
                                <?php do{ ?>
                                <option value="<?php echo $tarea['IdTarea'] ?>"><?php echo utf8_encode($tarea['DescripcionTarea']) ?></option>
                                <?php } while($tarea=sqlsrv_fetch_array($tar)); ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="md-form form-group">
                            <label for="exampleInputEmail1">Fecha Captura: *</label>
                            <?php
                            if($fila['fechaCaptura']<>NULL){
                            $fechaultimo = $fila['fechaCaptura']->format('Y-m-d H:i:s'); ?>
                            <input type="datetime-local" class="form-control" name="fechaCaptura" value="<?php echo $fechaultimo ?>">
                            <?php } ?>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="md-form form-group">
                            <label for="exampleInputEmail1">Latitud: *</label>
                            <input type="text" class="form-control" name="latitud" value="<?php echo $fila['Latitud']?>">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="md-form form-group">
                            <label for="exampleInputEmail1">Longitud: *</label>
                            <input type="text" class="form-control" name="longitud" value="<?php echo $fila['Longitud']?>">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="md-form form-group">
                            <label for="exampleInputEmail1">Id Asp User: *</label>
                            <input type="text" class="form-control" name="idAspUser" value="<?php echo $fila['IdAspUser']?>" >
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="md-form form-group">
                            <label for="exampleInputEmail1">Fecha Sincronizacion: *</label>
                            <?php
                            if($fila['fechaSincronizacion']<>NULL){
                            $fechaultimo = $fila['fechaSincronizacion']->format('Y-m-d H:i:s'); ?>
                            <input type="datetime-local" class="form-control" name="fechaSincronizacion" value="<?php echo $fechaultimo ?>">
                            <?php }  ?>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="md-form form-group">
                            <label for="exampleInputEmail1">Id Tipo Servicio: *</label>
                            <input type="text" class="form-control" name="idTipoServicio" value="<?php echo $fila['idTipoServicio']?>">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="md-form form-group">
                            <label for="exampleInputEmail1">Num. Medidor: *</label>
                            <input type="text" class="form-control" name="numMedidor" value="<?php echo $fila['numMedidor']?>" >
                        </div>
                    </div>
                </div>
                <button type="submit" name="actualizar" class="btn btn-primary btn-sm">Modificar <i class="fa fa-eraser" aria-hidden="true"></i></button>
            </div>
            <hr>

            <div style="text-align:center;">
                <input type="hidden" class="form-control" name="id_usuarioNuevo" value="" required>
                <a href="inicio.php?findC=<?php echo $fila['Cuenta'] ?>&plz=<?php echo $_GET['plz'] ?>" class="btn btn-dark btn-sm"><i class="fas fa-chevron-left"></i> Regresar</a>
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
