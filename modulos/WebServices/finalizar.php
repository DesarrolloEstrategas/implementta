<?php
session_start();
require "../../acnxerdm/cnx.php";

if(isset($_POST['test'])){
    $usr=$_POST['usr'];
    $clave=$_POST['clave'];
    echo "<script>window.open('https://www.cespe.gob.mx/ServicioWebDeudores/Service_deudores.asmx/Consulta_cuentas_stratimex?usuario=".$usr."&password=".$clave."', '_blank');</script>";
    echo '<meta http-equiv="refresh" content="0,url=finalizar.php?err=1">';
}
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Fnalizado WS EnsenadaA</title>
<link rel="icon" href="../icono/implementtaIcon.png">
<!-- Bootstrap -->
<link rel="stylesheet" href="../css/bootstrap.css">
<link href="../fontawesome/css/all.css" rel="stylesheet">
<link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/@sweetalert2/theme-material-ui/material-ui.css" id="theme-styles">
<style>
  body {
        background-image: url(../img/back.jpg);
        background-repeat: repeat;
        background-size: 100%;
        background-attachment: fixed;
        overflow-x: hidden; /* ocultar scrolBar horizontal*/
}
    body {
    font-family: sans-serif;
    font-style: normal;
    font-weight:normal;
    width: 100%;
    height: 100%;
    margin-top:-2%;
    padding-top:0px;
}
    .jumbotron {
        margin-top:0%;
        margin-bottom:0%;
        padding-top:4%;
        padding-bottom:1%;
}
</style>
<?php require "include/nav.php"; ?>
</head>
<body>
    <div class="container">
    <h1 style="text-shadow: 1px 1px 2px #717171;">WS Ensenada Agua</h1>
    <h3 style="text-shadow: 1px 1px 2px #717171;"><img src="https://img.icons8.com/color/48/000000/flag--v1.png"/> Proceso Finalizado</h3>
    <hr>
