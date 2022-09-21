<?php
require "../../acnxerdm/cnx.php";

$us="select * from plaza";
$usr=sqlsrv_query($cnx,$us);
$plazas=sqlsrv_fetch_array($usr);

?>

<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Nuevo Origen de Datos</title>
<link rel="icon" href="../icono/implementtaIcon.png">
<!-- Bootstrap -->
<link rel="stylesheet" href="../css/bootstrap.css">
<link href="../fontawesome/css/all.css" rel="stylesheet">
<link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css">
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
    .table{
        text-align: center;
    }
    </style>
<?php require "include/nav.php"; ?>
</head>
<body>
<div class="container">
    <h1 style="text-shadow: 1px 1px 2px #717171;">Excluir Cuenta</h1>
    <h4 style="text-shadow: 1px 1px 2px #717171;"><i class="fas fa-list"></i> Lista de plazas</h4>
    <hr>
    <table class="table table-hover table-sm">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Nombre plaza</th>
      <th scope="col">Opciones</th>
    </tr>
  </thead>
    <?php  do{  ?>
  <tbody>
    <tr>
      <td><?php  echo $plazas['nombreplaza'] ?></td>
        <div style="text-align:center;">
            <td> 
                <a href="excluirCuenta.php?rol=gest&plz=<?php echo $plazas['id_plaza'] ?>&name=<?php echo trim(strtolower($plazas['nombreplaza']))?>" class="btn btn-primary btn-sm"><i class="fas fa-times"></i> Excluir cuenta</a>
        </div>  
    </tr>
   
  </tbody>
       <?php  } while($plazas=sqlsrv_fetch_array($usr)); ?>
</table>    
    </div>   
<br><br>
<div style="text-align:center;">
    <a href="../Administrador/config.php" class="btn btn-dark btn-sm"><i class="fas fa-times"></i> Regresar</a>
</div> 
<br><br>    
    
    
<?php 
require "include/footer.php";
    ?>
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