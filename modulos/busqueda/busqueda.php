<?php
require "../../acnxerdm/conect.php";

if(isset($_POST['buscar'])){
    $cuenta=$_POST['palabra'];
    $plz=$_POST['plaza'];
        echo '<meta http-equiv="refresh" content="0,url=busqueda.php?find='.$cuenta.'&plz='.$plz.'">';
}

if(isset($_GET['find'])){
    $buscar=$_GET['find'];
    
    $consulta = "select * from EstatusPadron where cuenta='$buscar'";
    $consultaResult = sqlsrv_query($cnx, $consulta);
    $row=sqlsrv_fetch_array($consultaResult);
    
    if(isset($_POST['actualizarInfo'])){
        
    $Cuenta = $_POST['cuenta'];
    $Propietario = $_POST['propietario'];
    $Expediente = $_POST['expediente'];
    $cuentaUnificada = $_POST['cuentaUnificada'];
    $Calle = $_POST['calle'];
    $NumExt= $_POST['numeroExterior'];
    $NumInt = $_POST['numeroInterior'];
    $Colonia = $_POST['colonia'];
    $Poblacion = $_POST['poblacion'];
    $CP = $_POST['cp'];
    $TipoServicio = $_POST['tipoServicio'];
    $Giro = $_POST['giro'];
    $SerieMedidor = $_POST['serieDelMedidor'];
    $Manzana = $_POST['manzana'];
    $Lote= $_POST['lote'];
    $Efectos = $_POST['efectos'];  
    $TotalPagado = $_POST['totalPagado'];
    $DeudaTotal = $_POST['deudaTotal'];
    $FechaUltimoPago = date('Y-m-d H:i:s', strtotime($_POST['fechaUltimoPago']));
    $FechaActualizacion = date('Y-m-d H:i:s', strtotime($_POST['fechaActualizacion']));
    $Rango = $_POST['rango'];
    $Latitud = $_POST['latitud'];
    $Longitud= $_POST['longitud'];
    $EntreCalle1 = $_POST['entreCalle1'];
    $EntreCalle2 = $_POST['entreCalle2'];
        
        
    $updateEP = "UPDATE EstatusPadron2 SET cuenta = '$Cuenta', propietario = '$Propietario',calle = '$Calle', num_ext = '$NumExt', num_int = '$NumInt', colonia = '$Colonia', 
    poblacion = '$Poblacion', cp = '$CP', tipo_servicio = '$TipoServicio', giro = '$Giro', serie_medidor = '$SerieMedidor', manzana = '$Manzana', lote = '$Lote', 
    efectos = '$Efectos', total_pagado = '$TotalPagado', deuda_total= '$DeudaTotal', fecha_ultimo_pago = convert(date,'$FechaUltimoPago'), fecha_actualizacion = convert(date, '$FechaActualizacion'), rango = '$Rango', latitud = '$Latitud', longitud = '$Longitud', entre_calle_1 = '$EntreCalle1', entre_calle_2 = '$EntreCalle2' WHERE  cuenta = '$Cuenta'";
    $updateEPQueryResult = sqlsrv_query ($cnx, $updateEP);
    if (!$updateEPQueryResult) die( print_r( sqlsrv_errors(), true));
    if($updateEPQueryResult){
            echo '<script>alert("Se actualizo la informacion")</script>';
       
        } else {
            echo '<script>alert("No se pudo actualizar")</script>';
               }
    }
    
////////////////////////////////////////////////////////////////////////////////////////
    
    $domicilioNoti= "select * from DomiciliosNotificacion where cuenta='$buscar'";
    $domicilioNotiResult = sqlsrv_query($cnx, $domicilioNoti);
    $DN=sqlsrv_fetch_array($domicilioNotiResult);
    
     if(isset($_POST['actualizarDN'])){
    

    $CalleNotificacion = $_POST['calleNotificacion'];
    $numExtN = $_POST['numExtNoti'];
    $numIntN = $_POST['numIntNoti'];
    $coloniaN = $_POST['coloniaNotificacion'];
    $poblacionN = $_POST['poblacionNotificacion'];
    $cpN= $_POST['cpNoti'];
    $entreCalle1 = $_POST['entreCalle1'];
    $entreCalle2 = $_POST['entreCalle2'];
    $loteN = $_POST['loteNoti'];
    $manzanaN = $_POST['manzanaNoti'];
    $referenciaN = $_POST['referencia'];
    $otroDomN= $_POST['otroDomicilioNoti'];
										
    $updateDN = "UPDATE DomiciliosNotificacion SET CalleNotificacion = '$CalleNotificacion', 
    NumExtNotificacion = '$numExtN', NumIntNotificacion ='$numIntN', ColoniaNotificacion ='$coloniaN', 
    PoblacionNotificacion ='$poblacionN', CPNotificacion ='$cpN', EntreCalle1 ='$entreCalle1', 
    EntreCalle2 ='$entreCalle2', LoteNotificacion ='$loteN', ManzanaNotificacion ='$manzanaN' WHERE Cuenta = '$buscar'"; 
        
    $updateDNResult = sqlsrv_query ($cnx, $updateDN);
     if (!$updateDNResult) die( print_r( sqlsrv_errors(), true));
         if($updateDNResult){
            echo '<script>alert("Se actualizo la informacion")</script>';
       
        } else {
            echo '<script>alert("No se pudo actualizar")</script>';
               }
    }
////////////////////////////////////////////////////////////////////////////////////////
    
    $contacto= "select * from ContactosCuenta where cuenta='$buscar'";
    $contactoResult = sqlsrv_query($cnx, $contacto);
    $Cont=sqlsrv_fetch_array($contactoResult);
    
    
      if(isset($_POST['actualizarCC'])){
    

    $telefonoLocal= $_POST['telefonoLocal'];
    $TelefonoCelular = $_POST['telefonoCelular'];
    $TelefonoRadio = $_POST['telefonoRadio'];
    $CorreoElectronico = $_POST['correoElectronico'];
    $TelefonoLocalUsuario = $_POST['telefonoLocalUsuario'];
    $TelefonoCelularUsuario= $_POST['telefonocelularUsuario'];
    $TelefonoRadioUsuario= $_POST['telefonoRadioUsuario'];
    $CorreoElectronicoUsuario = $_POST['correoElectronicoUsuario'];
    $ObservacionTelefonoLocal = $_POST['observacionTelefonoLocal'];
    $ObservacionTelefonoCelular = $_POST['observacionTelefonoCelular'];
    $ObservaciontelefonoRadio = $_POST['observacionTelefonoRadio'];
    $ObservacionCorreoElectronico = $_POST['observacionCorreoElectronico'];
          
  
    $updateCC = "UPDATE ContactosCuenta SET TelefonoLocal = '$telefonoLocal', TelefonoCelular = '$TelefonoCelular', TelefonoRadio = '$TelefonoRadio',
    CorreoElectronico ='$CorreoElectronico', TelefonoLocalUsuario = '$TelefonoLocalUsuario', TelefonoCelularUsuario = '$TelefonoCelularUsuario',
    TelefonoRadioUsuario = '$TelefonoRadioUsuario', CorreoElectronicoUsuario = '$CorreoElectronicoUsuario', ObservacionesTelefonoLocal ='$ObservacionTelefonoLocal', 
    ObservacionesTelefonoCelular = '$ObservacionTelefonoCelular', ObservacionesTelefonoRadio = '$ObservaciontelefonoRadio', ObservacionesCorreoElectronico = '$ObservacionCorreoElectronico'
    WHERE Cuenta = '$buscar'";
          
        
    $updateCCResult = sqlsrv_query ($cnx, $updateCC);
     if (!$updateCCResult) die( print_r( sqlsrv_errors(), true));
         if($updateCCResult){
            echo '<script>alert("Se actualizo la informacion")</script>';
       
        } else {
            echo '<script>alert("No se pudo actualizar")</script>';
               }
    }
////////////////////////////////////////////////////////////////////////////////////////
    $valoresCatastrales= "select * from ValoresCatastrales where cuenta='$buscar'";
    $valoresCatastralesResult = sqlsrv_query($cnx, $valoresCatastrales);
    $VC=sqlsrv_fetch_array($valoresCatastralesResult);
    
    
      if(isset($_POST['actualizarVC'])){
    

    $superficieTerrenoH= $_POST['superficieTerrenoH'];
    $superficieConstruccionH = $_POST['SuperficieConstruccionH'];
    $EstatusLegal = $_POST['estatusLegal'];
    $ValorConstruccionH = $_POST['valorConstruccionH'];
    $ValorcatastralH = $_POST['valosCatastralH'];
    $SuperficieterrenoValuado= $_POST['superficieTerrenoValuado'];
    $SuperficieConstruccionvaluado = $_POST['superficieConstruccionValuado'];
    $ValorTerrenoValuado = $_POST['valorTerrenoValuado'];
    $ValorConstruccionValuado = $_POST['valorConstruccionValuado'];
    $ValorCatastralValuado = $_POST['valorCatastralValuado'];

          
          
    $updateVC= "UPDATE ValoresCatastrales SET SupTerrenoH = '$superficieTerrenoH', SupConstruccionH ='$superficieConstruccionH',
    ValorConstruccionH ='$ValorConstruccionH',   ValorCatastralH ='$ValorcatastralH', SupTerrenoValuado ='$SuperficieterrenoValuado',
    SupConstruccionValuado ='$SuperficieConstruccionvaluado', ValorTerrenoValuado ='$ValorTerrenoValuado', ValorConstruccionValuado ='$ValorConstruccionValuado', 
    ValorCatastralValuado ='$ValorCatastralValuado' WHERE Cuenta = '$buscar'";
          
    $updateVCResult = sqlsrv_query ($cnx, $updateVC);
     if (!$updateVCResult) die( print_r( sqlsrv_errors(), true));
         if($updateVCResult){
            echo '<script>alert("Se actualizo la informacion")</script>';
       
        } else {
            echo '<script>alert("No se pudo actualizar")</script>';
               }
    }
          
////////////////////////////////////////////////////////////////////////////////////////
    $adeudos= "select * from Adeudos where Cuenta='$buscar'";
    $adeudosResult = sqlsrv_query($cnx, $adeudos);
    $ADE=sqlsrv_fetch_array($adeudosResult);
    
    
     if(isset($_POST['actualizarAD'])){
    
         $SaldoCorriente = $_POST['saldoCorriente']; 
         $SaldoAtraso = $_POST['saldoAtraso'];
         $SaldoRezago = $_POST['saldoRezago'];
         $RecargosAcum = $_POST['recargosAcum'];
         $sConvenioAgua = $_POST['sConvenioAgua'];
         $convenioVencido = $_POST['convenioVencido'];
         $RecargosConvenio = $_POST['recargosConvenio'];
         $sConvenioObra = $_POST['sConvenioObra'];
         $ContratoVencido = $_POST['contratoVencido'];
         $RecargosContrato = $_POST['recargosContrato'];
         $Gastos = $_POST['gastos'];
         $Multas = $_POST['multas'];
         $MultasOtros = $_POST['multasOtros'];
         $Impuestos = $_POST['impuestos'];
         $Fomento = $_POST['fomento'];
         $Actualizacion= $_POST['actualizacion'];
         $Recargos = $_POST['recargos'];
         $FechaActualizacion= date('Y-m-d H:i:s', strtotime($_POST['fechaActualizacion']));
         $FechaUltimo = date('Y-m-d H:i:s', strtotime($_POST['fechaUltimoPago']));
         $Total = $_POST['total'];
         $Efectos = $_POST['efectos'];
         
         											

         
         $updateAD= "UPDATE Adeudos SET SaldoCorriente = '$SaldoCorriente', SaldoAtraso ='$SaldoAtraso', SaldoRezago ='$SaldoRezagom', RecargosAcum='$RecargosAcum', 
         SConvenioAgua='$sConvenioAgua', VencidoConvenio ='$convenioVencido', RecargosConvenio='$RecargosConvenio', SConvenioObra ='$sConvenioObra',
         VencidoContrato ='$ContratoVencido', RecargosContrato ='$RecargosContrato', GastosEj='$Gastos', Multas ='$Multas', MultasOtros ='$MultasOtros',
         Impuesto ='$Impuestos', Fomento ='$Fomento', Actualizacion ='$Actualizacion', Recargos ='$Recargos', FechaActualizacion = convert(date, '$FechaActualizacion'),
         FechaUltimoPago = convert(date, '$FechaUltimo'), Total ='$Total', ='$Efectos' WHERE Cuenta = '$buscar'";
          
        $updateADResult = sqlsrv_query ($cnx, $updateVC);
        if (!$updateADResult) die( print_r( sqlsrv_errors(), true));
        if($updateADResult){
            echo '<script>alert("Se actualizo la informacion")</script>';
       
        } else {
            echo '<script>alert("No se pudo actualizar")</script>';
               }
    }
////////////////////////////////////////////////////////////////////////////////////////
    $pagos= "select * from Pagos where Cuenta='$buscar'";
    $pagosResult = sqlsrv_query($cnx, $pagos);
    $PA=sqlsrv_fetch_array($pagosResult);
 ////////////////////////////////////////////////////////////////////////////////////////
    $tarea = "select RegistroGestor.*, CatalogoTareas.DescripcionTarea, AspNetUsers.Nombre from RegistroGestor
    inner join CatalogoTareas on CatalogoTareas.IdTarea=RegistroGestor.IdTarea
	inner join AspNetUsers on AspNetUsers.Id=RegistroGestor.IdAspUser
    where Cuenta = '$buscar'";
    $tareaResult = sqlsrv_query($cnx, $tarea);
    $TareaR=sqlsrv_fetch_array($tareaResult);
    
    $tareaPendi = "select AsignacionGestor.*, CatalogoTareas.DescripcionTarea, AspNetUsers.Nombre from AsignacionGestor
    inner join CatalogoTareas on CatalogoTareas.IdTarea=AsignacionGestor.IdTarea
	inner join AspNetUsers on AspNetUsers.Id=AsignacionGestor.IdAspUser
    where Cuenta = '$buscar'";
    $tareaPendiResult = sqlsrv_query($cnx, $tareaPendi);
    $TareaP=sqlsrv_fetch_array($tareaPendiResult);
    
    
 ////////////////////////////////////////////////////////////////////////////////////////
    $foto = "select registrofotomovil.*, CatalogoTareas.DescripcionTarea, AspNetUsers.Nombre from registrofotomovil
    inner join CatalogoTareas on CatalogoTareas.IdTarea=registrofotomovil.IdTarea
	inner join AspNetUsers on AspNetUsers.Id=registrofotomovil.IdAspUser
    where Cuenta = '$buscar'";
    $fotoResult = sqlsrv_query($cnx, $foto);
    $Fotos = sqlsrv_fetch_array($fotoResult);
/////////////////////////////////////////////////////////////////////////////////////////
       if(isset($_POST['actualizarLegal'])){
    
     											
        $Cuenta= $_POST['cuenta'];
        $TPropietario = $_POST['tipoPropietario'];
        $FechaPartida = $_POST['fechaPartida'];
        $Libro = $_POST['libro'];
        $Tomo = $_POST['tomo'];
        $Foja = $_POST['foja'];
        $Escritura = $_POST['escritura'];
        $FolioMercantil = $_POST['folioMercantil'];
        $FolioReal = $_POST['folioReal'];
        $FolioAuxiliar = $_POST['folioAuxiliar'];
        $CoPropietario = $_POST['coPropietario'];
        $Gravamenes = $_POST['gravamenes'];
        $AnotacionesMarginales = $_POST['anotacionesMarginales'];
        $MedidasSuperficie = $_POST['medidasSuperficie'];
        $Observaciones = $_POST['observaciones'];
        $NombrePropietario = $_POST['nombrePropietario'];
        $TipoSociedad = $_POST['tipoSociedad'];
        $TipoFideicomiso = $_POST['tipoFideicomiso'];
        $DeudaTotal = $_POST['deudaTotal'];
        $Fideicomisario = $_POST['fideicomisario'];
        $Fideicomitente = $_POST['fideicomitente'];
        $IntitucionFiduciaria = $_POST['institucionFiduciaria'];
        $DomicilioFideicomitente = $_POST['domicilioFideicomitente'];
        $DomicilioInstitucionFiduciaria = $_POST['domicilioInstitucionFiduciaria'];
        $DomicilioFideicomisario = $_POST['domicilioFideicomisario'];
        $Duracion = $_POST['duracion'];
        $Partida = $_POST['partida'];
        $Seccion = $_POST['seccion'];
        $Folio = $_POST['folio'];
        $Inscripcion = $_POST['inscripcion'];
        $DescripcionInmueble = $_POST['descripcionInmueble'];
        $FechaBusqueda = $_POST['fechaBusqueda'];
         
           
           
        $updateLegal = "UPDATE RegistroRPPC SET Cuenta='$Cuenta',idAspUser='',FolioReal='',Accion='',FechaBusqueda='$FechaBusqueda',FechaCaptura='',idpropietario='',tiporegistro='',libro='$Libro',tomo='$Tomo', foja='$Foja',escritura='$Escritura',FolioMercantil='$FolioMercantil',FolioAuxiliar='$FolioAuxiliar',Copropietario='$CoPropietario',Gravamenes='$Gravamenes',AnotacionesMarginales='$AnotacionesMarginales', MedidasSuperficies='$MedidasSuperficie',Observaciones='$Observaciones',NombrePropietario='$NombrePropietario',TipoSociedad='$TipoSociedad',TipoFideicomiso='$TipoFideicomiso',ObjetoFideicomiso='', Fideicomomisario='$Fideicomisario',Fideicomitente='$Fideicomitente',InstitucionFiduciaria='$IntitucionFiduciaria',DomicilioFideicomitente='$DomicilioFideicomitente', DomicilioInstitucionFiduciaria='$DomicilioInstitucionFiduciaria',DomicilioFideicomisario='$DomicilioFideicomisario',Duracion='$Duracion',FechaDePartida='$FechaPartida', Partida='$Partida',Seccion='$Seccion',folio='$Folio',Fecha='',inscripcion='$Inscripcion',descripcionInmueble = '$DescripcionInmueble' WHERE Cuenta= '$buscar'";
          
        $updateLegalResult = sqlsrv_query ($cnx, $updateLegal);
        if (!$updateLegalResult) die( print_r( sqlsrv_errors(), true));
        if($updateLegalResult){
            echo '<script>alert("Se actualizo la informacion")</script>';
       
        } else {
            echo '<script>alert("No se pudo actualizar")</script>';
               }
    }

    

}
?>

