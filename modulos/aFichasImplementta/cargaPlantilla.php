<?php
session_start();
//if(isset($_SESSION['user'])){

require "../../acnxerdm/cnx.php";

$va="select name from sysobjects 
where type='U' and name='wsAccionesMexicaliA'";
$val=sqlsrv_query($cnx,$va);
$valida=sqlsrv_fetch_array($val);

?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Implementta | Fichas</title>
<link rel="icon" href="../icono/implementtaIcon.png">  
<!-- Bootstrap -->
<link rel="stylesheet" href="../css/bootstrap.css">
<link href="../fontawesome/css/all.css" rel="stylesheet">
<link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css"/>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="../js/peticionAjax.js"></script>
<style>
  body {
        background-image: url(../img/back.jpg);
        background-repeat: repeat;
        background-size: 100%;
/*        background-attachment: fixed;*/
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
        padding-top:2%;
        padding-bottom:2%;
}
</style>
<?php require "include/nav.php"; ?>
</head>
<body>
<div class="container">
    <h1 style="text-shadow: 1px 1px 2px #717171;">Sistema de Fichas</h1>
    <h3 style="text-shadow: 1px 1px 2px #717171;"><img src="https://img.icons8.com/color/45/000000/export-excel.png"/> Cargar Plantilla Excel</h3>
    <hr>
</div>
    
<?php// if(isset($valida)){ ?>
   
<div class="container">
    <div class="alert alert-danger" role="alert">
      <i class="fas fa-exclamation-triangle"></i> Espera el mensaje de carga de archivo para continuar clic en siguiente.
    </div>
</div>
   <br>
    
<iframe src="http://implementta.mx/Asignacion/reportes/Fichas.aspx?idplaza=38" width="100%" height="200" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
    
    <hr>
    
    <div style="text-align:center;">
        <a href="../Administrador/config.php?codplz=<?php echo $_GET['plz'] ?>" class="btn btn-dark btn-sm"><i class="fas fa-chevron-left"></i> Regresar</a>
        <a href="../aFichasImplementta/cuentas.php?plz=<?php echo $_GET['plz'] ?>" class="btn btn-primary btn-sm">Siguiente <i class="fas fa-chevron-right"></i></a>
    </div>
    
<?php// } else{ ?>
<!--
    <div class="alert alert-danger" role="alert">
      <i class="fas fa-exclamation-triangle"></i> Aun no esta habilitado el modulo de fichas para esta plaza. Notificar a mesa de ayuda de desarrollo.
    </div>
    
    <div style="text-align:center;">
        <a href="../Administrador/config.php?codplz=<?php// echo $_GET['plz'] ?>" class="btn btn-dark btn-sm"><i class="fas fa-chevron-left"></i> Regresar</a>
    </div>
-->

<?php// } ?>
    
    
    
    
<?php // } else{
    //header('location:../../login.php');
//}
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