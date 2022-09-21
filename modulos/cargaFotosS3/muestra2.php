<?php 


$gestor = $_POST['gestor'];
$plaza = $_POST['plaza'];
$fechacaptura = $_POST['fechacaptura'];
$cuenta = $_POST['cuenta'];
//$idtarea = $_POST['idtarea'];
//$tipo = $_POST['tipo'];


//echo ' ** gestor :' .$gestor;

$serverName = "implementta.mx";

$connectionInfo = array( 'Database'=>$plaza, 'UID'=>'sa', 'PWD'=>'vrSxHH3TdC');
$conn = sqlsrv_connect($serverName, $connectionInfo);
date_default_timezone_set('America/Mexico_City'); 


//$fechacaptura = $_POST['fechacaptura'];

$fila = "";

  // $tsql = "select cuenta,nombrefoto,urlimagen,CONVERT(VARCHAR(24),fechacaptura,120) as fechacaptura FROM registrofotomovil where idAspUser = '$gestor' and convert(date,fechacaptura) = '$fechacaptura'  ";
   $tsql = "select cuenta,nombrefoto,urlimagen,CONVERT(VARCHAR(24),fechacaptura,120) as fechacaptura FROM registrofotomovil where idAspUser = '$gestor' and convert(date,fechacaptura) = '$fechacaptura' and cuenta = '$cuenta'   ";
   
   $res = sqlsrv_query($conn,$tsql);

//$cadena ="<select id='lista2' name='lista2' class='form-control'>";

while ($ver=sqlsrv_fetch_array($res)){



   // $cadena=$cadena.'<option value='.$ver[0].'>'.utf8_encode($ver[1]).'</option>';
   $imagen = $ver['2'];
    $fila .= "<tr><td>{$ver['0']}</td>";
    $fila .= "<td>{$ver['1']}</td>";
    $fila .= "<td><img src=$imagen  height='100' width='140'></td>";
    $fila .= "<td>{$ver['3']}</td>";
    $fila .= "<td><center><button onclick='getfile(&#34;{$ver['1']}&#34;)'>Eliminar</button></center></td>";
    $fila .= "<td><center><button onclick='getDescarga(&#34;{$ver['1']}&#34;)'>Descargar</button></center></td></tr>";
   
   
}

echo $fila;
  


?>