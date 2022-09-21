<?php
require "../../acnxerdm/cnx.php";

$us="select * from plaza";
$usr=sqlsrv_query($cnx,$us);
$plazas=sqlsrv_fetch_array($usr);

require "../../acnxerdm/conect.php";
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

if(isset($_POST['buscarAbogado'])){
    $palabraAbogado=$_POST['palabraAbogado'];
    $plzA=$_POST['plaza'];
        echo '<meta http-equiv="refresh" content="0,url=inicio.php?findA='.$palabraAbogado.'&plz='.$plzA.'">';
}

if(isset($_GET['findA'])){
    
    $buscarA=$_GET['findA'];
    $consultaA = "select RegistroAbogado.*, CatalogoTareas.DescripcionTarea from RegistroAbogado
    inner join CatalogoTareas on CatalogoTareas.IdTarea=RegistroAbogado.IdTarea
    where Cuenta = '$buscarA'";
//    $consultaA = "select * from RegistroAbogado where cuenta='$buscarA'";
    $consultaAResult = sqlsrv_query($cnx, $consultaA);
    $rowA=sqlsrv_fetch_array($consultaAResult);
}

    $usuarioQuery="SELECT * FROM AspNetUsers";
    $usuarioQueryResult=sqlsrv_query($cnx,$usuarioQuery);
    $usuario=sqlsrv_fetch_array($usuarioQueryResult);

    $Va = "Select * from RegistroAbogadoClone";
    $Val = sqlsrv_query($cnx,$Va);
    $Validar =sqlsrv_fetch_array($usuarioQueryResult); 

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
if(isset($_POST['buscarGestor'])){
    $palabraGestor=$_POST['palabraGestor'];
    $plzG=$_POST['plaza'];
        echo '<meta http-equiv="refresh" content="0,url=inicio.php?findG='.$palabraGestor.'&plz='.$plzG.'">';
}

if(isset($_GET['findG'])){
    
    $buscarG = $_GET['findG'];
     $consultaG = "select RegistroGestor.*, CatalogoTareas.DescripcionTarea from RegistroGestor
    inner join CatalogoTareas on CatalogoTareas.IdTarea=RegistroGestor.IdTarea
    where Cuenta = '$buscarG'";
//    $consultaG = "select * from RegistroGestor where cuenta='$buscarG'";
    $consultaGResult = sqlsrv_query($cnx, $consultaG);
    $rowG=sqlsrv_fetch_array($consultaGResult);
}
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
if(isset($_POST['buscarReductor'])){
    $palabraReductor=$_POST['palabraReductor'];
    $plzR=$_POST['plaza'];
        echo '<meta http-equiv="refresh" content="0,url=inicio.php?findR='.$palabraReductor.'&plz='.$plzR.'">';
}

if(isset($_GET['findR'])){
    
    $buscarR=$_GET['findR'];
     $consultaR = "select RegistroReductores.*, CatalogoTareas.DescripcionTarea from RegistroReductores
    inner join CatalogoTareas on CatalogoTareas.IdTarea=RegistroReductores.idTarea
    where Cuenta = '$buscarR'";
//    $consultaR = "select * from RegistroReductores where cuenta='$buscarR'";
    $consultaRResult = sqlsrv_query($cnx, $consultaR);
    $rowR=sqlsrv_fetch_array($consultaRResult);
}
/////////////////////////////////////////////////////////////////////////////////////////////////////
if(isset($_POST['buscarCarta'])){
    $palabraCarta=$_POST['palabraCarta'];
    $plzC=$_POST['plaza'];
        echo '<meta http-equiv="refresh" content="0,url=inicio.php?findC='.$palabraCarta.'&plz='.$plzC.'">';
}

if(isset($_GET['findC'])){
    
    $buscarC = $_GET['findC'];
     $consultaC = "select registroCartaInvitacion.*, CatalogoTareas.DescripcionTarea from registroCartaInvitacion
    inner join CatalogoTareas on CatalogoTareas.IdTarea=registroCartaInvitacion.IdTarea
    where Cuenta = '$buscarC'";
    $consultaCResult = sqlsrv_query($cnx, $consultaC);
    $rowC=sqlsrv_fetch_array($consultaCResult);
}
?>

<!DOCTYPE html>F
<html>

<head>
    <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cambiar Tarea</title>
    <link rel="icon" href="../icono/implementtaIcon.png">
    <!-- Bootstrap -->
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link href="../fontawesome/css/all.css" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css">
    <style>
        body {

            background-repeat: repeat;
            background-size: 100%;
            background-attachment: fixed;
            overflow-x: hidden;
            /* ocultar scrolBar horizontal*/
        }

        body {
            font-family: sans-serif;
            font-style: normal;
            font-weight: bold;
            width: 100%;
            height: 100%;
            margin-top: -1%;
            padding-top: 0px;
        }

        .jumbotron {
            margin-top: 0%;
            margin-bottom: 0%;
            padding-top: 3%;
            padding-bottom: 2%;
        }

        .padding {
            padding-right: 35%;
            padding-left: 35%;
        }

        .table {
            text-align: center;
        }

    </style>
    <?php require "include/nav.php"; ?>
