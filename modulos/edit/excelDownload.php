<?php 
//require "./edit2.php";
$serverName = "51.222.44.135";
    $connectionInfo = array( 'Database'=>'implementtaMexicaliA', 'UID'=>'sa', 'PWD'=>'vrSxHH3TdC');
    $cnx = sqlsrv_connect($serverName, $connectionInfo);
    date_default_timezone_set('America/Mexico_City');


    $fecha=$_GET['fecha'];
    $consulta = "select wsAccionesMexicaliA.*, CatalogoTipoAccionWS.NtipoAccion from wsAccionesMexicaliA
    inner join CatalogoTipoAccionWS on CatalogoTipoAccionWS.id_tipoAccion=wsAccionesMexicaliA.tipoAccion
	where fechaCargaWS='$fecha'";
    $invent=sqlsrv_query($cnx,$consulta);
    $inventario=sqlsrv_fetch_array($invent);


header("Pragma: public");
header("Expires: 0");
$filename = 'Acciones Mexicali '.date('d_m_Y_H_i_s_').'.xls';
header("Content-type: application/x-msdownload");
header("Content-Disposition: attachment; filename=$filename");
header("Pragma: no-cache");
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");

?>

<style>
    table,
    th,
    td {
        border: 1px solid black;
    }

</style>

<table>
    <tbody>
        <tr>
            <th>Fecha Carga WS</th>
            <th>Cuenta</th>
            <th>Fecha Accion</th>
            <th>Tipo Accion</th>
            <th>Observaciones</th>
            <th>Foto Accion</th>
        </tr>
        <?php do{ ?>
        <tr>
            <td><?php echo $inventario['fechaCargaWS'] ?></td>
            <td><?php echo $inventario['cuenta'] ?></td>
            <?php
            if($inventario['fechaAccion']<>NULL){
            $fechaultimo = $inventario['fechaAccion']->format('Y-m-d H:i:s'); ?>
            <td><?php echo $fechaultimo ?></td>
            <?php } ?>
<!--            <td><?php //echo $inventario['tipoAccion'] ?></td>-->
             <td value="<?php echo $inventario['tipoAccion'] ?>"><?php echo utf8_encode($inventario['NtipoAccion']) ?></td>
            <td><?php echo $inventario['observaciones'] ?></td>
            <td><?php echo $inventario['fotoAccion'] ?></td>
        </tr>
        <?php } while($inventario=sqlsrv_fetch_array($invent)); ?>
    </tbody>
</table>
