<?php
require "../../acnxerdm/conect.php";

$query = "select RegistroGestorClone.*, CatalogoTareas.DescripcionTarea from RegistroGestorClone
    inner join CatalogoTareas on CatalogoTareas.IdTarea=RegistroGestorClone.IdTarea ";
$queryResult = sqlsrv_query($cnx, $query);
//$OtroDato = sqlsrv_query($cnx, $query);
//$dato = sqlsrv_fetch_array($OtroDato, SQLSRV_FETCH_ASSOC);
$dato = sqlsrv_fetch_array($queryResult);

/*-------------------Boton Aceptar cambios----------------------- */

if(isset($_POST['aceptar'])){
    $id=$_GET['idGest'];
    $plz = $_GET['plz'];
    $cuentaa = $_GET['cuenta'];
  
  
    $Cuenta = $dato['Cuenta'];
    $idTarea = $dato['IdTarea'];
    $Observacion = $dato['Observaciones'];
    $Nombre = $dato['Nombre'];
    $TelefonoLocal= $dato['TelefonoLocal'];
    $TelefonoCelular= $dato['TelefonoCelular'];
    $TelefonoRadio = $dato['TelefonoRadio'];
    $Correo = $dato['CorreoElectronico'];
    $IdEstatus = $dato['IdEstatus'];
    $FechaPromesa = date('Y-m-d H:i:s', strtotime($dato['FechaPromesaPago']));
    $Latitud = $dato['Latitud'];
    $Longitud= $dato['Longitud'];
    $FechaCaptura = date('Y-m-d H:i:s', strtotime($dato['FechaCaptura']));
    $Calle = $dato['Calle'];
    $NumExt = $dato['NumExt'];
    $NumInt = $dato['NumInt'];
    $Colonia = $dato['Colonia'];
    $Poblacion = $dato['Poblacion'];
    $CP = $dato['CP'];
    $Referencia = $dato['Referencia'];
    $EntreCalle1 = $dato['EntreCalle1'];
    $EntreCalle2 = $dato['EntreCalle2'];
    $ConDatos = $dato['ConDatos'];
    $ConDatosValidos = $dato['ConDatosValidos'];
    $IdAspUser = $dato['IdAspUser'];
    $FechaAsignacion =  date('Y-m-d H:i:s', strtotime($dato['FechaAsignacion']));
    $FechaVencimiento =  date('Y-m-d H:i:s', strtotime($dato['FechaVencimiento']));
    $NombrePropietario= $dato['NombrePropietario'];
    $TelefonoLocalPropietario = $dato['TelefonoLocalPropietario'];
    $TelefonoCelularPropietario	= $dato['TelefonoCelularPropietario'];
    $TelefonoRadioPropietario = $dato['TelefonoRadioPropietario'];
    $CorreoElectronicoPropietario= $dato['CorreoElectronicoPropietario'];
    $FechaLocalizacionPropietario = date('Y-m-d H:i:s', strtotime($dato['FechaLocalizacionPropietario']));
    $IdRelacionPropietario = $dato['IdRelacionPropietario'];
    $MotivoNoPago = $dato['MotivoNoPago'];
    $CantidadPago = $dato['CantidadPago'];
    $IdTipoDeudor = $dato['IdTipoDeudor'];
    $ProbabilidadPago = $dato['ProbabilidadPago'];
    $IdsQuejasReclamaciones = $dato['IdsQuejasReclamaciones'];
    $OtraQuejaReclamacion = $dato['OtraQuejaReclamacion'];
    $IdsExpectativasContribuyente = $dato['IdsExpectativasContribuyente'];
    $OtraExpectativaContribuyente = $dato['OtraExpectativaContribuyente'];
    $IdsCaracteristicasPredio = $dato['IdsCaracteristicasPredio'];
    $OtraCaracteristicaPredio = $dato['OtraCaracteristicaPredio'];
    $IdAccionSugerida = $dato['IdAccionSugerida'];	
    $IdUsoSueloPredio = $dato['IdUsoSueloPredio'];
    $IdTipoPredioPredio = $dato['IdTipoPredioPredio'];	
    $CallePredio = $dato['CallePredio'];
    $NumExtPredio = $dato['NumExtPredio'];	
    $NumIntPredio = $dato['NumIntPredio'];
    $ColoniaPredio = $dato['ColoniaPredio'];	
    $PoblacionPredio = $dato['PoblacionPredio'];	
    $CPPredio = $dato['CPPredio'];	
    $EntreCalle1Predio = $dato['EntreCalle1Predio'];	
    $EntreCalle2Predio = $dato['EntreCalle2Predio'];	
    $ManzanaPredio = $dato['ManzanaPredio'];
    $LotePredio = $dato['LotePredio'];
    $Manzana = $dato['Manzana'];
    $Lote = $dato['Lote'];
    $ReferenciaPredio = $dato['ReferenciaPredio'];
    $SolucionPlanteada = $dato['SolucionPlanteada'];	
    $FormaPago = $dato['FormaPago'];
    $ObservacionesGestor = $dato['ObservacionesGestor'];
    $idmotivonopago = $dato['idmotivonopago'];
    $idserviciosmotivonopago = $dato['idserviciosmotivonopago'];
    $Valido = $dato['Valido'];
    $Activo = $dato['Activo'];
    $idTipoServicio = $dato['idTipoServicio'];	
    $idEstatusToma = $dato['idEstatusToma'];	
    $idTipoToma	= $dato['idTipoToma'];
    $fechaSincronizacion =date('Y-m-d H:i:s', strtotime($dato['fechaSincronizacion']));
    $numeroMedidor = $dato['numeroMedidor']; 

                    
        $updateQuery = "UPDATE RegistroGestor SET Cuenta = '$Cuenta', Nombre = '$Nombre', TelefonoLocal ='$TelefonoLocal', TelefonoCelular ='$TelefonoCelular', TelefonoRadio = '$TelefonoRadio', CorreoElectronico = '$Correo', IdEstatus = '$IdEstatus', Observaciones = '$Observacion', FechaPromesaPago = '$FechaPromesa', Latitud = '$Latitud', Longitud = '$Longitud', FechaCaptura = '$FechaCaptura', Calle = '$Calle', NumExt = '$NumExt', NumInt = '$NumInt', Colonia = '$Colonia', Poblacion = '$Poblacion', CP = '$CP', Referencia = '$Referencia', EntreCalle1 = '$EntreCalle1', EntreCalle2 = '$EntreCalle2', ConDatos = '$ConDatos', ConDatosValidos = '$ConDatosValidos', IdAspUser = '$IdAspUser', IdTarea = '$idTarea', FechaAsignacion = '$FechaAsignacion', FechaVencimiento = '$FechaVencimiento', NombrePropietario = '$NombrePropietario', TelefonoLocalPropietario = '$TelefonoCelularPropietario', TelefonoCelularPropietario = '$TelefonoCelularPropietario', TelefonoRadioPropietario = '$TelefonoRadioPropietario', CorreoElectronicoPropietario = '$CorreoElectronicoPropietario', FechaLocalizacionPropietario = '$FechaLocalizacionPropietario', IdRelacionPropietario= '$IdRelacionPropietario', MotivoNoPago = '$MotivoNoPago',	CantidadPago = '$CantidadPago',	IdTipoDeudor ='$IdTipoDeudor',ProbabilidadPago='$ProbabilidadPago',	IdsQuejasReclamaciones = '$IdsQuejasReclamaciones', OtraQuejaReclamacion = '$OtraQuejaReclamacion',	IdsExpectativasContribuyente = '$IdsExpectativasContribuyente',	OtraExpectativaContribuyente = '$OtraExpectativaContribuyente',	IdsCaracteristicasPredio = '$IdsCaracteristicasPredio',	OtraCaracteristicaPredio = '$OtraCaracteristicaPredio',	IdAccionSugerida = '$IdAccionSugerida',	IdUsoSueloPredio = '$IdUsoSueloPredio',	IdTipoPredioPredio = '$IdTipoPredioPredio',	CallePredio	= '$CallePredio', NumExtPredio = '$NumExtPredio', NumIntPredio = '$NumIntPredio', ColoniaPredio = '$ColoniaPredio', PoblacionPredio = '$PoblacionPredio', CPPredio = '$CPPredio', EntreCalle1Predio = '$EntreCalle1Predio', EntreCalle2Predio = '$EntreCalle2Predio', ManzanaPredio = '$ManzanaPredio',	LotePredio='$LotePredio', Manzana = '$Manzana', Lote = '$Lote', ReferenciaPredio = '$ReferenciaPredio', SolucionPlanteada = '$SolucionPlanteada',	FormaPago = '$FormaPago', ObservacionesGestor = '$ObservacionesGestor', idmotivonopago = '$idmotivonopago', idserviciosmotivonopago = '$idserviciosmotivonopago',	Valido = '$Valido',	Activo = '$Activo',	idTipoServicio = '$idTipoServicio',	idEstatusToma =	'$idEstatusToma', idTipoToma = '$idTipoToma', fechaSincronizacion = '$fechaSincronizacion', numeroMedidor = '$numeroMedidor' WHERE IdRegistroGestor = '$id'";
    

               $updateQueryResult = sqlsrv_query ($cnx, $updateQuery);
                    if (!$updateQueryResult) die( print_r( sqlsrv_errors(), true));
                    
                    if($updateQueryResult){
                        
                        $deleteRegistro = "delete from RegistroGestorClone where IdRegistroGestor = '$id'";
                        $deleteRegistroResult = sqlsrv_query ($cnx, $deleteRegistro);
                        echo '<script>alert("Se Aprobo con exito")</script>';
                        echo '<meta http-equiv="refresh" content="0,url=inicio.php?findG='.$cuentaa.'&plz='.$plz.'">';
       
                    } else {
                        echo '<script>alert("No se pudo aprobar ")</script>';
                    }
                    
                }
