<?php
require "../../acnxerdm/cnx.php";

$us="select * from plaza";
$usr=sqlsrv_query($cnx,$us);
$plazas=sqlsrv_fetch_array($usr);

require "../../acnxerdm/conect.php";

    $userQuery="SELECT * FROM AspNetUsers";
    $userQueryResult=sqlsrv_query($cnx,$userQuery);
    $usuario=sqlsrv_fetch_array($userQueryResult);

if (isset($_POST['updateGestor'])) {
    $idAspG=$_POST['idaspG'];
    $storedQueryG = "execute [dbo].[sp_ActAsigancionGestor]'$idAspG'";
    $storedQueryResultG= sqlsrv_query($cnx, $storedQueryG);
    if (!$storedQueryResultG) die( print_r( sqlsrv_errors(), true));
    $storedG = sqlsrv_fetch_array($storedQueryResultG, SQLSRV_FETCH_ASSOC);
    if($storedG['Respuesta']==1){
        echo '<script>alert("Desasignacion finalizada")</script>';
        echo '<meta http-equiv="refresh" content="0,url=inicio2.php?plz='.$_GET['plz'].'">';
    } else {
        echo '<script>alert("La desasignacion no se realizo")</script>';
        echo '<meta http-equiv="refresh" content="0,url=inicio2.php?plz='.$_GET['plz'].'">';
    }
}
//********************************************************************************************************
    $userQueryA="SELECT * FROM AspNetUsers";
    $userQueryResultA=sqlsrv_query($cnx,$userQueryA);
    $usuarioA=sqlsrv_fetch_array($userQueryResultA);

if (isset($_POST['updateAbogado'])) {
    $idAspA=$_POST['idaspA'];
    
    $storedQueryA = "update AsignacionAbogado set IdAspUser = '00000000000000000000' where IdAspUser = '$idAspA'";
    $storedQueryResultA= sqlsrv_query($cnx, $storedQueryA);
    $storedA = sqlsrv_fetch_array($storedQueryResultA, SQLSRV_FETCH_ASSOC);
        echo '<script>alert("Desasignacion finalizada")</script>';
        echo '<meta http-equiv="refresh" content="0,url=inicio2.php?plz='.$_GET['plz'].'">';
}

//********************************************************************************************************************


    $usuarioQueryR="SELECT * FROM AspNetUsers";
    $usuarioQueryResultR=sqlsrv_query($cnx,$usuarioQueryR);
    $usuarioR=sqlsrv_fetch_array($usuarioQueryResultR);


if (isset($_POST['updateReductor'])){
    $idAspR=$_POST['idaspR'];
    $storedQueryR = "execute [dbo].[sp_ActualAsignacionReductor]'$idAspR'";
    $storedQueryResultR = sqlsrv_query($cnx, $storedQueryR);
    $storedR = sqlsrv_fetch_array($storedQueryResultR, SQLSRV_FETCH_ASSOC);
    if($storedR['Respuesta']==1){
        echo '<script>alert("Desasignacion finalizada")</script>';
        echo '<meta http-equiv="refresh" content="0,url=inicio2.php?plz='.$_GET['plz'].'">';
    } else {
        echo '<script>alert("La desasignacion no se realizo")</script>';
        echo '<meta http-equiv="refresh" content="0,url=inicio2.php?plz='.$_GET['plz'].'">';
    }
}

?>

