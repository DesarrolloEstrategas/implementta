<?php
require "../../acnxerdm/conect.php";

if(isset($_POST['buscar'])){
    $palabra=$_POST['palabra'];
    $plz=$_POST['plaza'];
        echo '<meta http-equiv="refresh" content="0,url=excluirCuenta.php?find='.$palabra.'&plz='.$plz.'">';
}

if(isset($_GET['find'])){
    
    $buscar=$_GET['find'];
    $consulta = "select * from implementta where cuenta='$buscar'";
    $consultaResult = sqlsrv_query($cnx, $consulta);
    $row=sqlsrv_fetch_array($consultaResult);
}
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Excluir Cuenta</title>
<link rel="icon" href="../icono/icon.png">
<!-- Bootstrap -->
<link rel="stylesheet" href="../css/bootstrap.css">
<link href="../fontawesome/css/all.css" rel="stylesheet">
<link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css"/>
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
}
    .padding {
        padding-right:35%;
        padding-left:35%;
    }
    </style>
<?php require "include/nav.php"; ?>
</head>
<body>
<div class="container">
<hr>
    
    <div class="form-row">
        <div class="col-md-6">
            <div style="text-align:left;">
                <h4>Busca una cuenta</h4>
            </div>
        </div>
        <div class="col-md-6">
        <div class="justify-content-center justify-content-md-center">
            <div >
                <form method="POST" action="excluirCuenta.php">
                    <div class="input-group col-md-15 justify-content-center">
                    <div class="input-group-prepend">
                    <button type="submit" name="buscar" class="btn btn-primary btn-sm"><i class="fas fa-search"></i></button>
                    </div>
                    <input type="text" class="form-control border border-secondary" placeholder="Buscar nombre o usuario" name="palabra" required autofocus>
                    <input type="hidden" class="form-control border border-secondary" value="<?php echo @$_GET['plz'] ?>" name="plaza">
                  </div>
                </form>
            </div>
          </div>
        </div>
    </div>    
<br>
    

<?php if(isset($row)){ ?>
    
    <table class="table table-hover table-sm">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Cuenta</th>
      <th scope="col">Propietario</th>
      <th scope="col">Estatus</th>
      <th scope="col">Opciones</th>
    </tr>
  </thead>
  <tbody>
<?php do{ ?>
    <tr>
      <td><?php echo $row['Cuenta'] ?></td>
      <td><?php echo $row['Propietario'] ?></td>
      <td>
          
          <?php if($row['Estatus'] == 'Padron'){ ?>
          
          <span class="badge badge-success"><?php echo $row['Estatus'] ?></span>
           
        <?php   } else { ?>
          
          <span class="badge badge-danger"><?php echo $row['Estatus'] ?></span>
    
           <?php } ?>
          
          </td>
      <td>
          <form method="GET" >
            <input type="hidden" name="cuenta" value="<?php echo $row['Cuenta'] ?>">
            <input type="hidden" class="form-control border border-secondary" value="<?php echo $_GET['plz'] ?>" name="plaza">
            <a href="querys.php?excluir=1&cuenta=<?php echo $row['Cuenta'] ?>&plz=<?php echo $_GET['plz'] ?>" class="btn btn-primary btn-sm" name="excluir"><i class="fas fa-times"></i>Excluir</a>
            <a href="querys.php?regresar=1&cuenta=<?php echo $row['Cuenta'] ?>&plz=<?php echo $_GET['plz'] ?>" class="btn btn-success btn-sm" name="regresar"><i class="fa fa-history" aria-hidden="true"></i></a>

          </form>
     </td>
    </tr>
      
<?php }while($row=sqlsrv_fetch_array($consultaResult)); ?>      
  </tbody>
</table>
    
    <?php } else if(isset($_GET['find'])){ ?>
    
    <div class="alert alert-danger" role="alert">
      NO EXISTE ESA CUENTA
    </div>
    
    <?php } ?>

    <br>
    <div style="text-align:center;">
        <a href="../Administrador/config.php?codplz=<?php echo @$_GET['plz'] ?>" class="btn btn-dark btn-sm"><i class="fas fa-times"></i> Regresar</a>
    </div>
</div>
    <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<?php 

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