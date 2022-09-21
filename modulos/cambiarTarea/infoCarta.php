<?php
require "../../acnxerdm/conect.php";

$query = "select registroCartaInvitacion.*, CatalogoTareas.DescripcionTarea from registroCartaInvitacion
    inner join CatalogoTareas on CatalogoTareas.IdTarea=registroCartaInvitacion.idTarea";
$queryResult = sqlsrv_query($cnx, $query);
$fila = sqlsrv_fetch_array($queryResult);



$cuentaClone="select registroCartaInvitacionClone.*, CatalogoTareas.DescripcionTarea from registroCartaInvitacionClone
    inner join CatalogoTareas on CatalogoTareas.IdTarea=registroCartaInvitacionClone.idTarea";
$cuentaCloneResult=sqlsrv_query($cnx,$cuentaClone);
$CartaClone=sqlsrv_fetch_array($cuentaCloneResult);


//****************CATALOGO TAREAS*****************************
    $ta="SELECT * FROM CatalogoTareas";
    $tar=sqlsrv_query($cnx,$ta);
    $tarea=sqlsrv_fetch_array($tar);
//****************CATALOGO TAREAS*****************************

if(isset($_POST['actualizar'])){
    $plz = $_GET['plz'];
    $cuenta = $_GET['cuenta'];
    $id=$_GET['idCarta'];


$Cuenta = $_POST['cuenta'];
$IdTarea = $_POST['idTarea'];
$FechaCaptura = date('Y-m-d H:i:s', strtotime($_POST['fechaCaptura']));
$Latitud = $_POST['latitud'];
$Longitud = $_POST['longitud'];
$IdAspUser = $_POST['idAspUser'];
$FechaSincronizacion = date('Y-m-d H:i:s', strtotime($_POST['fechaSincronizacion']));
$IdTipoServicio = $_POST['idTipoServicio'];
$NumMedidor = $_POST['numMedidor'];
					
    
   $updateQuery = "UPDATE registroCartaInvitacion SET Cuenta ='$Cuenta', idTarea ='$IdTarea', fechaCaptura =convert(date, '$FechaCaptura'), Latitud = '$Latitud', Longitud = '$Longitud', IdAspUser ='$IdAspUser', fechaSincronizacion = convert(date, '$FechaSincronizacion'), idTipoServicio ='$IdTipoServicio', numMedidor = '$NumMedidor' WHERE idRegistroCartaInvitacion = '$id'";


    $updateQueryResult = sqlsrv_query ($cnx, $updateQuery);
    if (!$updateQueryResult) die( print_r( sqlsrv_errors(), true));
                    
        if($updateQueryResult){
            
            $deleteRegistro = "delete from registroCartaInvitacionClone where idRegistroCartaInvitacion = '$id'";
            $deleteRegistroResult = sqlsrv_query ($cnx, $deleteRegistro);
            
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
    <title>Informacion Reductor</title>
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
                        <div class="col-md-4">
                            <div class="md-form form-group">
                                <label for="exampleInputEmail1">Cuenta: *</label>
                                <input type="text" class="form-control" name="cuenta" value="<?php echo $fila['Cuenta']?>" readonly>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="exampleFormControlSelect1">Tarea: *</label>
                                <select class="form-control" name="idTarea" readonly>
                                <option value="<?php echo $fila['idTarea'] ?>"><?php echo utf8_encode($fila['DescripcionTarea']) ?></option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="md-form form-group">
                                <label for="exampleInputEmail1">Fecha Captura: *</label>
                                <?php
                            if($fila['fechaCaptura']<>NULL){
                            $fechaultimo = $fila['fechaCaptura']->format('Y-m-d H:i:s'); ?>
                                <input type="datetime-local" class="form-control" name="fechaCaptura" value="<?php echo $fechaultimo ?>" readonly>
                                <?php } ?>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="md-form form-group">
                                <label for="exampleInputEmail1">Latitud: *</label>
                                <input type="text" class="form-control" name="latitud" value="<?php echo $fila['Latitud']?>" readonly>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="md-form form-group">
                                <label for="exampleInputEmail1">Longitud: *</label>
                                <input type="text" class="form-control" name="longitud" value="<?php echo $fila['Longitud']?>" readonly>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="md-form form-group">
                                <label for="exampleInputEmail1">Id Asp User: *</label>
                                <input type="text" class="form-control" name="idAspUser" value="<?php echo $fila['IdAspUser']?>" readonly>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="md-form form-group">
                                <label for="exampleInputEmail1">Fecha Sincronizacion: *</label>
                                <?php
                            if($fila['fechaSincronizacion']<>NULL){
                            $fechaultimo = $fila['fechaSincronizacion']->format('Y-m-d H:i:s'); ?>
                                <input type="datetime-local" class="form-control" name="fechaSincronizacion" value="<?php echo $fechaultimo ?>" readonly>
                                <?php }  ?>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="md-form form-group">
                                <label for="exampleInputEmail1">Id Tipo Servicio: *</label>
                                <input type="text" class="form-control" name="idTipoServicio" value="<?php echo $fila['idTipoServicio']?>" readonly>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="md-form form-group">
                                <label for="exampleInputEmail1">Num. Medidor: *</label>
                                <input type="text" class="form-control" name="numMedidor" value="<?php echo $fila['numMedidor']?>" readonly>
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
                        <div>

                            <div class="form-row">
                                <div class="col-md-4">
                                    <div class="md-form form-group">
                                        <label for="exampleInputEmail1">Cuenta: *</label>
                                        <input type="text" class="form-control" name="cuenta" value="<?php echo $CartaClone['Cuenta']?>"
                                               >
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="exampleFormControlSelect1">Tarea: *</label>
                                        <select class="form-control" name="idTarea" required>
                                            <option value="<?php echo $CartaClone['idTarea'] ?>"><?php echo utf8_encode($CartaClone['DescripcionTarea']) ?></option>
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
                            if($CartaClone['fechaCaptura']<>NULL){
                            $fechaultimo = $CartaClone['fechaCaptura']->format('Y-m-d H:i:s'); ?>
                                        <input type="datetime-local" class="form-control" name="fechaCaptura" value="<?php echo $fechaultimo ?>"
                                               >
                                        <?php } ?>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="md-form form-group">
                                        <label for="exampleInputEmail1">Latitud: *</label>
                                        <input type="text" class="form-control" name="latitud" value="<?php echo $CartaClone['Latitud']?>"
                                               >
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="md-form form-group">
                                        <label for="exampleInputEmail1">Longitud: *</label>
                                        <input type="text" class="form-control" name="longitud" value="<?php echo $CartaClone['Longitud']?>"
                                               >
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="md-form form-group">
                                        <label for="exampleInputEmail1">Id Asp User: *</label>
                                        <input type="text" class="form-control" name="idAspUser" value="<?php echo $CartaClone['IdAspUser']?>"
                                               >
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="md-form form-group">
                                        <label for="exampleInputEmail1">Fecha Sincronizacion: *</label>
                                        <?php
                            if($CartaClone['fechaSincronizacion']<>NULL){
                            $fechaultimo = $CartaClone['fechaSincronizacion']->format('Y-m-d H:i:s'); ?>
                                        <input type="datetime-local" class="form-control" name="fechaSincronizacion" value="<?php echo $fechaultimo ?>"
                                               >
                                        <?php }  ?>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="md-form form-group">
                                        <label for="exampleInputEmail1">Id Tipo Servicio: *</label>
                                        <input type="text" class="form-control" name="idTipoServicio" value="<?php echo $CartaClone['idTipoServicio']?>"
                                               >
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="md-form form-group">
                                        <label for="exampleInputEmail1">Num. Medidor: *</label>
                                        <input type="text" class="form-control" name="numMedidor" value="<?php echo $CartaClone['numMedidor']?>"
                                               >
                                    </div>
                                </div>


                            </div>
                        </div>
                        <button class="btn btn-dark btn-sm" type="submit" name="actualizar">Guardar</button>
                    </div>
                </div>
            </form>
            </div>
        </div>
        <hr>
        <br>
        <div style="text-align:center;">
            <a href="../cambiarTarea/otraVista.php?cuenta=<?php echo $_GET['cuenta'] ?>&plz=<?php echo $_GET['plz'] ?>" class="btn btn-dark btn-sm"><i class="fas fa-times"></i> Regresar</a>
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
