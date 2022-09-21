<?php
//*************INICIO DE SESION****************************************************************************
session_start();
require "acnxerdm/cnx.php";



//***********************FIN INICIO DE SESION**************************************************************
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Iniciar sesión</title>
<link rel="icon" href="modulos/icono/implementtaIcon.png">
<!-- Bootstrap -->
<link rel="stylesheet" href="modulos/css/bootstrap.css">
<link href="modulos/fontawesome/css/all.css" rel="stylesheet">
<link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/@sweetalert2/theme-material-ui/material-ui.css" id="theme-styles">
<style>
  body {
        background-image: url(modulos/img/back.jpg);
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
    .padding {
        padding-right:15%;
        padding-left:15%;
    }
</style>
<?php// require "include/nav.php"; ?>
</head>
<body>
<?php
    if(isset($_POST['login'])){
        $usuario=$_POST['correo'];
        $password=$_POST['pass'];
        $us="select * from usuarioNuevo
        inner join usuario on usuario.id_usuarioNuevo=usuarioNuevo.id_usuarioNuevo
        where usuarioNuevo.correo='$usuario' and usuario.clave='$password'";
        $use=sqlsrv_query($cnx,$us);
        $usuario=sqlsrv_fetch_array($use);
        
    if(isset($usuario)){
                
        $_SESSION['user']=$usuario['id_usuarioNuevo'];
        $_SESSION['plz']=$usuario['id_plaza'];
        $_SESSION['rol']=$usuario['id_rol'];
        
        $idUsr=$usuario['id_usuarioNuevo'];
        $fecha=date('Y-m-d');
        $hora=date('H:i:s');
        $dia=date('w');

        $accesos="insert into acceso (id_usuarioNuevo,fecha,hora,dia) values ('$idUsr','$fecha','$hora',$dia)";
        sqlsrv_query($cnx,$accesos) or die ('No se ejecuto la consulta isert reg accesos');
        
        echo "<script>
                let timerInterval
                Swal.fire({
                  title: 'Iniciando sesión ',
                  icon: 'success',
                  timer: 1000,
                  timerProgressBar: true,
                  didOpen: () => {
                    Swal.showLoading()
                    const b = Swal.getHtmlContainer().querySelector('b')
                    timerInterval = setInterval(() => {
                      b.textContent = Swal.getTimerLeft()
                    }, 100)
                  },
                  willClose: () => {
                    clearInterval(timerInterval)
                  }
                }).then((result) => {
                  /* Read more about handling dismissals below */
                  if (result.dismiss === Swal.DismissReason.timer) {
                    console.log('I was closed by the timer')
                  }
                })
            </script>";
        
        echo '<meta http-equiv="refresh" content="1,url=modulos/Administrador/selectSistem.php">';
        
    } else{
        echo "<script>
                let timerInterval
                Swal.fire({
                  title: '¡Error!',
                  html: 'Los datos de acceso no existen en Implementta <br>Intenta nuevamente.',
                  icon: 'error',
                  timer: 2000,
                  timerProgressBar: true,
                  didOpen: () => {
                    Swal.showLoading()
                    const b = Swal.getHtmlContainer().querySelector('b')
                    timerInterval = setInterval(() => {
                      b.textContent = Swal.getTimerLeft()
                    }, 100)
                  },
                  willClose: () => {
                    clearInterval(timerInterval)
                  }
                }).then((result) => {
                  /* Read more about handling dismissals below */
                  if (result.dismiss === Swal.DismissReason.timer) {
                    console.log('I was closed by the timer')
                  }
                })
            </script>";
        echo '<meta http-equiv="refresh" content="2,url=login.php">';
    }
    }
?>
    <br>
<div class="jumbotron">
<div class="container">
    <form action="" method="post">
    <br><br><br><br>
<div class="row">
  <div class="col-sm-6" data-aos="fade-right" data-aos-duration="1200">
    <div style="text-align:center;">
        <hr>
        <a href="index.php"><img src="modulos/img/logoImplementta.png" class="img-fluid" alt="Responsive image" width="60%"></a>
        <hr>
    </div>
  </div>
  <div class="col-sm-6">
      <br>
    <form class="form-inline" method="post">
        <div class="card" style="width:22rem;margin:auto;box-shadow: 0px 0px 7px #717171;"> 
          <div class="card-body">
         <div class="input-group mb-3">
           <input type="email" name="correo" class="form-control form-control-lg" placeholder="Correo electrónico" aria-label="Username" aria-describedby="basic-addon1" required autofocus>
         </div>
          <div class="input-group mb-3">
            <input type="password" name="pass" class="form-control form-control-lg" placeholder="Contraseña" aria-label="Username" aria-describedby="basic-addon1" required>
          </div>
              <button  type="submit" name="login" class="btn btn-primary btn-lg btn-block" id="botones" data-toggle="tooltip" data-placement="bottom" title="Iniciar Sesion">Iniciar Sesión</button>
<!--              <a href="modulos/Administrador/selectSistem.php" class="btn btn-primary btn-lg btn-block">Iniciar Sesión</a>-->
            <div style="text-align:center;">
                <br>
               <span style="font-size:14px;font-weight:normal;"><a href="#">¿Olvidaste tu contraseña?</a></span>
<!--
                <hr>
                <a href="#" class="btn btn-success">Crear una cuenta nueva</a>
-->
            </div>
            </div>
        </div>
    </form>
  </div>
</div>
    <br><br><br><br><br><br><br><br><br><br>
    </form>
    </div>
</div>
<!--*************************INICIO FOOTER***********************************************************************-->
<nav class="navbar sticky-bottom navbar-expand-lg">
    <span class="navbar-text" style="font-size:12px;font-weigth:normal;color: #7a7a7a;">
        Implementta ©<br>
        Estrategas de México <i class="far fa-registered"></i><br>
        Centro de Inteligencia Informática y Geografía Aplicada CIIGA
        <hr style="width:105%;border-color:#7a7a7a;">
        Created and designed by © <?php echo date('Y') ?> Estrategas de México<br>
    </span><hr>
    <span class="navbar-text" style="font-size:12px;font-weigth:normal;color: #7a7a7a;">
        Contacto:<br>
        <i class="fas fa-phone-alt"></i> Red: 187<br>
        <i class="fas fa-phone-alt"></i> 66 4120 1451<br>
        <i class="fas fa-envelope"></i> sistemas@estrategas.mx<br>
    </span>
    <ul class="navbar-nav mr-auto">
        <br><br><br><br><br><br><br><br>
    </ul>
    <form class="form-inline my-2 my-lg-0">
        <a href="../../index.php"><img src="modulos/img/logoImplementta.png" width="155" height="150" alt=""></a>
        <a href="http://estrategas.mx/" target="_blank"><img src="modulos/img/logoTop.png" width="200" height="85" alt=""></a>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    </form>
</nav>
<!--***********************************FIN FOOTER****************************************************************-->
</body>
<script src="modulos/js/jquery-3.4.1.min.js"></script>
<script src="modulos/js/popper.min.js"></script>
<script src="modulos/js/bootstrap.js"></script>
<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
<script>
 AOS.init();
 </script>
</html>