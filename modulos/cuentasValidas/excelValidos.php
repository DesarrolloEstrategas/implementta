
<?php 
require "../../acnxerdm/conect.php";

    $idplz=$_GET['plz'];
    $pl="SELECT * FROM plaza
    where id_plaza='$idplz'";
    $plz=sqlsrv_query($cnxa,$pl);
    $plaza=sqlsrv_fetch_array($plz);




header("Pragma: public");
header("Expires: 0");
$filename = 'PagosValidos_'.$plaza['nombreplaza'].'_'.date('d_m_Y_H_i_s_').'.xls';
header("Content-type: application/x-msdownload");
header("Content-Disposition: attachment; filename=$filename");
header("Pragma: no-cache");
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");

?>

<style>
    table, th, td {
      border:0.5px solid black;
    }
</style>

<table>
  <thead>
    <tr>
      <th scope="col">Cuenta</th>
      <th scope="col">CURT</th>
      <th scope="col">Año</th>
      <th scope="col">Bimestre</th>
      <th scope="col">Superficie terreno</th>
      <th scope="col">Superficie construccion</th>
      <th scope="col">Valor terreno</th>
      <th scope="col">Valor Construccion</th>
      <th scope="col">Valor fiscal</th>
      <th scope="col">Estado Edificación</th>
      <th scope="col">Tasa</th>
    </tr>
  </thead>
  <tbody>
<?php do{ ?>
  
  <?php// if ?>
  
   <?php if($valua['anio'] <> '2017'){
        
    $i = 1;
    while ($i <= 6) { ?>
     
    <tr>
      <td><?php echo "'".$valua['CPredial'] ?></td>
      <td><?php echo "'".$valua['CURT'] ?></td>
      <td><?php echo $valua['anio'] ?></td>
      <td><?php echo $i ?></td>
      <td><?php echo $valua['SupTerreno'] ?></td>
      <td><?php echo $valua['supConstruct'] ?></td>
      <td><?php echo $valua['valTerreno'] ?></td>
      <td><?php echo $valua['valorConstruct'] ?></td>
      <td><?php echo $valua['valorCatastral'] ?></td>
      <td><?php echo $valua['EstadoEdificacion'] ?></td>
      <td><?php echo '0.23' ?></td>
    </tr>
        
        
<?php 
    $i++;
        }
    } else if($valua['anio'] == '2017'){ 
        
    $n = 4;
    while ($n <= 6) { ?>
     
    <tr>
      <td><?php echo "'".$valua['CPredial'] ?></td>
      <td><?php echo "'".$valua['CURT'] ?></td>
      <td><?php echo $valua['anio'] ?></td>
      <td><?php echo $n ?></td>
      <td><?php echo $valua['SupTerreno'] ?></td>
      <td><?php echo $valua['supConstruct'] ?></td>
      <td><?php echo $valua['valTerreno'] ?></td>
      <td><?php echo $valua['valorConstruct'] ?></td>
      <td><?php echo $valua['valorCatastral'] ?></td>
      <td><?php echo $valua['EstadoEdificacion'] ?></td>
      <td><?php echo '0.23' ?></td>
    </tr>
        
        
<?php 
    $n++;
        } ?>
        
        
<?php } ?>
<?php } while($valua=sqlsrv_fetch_array($val)); ?>
  </tbody>
</table>