</head>

<body>
    <div class="container">
        <h1 style="text-shadow: 1px 1px 2px #717171;">Cambiar Tarea</h1>
        <h4 style="text-shadow: 1px 1px 2px #717171;"><i class="fas fa-list"></i> Busca una cuenta</h4>
        <hr>
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="home-tab" data-toggle="tab" data-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Gestor</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="profile-tab" data-toggle="tab" data-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Abogado</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="contact-tab" data-toggle="tab" data-target="#contact" type="button" role="tab" aria-controls="contact" aria-selected="false">Reductor</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="carta-tab" data-toggle="tab" data-target="#carta" type="button" role="tab" aria-controls="carta" aria-selected="false">Carta Invitacion</button>
            </li>
        </ul>
        <br>
        <!--********************************GESTOR CAMBIAR TAREA***********************************************************+**********-->
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                <div class="container">
                    <div class="form-row">
                        <div class="col-md-6">
                            <div style="text-align:left;">
                                <h4>Busca una cuenta</h4>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="justify-content-center justify-content-md-center">
                                <div>
                                    <form method="POST" action="">
                                        <div class="input-group col-md-15 justify-content-center">
                                            <div class="input-group-prepend">
                                                <button type="submit" name="buscarGestor" class="btn btn-primary btn-sm"><i class="fas fa-search"></i></button>
                                            </div>
                                            <input type="text" class="form-control border border-secondary" placeholder="Buscar nombre o usuario" name="palabraGestor" required autofocus>
                                            <input type="hidden" class="form-control border border-secondary" value="<?php echo $_GET['plz'] ?>" name="plaza">
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>


                    <?php if(isset($rowG)){ ?>

                    <table class="table table-hover table-sm">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">Cuenta</th>
                                <th scope="col">Tarea</th>
                                <th scope="col">Fecha Asignacion</th>
                                <th scope="col">Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php do{ ?>
                            <tr>
                                <td><?php echo $rowG['Cuenta'] ?></td>
                                <td value="<?php echo $rowG['IdTarea'] ?>"><?php echo utf8_encode($rowG['DescripcionTarea']) ?></td>

                                <?php
                                if($rowG['FechaPromesaPago']<>NULL){
                                $fechaultimo = $rowG['FechaPromesaPago']->format('Y-m-d H:i:s'); ?>
                                <td><?php echo $fechaultimo ?></td>
                                <?php } else{ ?>
                                <input type="text" class="form-control" name="fechaultimopago">
                                <?php } ?>


                                <td>
                                    <form method="GET">
                                        <input type="hidden" name="cuenta" value="<?php echo $rowG['Cuenta'] ?>">
                                        <input type="hidden" class="form-control border border-secondary" value="<?php echo $_GET['plz'] ?>" name="plaza">
                                        <a href="updateGestor.php?cuenta=<?php echo $rowG['Cuenta'] ?>&plz=<?php echo $_GET['plz'].'&gest='.$rowG['IdRegistroGestor'] ?>" class="btn btn-primary btn-sm" name="editar">Editar Tarea<i class="far fa-edit"></i></a>
                                        <a href="cuentaModificadaGestor.php?cuenta=<?php echo $rowG['Cuenta'] ?>&plz=<?php echo $_GET['plz'].'&idGest='.$rowG['IdRegistroGestor'] ?>" class="btn btn-info btn-sm" name="vista">Cuentas editadas <i class="fa fa-list"></i></a>


                                    </form>
                                </td>
                            </tr>

                            <?php }while($rowG=sqlsrv_fetch_array($consultaGResult)); ?>
                        </tbody>
                    </table>

                    <?php } else if(isset($_GET['findG'])){ ?>

                    <div class="alert alert-danger" role="alert">
                        NO EXISTE ESA CUENTA
                    </div>

                    <?php } ?>
                </div>
            </div>
            <!--********************************TERMINA  CAMBIA TAREA*****************************************************************-->
            <!--********************************ABOGADO CAMBIAR TAREA*****************************************************************-->
            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                <div class="container">
                    <div class="form-row">
                        <div class="col-md-6">
                            <div style="text-align:left;">
                                <h4>Busca una cuenta</h4>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="justify-content-center justify-content-md-center">
                                <div>
                                    <form method="POST" action="">
                                        <div class="input-group col-md-15 justify-content-center">
                                            <div class="input-group-prepend">
                                                <button type="submit" name="buscarAbogado" class="btn btn-primary btn-sm"><i class="fas fa-search"></i></button>
                                            </div>
                                            <input type="text" class="form-control border border-secondary" placeholder="Buscar nombre o usuario" name="palabraAbogado" required autofocus>
                                            <input type="hidden" class="form-control border border-secondary" value="<?php echo $_GET['plz'] ?>" name="plaza">
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>


                    <?php if(isset($rowA)){ ?>

                    <table class="table table-hover table-sm">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">Cuenta</th>
                                <th scope="col">Tarea</th>
                                <th scope="col">Fecha Asignacion</th>
                                <th scope="col">Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php do{ ?>
                            <tr>
                                <td><?php echo $rowA['Cuenta'] ?></td>
                                <td value="<?php echo $rowA['IdTarea'] ?>"><?php echo utf8_encode($rowA['DescripcionTarea']) ?></td>
                                <?php
                                    if($rowA['FechaAsignacion']<>NULL){
                                    $fechaultimo = $rowA['FechaAsignacion']->format('Y-m-d H:i:s'); ?>

                                <td><?php echo $fechaultimo ?></td>
                                <?php } else{ ?>
                                <input type="text" name="fechaultimopago" placeholder="Fecha de ultimo pago">
                                <?php } ?>

                                <td>
                                    <form method="GET">
                                        <input type="hidden" name="cuenta" value="<?php echo $rowA['Cuenta'] ?>">
                                        <input type="hidden" class="form-control border border-secondary" value="<?php echo $_GET['plz'] ?>" name="plaza">
                                        <a href="update.php?cuenta=<?php echo $rowA['Cuenta'] ?>&plz=<?php echo $_GET['plz'].'&abog='.$rowA['IdRegistroAbogado'] ?>" class="btn btn-primary btn-sm" name="editar">Modificar Tarea <i class="far fa-edit"></i></a>
                                        <a href="otraVista.php?cuenta=<?php echo $rowA['Cuenta'] ?>&plz=<?php echo $_GET['plz'].'&abog='.$rowA['IdRegistroAbogado'] ?>" class="btn btn-info btn-sm" name="editar">Cuentas editadas <i class="fa fa-list"></i></a>
                                    </form>
                                </td>
                            </tr>

                            <?php }while($rowA=sqlsrv_fetch_array($consultaAResult)); ?>
                        </tbody>
                    </table>

                    <?php } else if(isset($_GET['findA'])){ ?>

                    <div class="alert alert-danger" role="alert">
                        NO EXISTE ESA CUENTA
                    </div>

                    <?php } ?>
                </div>
            </div>
            <!--**********************************************************************************************************************-->
            <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                <div class="container">

                    <div class="form-row">
                        <div class="col-md-6">
                            <div style="text-align:left;">
                                <h4>Busca una cuenta</h4>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="justify-content-center justify-content-md-center">
                                <div>
                                    <form method="POST" action="">
                                        <div class="input-group col-md-15 justify-content-center">
                                            <div class="input-group-prepend">
                                                <button type="submit" name="buscarReductor" class="btn btn-primary btn-sm"><i class="fas fa-search"></i></button>
                                            </div>
                                            <input type="text" class="form-control border border-secondary" placeholder="Buscar nombre o usuario" name="palabraReductor" required autofocus>
                                            <input type="hidden" class="form-control border border-secondary" value="<?php echo $_GET['plz'] ?>" name="plaza">
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>


                    <?php if(isset($rowR)){ ?>

                    <table class="table table-hover table-sm">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">Cuenta</th>
                                <th scope="col">Tarea</th>
                                <th scope="col">Fecha Asignacion</th>
                                <th scope="col">Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php do{ ?>
                            <tr>
                                <td><?php echo $rowR['Cuenta'] ?></td>
                                <td value="<?php echo $rowR['idTarea'] ?>"><?php echo utf8_encode($rowR['DescripcionTarea']) ?></td>
                                <?php
        if($rowR['fechaAsignacion']<>NULL){
        $fechaultimo = $rowR['fechaAsignacion']->format('Y-m-d H:i:s'); ?>
                                <td><?php echo $fechaultimo ?></td>
                                <?php } else{ ?>
                                <input type="text" class="form-control" name="fechaultimopago" placeholder="Fecha de ultimo pago">
                                <?php } ?>
                                <td>
                                    <form method="GET">
                                        <input type="hidden" name="cuenta" value="<?php echo $rowR['Cuenta'] ?>">
                                        <input type="hidden" class="form-control border border-secondary" value="<?php echo $_GET['plz'] ?>" name="plaza">
                                        <a href="updateReductor.php?cuenta=<?php echo $rowR['Cuenta'] ?>&plz=<?php echo $_GET['plz'].'&reduc='.$rowR['idRegistroReductores']  ?>" class="btn btn-primary btn-sm" name="editar">Editar Tarea<i class="far fa-edit"></i></a>
                                        <a href="cuentasModificadasReductor.php?cuenta=<?php echo $rowR['Cuenta'] ?>&plz=<?php echo $_GET['plz'].'&reduc='.$rowR['idRegistroReductores'] ?>" class="btn btn-info btn-sm" name="editar">Cuentas editadas <i class="fa fa-list"></i></a>

                                    </form>
                                </td>
                            </tr>

                            <?php }while($rowR=sqlsrv_fetch_array($consultaRResult)); ?>
                        </tbody>
                    </table>

                    <?php } else if(isset($_GET['findR'])){ ?>

                    <div class="alert alert-danger" role="alert">
                        NO EXISTE ESA CUENTA
                    </div>

                    <?php } ?>
                </div>
            </div>
            <!--**********************************************************************************************************************-->
            <div class="tab-pane fade" id="carta" role="tabpanel" aria-labelledby="contact-tab">
                <div class="container">

                    <div class="form-row">
                        <div class="col-md-6">
                            <div style="text-align:left;">
                                <h4>Busca una cuentassss</h4>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="justify-content-center justify-content-md-center">
                                <div>
                                    <form method="POST" action="">
                                        <div class="input-group col-md-15 justify-content-center">
                                            <div class="input-group-prepend">
                                                <button type="submit" name="buscarCarta" class="btn btn-primary btn-sm"><i class="fas fa-search"></i></button>
                                            </div>
                                            <input type="text" class="form-control border border-secondary" placeholder="Buscar nombre o usuario" name="palabraCarta" required autofocus>
                                            <input type="hidden" class="form-control border border-secondary" value="<?php echo $_GET['plz'] ?>" name="plaza">
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>


                    <?php if(isset($rowC)){ ?>

                    <table class="table table-hover table-sm">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">Cuenta</th>
                                <th scope="col">Tarea</th>
                                <th scope="col">Fecha Asignacion</th>
                                <th scope="col">Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php do{ ?>
                            <tr>
                                <td><?php echo $rowC['Cuenta'] ?></td>
                                <td value="<?php echo $rowC['idTarea'] ?>"><?php echo utf8_encode($rowC['DescripcionTarea']) ?></td>
                                <?php
                                if($rowC['fechaCaptura']<>NULL){
                                $fechaultimo = $rowC['fechaCaptura']->format('Y-m-d H:i:s'); ?>
                                <td><?php echo $fechaultimo ?></td>
                                <?php } else{ ?>
                                <input type="text" class="form-control" name="fechaultimopago" placeholder="Fecha de ultimo pago">
                                <?php } ?>
                                <td>
                                    <form method="GET">
                                        <input type="hidden" name="cuenta" value="<?php echo $rowC['Cuenta'] ?>">
                                        <input type="hidden" class="form-control border border-secondary" value="<?php echo $_GET['plz'] ?>" name="plaza">
                                        <a href="updateCartaInvitacion.php?cuenta=<?php echo $rowC['Cuenta'] ?>&plz=<?php echo $_GET['plz'].'&idCarta='.$rowC['idRegistroCartaInvitacion']  ?>" class="btn btn-primary btn-sm" name="editar">Editar Tarea<i class="far fa-edit"></i></a>
                                        <a href="CuentaModificadaCarta.php?cuenta=<?php echo $rowC['Cuenta'] ?>&plz=<?php echo $_GET['plz'].'&idCarta='.$rowC['idRegistroCartaInvitacion'] ?>" class="btn btn-info btn-sm" name="editar">Cuentas editadas <i class="fa fa-list"></i></a>

                                    </form>
                                </td>
                            </tr>

                            <?php }while($rowC=sqlsrv_fetch_array($consultaCResult)); ?>
                        </tbody>
                    </table>

                    <?php } else if(isset($_GET['findC'])){ ?>

                    <div class="alert alert-danger" role="alert">
                        NO EXISTE ESA CUENTA
                    </div>

                    <?php } ?>
                </div>
            </div>


        </div>
        <br><br>
        <div style="text-align:center;">
            <a href="../Administrador/config.php?codplz=<?php echo $plazas['id_plaza'] ?>" class="btn btn-dark btn-sm"><i class="fas fa-times"></i> Regresar</a>
        </div>
        <br><br>
    </div>
    <?php require "include/footer.php"; ?>
</body>
<script src="../js/jquery-3.4.1.min.js"></script>
<script src="../js/popper.min.js"></script>
<script src="../js/bootstrap.js"></script>
<script>
    $(function() {
        $('[data-toggle="tooltip"]').tooltip()
    })

</script>
<script>
    function Confirmar(Mensaje) {
        return (confirm(Mensaje)) ? true : false;
    }

</script>

</html>
