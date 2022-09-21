<?php if(isset($_POST['alumnos'])) {
    
$serverName = "implementta.mx";
    $connectionInfo = array( 'Database'=>'cartomaps', 'UID'=>'sa', 'PWD'=>'vrSxHH3TdC');
    $cnx = sqlsrv_connect($serverName, $connectionInfo);
    date_default_timezone_set('America/Mexico_City');
    
    $busqueda=$_POST['alumnos'];
    
    $ura="select top 20 * from fichaResult
    where NPropietario LIKE '%$busqueda%'";
    $urla=sqlsrv_query($cnx,$ura);
    $direcciona=sqlsrv_fetch_array($urla);
    
if(isset($direcciona)){ ?>


<table class="table table-hover table-sm">
  <thead class="thead-dark">
    <tr>
      <th scope="col" style="text-align:center;">Cuenta Predial</th>
      <th scope="col" style="text-align:center;">Propietario</th>
      <th scope="col" style="text-align:center;">Clave Catastral</th>
      <th scope="col" style="text-align:center;">Opciones</th>
    </tr>
  </thead>
  <tbody>
   <?php do{ ?>
    <tr>
      <td style="text-align:center;"><?php echo $direcciona['CPredial'] ?></td>
      <td style="text-align:center;"><?php echo $direcciona['NPropietario'] ?></td>
      <td style="text-align:center;"><?php echo $direcciona['CCatastral'] ?></td>
      <td style="text-align:center;">
          <a href="#" class="btn btn-outline-dark btn-sm" style="padding:0%;border:0px;" data-toggle="tooltip" data-placement="left" title="Informacion de la cuenta"><img src="https://img.icons8.com/fluency/30/000000/about.png"/></a>
          &nbsp;
          <a href="pdfDet/determinacion.php" class="btn btn-outline-dark btn-sm" style="padding:0%;border:0px;" data-toggle="tooltip" data-placement="right" title="Generar PDF"><img src="https://img.icons8.com/fluency/30/000000/adobe-acrobat.png"/> PDF&nbsp;</a>
          &nbsp;
          </td>
    </tr>
    <?php }while($direcciona=sqlsrv_fetch_array($urla)); ?>
  </tbody>
</table>
<small><i class="fas fa-info-circle"></i> Se muestran los primeros 20 registros.</small>

<?php } else{ ?>


<div class="alert alert-info" role="alert">
  <img src="https://img.icons8.com/fluency/40/000000/about.png"/> "<?php echo $busqueda ?>" no fue encontrado como un nombre de propietario. Si es una cuenta predial da clic en el boton buscar <i class="fas fa-search"></i>
</div>


<?php } ?>









<?php } ?>



<script>
$(function () {
  $('[data-toggle="tooltip"]').tooltip()
})
</script>









