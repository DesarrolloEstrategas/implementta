<?php
$serverName = "51.222.44.135";
    $connectionInfo = array( 'Database'=>'implementtaMexicaliA', 'UID'=>'sa', 'PWD'=>'vrSxHH3TdC');
    $cnx = sqlsrv_connect($serverName, $connectionInfo);
    date_default_timezone_set('America/Mexico_City');

if(isset($_POST['buscar'])){
    $palabraAbogado=$_POST['palabra'];
//    $plzA=$_POST['plaza'];
        echo '<meta http-equiv="refresh" content="0,url=edit2.php?findA='.$palabraAbogado.'">';
}

if(isset($_GET['findA'])){
    
    $buscarA=$_GET['findA'];
    $consultaA = "select top 10 * from wsAccionesMexicaliA  where fechaCargaWS='$buscarA'";
    $consultaAResult = sqlsrv_query($cnx, $consultaA);
    $rowA=sqlsrv_fetch_array($consultaAResult);
    
      $cuenta="select count (fechaCargaWS) from [wsAccionesMexicaliA] where fechaCargaWS='$buscarA'";
      $contadorQueryResult = sqlsrv_query($cnx, $cuenta); 
}
?>


<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Nuevo Asignacion gestor</title>
    <link rel="icon" href="../icono/implementtaIcon.png">
    <!-- Bootstrap -->
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link href="../fontawesome/css/all.css" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
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

    </style>
     <?php require "include/nav.php"; ?>
</head>

<body>
    <br><br>

    <div class="container">
        <h3>Acciones de Mexicali</h3>
        <h4>Envio de Web Service</h4>
        <div class="form-row">
            <div class="col-md-6">
                <div style="text-align:left;">
                </div>
            </div>
            <div class="col-md-6">
                <div class="justify-content-center justify-content-md-center">
                    <div>
                        <form method="POST" action="">
                            <div class="input-group col-md-15 justify-content-center">
                                <div class="input-group-prepend">
                                    <button type="submit" name="buscar" class="btn btn-primary btn-sm"><i class="fas fa-search"></i></button>
                                </div>
                                <input type="date" class="form-control border border-secondary" placeholder="Busca una fecha" name="palabra" required autofocus>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <?php if(isset($rowA)){ ?>
        <div class="alert alert-primary" role="alert">
            Resultados de la busqueda con fecha : <?php echo $_GET['findA'] ?>
        </div>
        <div class="alert alert-success" role="alert">
            <h4>Total de Cuentas : <span class="badge badge-pill badge-warning"><?php echo sqlsrv_fetch_array($contadorQueryResult, SQLSRV_FETCH_NUMERIC)[0]; ?></span></h4>
        </div>
        <a href="./excelDownload.php?fecha=<?php echo $_GET['findA'] ?>" class="btn btn-dark btn-sm">Descargar Excel <i class="fas fa-times"></i> </a>

        <?php } else if(isset($_GET['findA'])){ ?>

        <div class="alert alert-danger" role="alert">
            NO HAY REGISTROS CON ESA FECHA
        </div>

        <?php } ?>
    </div>
    <br><br>
    <br><br>
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
