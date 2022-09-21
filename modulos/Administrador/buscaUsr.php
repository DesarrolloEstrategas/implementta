<?php
session_start();
require "../../acnxerdm/conect.php";

if(isset($_POST['alumnos'])) { 
    
    $busqueda=$_POST['alumnos'];
    $se="select * from usuarioNuevo
    inner join usuario on usuario.id_usuarioNuevo=usuarioNuevo.id_usuarioNuevo
    where nombre like '%$busqueda%' or app like '%$busqueda%' or apm like '%$busqueda%' 
    or correo like '%$busqueda%'";
    $ser=sqlsrv_query($cnx,$se);
    $roarch=sqlsrv_fetch_array($search);
    
?>
<?php echo $_GET['num2'].'asdasd' ?>
<table class="table table-hover table-sm">
  <thead class="thead-dark">
    <tr>
      <th scope="col">First</th>
      <th scope="col">Last</th>
      <th scope="col">Handle</th>
    </tr>
  </thead>
  <tbody>
<?php do{ ?>   
    <tr>
      <td>Mark</td>
      <td>Otto</td>
      <td>amdo</td>
    </tr>
<?php }while($roarch=sqlsrv_fetch_array($search)); ?>
  </tbody>
</table>


<?php } else{ ?>








<?php } ?>
