<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Busqueda</title>
    <link rel="icon" href="../icono/implementtaIcon.png">
    <!-- Bootstrap -->
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link href="../fontawesome/css/all.css" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css">
    <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <style>
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


        #info {
            height: 90vh;
            margin-right: 50px;
            margin-left: 100px;

        }

        #tareas {
            margin-left: 6%;
            margin-right: 6%;
        }

        #fotos {
            margin-left: 5%;
            margin-right: 5%;
        }

        h1 {
            text-align: center;
        }

        #gestiones {
            margin-right: 100px;
            margin-left: 100px;

        }

        .check {
            justify-content: center;
        }

        html,
        body {
            height: 100%;
            margin: 0;
            padding: 0;
        }
        #map,
        #pano {
            float: left;
            height: 100%;
            width: 50%;
        }

    </style>
    <?php require "include/nav.php"; ?>
</head>

<body>
    <div class="fondo">
        <div class="area"></div>
        <section id="info">
            <div class="row busq">
                <form method="POST" action="busqueda.php">
                    <div class="input-group col-md-15 justify-content-center">
                        <div class="input-group-prepend">
                            <button type="submit" name="buscar" class="btn btn-primary btn-sm"><i class="fas fa-search"></i></button>
                        </div>
                        <input type="text" class="form-control border border-secondary" placeholder="Buscar nombre o usuario" name="palabra" required autofocus>
                        <input type="hidden" class="form-control border border-secondary" value="<?php echo $_GET['plz'] ?>" name="plaza">
                    </div>
                </form>
            </div>
           
           
           
           
           