/*-------------------Boton eliminar cambios----------------------- */
if(isset($_POST['eliminar'])){
      $id=$_GET['idGest'];
      $plz = $_GET['plz'];
      $cuenta = $_GET['cuenta'];
      
       $deleteRegistro = "delete from RegistroGestorClone where IdRegistroGestor = '$id'";
       $deleteRegistroResult = sqlsrv_query ($cnx, $deleteRegistro);
       if (!$deleteRegistroResult) die( print_r( sqlsrv_errors(), true));
       if($deleteRegistroResult){
            
           echo '<script>alert("Se Aprobo con exito")</script>';
           echo '<meta http-equiv="refresh" content="0,url=inicio.php?findG='.$cuenta.'&plz='.$plz.'">';
        } else {
            echo '<script>alert("No se pudo aprobar ")</script>';
        }     
  }


?>
<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cuenta Modificada Gestor</title>
    <link rel="icon" href="../icono/icon.png">
    <!-- Bootstrap -->
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link href="../fontawesome/css/all.css" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    
    <style>
        body {
            background-image: url(../img/back.jpg);
            background-repeat: repeat;
            background-size: 100%;
            overflow-x: hidden;
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
        }

        .padding {
            padding-right: 35%;
            padding-left: 35%;
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
                    <h4><i class="fa fa-list"></i> Cuentas Modificadas</h4>
                </div>
            </div>
        </div>
         <?php if(isset($dato)){ ?>
        <table class="table table-hover table-sm">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Cuenta</th>
                    <th scope="col">Tarea</th>
                    <th scope="col">Opciones</th>
                </tr>
            </thead>
            <tbody>
                <?php do{ // while( $row = sqlsrv_fetch_array( $queryResult, SQLSRV_FETCH_ASSOC) ) { ?>
                <tr>
                    <td><?php echo $dato['Cuenta'] ?></td>
                    <td value="<?php echo $dato['IdTarea'] ?>"><?php echo utf8_encode($dato['DescripcionTarea']) ?></td>

                    <td>
                        <form method="POST">

                            <input type="hidden" name="cuenta" value="<?php echo $dato['Cuenta'] ?>">
                            <input type="hidden" class="form-control border border-secondary" value="<?php echo $_GET['plz'] ?>" name="plz">
                            <input type="hidden" class="form-control border border-secondary" value="<?php echo $_GET['idGest'] ?>" name="id">
                            <a href="infoGestor.php?cuenta=<?php echo $dato['Cuenta'] ?>&plz=<?php echo $_GET['plz'] ?>&idGest=<?php echo $_GET['idGest'] ?>" class="btn btn-primary btn-sm openBtn2" name="info"><i class="fa fa-info" aria-hidden="true"></i></a>
                            <button type="submit" name="aceptar" class="btn btn-success btn-sm"><i class="fa fa-check" aria-hidden="true"></i></button>
                            <button type="submit" name="eliminar" class="btn btn-danger btn-sm"><i class="fa fa-times" aria-hidden="true"></i></button>
<!--                            <a href="update.php?cuenta=<?php //echo $dato['Cuenta'] ?>&plz=<?php //echo $_GET['plz'] ?>" class="btn btn-danger btn-sm" name="eliminar"><i class="fa fa-times" aria-hidden="true"></i></a>-->

                        </form>
                    </td>
                </tr>
            </tbody>

            <?php } while($cuenta = sqlsrv_fetch_array($queryResult)); ?>
        </table>
        <?php } ?>
        <br>




        <div style="text-align:center;">
            <a href="../cambiarTarea/inicio.php?findG=<?php echo $_GET['cuenta'] ?>&plz=<?php echo $_GET['plz'] ?>" class="btn btn-dark btn-sm"><i class="fas fa-times"></i> Regresar</a>
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