<?php if(isset($_GET['err'])){ ?>
<form action="" method="post">
   <div class="alert alert-danger" role="alert" style="text-align:enter;">
      <i class="fas fa-exclamation-triangle"></i> Proceso finalizado sin éxito. No se obtuvo respuesta del servidor proveedor, verifique funcionamiento
    </div>
    
          <hr>
        <div class="form-row">
            <div class="form-group col-md-6">
              <label for="inputEmail4">Usuario: *</label>
              <input type="text" class="form-control" name="usr" placeholder="Usuario WS EnsenadaA" autofocus required>
            </div>
            <div class="form-group col-md-6">
              <label for="inputPassword4">Contraseña: *</label>
              <input type="text" class="form-control" name="clave" placeholder="Password  WS EnsenadaA" required>
            </div>
        </div>
        <small><i class="fas fa-info-circle"></i> Introducir credenciales proporcionadas por el organismo proveedor de datos.</small>
    <div style="text-align:right;">
        <a href="wsEnsenada.php" class="btn btn-danger btn-sm"><i class="fas fa-times"></i> Finalizar y salir</a>
        <button  type="submit" name="test" class="btn btn-primary btn-sm" data-toggle="tooltip" data-placement="bottom"><i class="fas fa-code"></i> Probar conexión manual</button>
    </div>
</form>


<?php } else if(isset($_GET['cuentas'])){

    $fechaCont=date('Y-m-d');
    $con="select count(id_wsEnsenada) as numRegCuentas from [implementtaEnsenadaA].[dbo].[wsEnsenada_Consulta_cuentas]
    where consulta like '%$fechaCont%'";
    $cont=sqlsrv_query($cnx,$con);
    $conteo=sqlsrv_fetch_array($cont);
        ?>
<div class="alert alert-success" role="alert" style="text-align:enter;padding-top:0%;padding-bottom:0%;">
   <h5 style="text-shadow: 0px 0px 2px #717171;"><img src="https://img.icons8.com/fluency/40/000000/good-pincode.png"/> Proceso finalizado exitosamente Consulta_cuentas_stratimex</h5>
</div>
     <h5 style="text-shadow: 0px 0px 2px #717171;"><i class="far fa-calendar-check"></i> Fecha de consulta: <?php echo date('d-m-Y') ?></h5>
     <h5 style="text-shadow: 0px 0px 2px #717171;"><i class="fas fa-list"></i> Total de registros: <?php echo $conteo['numRegCuentas'] ?></h5>
     <h5 style="text-shadow: 0px 0px 2px #717171;"><i class="fas fa-database"></i> SQLsrv: wsEnsenada_Consulta_cuentas</h5>
     <small class="text-muted"><i class="fas fa-info-circle"></i> El conteo de registros se realiza a la fecha de finalización del proceso WS. Si existe ambigüedad en el conteo total, se recomienda limpiar la tabla SQL y repetir el proceso. Limpiar la tabla SQL reiniciara el conteo de registros eliminando históricos de consumo.</small>
    <hr>
 <div style="text-align:right;">
<!--
    <button  type="submit" name="truncateCuentas" class="btn btn-outline-danger btn-sm" data-toggle="tooltip" data-placement="bottom"><i class="fas fa-database"></i> Limpiar tabla SQL</button>
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
-->
<!--    <button  type="submit" name="excel" class="btn btn-dark btn-sm" data-toggle="tooltip" data-placement="bottom"><i class="fas fa-file-excel"></i> Descargar Excel</button>-->
    <a href="wsEnsenada.php" class="btn btn-success btn-sm"><i class="fas fa-check"></i> Finalizar y salir</a>
 </div>
 
 
 


<?php } else if(isset($_GET['pagos'])){
    
    
    $fechaCont=date('Y-m-d');
    $con="select count(id_wsEnsenada_detalles_pagos) as numRegCuentas from [implementtaEnsenadaA].[dbo].[wsEnsenada_detalles_pago]
    where consulta like '%$fechaCont%'";
    $cont=sqlsrv_query($cnx,$con);
    $conteo=sqlsrv_fetch_array($cont);
        ?>
<div class="alert alert-warning" role="alert" style="text-align:enter;padding-top:0%;padding-bottom:0%;">
   <h5 style="text-shadow: 0px 0px 2px #717171;color:#000000;"><img src="https://img.icons8.com/fluency/40/000000/good-pincode.png"/> Proceso finalizado exitosamente Consulta_detalles_pagos_stratimex</h5>
</div>
     <h5 style="text-shadow: 0px 0px 2px #717171;"><i class="far fa-calendar-check"></i> Fecha de consulta: <?php echo date('d-m-Y') ?></h5>
     <h5 style="text-shadow: 0px 0px 2px #717171;"><i class="fas fa-list"></i> Total de registros: <?php echo $conteo['numRegCuentas'] ?></h5>
     <h5 style="text-shadow: 0px 0px 2px #717171;"><i class="fas fa-database"></i> SQLsrv: wsEnsenada_detalles_pago</h5>
     <small class="text-muted"><i class="fas fa-info-circle"></i> El conteo de registros se realiza a la fecha de finalización del proceso WS. Si existe ambigüedad en el conteo total, se recomienda limpiar la tabla SQL y repetir el proceso. Limpiar la tabla SQL reiniciara el conteo de registros eliminando históricos de consumo.</small>
    <hr>
 <div style="text-align:right;">
<!--
    <button  type="submit" name="truncateCuentas" class="btn btn-outline-danger btn-sm" data-toggle="tooltip" data-placement="bottom"><i class="fas fa-database"></i> Limpiar tabla SQL</button>
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
-->
<!--    <button  type="submit" name="excel" class="btn btn-dark btn-sm" data-toggle="tooltip" data-placement="bottom"><i class="fas fa-file-excel"></i> Descargar Excel</button>-->
    <a href="wsEnsenada.php" class="btn btn-warning btn-sm"><i class="fas fa-check"></i> Finalizar y salir</a>
 </div>
 
 
  
  
  
  
  
<?php } ?>
   
    </div>
<br><br><br>
<?php require "include/footer.php"; ?>
</body>
<script src="../js/jquery-3.4.1.min.js"></script>
<script src="../js/popper.min.js"></script>
<script src="../js/bootstrap.js"></script>
</html>