<?php if(isset($_GET['find'])){ ?>
           
           
           
           
            <div class="row-xl-10">
                <!--<i class="fa fa-user"></i>-->
                <ul class="nav nav-pills mb-3 justify-content-center" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="home-tab" data-toggle="tab" data-target="#info" type="button" role="tab" aria-controls="info" aria-selected="true">Informacion de la cuenta <i class="fa fa-user"></i></button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="profile-tab" data-toggle="tab" data-target="#dnoti" type="button" role="tab" aria-controls="dnoti" aria-selected="false">Domicilio de Notificacion
                            <i class="fa fa-home" aria-hidden="true"></i></button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="contact-tab" data-toggle="tab" data-target="#contacto" type="button" role="tab" aria-controls="contacto" aria-selected="false">Contacto
                            <i class="fa fa-phone" aria-hidden="true"></i></button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="contact-tab" data-toggle="tab" data-target="#valoresC" type="button" role="tab" aria-controls="valoresC" aria-selected="false">Valores Catastrales
                            <i class="fa fa-map-marker" aria-hidden="true"></i></button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="contact-tab" data-toggle="tab" data-target="#adeudos" type="button" role="tab" aria-controls="adeudos" aria-selected="false">Adeudos
                            <i class="fa fa-university" aria-hidden="true"></i></button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="contact-tab" data-toggle="tab" data-target="#pagos" type="button" role="tab" aria-controls="pagos" aria-selected="false">Pagos
                        </button>
                    </li>
                </ul>
                <br>
                <!--------------------------------------------------------------------------------------------------->
                <form method="post">
                    <div class="tab-content" id="myTabContent">

                        <div class="tab-pane fade show active" id="info" role="tabpanel" aria-labelledby="home-tab">

                            <div class="jumbotron">
                                <div class="form-row">
                                    <div class="col-sm-2">
                                        <div class="md-form form-group">
                                            <label for="exampleInputEmail1">Cuenta: *</label>
                                            <input type="text" class="form-control" name="cuenta" value="<?php echo $row['cuenta']?>">
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="md-form form-group">
                                            <label for="exampleInputEmail1">Clave: *</label>
                                            <input type="text" class="form-control" name="clave" value="<?php //echo $row['']?>">
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="md-form form-group">
                                            <label for="exampleInputEmail1">Propietario: *</label>
                                            <input type="text" class="form-control" name="propietario" value="<?php echo $row['propietario']?>">
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="md-form form-group">
                                            <label for="exampleInputEmail1">Expediente: *</label>
                                            <input type="text" class="form-control" name="expediente" value="<?php //echo $row['']?>">
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="md-form form-group">
                                            <label for="exampleInputEmail1">Cuenta unificada: *</label>
                                            <input type="text" class="form-control" name="cuentaUnificada" value="<?php //echo $row['']?>">
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="md-form form-group">
                                            <label for="exampleInputEmail1">Calle: *</label>
                                            <input type="text" class="form-control" name="calle" value="<?php echo $row['calle']?>">
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="md-form form-group">
                                            <label for="exampleInputEmail1">Numero Exterior: *</label>
                                            <input type="text" class="form-control" name="numeroExterior" value="<?php echo $row['num_ext']?>">
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="md-form form-group">
                                            <label for="exampleInputEmail1">Numero Interior: *</label>
                                            <input type="text" class="form-control" name="numeroInterior" value="<?php echo $row['num_int']?>">
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="md-form form-group">
                                            <label for="exampleInputEmail1">Colonia: *</label>
                                            <input type="text" class="form-control" name="colonia" value="<?php echo $row['colonia']?>">
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="md-form form-group">
                                            <label for="exampleInputEmail1">Poblacion: *</label>
                                            <input type="text" class="form-control" name="poblacion" value="<?php echo $row['poblacion']?>">
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="md-form form-group">
                                            <label for="exampleInputEmail1">Codigo Postal: *</label>
                                            <input type="text" class="form-control" name="cp" value="<?php echo $row['cp']?>">
                                        </div>
                                    </div>
                                    <div class="col-sm-2">
                                        <div class="md-form form-group">
                                            <label for="exampleInputEmail1">Tipo de servicio: *</label>
                                            <input type="text" class="form-control" name="tipoServicio" value="<?php echo $row['tipo_servicio']?>">
                                        </div>
                                    </div>
                                    <div class="col-sm-2">
                                        <div class="md-form form-group">
                                            <label for="exampleInputEmail1">Giro: *</label>
                                            <input type="text" class="form-control" name="giro" value="<?php echo $row['giro']?>">
                                        </div>
                                    </div>
                                    <div class="col-sm-2">
                                        <div class="md-form form-group">
                                            <label for="exampleInputEmail1">Serie del medidor: *</label>
                                            <input type="text" class="form-control" name="serieDelMedidor" value="<?php echo $row['serie_medidor']?>">
                                        </div>
                                    </div>

                                    <div class="col-md-2">
                                        <div class="md-form form-group">
                                            <label for="exampleInputEmail1">Manzana: *</label>
                                            <input type="text" class="form-control" name="manzana" value="<?php echo $row['manzana']?>">
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="md-form form-group">
                                            <label for="exampleInputEmail1">Lote: *</label>
                                            <input type="text" class="form-control" name="lote" value="<?php echo $row['lote']?>">
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="md-form form-group">
                                            <label for="exampleInputEmail1">Efectos: *</label>
                                            <input type="text" class="form-control" name="efectos" value="<?php echo $row['efectos']?>">
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="md-form form-group">
                                            <label for="exampleInputEmail1">Total pagado: *</label>
                                            <input type="text" class="form-control" name="totalPagado" value="<?php echo $row['total_pagado']?>">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="md-form form-group">
                                            <label for="exampleInputEmail1">Deuda Total: *</label>
                                            <input type="text" class="form-control" name="deudaTotal" value="<?php echo $row['deuda_total']?>">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="md-form form-group">
                                            <label for="exampleInputEmail1">Fecha de ultimo pago: *</label>
                                            <?php
                                                if($row['fecha_ultimo_pago']<>NULL){
                                                $fechaultimo = $row['fecha_ultimo_pago']->format('Y-m-d H:i:s'); ?>
                                            <input type="datetime-local" class="form-control" name="fechaUltimoPago" value="<?php echo $fechaultimo ?>">
                                            <?php } else{ ?>
                                            <input type="datetime-local" class="form-control" name="fechaUltimoPago" placeholder="Fecha de ultimo pago">
                                            <?php } ?>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="md-form form-group">
                                            <label for="exampleInputEmail1">Fecha Actualizacion: *</label>
                                            <?php
                                                if($row['fecha_actualizacion']<>NULL){
                                                $fechaultimo = $row['fecha_actualizacion']->format('Y-m-d H:i:s'); ?>
                                            <input type="datetime-local" class="form-control" name="fechaActualizacion" value="<?php echo $fechaultimo ?>">
                                            <?php } else{ ?>
                                            <input type="datetime-local" class="form-control" name="fechaActualizacion" placeholder="Fecha de ultimo pago">
                                            <?php } ?>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="md-form form-group">
                                            <label for="exampleInputEmail1">Rango: *</label>
                                            <input type="text" class="form-control" name="rango" value="<?php echo $row['rango']?>">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="md-form form-group">
                                            <label for="exampleInputEmail1">Latitud: *</label>
                                            <input type="text" class="form-control" id="txtLatitud" name="latitud" value="<?php echo $row['latitud']?>">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="md-form form-group">
                                            <label for="exampleInputEmail1">Longitud: *</label>
                                            <input type="text" class="form-control" id="txtLongitud" name="longitud" value="<?php echo $row['longitud']?>">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="md-form form-group">
                                            <label for="exampleInputEmail1">Entre calle 1: *</label>
                                            <input type="text" class="form-control" name="entreCalle1" value="<?php echo utf8_encode($row['entre_calle_1'])?>">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="md-form form-group">
                                            <label for="exampleInputEmail1">Entre calle 2: *</label>
                                            <input type="text" class="form-control" name="entreCalle2" value="<?php echo utf8_encode($row['entre_calle_1'])?>">
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" name="actualizarInfo" class="btn btn-primary btn-sm">Guardar<i class="fa fa-eraser" aria-hidden="true"></i></button>
                            </div>
                        </div>
                        <!---------------------------->
                        <div class="tab-pane fade" id="dnoti" role="tabpanel" aria-labelledby="profile-tab">
                            <div class="jumbotron">
                                <div class="form-row">
                                    <div class="col-sm-3">
                                        <div class="md-form form-group">
                                            <label for="exampleInputEmail1">Calle Notificacion: *</label>
                                            <input type="text" class="form-control" name="calleNotificacion" value="<?php echo $DN['CalleNotificacion']?>">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="md-form form-group">
                                            <label for="exampleInputEmail1">Numero Ext Notificacion: *</label>
                                            <input type="text" class="form-control" name="numExtNoti" value="<?php echo $DN['NumExtNotificacion']?>">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="md-form form-group">
                                            <label for="exampleInputEmail1">Numero Int Notificacion: *</label>
                                            <input type="text" class="form-control" name="numIntNoti" value="<?php echo $DN['NumIntNotificacion']?>">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="md-form form-group">
                                            <label for="exampleInputEmail1">Colonia Notificacion: *</label>
                                            <input type="text" class="form-control" name="coloniaNotificacion" value="<?php echo $DN['ColoniaNotificacion']?>">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="md-form form-group">
                                            <label for="exampleInputEmail1">Poblacion Notificacion: *</label>
                                            <input type="text" class="form-control" name="poblacionNotificacion" value="<?php echo $DN['PoblacionNotificacion']?>">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="md-form form-group">
                                            <label for="exampleInputEmail1">CP Notificacion: *</label>
                                            <input type="text" class="form-control" name="cpNoti" value="<?php echo $DN['CPNotificacion']?>">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="md-form form-group">
                                            <label for="exampleInputEmail1">Entre calle 1: *</label>
                                            <input type="text" class="form-control" name="entreCalle1" value="<?php echo $DN['EntreCalle1']?>">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="md-form form-group">
                                            <label for="exampleInputEmail1">Entre Calle 2: *</label>
                                            <input type="text" class="form-control" name="entreCalle2" value="<?php echo $DN['EntreCalle2']?>">
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="md-form form-group">
                                            <label for="exampleInputEmail1">Lote Notificacion: *</label>
                                            <input type="text" class="form-control" name="loteNoti" value="<?php echo $DN['LoteNotificacion']?>">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="md-form form-group">
                                            <label for="exampleInputEmail1">Manzana Notificacion: *</label>
                                            <input type="text" class="form-control" name="manzanaNoti" value="<?php echo $DN['ManzanaNotificacion']?>">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="md-form form-group">
                                            <label for="exampleInputEmail1">Referencia: *</label>
                                            <input type="text" class="form-control" name="referencia" value="<?php echo $DN['Referencia']?>">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="md-form form-group">
                                            <label for="exampleInputEmail1">Otro domicilio de Notificacion: *</label>
                                            <input type="text" class="form-control" name="otroDomicilioNoti" value="<?php //echo $DN['']?>">
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" name="actualizarDN" class="btn btn-primary btn-sm">Guardar<i class="fa fa-eraser" aria-hidden="true"></i></button>
                            </div>
                        </div>
                        <!---------------------------->
                        <div class="tab-pane fade" id="contacto" role="tabpanel" aria-labelledby="contact-tab">
                            <div class="jumbotron">
                                <div class="form-row">
                                    <div class="col-md-3">
                                        <div class="md-form form-group">
                                            <label for="exampleInputEmail1">Telefono Local: *</label>
                                            <input type="text" class="form-control" name="telefonoLocal" value="<?php echo $Cont['TelefonoLocal']?>">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="md-form form-group">
                                            <label for="exampleInputEmail1">Telefono Celular: *</label>
                                            <input type="text" class="form-control" name="telefonoCelular" value="<?php echo $Cont['TelefonoCelular']?>">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="md-form form-group">
                                            <label for="exampleInputEmail1">Telefono Radio: *</label>
                                            <input type="text" class="form-control" name="telefonoRadio" value="<?php echo $Cont['TelefonoRadio']?>">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="md-form form-group">
                                            <label for="exampleInputEmail1">Correo Electronico: *</label>
                                            <input type="text" class="form-control" name="correoElectronico" value="<?php echo $Cont['CorreoElectronico']?>">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="md-form form-group">
                                            <label for="exampleInputEmail1">Telefono Local Usuario: *</label>
                                            <input type="text" class="form-control" name="telefonoLocalUsuario" value="<?php echo $Cont['TelefonoLocalUsuario']?>">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="md-form form-group">
                                            <label for="exampleInputEmail1">Telefono Celular Usuario: *</label>
                                            <input type="text" class="form-control" name="telefonocelularUsuario" value="<?php echo $Cont['TelefonoCelularUsuario']?>">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="md-form form-group">
                                            <label for="exampleInputEmail1">Telefono Radio Usuario: *</label>
                                            <input type="text" class="form-control" name="telefonoRadioUsuario" value="<?php echo $Cont['TelefonoRadioUsuario']?>">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="md-form form-group">
                                            <label for="exampleInputEmail1">Correo Electronico usuario: *</label>
                                            <input type="text" class="form-control" name="correoElectronicoUsuario" value="<?php echo $Cont['CorreoElectronicoUsuario']?>">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="md-form form-group">
                                            <label for="exampleInputEmail1">Observacion Telefono Local: *</label>
                                            <input type="text" class="form-control" name="observacionTelefonoLocal" value="<?php echo $Cont['ObservacionesTelefonoLocal']?>">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="md-form form-group">
                                            <label for="exampleInputEmail1">Observacion Telefono Celular: *</label>
                                            <input type="text" class="form-control" name="observacionTelefonoCelular" value="<?php echo $Cont['ObservacionesTelefonoCelular']?>">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="md-form form-group">
                                            <label for="exampleInputEmail1">Observacion Telefono Radio: *</label>
                                            <input type="text" class="form-control" name="observacionTelefonoRadio" value="<?php echo $Cont['ObservacionesTelefonoRadio']?>">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="md-form form-group">
                                            <label for="exampleInputEmail1">Observacion Correo Electronico: *</label>
                                            <input type="text" class="form-control" name="observacionCorreoElectronico" value="<?php echo $Cont['ObservacionesCorreoElectronico']?>">
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" name="actualizarCC" class="btn btn-primary btn-sm">Guardar<i class="fa fa-eraser" aria-hidden="true"></i></button>
                            </div>
                        </div>
                        <!---------------------------->
                        <div class="tab-pane fade" id="valoresC" role="tabpanel" aria-labelledby="contact-tab">
                            <div class="jumbotron">
                                <div class="form-row">
                                    <div class="col-sm-3">
                                        <div class="md-form form-group">
                                            <label for="exampleInputEmail1">Superficie Terreno H: *</label>
                                            <input type="text" class="form-control" name="superficieTerrenoH" value="<?php echo $VC['SupTerrenoH']?>">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="md-form form-group">
                                            <label for="exampleInputEmail1">Superficie Construccion H: *</label>
                                            <input type="text" class="form-control" name="SuperficieConstruccionH" value="<?php echo $VC['SupConstruccionH']?>">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="md-form form-group">
                                            <label for="exampleInputEmail1">Valor Terreno H: *</label>
                                            <input type="text" class="form-control" name="estatusLegal" value="<?php echo $VC['ValorTerrenoH']?>">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="md-form form-group">
                                            <label for="exampleInputEmail1">Valor Construccion H: *</label>
                                            <input type="text" class="form-control" name="valorConstruccionH" value="<?php echo $VC['ValorConstruccionH']?>">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="md-form form-group">
                                            <label for="exampleInputEmail1">Valor Catastral H: *</label>
                                            <input type="text" class="form-control" name="valosCatastralH" value="<?php echo $VC['ValorCatastralH']?>">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="md-form form-group">
                                            <label for="exampleInputEmail1">Superficie Terreno Valuado: *</label>
                                            <input type="text" class="form-control" name="superficieTerrenoValuado" value="<?php echo $VC['SupTerrenoValuado']?>">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="md-form form-group">
                                            <label for="exampleInputEmail1">Superficie Construccion Valuado: *</label>
                                            <input type="text" class="form-control" name="superficieConstruccionValuado" value="<?php echo $VC['SupConstruccionValuado']?>">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="md-form form-group">
                                            <label for="exampleInputEmail1">Valor Terreno Valuado: *</label>
                                            <input type="text" class="form-control" name="valorTerrenoValuado" value="<?php echo $VC['ValorTerrenoValuado']?>">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="md-form form-group">
                                            <label for="exampleInputEmail1">Valor Construccion Valuado: *</label>
                                            <input type="text" class="form-control" name="valorConstruccionValuado" value="<?php echo $VC['ValorConstruccionValuado']?>">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="md-form form-group">
                                            <label for="exampleInputEmail1">Valor catastral Valuado: *</label>
                                            <input type="text" class="form-control" name="valorCatastralValuado" value="<?php echo $VC['ValorCatastralValuado']?>">
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" name="actualizarVC" class="btn btn-primary btn-sm">Guardar<i class="fa fa-eraser" aria-hidden="true"></i></button>
                            </div>
                        </div>
                        <!---------------------------->
                        <div class="tab-pane fade" id="adeudos" role="tabpanel" aria-labelledby="contact-tab">
                            <div class="jumbotron">
                                <div class="form-row">
                                    <div class="col-md-3">
                                        <div class="md-form form-group">
                                            <label for="exampleInputEmail1">Saldo Corriente: *</label>
                                            <input type="text" class="form-control" name="saldoCorriente" value="<?php echo $ADE['SaldoCorriente']?>">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="md-form form-group">
                                            <label for="exampleInputEmail1">Saldo Atraso: *</label>
                                            <input type="text" class="form-control" name="saldoAtraso" value="<?php echo $ADE['SaldoAtraso']?>">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="md-form form-group">
                                            <label for="exampleInputEmail1">Saldo Rezago: *</label>
                                            <input type="text" class="form-control" name="saldoRezago" value="<?php echo $ADE['SaldoRezago']?>">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="md-form form-group">
                                            <label for="exampleInputEmail1">Recargos Acum: *</label>
                                            <input type="text" class="form-control" name="recargosAcum" value="<?php echo $ADE['RecargosAcum']?>">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="md-form form-group">
                                            <label for="exampleInputEmail1">SConvenio Agua: *</label>
                                            <input type="text" class="form-control" name="sConvenioAgua" value="<?php echo $ADE['SConvenioAgua']?>">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="md-form form-group">
                                            <label for="exampleInputEmail1">Convenio Vencido: *</label>
                                            <input type="text" class="form-control" name="convenioVencido" value="<?php echo $ADE['VencidoConvenio']?>">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="md-form form-group">
                                            <label for="exampleInputEmail1">Recargos Convenio: *</label>
                                            <input type="text" class="form-control" name="recargosConvenio" value="<?php echo $ADE['RecargosConvenio']?>">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="md-form form-group">
                                            <label for="exampleInputEmail1">SConvenio Obra: *</label>
                                            <input type="text" class="form-control" name="sConvenioObra" value="<?php echo $ADE['SConvenioObra']?>">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="md-form form-group">
                                            <label for="exampleInputEmail1">Contrato Vencido: *</label>
                                            <input type="text" class="form-control" name="contratoVencido" value="<?php echo $ADE['VencidoContrato']?>">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="md-form form-group">
                                            <label for="exampleInputEmail1">Recargos Contrato: *</label>
                                            <input type="text" class="form-control" name="recargosContrato" value="<?php echo $ADE['RecargosContrato']?>">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="md-form form-group">
                                            <label for="exampleInputEmail1">Gastos Ej: *</label>
                                            <input type="text" class="form-control" name="gastos" value="<?php echo $ADE['GastosEj']?>">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="md-form form-group">
                                            <label for="exampleInputEmail1">Multas: *</label>
                                            <input type="text" class="form-control" name="multas" value="<?php echo $ADE['Multas']?>">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="md-form form-group">
                                            <label for="exampleInputEmail1">Multas Otros: *</label>
                                            <input type="text" class="form-control" name="multasOtros" value="<?php echo $ADE['MultasOtros']?>">
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="md-form form-group">
                                            <label for="exampleInputEmail1">Impuesto: *</label>
                                            <input type="text" class="form-control" name="impuestos" value="<?php echo $ADE['Impuesto']?>">
                                        </div>
                                    </div>

                                    <div class="col-md-2">
                                        <div class="md-form form-group">
                                            <label for="exampleInputEmail1">Fomento: *</label>
                                            <input type="text" class="form-control" name="fomento" value="<?php echo $ADE['Fomento']?>">
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="md-form form-group">
                                            <label for="exampleInputEmail1">Actualizacion: *</label>
                                            <input type="text" class="form-control" name="actualizacion" value="<?php echo $ADE['Actualizacion']?>">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="md-form form-group">
                                            <label for="exampleInputEmail1"> Recargos: *</label>
                                            <input type="text" class="form-control" name="recargos" value="<?php echo $ADE['Recargos']?>">
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="md-form form-group">
                                            <label for="exampleInputEmail1">Fecha de Actualizacion: *</label>
                                            <?php
                                                if($ADE['FechaActualizacion']<>NULL){
                                                $fechaultimo = $ADE['FechaActualizacion']->format('Y-m-d H:i:s'); ?>
                                            <input type="datetime-local" class="form-control" name="fechaActualizacion" value="<?php echo $fechaultimo ?>">
                                            <?php } ?>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="md-form form-group">
                                            <label for="exampleInputEmail1">Fecha de Ultimo Pago: *</label>
                                            <?php
                                                if($ADE['FechaUltimoPago']<>NULL){
                                                $fechaultimo = $ADE['FechaUltimoPago']->format('Y-m-d H:i:s'); ?>
                                            <input type="datetime-local" class="form-control" name="fechaUltimoPago" value="<?php echo $fechaultimo ?>">
                                            <?php } ?>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="md-form form-group">
                                            <label for="exampleInputEmail1">Total: *</label>
                                            <input type="total" class="form-control" name="total" value="<?php echo $ADE['Total']?>">
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="md-form form-group">
                                            <label for="exampleInputEmail1"> Efectos: *</label>
                                            <input type="text" class="form-control" name="efectos" value="<?php //echo $ADE['']?>">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!---------------------------->
                        <div class="tab-pane fade" id="pagos" role="tabpanel" aria-labelledby="contact-tab">

                            <table class="table table-hover table-sm">
                                <thead class="thead-dark">
                                    <tr>
                                        <th scope="col">Cuenta</th>
                                        <th scope="col">Referencia</th>
                                        <th scope="col">Recibo</th>
                                        <th scope="col">Descripcion</th>
                                        <th scope="col">Total</th>
                                        <th scope="col">Fecha Pago</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php do{ // while( $PA=sqlsrv_fetch_array($pagosResult)){  ?>
                                    <tr>
                                        <td><?php echo $PA['Cuenta']?></td>
                                        <td><?php echo $PA['Referencia']?></td>
                                        <td><?php echo $PA['Recibo']?></td>
                                        <td><?php echo $PA['Descripcion']?></td>
                                        <td><?php echo $PA['Total']?></td>
                                        <?php
                                        if($PA['FechaPago']<>NULL){
                                        $fechaultimo = $PA['FechaPago']->format('Y-m-d H:i:s'); ?>
                                        <td><?php echo $fechaultimo ?></td>
                                        <?php } ?>
                                    </tr>
                                </tbody>

                                <?php } while( $PA=sqlsrv_fetch_array($pagosResult)); ?>
                            </table>
                        </div>
                    </div>
                </form>
                <br><br>
            </div>

        </section>
    </div>


    <div id="map"></div>
    <div id="pano"></div>
    


    <section id="fotos">
        <hr>
        <h1 style="text-shadow: 1px 1px 2px #717171;"><i class="fa fa-camera" aria-hidden="true"></i> Fotos</h1>
        <hr>
        <div class="card-group">
            <?php  while($Fotos = sqlsrv_fetch_array($fotoResult)) { ?>
            <div class="row">

                <div class="card-group mt-3" style="max-width: 600px;">
                    <div class="row no-gutters">
                        <div class="col-md-4">
                            <img src="<?php echo $Fotos['urlImagen']?>" class="card-img" alt="...">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <p class="card-text" value="<?php echo $Fotos['idAspUser']?>"><small class="text-muted">Gestor:</small><br><?php echo $Fotos['Nombre']?></p>
                                <p class="card-text" value="<?php echo $Fotos['idTarea']?>"><small class="text-muted">Tarea:</small><br><?php echo $Fotos['DescripcionTarea']?></p>
                                <p class="card-text" value="<?php echo $Fotos['idTarea']?>"><small class="text-muted">Fecha de captura:</small><br><?php echo $Fotos['DescripcionTarea']?></p>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <?php  } //while( $Fotos = sqlsrv_fetch_array($fotoResult)); //}  ?>
        </div>
    </section>
    <section id="tareas">
        <hr>
        <h1 style="text-shadow: 1px 1px 2px #717171;">Tareas</h1>
        <hr>

        <br>
        <div class="card  text-center border-secondary">
            <div class="card-header bg-primary ">
                TAREAS PENDIENTES <i class="fa fa-calendar-check-o"></i><i class="fa fa-user"></i>
            </div>
            <div class="card-body bg-light">
                <div class="card-columns">
                    <?php  do{ //while($TareaP=sqlsrv_fetch_array($tareaPendiResult)) { ?>
                    <div class="card w-80 card text-white bg-secondary mb-3">
                        <div class="card-body">
                            <?php
                                if($TareaP['FechaAsignacion']<>NULL){
                                $fechaCaptura = $TareaP['FechaAsignacion']->format('Y-m-d H:i:s'); ?>
                            <h5 class="card-title"><i class="fa fa-history" aria-hidden="true"></i> <?php echo $fechaCaptura ?></h5>
                            <?php }  ?>
                            <p class="card-text" value="<?php echo $TareaP['IdAspUser']?>"><?php echo utf8_encode($TareaP['Nombre']) ?></p>
                            <p class="card-text" value="<?php echo $TareaP['IdTarea']?>"><?php echo utf8_encode($TareaP['DescripcionTarea']) ?></p>
                        </div>
                    </div>
                    <?php  } while($TareaP=sqlsrv_fetch_array($tareaPendiResult));  ?>
                </div>
            </div>
        </div>
        <br>


        <div class="card  text-center border-secondary">
            <div class="card-header bg-primary">
                TAREAS REALIZADAS <i class="fa fa-calendar-o" aria-hidden="true"></i>
            </div>
            <div class="card-body bg-light">
                <div class="card-columns">
                    <?php while($TareaR=sqlsrv_fetch_array($tareaResult)) { ?>
                    <div class="card w-80 card text-white bg-secondary mb-3">
                        <div class="card-body">
                            <?php
                                if($TareaR['FechaCaptura']<>NULL){
                                $fechaCaptura = $TareaR['FechaCaptura']->format('Y-m-d H:i:s'); ?>
                            <h5 class="card-title"><i class="fa fa-history" aria-hidden="true"></i> <?php echo $fechaCaptura ?></h5>
                            <?php }  ?>
                            <p class="card-text" value="<?php echo $TareaR['IdAspUser']?>"><?php echo utf8_encode($TareaR['Nombre']) ?> / <?php echo $TareaR['Cuenta'] ?></p>
                            <p class="card-text" value="<?php echo $TareaR['IdTarea']?>"><?php echo utf8_encode($TareaR['DescripcionTarea']) ?></p>
                        </div>
                    </div>
                    <?php  } //while($TareaR=sqlsrv_fetch_array($tareaResult)); //}  ?>
                </div>
            </div>

        </div>
        <br>
        <!--        </div>-->
    </section>
    <section id="gestiones">

        <h1 style="text-shadow: 1px 1px 2px #717171;"><i class="far fa-edit"></i> Gestiones</h1>
        <div class="card-deck">
            <div class="card text-center border-secondary">
                <div class="card-body">
                    <i class="fa fa-commenting" aria-hidden="true"></i>
                    <h5 class="card-title">Comentario</h5>
                    <p class="card-text">Comentario:<input type="text" class="form-control" name="clave" value="" required></p>
                    <br>
                    <a href="#" class="btn btn-primary">Guardar</a>
                </div>
            </div>
            <div class="card text-center border-secondary">
                <div class="card-body">
                    <h5 class="card-title">Estatus Legal</h5>
                    <p class="card-text">Nueva Sintesis:<input type="text" class="form-control" name="clave" value="" required></p>
                    <a href="#" class="btn btn-primary">Guardar</a>
                </div>
            </div>
            <div class="card text-center border-secondary">
                <div class="card-body">
                    <h5 class="card-title">Atencion a Usuarios</h5>
                    <p class="card-text">Observaciones:<input type="text" class="form-control" name="clave" value="" required>
                        Fecha Promesa de Pago:<input type="datetime-local" class="form-control" name="clave" value="" required></p>
                    <a href="#" class="btn btn-primary">Guardar</a>
                </div>
            </div>
        </div>
    </section>
    <br>
    <br>
    <section id="Legal">

        <h1 style="text-shadow: 1px 1px 2px #717171; text-aling:center;"><i class="fa fa-university" aria-hidden="true"></i> Registro Publico / Inscripcion de Embargo</h1>

        <div class="container">
            <div class="jumbotron">
                <div class="form-row check">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" name="inlineRadioOptions" id="inlineRadio1" value="option1">
                        <label class="form-check-label" for="inlineRadio1">Registro Publico</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" name="inlineRadioOptions" id="inlineRadio2" value="option2">
                        <label class="form-check-label" for="inlineRadio2">Inscripccion de Embargo</label>
                    </div>
                </div>
                <br>
                <div class="form-row">
                    <div class="col-sm-3">
                        <div class="md-form form-group">
                            <label for="exampleInputEmail1">Cuenta: *</label>
                            <input type="text" class="form-control" name="cuenta" value="<?php echo $row['cuenta'] ?>">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="md-form form-group">
                            <label for="exampleInputEmail1">Tipo de Propietario: *</label>
                            <input type="text" class="form-control" name="tipoPropietario" value="">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="md-form form-group">
                            <label for="exampleInputEmail1">Fecha de partida: *</label>
                            <input type="datetime-local" class="form-control" name="fechaPartida" value="">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="md-form form-group">
                            <label for="exampleInputEmail1">Libro: *</label>
                            <input type="text" class="form-control" name="libro" value="">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="md-form form-group">
                            <label for="exampleInputEmail1">Tomo: *</label>
                            <input type="text" class="form-control" name="tomo" value="">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="md-form form-group">
                            <label for="exampleInputEmail1">Foja: *</label>
                            <input type="text" class="form-control" name="foja" value="">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="md-form form-group">
                            <label for="exampleInputEmail1">Escritura: *</label>
                            <input type="text" class="form-control" name="escritura" value="">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="md-form form-group">
                            <label for="exampleInputEmail1">Folio Mercantil: *</label>
                            <input type="text" class="form-control" name="folioMercantil" value="">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="md-form form-group">
                            <label for="exampleInputEmail1">Folio Real: *</label>
                            <input type="text" class="form-control" name="folioReal" value="">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="md-form form-group">
                            <label for="exampleInputEmail1">Folio Auxiliar: *</label>
                            <input type="text" class="form-control" name="folioAuxiliar" value="">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="md-form form-group">
                            <label for="exampleInputEmail1">Co Propietario: *</label>
                            <input type="text" class="form-control" name="coPropietario" value="">
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="md-form form-group">
                            <label for="exampleInputEmail1">Gravamenes: *</label>
                            <input type="text" class="form-control" name="gravamenes" value="">
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="md-form form-group">
                            <label for="exampleInputEmail1">Anotaciones Marginales: *</label>
                            <input type="text" class="form-control" name="anotacionesMarginales" value="">
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="md-form form-group">
                            <label for="exampleInputEmail1">Medidas Superficie: *</label>
                            <input type="text" class="form-control" name="medidasSuperficie" value="">
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="md-form form-group">
                            <label for="exampleInputEmail1">Observaciones: *</label>
                            <input type="text" class="form-control" name="observaciones" value="">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="md-form form-group">
                            <label for="exampleInputEmail1">Nombre Propietario: *</label>
                            <input type="text" class="form-control" name="nombrePropietario" value="">
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="md-form form-group">
                            <label for="exampleInputEmail1">Tipo de sociedad: *</label>
                            <input type="text" class="form-control" name="tipoSociedad" value="">
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="md-form form-group">
                            <label for="exampleInputEmail1">Tipo Fideicomiso: *</label>
                            <input type="text" class="form-control" name="tipoFideicomiso" value="">
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="md-form form-group">
                            <label for="exampleInputEmail1">Objeto Fideicomiso: *</label>
                            <input type="text" class="form-control" name="deudaTotal" value="">
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="md-form form-group">
                            <label for="exampleInputEmail1">Fideicomisario: *</label>
                            <input type="text" class="form-control" name="fideicomisario" value="">
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="md-form form-group">
                            <label for="exampleInputEmail1">Fideicomitente: *</label>
                            <input type="text" class="form-control" name="fideicomitente" value="">
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="md-form form-group">
                            <label for="exampleInputEmail1">Institucion Fiduciaria: *</label>
                            <input type="text" class="form-control" name="institucionFiduciaria" value="">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="md-form form-group">
                            <label for="exampleInputEmail1">Domicilio Fideicomitente: *</label>
                            <input type="text" class="form-control" name="domicilioFideicomitente" value="">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="md-form form-group">
                            <label for="exampleInputEmail1">Domicilio Institucion Fiduciaria: *</label>
                            <input type="text" class="form-control" name="domicilioInstitucionFiduciaria" value="">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="md-form form-group">
                            <label for="exampleInputEmail1">Domicilio Fideicomisario: *</label>
                            <input type="text" class="form-control" name="domicilioFideicomisario" value="">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="md-form form-group">
                            <label for="exampleInputEmail1">Duracion: *</label>
                            <input type="text" class="form-control" name="duracion" value="">
                        </div>
                    </div>
                    <div class="col-md-1">
                        <div class="md-form form-group">
                            <label for="exampleInputEmail1">Partida: *</label>
                            <input type="text" class="form-control" name="partida" value="">
                        </div>
                    </div>
                    <div class="col-md-1">
                        <div class="md-form form-group">
                            <label for="exampleInputEmail1">Seccion: *</label>
                            <input type="text" class="form-control" name="seccion" value="">
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="md-form form-group">
                            <label for="exampleInputEmail1">Folio: *</label>
                            <input type="text" class="form-control" name="folio" value="">
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="md-form form-group">
                            <label for="exampleInputEmail1">Inscripcion: *</label>
                            <input type="text" class="form-control" name="inscripcion" value="">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="md-form form-group">
                            <label for="exampleInputEmail1">Descripcion Inmueble: *</label>
                            <input type="text" class="form-control" name="descripcionInmueble" value="">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="md-form form-group">
                            <label for="exampleInputEmail1">Fecha de Busqueda: *</label>
                            <input type="datetime-local" class="form-control" name="fechaBusqueda" value="">
                        </div>
                    </div>
                </div>
                <button type="submit" name="actualizarLegal" class="btn btn-primary btn-sm">Guardar<i class="fa fa-eraser" aria-hidden="true"></i></button>
            </div>
        </div>
        
<?php } ?> 
       
       
       
       
       
       
       
       
       
       
       
        
    </section>
    <br>
    <br>
    <br>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAcF4oi3SweowzVYo29ifjqXJsl1eE7C8M&callback=initialize&libraries=&v=weekly" async></script>
