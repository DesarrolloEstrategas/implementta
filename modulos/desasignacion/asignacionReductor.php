<?php
require "../../acnxerdm/conect.php";

    $usuarioQuery="SELECT * FROM AspNetUsers";
    $usuarioQueryResult=sqlsrv_query($cnx,$usuarioQuery);
    $usuario=sqlsrv_fetch_array($usuarioQueryResult);


if (isset($_POST['update'])){
    $idAsp=$_POST['idasp'];
    $storedQuery = "execute [dbo].[sp_ActualAsignacionReductor]'$idAsp'";
    $storedQueryResult = sqlsrv_query($cnx, $storedQuery);
    $stored = sqlsrv_fetch_array($storedQueryResult, SQLSRV_FETCH_ASSOC);
    if($stored['Respuesta']==1){
        echo '<script>alert("Desasignacion finalizada")</script>';
        echo '<meta http-equiv="refresh" content="0,url=asignacionReductor.php?rol='.$_GET['rol'].'&plz='.$_GET['plz'].'&name='.$_GET['name'].'">';
    } else {
        echo '<script>alert("La desasignacion no se realizo")</script>';
        echo '<meta http-equiv="refresh" content="0,url=asignacionReductor.php?rol='.$_GET['rol'].'&plz='.$_GET['plz'].'&name='.$_GET['name'].'">';
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Nuevo Asignacion gestor</title>
<link rel="icon" href="../icono/implementtaIcon.png">
<!-- Bootstrap -->
<link rel="stylesheet" href="../css/bootstrap.css">
<link href="../fontawesome/css/all.css" rel="stylesheet">
<link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css"/>
<style>
  body {
    background-image: url(../img/back.jpg);
    background-repeat: repeat;
    background-size: 100%;
    background-attachment: fixed;
    overflow-x: hidden; /* ocultar scrolBar horizontal*/
    }
  body{
    font-family: sans-serif;
    font-style: normal;
    font-weight:bold;
    width: 100%;
    height: 100%;
    margin-top:-1%;
    padding-top:0px;
    }
  .jumbotron {
    margin-top:0%;
    margin-bottom:0%;
    padding-top:3%;
    padding-bottom:2%;
    }
  .padding {
    padding-right:35%;
    padding-left:35%;
    }
</style>

</head>
<body>
    <div class="container">
        <h4 style="text-shadow: 1px 1px 2px #717171;"><i class="fas fa-check"></i> Lista de usuarios</h4>
        <table class="table table-hover table-sm">
      <thead class="thead-dark">
        <tr>
          <th scope="col">Usuario</th>
          <th scope="col">Nombre</th>
          <th scope="col" style="text-align:center;">Total de cuentas</th>
          <th scope="col" style="text-align:center;">Opciones</th>
        </tr>
      </thead>
      <tbody>
           <?php do{ ?>
        <tr>
          <td><?php  echo $usuario['UserName'] ?></td>
          <td><?php  echo $usuario['Nombre'] ?></td>
          <td style="text-align:center;"><?php  $cuenta = "select Count(AsignacionReductores.Cuenta) from asignacionreductores
                                            inner join [AspNetUsers] on AspNetUsers.Id=AsignacionReductores.IdAspUser
                                            where AspNetUsers.id='".$usuario['Id']."'";
                                            $contadorQueryResult = sqlsrv_query($cnx, $cuenta); ?> 
              <span class="badge badge-pill badge-warning"><?php echo sqlsrv_fetch_array($contadorQueryResult, SQLSRV_FETCH_NUMERIC)[0]; ?></span>
            </td>
          <td style="text-align:center;">
            <form method="post">
                <input type="hidden" name="idasp" value="<?php echo $usuario['Id'] ?>">
                <button class="btn btn-dark btn-sm" class="btn" type="submit" name="update">Desasignar</button>
            </form>
          </td>
        </tr>
            <?php } while($usuario=sqlsrv_fetch_array($usuarioQueryResult)); ?>
      </tbody>

    </table>    
        </div>   
<br><br>

</body>
<script src="../js/jquery-3.4.1.min.js"></script>
<script src="../js/popper.min.js"></script>    
<script src="../js/bootstrap.js"></script>  
<script>
$(function () {
  $('[data-toggle="tooltip"]').tooltip()
})
</script>
<script>
    function Confirmar(Mensaje){
        return (confirm(Mensaje))?true:false;
    }
</script>      
</html>