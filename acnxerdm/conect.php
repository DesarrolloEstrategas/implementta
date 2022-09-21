<?php
$serverName = "implementta.mx";
    $connectionInfoa = array( 'Database'=>'implementtaAdministrator', 'UID'=>'sa', 'PWD'=>'vrSxHH3TdC');
    $cnxa = sqlsrv_connect($serverName, $connectionInfoa);
    date_default_timezone_set('America/Mexico_City');

//*****************************************************************************************
if(isset($_GET['plz'])){
  $plz=$_GET['plz'];

    $pro="SELECT * FROM plaza
    inner join proveniente on proveniente.id_proveniente=plaza.id_proveniente
    where plaza.id_plaza='$plz'";
    $prov=sqlsrv_query($cnxa,$pro);
    $proveniente=sqlsrv_fetch_array($prov);

    if(isset($proveniente)){
    $connectionInfo = array( 'Database'=>$proveniente['data'], 'UID'=>'sa', 'PWD'=>'vrSxHH3TdC');
    $cnx = sqlsrv_connect($serverName, $connectionInfo);
    }
} else{
    echo 'No hay plz disponible para conexion';
}

//*****************************************************************************************

















?>