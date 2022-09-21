<?php
session_start();
if(isset($_SESSION['user'])){
require "../../acnxerdm/cnx.php";
    
if(isset($_GET['buscar'])){
    
$serverName = "implementta.mx";
    $connectionInfo = array( 'Database'=>'cartomaps', 'UID'=>'sa', 'PWD'=>'vrSxHH3TdC');
    $cnxCartomaps = sqlsrv_connect($serverName, $connectionInfo);
    date_default_timezone_set('America/Mexico_City');
    
    $clave=$_GET['clave'];
    $ura="select * from fichaResult
    where CPredial='$clave'";
    $urla=sqlsrv_query($cnxCartomaps,$ura);
    $direcciona=sqlsrv_fetch_array($urla);
    
}
    
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Determinaciones Fiscales</title>
<link rel="icon" href="../icono/implementtaIcon.png">
<!-- Bootstrap -->
<link rel="stylesheet" href="../css/bootstrap.css">
<link href="../fontawesome/css/all.css" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/@sweetalert2/theme-material-ui/material-ui.css" id="theme-styles">
<script src="../js/ajaxDeter.js"></script>
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
    margin-top:-1%;
    margin-bottom:0%;
    padding-top:0px;
}
    .jumbotron {
        margin-top:0%;
        margin-bottom:0%;
        padding-top:4%;
        padding-bottom:1%;
}
</style>
<?php require "../include/nav.php"; ?>
</head>
<body>
<?php require "../include/implementtaNav.php"; ?>
  <br>
<div class="container">
   <form action="" method="get">
   
   <h2 style="text-shadow: 0px 0px 2px #717171;">Determinaciónes de crédito fiscal</h2>
   <h4 style="text-shadow: 0px 0px 2px #717171;"><img src="https://img.icons8.com/color/40/000000/signing-a-document.png"/> Municipio de Zapopan</h4>
<hr>
   
   
   
   
    <div class="card">
      <div class="card-header">
        <h5 style="text-shadow: 0px 0px 2px #717171;">Generar formato de determinación</h5>
      </div>
      <div class="card-body">
        <blockquote class="blockquote mb-0">
            <div class="form-row">
                <div class="col-md-6">
                    <img src="https://img.icons8.com/external-sbts2018-outline-color-sbts2018/40/000000/external-search-ecommerce-basic-1-sbts2018-outline-color-sbts2018.png"/> Buscar cuenta predial o propietario
                </div>
                <div class="col-md-6">
                    <div class="justify-content-center justify-content-md-center">
                        <div class="input-group col-md-15 justify-content-center">
                            <div class="input-group-prepend">
                                <button type="submit" name="buscar" class="btn btn-primary btn-sm"><i class="fas fa-search"></i></button>
                            </div>
                        <?php if(isset($_GET['buscar'])){ ?> 
                            <input type="text" class="form-control border border-secondary" value="<?php echo $_GET['clave'] ?>" name="clave" id="busqueda" required autofocus>
                        <?php } else{ ?>
                            <input type="text" class="form-control border border-secondary" placeholder="Buscar cuenta predial o propietario" name="clave" id="busqueda" required autofocus>
                        <?php } ?>
                        <?php if(isset($_GET['buscar'])){ ?>    
                            <div class="input-group-prepend">
                                <a href="inicio.php" class="btn btn-link btn-sm"><i class="fas fa-times"></i></a>
                            </div>
                        <?php } ?>
                            <input type="hidden" value="<?php echo '09765' ?>" name="num2" id="num2">
                            <input type="hidden" value="<?php echo '852963741' ?>" name="mp" id="mp">
                        </div>
                    </div>
                </div>
            </div>
        </blockquote>
      </div>
    </div>
<br><br>

</form>

<?php if(isset($direcciona)){ ?>

<table class="table table-hover table-sm">
  <thead class="thead-dark">
    <tr>
      <th scope="col" style="text-align:center;">Cuenta Predial</th>
      <th scope="col" style="text-align:center;">Propietario</th>
      <th scope="col" style="text-align:center;">Clave Catastral</th>
      <th scope="col" style="text-align:center;">Opciones</th>
    </tr>
  </thead>
  <tbody>
   <?php do{ ?>
    <tr>
      <td style="text-align:center;"><?php echo $direcciona['CPredial'] ?></td>
      <td style="text-align:center;"><?php echo $direcciona['NPropietario'] ?></td>
      <td style="text-align:center;"><?php echo $direcciona['CCatastral'] ?></td>
      <td style="text-align:center;">
          <a href="#" class="btn btn-outline-dark btn-sm" style="padding:0%;border:0px;" data-toggle="tooltip" data-placement="left" title="Informacion de la cuenta"><img src="https://img.icons8.com/fluency/30/000000/about.png"/></a>
          &nbsp;
          <a href="pdfDet/determinacion.php?clvCL=45273620220914012557&crt=1401212001000102901800022000000%20&cut=45273620220914012557" target="_blank" class="btn btn-outline-dark btn-sm" style="padding:0%;border:0px;" data-toggle="tooltip" data-placement="right" title="Generar PDF"><img src="https://img.icons8.com/fluency/30/000000/adobe-acrobat.png"/> PDF&nbsp;</a>
          &nbsp;
          </td>
    </tr>
    <?php }while($direcciona=sqlsrv_fetch_array($urla)); ?>
  </tbody>
</table>

<?php } else if(isset($_GET['buscar'])){ ?>
<div class="alert alert-info" role="alert">
    <img src="https://img.icons8.com/fluency/40/000000/about.png"/> No se encontró la clave catastral <b>"<?php echo $_GET['clave'] ?>"</b>.
</div>
<?php 
    echo '<meta http-equiv="refresh" content="2,url=inicio.php">';
 } ?>

<!--**********************RESULTADO AJAX************************************-->
    <div id="tabla_resultado" style="text-align:left;">
        <!-- **********tabla resultado******** -->
    </div>
<!--************************************************************************-->

    <br>
<div style="text-align:center;">
    <a href="../Administrador/reportes.php" class="btn btn-dark btn-sm"><i class="fas fa-chevron-left"></i> Regresar</a>
</div>    
    
    <br><br>    
  </div>
</body>
<?php require "../include/footer.php"; ?>
<script src="../js/jquery-3.4.1.min.js"></script>
<script src="../js/popper.min.js"></script>
<script src="../js/bootstrap.js"></script>
<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
<script>
 AOS.init();
 </script>
<script>
$(function () {
  $('[data-toggle="tooltip"]').tooltip()
})
</script>
<?php } else{
    echo '<meta http-equiv="refresh" content="1,url=../../login.php">';
} ?>
</html>