<?php
session_start();
//if(isset($_SESSION['user'])){

$serverName = "implementta.mx";
    $connectionInfo = array( 'Database'=>'implementtaMochisA', 'UID'=>'sa', 'PWD'=>'vrSxHH3TdC');
    $cnx = sqlsrv_connect($serverName, $connectionInfo);
    date_default_timezone_set('America/Mexico_City');

///////////GENERAR ORIGEN DE DATOS *******************************

$da = "select top 21 COLUMN_NAME from INFORMATION_SCHEMA.COLUMNS
         where TABLE_SCHEMA = 'dbo' 
         and TABLE_NAME = 'implementta'
         order by ORDINAL_POSITION";
$dat=sqlsrv_query($cnx,$da);
$datos=sqlsrv_fetch_array($dat);


?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Finalizar Fichas</title>
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
    <h3 style="text-shadow: 1px 1px 2px #717171;"><img src="https://img.icons8.com/external-icongeek26-flat-icongeek26/50/000000/external-flag-education-icongeek26-flat-icongeek26.png"/> Finalizar configuración de fichas</h3>
<hr>

    <h5 style="text-shadow: 0px 0px 2px #717171;">Plaza: Mochis Agua</h5>
    <h5 style="text-shadow: 0px 0px 2px #717171;">Campos para agregar: asd, asdasd, assdasd, asdasd, adasd, asdasd, assdasd, asdasd, assdasd</h5>
    <h5 style="text-shadow: 0px 0px 2px #717171;">Mostrar mapa de GeoPosicion: Si</h5>
    <h5 style="text-shadow: 0px 0px 2px #717171;">Fotos en ficha: Foto 1, Foto2</h5>
    
    
    <br><br>
    
<div style="text-align:center;">
    <a href="#" class="btn btn-danger btn-sm"><i class="fas fa-times"></i> Cancelar proceso</a>
    &nbsp;&nbsp;
    <a href="PDFphp/fichaTest.php" class="btn btn-primary btn-sm">Generar fichas plaza Ahome Agua <i class="fas fa-flag"></i></a>
</div>
<br><hr>
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    <br><br>
    </div>
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