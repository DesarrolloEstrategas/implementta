<?php  
require "../../acnxerdm/conect.php";


if(isset($_GET['excluir'])){
    $cuenta=$_GET['cuenta'];
  
    $query = "UPDATE implementta SET Estatus ='Excluida' WHERE Cuenta='$cuenta'";
    $queryResult= sqlsrv_query($cnx, $query);
    if(!$queryResult)die( print_r(sqlsrv_errors(), true));
//    $exc = sqlsrv_fetch_array($queryResult,SQLSRV_FETCH_ASSOC);
    if($queryResult){
        echo '<script>alert("Cuenta excluida con exito")</script>';
        echo '<meta http-equiv="refresh" content="0,url=excluirCuenta.php?find='.$cuenta.'&plz='.$plz.'">';
    } else {
        echo '<script>alert("Cuenta no excluida")</script>';
        echo '<meta http-equiv="refresh" content="0,url=excluirCuenta.php?find='.$cuenta.'&plz='.$plz.'">';

    }
}

if(isset($_GET['regresar'])){
    $cuenta=$_GET['cuenta'];
  
    $query = "UPDATE implementta SET Estatus ='Padron' WHERE Cuenta='$cuenta'";
    $queryResult= sqlsrv_query($cnx, $query);
    if(!$queryResult)die( print_r(sqlsrv_errors(), true));
//    $exc = sqlsrv_fetch_array($queryResult,SQLSRV_FETCH_ASSOC);
    if($queryResult){
        echo '<script>alert("Se regreso con exito")</script>';
        echo '<meta http-equiv="refresh" content="0,url=excluirCuenta.php?find='.$cuenta.'&plz='.$plz.'">';
    } else {
        echo '<script>alert("No se regreso")</script>';
        echo '<meta http-equiv="refresh" content="0,url=excluirCuenta.php?find='.$cuenta.'&plz='.$plz.'">';

    }
}
?>
