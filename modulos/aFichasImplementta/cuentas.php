<?php
session_start();
//if(isset($_SESSION['user'])){

require "../../acnxerdm/conect.php";

$nu="select COUNT(id_registro_formato_ficha) as numReg from registro_formato_ficha_tolucaA";
$num=sqlsrv_query($cnx,$nu);
$countReg=sqlsrv_fetch_array($num);

?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Fichas Implementta</title>
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
    <h3 style="text-shadow: 1px 1px 2px #717171;"><img src="https://img.icons8.com/color/45/000000/approval--v1.png"/> Cuentas de ficha</h3>
<hr>
   
   
   <h5 style="text-shadow: 0px 0px 1px #717171;"><i class="fas fa-database"></i> Registros: <?php echo $countReg['numReg'] ?></h5>
   
   
<br>
<div style="text-align:center;">
<!--   <a href="#" class="btn btn-danger btn-sm"><i class="fas fa-quidditch"></i> Limpiar tabla SQL</a>-->
   <a href="#" class="btn btn-dark btn-sm"><i class="fas fa-file-excel"></i> Descargar Excel</a>
   <a href="#" class="btn btn-primary btn-sm" id="btnCargar"><i class="fas fa-play"></i> Ejecutar todas las fichas</a>
</div>
  
<!--*******************PROGESS BAR ARCHIVO***************************************************************-->
    <div class="container" id="contenido"></div>
<!--******************FIN PROGRESS BAR ARCHIVO***********************************************************-->
  
   <hr><br><br>
   
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
<!--*******************************AJAX PARA PROGRESS*******************************************-->
<script type="text/javascript">
function validacion() {
    
    if('#btnCargar'){
      var docto = 1;
      var x = document.getElementById("foo");
      x.style.display = "none";

        var esperar = 0;
        $.ajax({
            url: "loadAjax.php",
               success : function(data){
                setTimeout(function(){
                $('#contenido').html(data);
                },esperar
                );
            }
    });
//return false;   
    }
}
</script>
<!--***************************FIN AJAX PARA PROGRESS*******************************************--> 
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