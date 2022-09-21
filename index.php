<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Implementta Web</title>
<link rel="icon" href="modulos/icono/implementtaIcon.png">
<!-- Bootstrap -->
<link rel="stylesheet" href="modulos/css/bootstrap.css">
<link href="modulos/fontawesome/css/all.css" rel="stylesheet">
<link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
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
        padding-top:2%;
        padding-bottom:0%;
}
    .padding {
        padding-right:15%;
        padding-left:15%;
    }
.carousel-control-prev-icon {
    background-image: url("data:image/svg+xml;charset=utf8,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='000000' viewBox='0 0 8 8'%3E%3Cpath d='M5.25 0l-4 4 4 4 1.5-1.5-2.5-2.5 2.5-2.5-1.5-1.5z'/%3E%3C/svg%3E");
}

.carousel-control-next-icon {
    background-image: url("data:image/svg+xml;charset=utf8,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='000000' viewBox='0 0 8 8'%3E%3Cpath d='M2.75 0l-1.5 1.5 2.5 2.5-2.5 2.5 1.5 1.5 4-4-4-4z'/%3E%3C/svg%3E");
}
.carousel-indicators .active{
    background-color: #000000;
}    
.carousel-indicators li {
    background-color: #7a7a7a;
</style>
</head>
<body>
<!--********************************INICIO NAVBAR***************************************************************--> 
<br> 
 <nav class="navbar navbar-expand-lg navbar-light">
   <a href="selectSistem.php"><img src="modulos/img/logoImplementtaHorizontal.png" width="250" height="82" alt=""></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <a class="nav-item nav-link" href="#"><i class="fas fa-question-circle"></i> Ayuda</a>
<!--
        <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user-lock"></i> Administrador</a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">  
        <a class="dropdown-item" href="#"><i class="fas fa-users"></i> Nuevo Colaborador</a>       
        <a class="dropdown-item" href="#"><i class="fas fa-user-lock"></i> Administrador ERDM</a>
        </div>
      </li>
-->
    </ul>
<form class="form-inline my-2 my-lg-0">
<a class="btn btn-primary btn-sm" href="login.php" data-toggle="tooltip" data-placement="top" title="Iniciar sesión">Iniciar sesión <i class="fas fa-sign-out-alt"></i></a>
</form>
  </div>
</nav>
<!--*************************************NAVBAR*************************************************************-->

<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" data-aos="zoom-out-down" data-aos-duration="1600">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner" data-aos="zoom-out-down" data-aos-duration="1600">
    <div class="carousel-item active">
      <img class="d-block w-100" src="modulos/img/carrusel/implementta.png" alt="First slide">
      <div class="carousel-caption d-none d-md-block">
        <h5 style="color:#000000;text-shadow: 0px 0px 2px #717171;">Implementta ©</h5>
        <p style="color:#000000;text-shadow: 0px 0px 2px #717171;">Estrategas de México</p>
      </div>
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="modulos/img/carrusel/carto.png" alt="Second slide">
      <div class="carousel-caption d-none d-md-block">
        <h5 style="color:#000000;text-shadow: 0px 0px 2px #717171;">Sistema Fidi</h5>
        <p style="color:#000000;text-shadow: 0px 0px 2px #717171;">Sistema de información cartográfico </p>
      </div>
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="modulos/img/carrusel/kpis.png" alt="First slide">
      <div class="carousel-caption d-none d-md-block">
        <h5 style="color:#000000;text-shadow: 0px 0px 2px #717171;">Sistema de KPIs</h5>
        <p style="color:#000000;text-shadow: 0px 0px 2px #717171;">Indicadores clave de rendimiento</p>
      </div>
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Anterior</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Siguiente</span>
  </a>
</div>

<br>

<div class="jumbotron">
    <div class="row">
      <div class="col-sm-6">
        <div style="text-align:right;" data-aos="fade-right" data-aos-duration="1400">
            <a href="#" ><img src="modulos/img/callcenter.png" class="img-fluid" alt="Responsive image" width="50%"></a>
        </div>
      </div>
      <div class="col-sm-6">
            <br><br><br>
            <h3 class="display-2" style="text-shadow: 2px 2px 4px #717171;" data-aos="fade-left" data-aos-duration="1400">Call Center</h3>
            <h2 style="text-shadow: 0px 0px 3px #717171;" data-aos="fade-left" data-aos-duration="1400">
              <small class="text-muted">Centro de interacción con el cliente</small>
            </h2>
      </div>
    </div>
</div>

<br><hr><br>
<div class="container" style="text-align:center;">
    <h1 style="text-shadow: 1px 1px 2px #717171;">Contacto</h1>
<br>

<div class="card-group">
  <div class="card" data-aos="flip-right" data-aos-duration="1400" data-aos-offset="250">
    <a href="tel:6642365"><img class="card-img-top" src="modulos/img/tel.png" alt="Card image cap"></a>
    <div class="card-body">
      <h5 class="card-title" style="text-shadow: 0px 0px 2px #717171;">Telefono:</h5>
      <p class="card-text" style="text-shadow: 0px 0px 2px #717171;">66 4120 1451</p>
      <p class="card-text" style="text-shadow: 0px 0px 2px #717171;"><small class="text-muted">Soporte Técnico</small></p>
    </div>
  </div>
  <div class="card" data-aos="flip-up" data-aos-duration="1400" data-aos-offset="250">
    <a href="mailto:sistemas@estrategas.mx"><img class="card-img-top" src="modulos/img/mail.png" alt="Card image cap"></a>
    <div class="card-body">
      <h5 class="card-title" style="text-shadow: 0px 0px 2px #717171;">Email</h5>
      <p class="card-text" style="text-shadow: 0px 0px 2px #717171;">sistemas@estrategas.mx</p>
      <p class="card-text" style="text-shadow: 0px 0px 2px #717171;"><small class="text-muted">Contacto CIIGA</small></p>
    </div>
  </div>
  <div class="card" data-aos="flip-left" data-aos-duration="1400" data-aos-offset="250">
    <a href="https://api.whatsapp.com/send?phone=528116855263" target="_blank"><img class="card-img-top" src="modulos/img/wa.png" alt="Card image cap"></a>
    <div class="card-body">
      <h5 class="card-title" style="text-shadow: 0px 0px 2px #717171;">WhatsApp</h5>
      <p class="card-text" style="text-shadow: 0px 0px 2px #717171;">55 8269 5630</p>
      <p class="card-text" style="text-shadow: 0px 0px 2px #717171;"><small class="text-muted">Mesa de Ayuda Soporte</small></p>
    </div>
  </div>
</div>
</div>

<br><br><br><br>

<div style="text-align:center;" data-aos="zoom-out-down" data-aos-duration="1400" data-aos-offset="300">
    <img src="modulos/img/baner.png" class="img-fluid" alt="Responsive image">
</div>
<br><br>
<div class="jumbotron" style="padding-top:0.2%;padding-bottom:0.1%;margin-top:0%;margin-bottom:0%;">
    <p style="text-shadow: 0px 0px 1px #717171;font-size:14px;">Copyright © <?php echo date('Y') ?> Estrategas de México<br>
    Centro de Inteligencia Informática y Geografía Aplicada CIIGA
    </p>
</div>





</body>
<script src="modulos/js/jquery-3.4.1.min.js"></script>
<script src="modulos/js/popper.min.js"></script>
<script src="modulos/js/bootstrap.js"></script>
<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
<script>
 AOS.init();
 </script>
</html>