<?php
require "../../acnxerdm/conect.php";

//$query = "select * from RegistroAbogadoClone";
$query = "select registroCartaInvitacionClone.*, CatalogoTareas.DescripcionTarea from registroCartaInvitacionClone
          inner join CatalogoTareas on CatalogoTareas.IdTarea=registroCartaInvitacionClone.idTarea ";
$queryResult = sqlsrv_query($cnx, $query);
$cuenta = sqlsrv_fetch_array($queryResult);

/*-------------------Boton Aceptar cambios----------------------- */
if(isset($_POST['aceptar'])){
    $id=$_GET['idCarta'];
    $plz = $_GET['plz'];
    $cuentaa = $_GET['cuenta'];
    
  
    $cuenta1 = $cuenta['Cuenta'];
    $idTarea = $cuenta['idTarea'];
    $FechaCaptura = date('Y-m-d H:i:s', strtotime($cuenta['fechaCaptura']));
    $Latitud = $cuenta['Latitud'];
    $Longitud = $cuenta['Longitud'];
    $IdAspUser = $cuenta['IdAspUser'];
    $fechaSincronizacion = date('Y-m-d H:i:s', strtotime($cuenta['fechaSincronizacion']));
    $idTipoServicio= $cuenta['idTipoServicio'];
    $numMedidor= $cuenta['numMedidor'];
   
	$updateQuery= "UPDATE registroCartaInvitacion SET Cuenta='$cuenta1', idTarea='$idTarea', fechaCaptura=convert(date, '$FechaCaptura'), Latitud='$Latitud', Longitud='$Longitud', IdAspUser='$IdAspUser', fechaSincronizacion=convert(date, '$fechaSincronizacion'), idTipoServicio='$idTipoServicio', numMedidor='$numMedidor' WHERE idRegistroCartaInvitacion = '$id'";
    
    $updateQueryResult = sqlsrv_query ($cnx, $updateQuery);
    if (!$updateQueryResult) die( print_r( sqlsrv_errors(), true));
                    
        if($updateQueryResult){
            
            $deleteRegistro = "delete from registroCartaInvitacionClone where idRegistroCartaInvitacion = '$id'";
            $deleteRegistroResult = sqlsrv_query ($cnx, $deleteRegistro);
            
            echo '<script>alert("Se Aprobo con exito")</script>';
            echo '<meta http-equiv="refresh" content="0,url=inicio.php?findC='.$cuentaa.'&plz='.$plz.'">';
        } else {
            echo '<script>alert("No se pudo aprobar ")</script>';
        }               
    }
/*-------------------Boton eliminar cambios----------------------- */
  if(isset($_POST['eliminar'])){
      $id=$_GET['idCarta'];
      $plz = $_GET['plz'];
      $cuentaBorrar = $_GET['cuenta'];
      
       $deleteRegistro = "delete from registroCartaInvitacionClone where idRegistroCartaInvitacion = '$id'";
       $deleteRegistroResult = sqlsrv_query ($cnx, $deleteRegistro);
       if (!$deleteRegistroResult) die( print_r( sqlsrv_errors(), true));
       if($deleteRegistroResult){
            
           echo '<script>alert("Se Aprobo con exito")</script>';
           echo '<meta http-equiv="refresh" content="0,url=inicio.php?findC='.$cuentaBorrar.'&plz='.$plz.'">';
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
    <title>Cuentas Modificadas Abogado</title>
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
        <hr>
        <div class="form-row">
            <div class="col-md-6">
                <div style="text-align:left;">
                    <h4>Cuentas Modificadas</h4>
                </div>
            </div>
        </div>
        <?php if(isset($cuenta)){ ?>
        <table class="table table-hover table-sm">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Cuenta</th>
                    <th scope="col">Id Tarea</th>
                    <th scope="col">Opciones</th>
                </tr>
            </thead>
            <tbody>
                <?php do{ // while($cuenta = sqlsrv_fetch_array($queryResult)){ ?>
                <tr>
                    <td><?php echo $cuenta['Cuenta'] ?></td>
                    <td value="<?php echo $cuenta['idTarea'] ?>"><?php echo utf8_encode($cuenta['DescripcionTarea']) ?></td>

                    <td>
                        <form method="POST">
                            <input type="hidden" name="cuenta" value="<?php echo $cuenta['Cuenta'] ?>">
                            <input type="hidden" class="form-control border border-secondary" value="<?php echo $_GET['plz'] ?>" name="plz">
                            <input type="hidden" class="form-control border border-secondary" value="<?php echo $_GET['idCarta'] ?>" name="id">
                            <a href="infoCarta.php?cuenta=<?php echo $cuenta['Cuenta'] ?>&plz=<?php echo $_GET['plz'] ?>&idCarta=<?php echo $_GET['idCarta'] ?>" class="btn btn-primary btn-sm openBtn2" name="info"><i class="fa fa-info" aria-hidden="true"></i></a>
                            <button href="inicio.php?findC=<?php echo $cuenta['Cuenta'] ?>&plz=<?php echo $_GET['plz'] ?>" type="submit" name="eliminar" class="btn btn-danger btn-sm"><i class="fa fa-times" aria-hidden="true"></i></button>
                            <button type="submit" name="aceptar" class="btn btn-success btn-sm"><i class="fa fa-check" aria-hidden="true"></i></button>
                        </form>
                    </td>
                </tr>
            </tbody>

            <?php } while($cuenta = sqlsrv_fetch_array($queryResult)); ?>
        </table>
        <?php } ?>
        <br>
        <div style="text-align:center;">
            <a href="../cambiarTarea/inicio.php?findC=<?php echo $_GET['cuenta'] ?>&plz=<?php echo $_GET['plz'] ?>" class="btn btn-dark btn-sm"><i class="fas fa-times"></i> Regresar</a>
        </div>
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
