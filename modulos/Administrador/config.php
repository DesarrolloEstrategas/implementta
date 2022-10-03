<!DOCTYPE html>
<?php
session_start();
require "../../acnxerdm/cnx.php";

$us="select * from plaza";
$usr=sqlsrv_query($cnx,$us);
$plazas=sqlsrv_fetch_array($usr);

?>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Panel de Control</title>
    <link rel="icon" href="../icono/implementtaIcon.png">
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link href="../css/styles.css" rel="stylesheet" />
    <link href="../fontawesome/css/all.css" rel="stylesheet">
    <style>
        body {
            background-image: url(../img/back.jpg);
            background-repeat: repeat;
            background-size: 100%;
            background-attachment: fixed;
        }

        body {
            font-family: sans-serif;
            font-style: normal;
            font-weight: bold;
            width: 100%;
            height: 100%;
        }

    </style>
</head>

<body>
    <div class="d-flex" id="wrapper">
        <!-- Sidebar-->
        <div class="border-end bg-white" id="sidebar-wrapper" style="text-align:center;">
            <div class="sidebar-heading border-bottom bg-light"><a href="selectSistem.php"><img src="../img/logoImplementtaHorizontal.png" width="200" height="65" alt=""></a></div>
            <div class="list-group list-group-flush" style="text-align:left;">
                <h5><a href="config.php" class="badge badge-primary" style="text-decoration:none;"><i class="fas fa-user-cog"></i> Admin Implementta</a></h5>
                <?php do{ ?>
                <a href="config.php?codplz=<?php echo $plazas['id_plaza'] ?>" class="list-group-item list-group-item-action list-group-item-light"><i class="fas fa-angle-right"></i> <?php echo $plazas['nombreplaza'] ?></a>
                <?php } while($plazas=sqlsrv_fetch_array($usr)); ?>
                <br>
            </div>
        </div>


        <!-- Page content wrapper-->
        <div id="page-content-wrapper">
            <!-- Page content-->
            <div class="container-fluid">


                <br>

                <?php if(isset($_GET['codplz'])){
    
    $idPlz=$_GET['codplz'];
    $uss="select * from plaza where id_plaza='$idPlz'";
    $usrs=sqlsrv_query($cnx,$uss);
    $plaza=sqlsrv_fetch_array($usrs);
    
    ?>
                <div class="container">
                    <h1 style="text-shadow: 1px 1px 2px #717171;">Panel de control</h1>
                    <h4 style="text-shadow: 1px 1px 2px #717171;"><img src="../icono/implementtaIcon.png" class="img-fluid" alt="Responsive image" width="4%"> Implementta Panel de Administracion</h4>
                    <h4 style="text-shadow: 1px 1px 2px #717171;">Plaza <?php echo $plaza['nombreplaza'] ?></h4>
                    <hr>


                    <div class="card-columns">
                       
                    <div class="card">
                        <a href="#" class="btn btn-secondary btn-sm">
                            <img class="card-img-top" src="../img/imgAdmin/administracion.png" alt="Card image cap" width="50%" height="5%">
                        </a>
                    </div>
                       
                        <div class="card">
                            <a href="usuarios.php?plz=<?php echo $_GET['codplz'].'&adm=1' ?>" class="btn btn-dark btn-lg btn-block">
                                <img src="https://img.icons8.com/fluency/65/000000/conference-call.png"/> <h4 style="text-shadow: 1px 1px 2px #717171;"> Usuarios Implementta</h4>
                            </a>
                        </div>


                        <div class="card">
                            <a href="../excluir/excluirCuenta.php?plz=<?php echo $_GET['codplz'] ?>" class="btn btn-lg btn-block btn-outline-dark">
                                <h4 style="text-shadow: 1px 1px 2px #717171;">Excluir cuentas <img src="https://img.icons8.com/fluency/40/000000/logout-rounded.png"/></h4>
                            </a>
                        </div>
                        <div class="card">
                            <a href="../desasignacion/inicio2.php?plz=<?php echo $_GET['codplz'] ?>" class="btn btn-lg btn-block btn-outline-dark">
                                <h4 style="text-shadow: 1px 1px 2px #717171;">Desasignaciones <img src="https://img.icons8.com/external-flaticons-flat-flat-icons/40/000000/external-emergency-exit-emergency-services-flaticons-flat-flat-icons.png"/></h4>
                            </a>
                        </div>
                        <div class="card">
                            <a href="../cambiarTarea/inicio.php?plz=<?php echo $_GET['codplz'] ?>" class="btn btn-lg btn-block btn-dark">
                                <h4 style="text-shadow: 1px 1px 2px #717171;">Modificar Gestiones <img src="https://img.icons8.com/fluency/40/FFFFFF/tasks.png"/></h4>
                            </a>
                        </div>
                         <?php if ($plaza['id_plaza'] == 15){?>
                        <div class="card">
                                <a href="../edit/edit2.php?plz=<?php echo $_GET['codplz'] ?>" class="btn btn-lg btn-block btn-outline-dark">
                                    <h4 style="text-shadow: 1px 1px 2px #717171;">Web service <img src="../../img/images/exclude.png" width="10%" height="5%" /></h4>
                                </a>
                            </div>
                        <?php }?>



    <?php } else{ ?>

                        <div class="alert alert-secondary" role="alert">
                            <i class="fas fa-chevron-left"></i> Selecciona una plaza para ver módulos de administración.
                        </div>


                        <hr>

                        <div class="card-columns">
                            <div class="card">
                                <a href="soporteTec.php" class="btn btn-outline-primary btn-sm">
                                    <img class="card-img-top" src="../img/imgAdmin/Soporte.png" alt="Card image cap" width="50%" height="5%">
                                </a>
                            </div>


                        <div class="card">
                            <a href="addplz.php" class="btn btn-outline-dark btn-lg btn-block">
                                <h4 style="text-shadow: 1px 1px 2px #717171;"><img src="https://img.icons8.com/fluency/40/000000/data-configuration.png"/> Origen de Datos</h4>
                            </a>
                        </div>
                        <div class="card">
                            <a href="addplz.php" class="btn btn-outline-dark btn-lg btn-block">
                                <h4 style="text-shadow: 1px 1px 2px #717171;"><img src="https://img.icons8.com/fluency/40/000000/module.png"/> Disponible</h4>
                            </a>
                        </div>
                            <!--
                    <div class="card">
                        <img class="card-img-top" src="..." alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">This card has supporting text below as a natural lead-in to additional content.</p>
                            <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                        </div>
                    </div>
-->

                        <div class="card">
                            <a href="#" class="btn btn-secondary btn-sm">
                                <img class="card-img-top" src="../img/imgAdmin/administracion.png" alt="Card image cap" width="50%" height="5%">
                            </a>
                        </div>

                        <div class="card">
                            <a href="#" class="btn btn-outline-light btn-sm">
                                <img class="card-img-top" src="../img/imgAdmin/cartografia.png" alt="Card image cap" width="50%" height="5%">
                            </a>

                        </div>
                    </div>
                        <?php } ?>



                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php// } else{
   // header('location:inicio.php');
//}
    ?>

    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="../js/scripts.js"></script>
</body>
<script src="../js/jquery-3.4.1.min.js"></script>
<script src="../js/popper.min.js"></script>
<script src="../js/bootstrap.js"></script>
<script>
    $(function() {
        $('[data-toggle="tooltip"]').tooltip()
    })

</script>

</html>