<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Nuevo Origen de Datos</title>
    <link rel="icon" href="../icono/implementtaIcon.png">
    <!-- Bootstrap -->
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link href="../fontawesome/css/all.css" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css">
    <style>
        body {
            background-image: url(../img/back.jpg);
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
        <h1 style="text-shadow: 1px 1px 2px #717171;">Desasignaciones</h1>
        <h4 style="text-shadow: 1px 1px 2px #717171;"><i class="fas fa-list"></i> Lista de plazas</h4>
        <hr>

        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
                <button href="asignacionGestor.php?rol=gest" class="nav-link active" id="home-tab" data-toggle="tab" data-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Gestor</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="profile-tab" data-toggle="tab" data-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Abogado</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="contact-tab" data-toggle="tab" data-target="#contact" type="button" role="tab" aria-controls="contact" aria-selected="false">Reductor</button>
            </li>
        </ul>
        <br>
        <div class="tab-content" id="myTabContent">
            <!-- ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                <div class="container">
                    <h4 style="text-shadow: 1px 1px 2px #717171;"><i class="fas fa-check"></i> Lista de usuarios</h4>
                    <table class="table table-hover table-sm">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">Usuario</th>
                                <th scope="col">Nombre</th>
                                <th scope="col" style="text-align:center;">Total de cuentas</th>
                                <th scope="col">Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php do{ ?>
                            <tr>
                                <td><?php  echo $usuario['UserName'] ?></td>
                                <td><?php  echo utf8_encode($usuario['Nombre']) ?></td>
                                <td style="text-align:center;"><?php  $cuenta = "select Count(AsignacionGestor.Cuenta) from asignaciongestor 
                                        inner join [AspNetUsers] on AspNetUsers.Id=AsignacionGestor.IdAspUser
                                        where AspNetUsers.id='".$usuario['Id']."'";
                                        $contadorQueryResult = sqlsrv_query($cnx, $cuenta); ?>
                                    <span class="badge badge-pill badge-warning"><?php echo sqlsrv_fetch_array($contadorQueryResult, SQLSRV_FETCH_NUMERIC)[0]; ?></span>
                                </td>
                                <td>
                                    <form method="post">
                                        <input type="hidden" name="idaspG" value="<?php echo $usuario['Id'] ?>">
                                        <button class="btn btn-dark btn-sm" class="btn" type="submit" name="updateGestor">Desasignar</button>
                                    </form>
                                </td>
                            </tr>

                            <?php } while($usuario=sqlsrv_fetch_array($userQueryResult)); ?>
                        </tbody>
                    </table>
                </div>

            </div>
            <!-- ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                <div class="container">

                    <h4 style="text-shadow: 1px 1px 2px #717171;"><i class="fas fa-check"></i> Lista de usuarios</h4>
                    <table class="table table-hover table-sm">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">Usuario</th>
                                <th scope="col">Nombre</th>
                                <th scope="col" style="text-align:center;">Total de cuentas</th>
                                <th scope="col" style="text-align:center;">Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php do{ ?>
                            <tr>
                                <td><?php  echo $usuarioA['UserName'] ?></td>
                                <td><?php  echo utf8_encode($usuarioA['Nombre']) ?></td>
                                <td style="text-align:center;"><?php  $cuentaA = "select Count(AsignacionAbogado.Cuenta) from asignacionabogado
                                            inner join [AspNetUsers] on AspNetUsers.Id=AsignacionAbogado.IdAspUser
                                            where AspNetUsers.id='".$usuarioA['Id']."'";
                                            $contadorQueryResultA = sqlsrv_query($cnx, $cuentaA); ?>
                                    <span class="badge badge-pill badge-warning"><?php echo sqlsrv_fetch_array($contadorQueryResultA, SQLSRV_FETCH_NUMERIC)[0]; ?></span>
                                </td>
                                <td style="text-align:center;">
                                    <form method="post">
                                        <input type="hidden" name="idaspA" value="<?php echo $usuarioA['Id'] ?>">
                                        <button class="btn btn-dark btn-sm" class="btn" type="submit" name="updateAbogado">Desasignar</button>
                                    </form>
                                </td>
                            </tr>
                            <?php } while($usuarioA=sqlsrv_fetch_array($userQueryResultA)); ?>
                        </tbody>

                    </table>
                </div>
            </div>
            <!-- ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
            <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                <div class="container">
                    <h4 style="text-shadow: 1px 1px 2px #717171;"><i class="fas fa-check"></i> Lista de usuarios</h4>
                    <table class="table table-hover table-sm">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">Usuario</th>
                                <th scope="col">Nombre</th>
                                <th scope="col" style="text-align:center;">Total de cuentas</th>
                                <th scope="col" style="text-align:center;">Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php do{ ?>
                            <tr>
                                <td><?php  echo $usuarioR['UserName'] ?></td>
                                <td><?php  echo utf8_encode($usuarioR['Nombre']) ?></td>
                                <td style="text-align:center;"><?php  $cuentaR = "select Count(AsignacionReductores.Cuenta) from asignacionreductores
                                            inner join [AspNetUsers] on AspNetUsers.Id=AsignacionReductores.IdAspUser
                                            where AspNetUsers.id='".$usuarioR['Id']."'";
                                            $contadorQueryResultR = sqlsrv_query($cnx, $cuentaR); ?>
                                    <span class="badge badge-pill badge-warning"><?php echo sqlsrv_fetch_array($contadorQueryResultR, SQLSRV_FETCH_NUMERIC)[0]; ?></span>
                                </td>
                                <td style="text-align:center;">
                                    <form method="post">
                                        <input type="hidden" name="idaspR" value="<?php echo $usuarioR['Id'] ?>">
                                        <button class="btn btn-dark btn-sm" class="btn" type="submit" name="updateReductor">Desasignar</button>
                                    </form>
                                </td>
                            </tr>
                            <?php } while($usuarioR=sqlsrv_fetch_array($usuarioQueryResultR)); ?>
                        </tbody>

                    </table>
                </div>
            </div>
        </div>
    </div>
    <br><br>
    <div style="text-align:center;">
        <a href="../Administrador/config.php?codplz=<?php echo $plazas['id_plaza'] ?>" class="btn btn-dark btn-sm"><i class="fas fa-times"></i> Regresar</a>
    </div>
    <br><br>


    <?php 
require "include/footer.php";
    ?>
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