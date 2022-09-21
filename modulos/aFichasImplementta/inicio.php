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
    <h3 style="text-shadow: 1px 1px 2px #717171;"><img src="https://img.icons8.com/external-sbts2018-outline-color-sbts2018/45/000000/external-config-basic-ui-elements-2.3-sbts2018-outline-color-sbts2018.png"/> Configuración de fichas plaza Mochis Agua</h3>
<hr>
<div class="jumbotron">
    <h4 style="text-shadow: 0px 0px 2px #717171;"><img src="https://img.icons8.com/fluency/45/000000/database.png"/> Agregar campos iniciales para ficha</h4>
    <hr>
    
    <div class="card-columns">
    <?php do{ ?>
      <div class="card bg-light">
        <div class="form-check">
            <input type="checkbox" class="form-check-input" style="width:23px;height:23px;margin-top:0.2%;" name="idemp[]" value="<?php echo $datos['COLUMN_NAME'] ?>">
            <label class="form-check-label small" for="exampleCheck1" style="font-weight:bold;">&nbsp;&nbsp;<?php echo ucwords(strtolower($datos['COLUMN_NAME'])) ?></label>
        </div>
      </div>
    <?php } while($datos=sqlsrv_fetch_array($dat)); ?> 
    </div>
    
    
    
<br><hr>
    <h4 style="text-shadow: 0px 0px 2px #717171;"><img src="https://img.icons8.com/fluency/45/000000/picture.png"/> Agregar imagenes en ficha</h4>
    <hr>
    
<div class="card-columns">    
    <div class="card bg-light">
        <div class="form-check">&nbsp;
            <input type="checkbox" class="form-check-input" style="width:27px;height:27px;margin-top:3.5%;" name="idemp[]" value="<?php// echo $datos['COLUMN_NAME'] ?>">
            <label class="form-check-label small" for="exampleCheck1" style="font-weight:bold;">&nbsp;&nbsp;&nbsp;&nbsp;Mapa de GeoPosicion</label>
            <img src="https://img.icons8.com/color/45/000000/map-marker.png"/>
        </div>
    </div>
    
    <div class="card bg-light">
        <div class="form-check">&nbsp;
            <input type="checkbox" class="form-check-input" style="width:27px;height:27px;margin-top:3.5%;" name="idemp[]" value="<?php// echo $datos['COLUMN_NAME'] ?>">
            <label class="form-check-label small" for="exampleCheck1" style="font-weight:bold;">&nbsp;&nbsp;&nbsp;&nbsp;Foto Evidencia</label>
            <img src="https://img.icons8.com/color/45/000000/document--v1.png"/>
        </div>
      <div class="form-group" style="margin-left:2%;margin-right:2%;margin-top:2%;">
        <select class="form-control" id="exampleFormControlSelect1">
          <option>Selecciona tipo</option>
          <option>Foto 2</option>
          <option>Foto 3</option>
          <option>Foto 4</option>
          <option>Foto 5</option>
        </select>
      </div>
    </div>
    
    <div class="card bg-light">
        <div class="form-check">&nbsp;
            <input type="checkbox" class="form-check-input" style="width:27px;height:27px;margin-top:3.5%;" name="idemp[]" value="<?php// echo $datos['COLUMN_NAME'] ?>">
            <label class="form-check-label small" for="exampleCheck1" style="font-weight:bold;">&nbsp;&nbsp;&nbsp;&nbsp;Foto Predio</label>
            <img src="https://img.icons8.com/fluency/45/000000/home.png"/>
        </div>
      <div class="form-group" style="margin-left:2%;margin-right:2%;margin-top:2%;">
        <select class="form-control" id="exampleFormControlSelect1">
          <option>Selecciona tipo</option>
          <option>Foto 2</option>
          <option>Foto 3</option>
          <option>Foto 4</option>
          <option>Foto 5</option>
        </select>
      </div>
    </div>
    
    
</div>
    
    
    
    
    
    
    
    
    
    
    </div>
    
<br><br>
<div style="text-align:center;">
    <a href="../Administrador/selectSistem.php" class="btn btn-dark btn-sm"><i class="fas fa-times"></i> Cancelar</a>
    &nbsp;&nbsp;
    <a href="finalizar.php" class="btn btn-primary btn-sm"> Siguiente paso <i class="fas fa-arrow-right"></i></a>
<!--*****************HACER PROCESO DE EJEUTAR STORED PARA GENERAR TABLA Q CONSUMIRA LAS FICHAS (mandar nombre de tabla tambien)-->
</div>    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
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