<script>
        function initialize() {
            const fenway = {
                lat: <?php echo $row['latitud']; ?>,
                lng: <?php echo $row['longitud']; ?>
            };
            const map = new google.maps.Map(
                document.getElementById("map") as HTMLElement, {
                    center: fenway,
                    zoom: 14,
                }
            );
            const panorama = new google.maps.StreetViewPanorama(
                document.getElementById("pano") as HTMLElement, {
                    position: fenway,
                    pov: {
                        heading: 34,
                        pitch: 10,
                    },
                }
            );
            map.setStreetView(panorama);
        }
</script>
<script>
        function initialize() {
            var coord = {
                lat: <?php echo  $row['latitud']; ?>,
                lng: <?php echo  $row['longitud']; ?>
            };
            const fenway = {
                lat: <?php echo  $row['latitud']; ?>,
                lng: <?php echo  $row['longitud']; ?>
            };
            const map = new google.maps.Map(document.getElementById("map"), {
                center: fenway,
                zoom: 18,
            });
            var marker = new google.maps.Marker({
                position: coord,
                map: map
            });
            const panorama = new google.maps.StreetViewPanorama(
                document.getElementById("pano"), {
                    position: fenway,
                    pov: {
                        heading: 34,
                        pitch: 10,
                    },
                }
            );
            ////************ MARCADOR AL DAR CLICK*********************
            var infowindow = new google.maps.InfoWindow({
                content: "<?php echo utf8_encode('Long. '.$row['longitud'].' Lat. '.$row['latitud']) ?>"
            });
            infowindow.open(map, marker);
            map.setStreetView(panorama, marker);
        }
</script>

   
   
   
   
   
   
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
