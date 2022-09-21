<?php
session_start();
//require "../../acnxerdm/cnx.php";
header('Content-type: text/html; charset=utf-8');
    $serverName = "implementta.mx";
    $connectionInfo = array( 'Database'=>'implementtaEnsenadaA', 'UID'=>'sa', 'PWD'=>'vrSxHH3TdC');
    $cnx = sqlsrv_connect($serverName, $connectionInfo);
    date_default_timezone_set('America/Mexico_City');
//******************* CONSUMIR CUENTAS WS ENSENADA AGUA**********************************

if(isset($_POST['cuentas'])){
$url = "https://www.cespe.gob.mx/ServicioWebDeudores/Service_deudores.asmx/Consulta_cuentas_stratimex?usuario=8STR6E1IMX&password=Oh26H*eT";
$wsResult = simplexml_load_file($url);

if($wsResult <> NULL){
    
foreach($wsResult as $wsResults){
    
    $consula=date('Y-m-d_H:i:s');
    $SECTOR=utf8_encode($wsResults->SECTOR);
    $FECHA_SDOS=utf8_encode($wsResults->FECHA_SDOS);
    $TIPO_SEGMENTO=str_replace("'", "''", $wsResults->TIPO_SEGMENTO);
    $ZONA_COBRANZA=str_replace("'", "''", $wsResults->ZONA_COBRANZA);
    $CLAS_COBRANZA=str_replace("'", "''", $wsResults->CLAS_COBRANZA);
    $CLAS_TIPO_US=str_replace("'", "''", $wsResults->CLAS_TIPO_US);
    $CLAS_ANTIG=str_replace("'", "''", $wsResults->CLAS_ANTIG);
    $CLAS_MONTO=str_replace("'", "''", $wsResults->CLAS_MONTO);
    $ZONA=str_replace("'", "''", $wsResults->ZONA);
    $CUENTA=str_replace("'", "''", $wsResults->CUENTA);
    $NOMBRE=str_replace("'", "''", $wsResults->NOMBRE);
    $COLONIA=str_replace("'", "''", $wsResults->COLONIA);
    $NOMBRE_COLONIA=str_replace("'", "''", $wsResults->NOMBRE_COLONIA);
    $DOMICILIO=str_replace("'", "''", $wsResults->DOMICILIO);
    $DISTRITO=str_replace("'", "''", $wsResults->DISTRITO);
    $RUTA=str_replace("'", "''", $wsResults->RUTA);
    $LIBRO=str_replace("'", "''", $wsResults->LIBRO);
    $PAGINA=str_replace("'", "''", $wsResults->PAGINA);
    $TIPO_USUARIO=str_replace("'", "''", $wsResults->TIPO_USUARIO);
    $GIRO=str_replace("'", "''", $wsResults->GIRO);
    $TARIFA=str_replace("'", "''", $wsResults->TARIFA);
    $ESTADO_COBRO=str_replace("'", "''", $wsResults->ESTADO_COBRO);
    $AGUA_CORRIENTE=str_replace("'", "''", $wsResults->AGUA_CORRIENTE);
    $AGUA_VENCIDA=str_replace("'", "''", $wsResults->AGUA_VENCIDA);
    $AGUA_CONVENIDA=str_replace("'", "''", $wsResults->AGUA_CONVENIDA);
    $MENS_VENCIDAS=str_replace("'", "''", $wsResults->MENS_VENCIDAS);
    $SALDO_AGUA=str_replace("'", "''", $wsResults->SALDO_AGUA);
    $ANTIG_MAX=str_replace("'", "''", $wsResults->ANTIG_MAX);
    $CODIGO1=str_replace("'", "''", $wsResults->CODIGO1);
    $CODIGO2=str_replace("'", "''", $wsResults->CODIGO2);
    $CODIGO3=str_replace("'", "''", $wsResults->CODIGO3);
    $AGUA_ULT_MES=str_replace("'", "''", $wsResults->AGUA_ULT_MES);
    $FECHA_ABONO=str_replace("'", "''", $wsResults->FECHA_ABONO);
    $TELEFONO=str_replace("'", "''", $wsResults->TELEFONO);
    $PENSIONADO=str_replace("'", "''", $wsResults->PENSIONADO);
    $INSTALACION=str_replace("'", "''", $wsResults->INSTALACION);
    $DERECHOS=str_replace("'", "''", $wsResults->DERECHOS);
    $OBRAS=str_replace("'", "''", $wsResults->OBRAS);
    $OTROS=str_replace("'", "''", $wsResults->OTROS);
    $RECARGOS_OTROS=str_replace("'", "''", $wsResults->RECARGOS_OTROS);
    $REC_AGUA_NCV=str_replace("'", "''", $wsResults->REC_AGUA_NCV);
    $MEDIDORES=str_replace("'", "''", $wsResults->MEDIDORES);
    $TOTAL_TOTAL=str_replace("'", "''", $wsResults->TOTAL_TOTAL);
    $NO_EXPEDIENTE=str_replace("'", "''", $wsResults->NO_EXPEDIENTE);
    $ESTADO_PAE=str_replace("'", "''", $wsResults->ESTADO_PAE);
    $ULT_NOTIF=str_replace("'", "''", $wsResults->ULT_NOTIF);
    $CORTE_ACTIVO=str_replace("'", "''", $wsResults->CORTE_ACTIVO);
    $ULT_ABO_OB=str_replace("'", "''", $wsResults->ULT_ABO_OB);
    $MENS_VEN_CONV=str_replace("'", "''", $wsResults->MENS_VEN_CONV);
    $LETRAS_VEN_CONV=str_replace("'", "''", $wsResults->LETRAS_VEN_CONV);
    $SALDO_VEN_CONV=str_replace("'", "''", $wsResults->SALDO_VEN_CONV);
    $PROMEDIO=str_replace("'", "''", $wsResults->PROMEDIO);
    $CONV_STRATIMEX=str_replace("'", "''", $wsResults->CONV_STRATIMEX);
    $SDO_CONV_STRATIMEX=str_replace("'", "''", $wsResults->SDO_CONV_STRATIMEX);
    $FECHA_CONV_STRAT=str_replace("'", "''", $wsResults->FECHA_CONV_STRAT);
    $TIPO_CONV_STRAT=str_replace("'", "''", $wsResults->TIPO_CONV_STRAT);
    $CONDONADO_STRAT=str_replace("'", "''", $wsResults->CONDONADO_STRAT);
    $AJUSTADO_POL=str_replace("'", "''", $wsResults->AJUSTADO_POL);
    $PAGADO_SIN_ACCION=str_replace("'", "''", $wsResults->PAGADO_SIN_ACCION);
    $CLAVE_CATASTRAL=str_replace("'", "''", $wsResults->CLAVE_CATASTRAL);
    $MEDIDOR=str_replace("'", "''", $wsResults->MEDIDOR);
    
    $accesos="insert into wsEnsenada_Consulta_cuentas (consulta,SECTOR,FECHA_SDOS,TIPO_SEGMENTO,ZONA_COBRANZA,CLAS_COBRANZA,CLAS_TIPO_US,CLAS_ANTIG,CLAS_MONTO,ZONA,CUENTA,NOMBRE,COLONIA,NOMBRE_COLONIA,DOMICILIO,DISTRITO,RUTA,LIBRO,PAGINA,TIPO_USUARIO,GIRO,TARIFA,ESTADO_COBRO,AGUA_CORRIENTE,AGUA_VENCIDA,AGUA_CONVENIDA,MENS_VENCIDAS,SALDO_AGUA,ANTIG_MAX,CODIGO1,CODIGO2,CODIGO3,AGUA_ULT_MES,FECHA_ABONO,TELEFONO,PENSIONADO,INSTALACION,DERECHOS,OBRAS,OTROS,RECARGOS_OTROS,REC_AGUA_NCV,MEDIDORES,TOTAL_TOTAL,NO_EXPEDIENTE,ESTADO_PAE,ULT_NOTIF,CORTE_ACTIVO,ULT_ABO_OB,MENS_VEN_CONV,LETRAS_VEN_CONV,SALDO_VEN_CONV,PROMEDIO,CONV_STRATIMEX,SDO_CONV_STRATIMEX,FECHA_CONV_STRAT,TIPO_CONV_STRAT,CONDONADO_STRAT,AJUSTADO_POL,PAGADO_SIN_ACCION,CLAVE_CATASTRAL,MEDIDOR) values ('$consula','$SECTOR','$FECHA_SDOS','$TIPO_SEGMENTO','$ZONA_COBRANZA','$CLAS_COBRANZA','$CLAS_TIPO_US','$CLAS_ANTIG','$CLAS_MONTO','$ZONA','$CUENTA','$NOMBRE','$COLONIA','$NOMBRE_COLONIA','$DOMICILIO','$DISTRITO','$RUTA','$LIBRO','$PAGINA','$TIPO_USUARIO','$GIRO','$TARIFA','$ESTADO_COBRO','$AGUA_CORRIENTE','$AGUA_VENCIDA','$AGUA_CONVENIDA','$MENS_VENCIDAS','$SALDO_AGUA','$ANTIG_MAX','$CODIGO1','$CODIGO2','$CODIGO3','$AGUA_ULT_MES','$FECHA_ABONO','$TELEFONO','$PENSIONADO','$INSTALACION','$DERECHOS','$OBRAS','$OTROS','$RECARGOS_OTROS','$REC_AGUA_NCV','$MEDIDORES','$TOTAL_TOTAL','$NO_EXPEDIENTE','$ESTADO_PAE','$ULT_NOTIF','$CORTE_ACTIVO','$ULT_ABO_OB','$MENS_VEN_CONV','$LETRAS_VEN_CONV','$SALDO_VEN_CONV','$PROMEDIO','$CONV_STRATIMEX','$SDO_CONV_STRATIMEX','$FECHA_CONV_STRAT','$TIPO_CONV_STRAT','$CONDONADO_STRAT','$AJUSTADO_POL','$PAGADO_SIN_ACCION','$CLAVE_CATASTRAL','$MEDIDOR')";
    sqlsrv_query($cnx,$accesos) or die ('No se ejecuto la consulta insert wsEnsenada');
    }
    //sleep(2);
    echo '<meta http-equiv="refresh" content="0,url=finalizar.php?cuentas=1">';
  } else{
    
        echo '<script>alert("No hay respuesta de https://www.cespe.gob.mx Verifique correcto funcionamiento de WS con el organismo proveedor de datos.")</script>';
        echo '<meta http-equiv="refresh" content="0,url=finalizar.php?err=1">';   
 }
}
//******************* CONSUMIR CUENTAS WS ENSENADA AGUA**********************************
//***************** FIN CONSUMIR PAGOS WS ENSENADA AGUA**********************************

if(isset($_POST['pagos'])){

$url = "https://www.cespe.gob.mx/ServicioWebDeudores/Service_deudores.asmx/Consulta_detalles_pagos_stratimex?usuario=8STR6E1IMX&password=Oh26H*eT";
$wsResult = simplexml_load_file($url);

if($wsResult <> NULL){
    
foreach($wsResult as $wsResults){
    $consula=date('Y-m-d_H:i:s');
    $CUENTA=str_replace("'", "''", $wsResults->CUENTA);
    $RECIBO=str_replace("'", "''", $wsResults->RECIBO);
    $FECHA_PAGO=str_replace("'", "''", $wsResults->FECHA_PAGO);
    $CONCEPTO=str_replace("'", "''", $wsResults->CONCEPTO);
    $DESCRIP_CONCEPTO=str_replace("'", "''", $wsResults->DESCRIP_CONCEPTO);
    $FECHA_CARGO=str_replace("'", "''", $wsResults->FECHA_CARGO);
    $CONVENIO=str_replace("'", "''", $wsResults->CONVENIO);
    $IMPORTE_SIN_IVA=str_replace("'", "''", $wsResults->IMPORTE_SIN_IVA);

    $accesos="insert into wsEnsenada_detalles_pago (consulta,CUENTA,RECIBO,FECHA_PAGO,CONCEPTO,DESCRIP_CONCEPTO,FECHA_CARGO,CONVENIO,IMPORTE_SIN_IVA) 
    values ('$consula','$CUENTA','$RECIBO','$FECHA_PAGO','$CONCEPTO','$DESCRIP_CONCEPTO','$FECHA_CARGO','$CONVENIO','$IMPORTE_SIN_IVA')";
    sqlsrv_query($cnx,$accesos) or die ('No se ejecuto la consulta insert wsEnsenada');
    }
    //sleep(2);
    echo '<meta http-equiv="refresh" content="0,url=finalizar.php?pagos=1">';
  } else{
        echo '<script>alert("No hay respuesta de https://www.cespe.gob.mx Verifique correcto funcionamiento de WS con el organismo proveedor de datos.")</script>';
        echo '<meta http-equiv="refresh" content="0,url=finalizar.php?err=1">';
    }
}
//******************* CONSUMIR PAGOS WS ENSENADA AGUA**********************************
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>WS EnsenadaA</title>
<link rel="icon" href="../icono/implementtaIcon.png">
<!-- Bootstrap -->
<link rel="stylesheet" href="../css/bootstrap.css">
<link href="../fontawesome/css/all.css" rel="stylesheet">
<script src="../js/jquery-3.4.1.min.js"></script>
<link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
<style>
  body {
        background-image: url(../img/back.jpg);
        background-repeat: repeat;
        background-size: 100%;
        background-attachment: fixed;
        overflow-x: hidden; /* ocultar scrolBar horizontal*/
}
    body {
    font-family: sans-serif;
    font-style: normal;
    font-weight:normal;
    width: 100%;
    height: 100%;
    margin-top:-2%;
    padding-top:0px;
}
    .jumbotron {
        margin-top:0%;
        margin-bottom:0%;
        padding-top:1%;
        padding-bottom:1%;
}
</style>
<?php require "include/nav.php"; ?>
</head>
<body>
    <div class="container">
    <h1 style="text-shadow: 1px 1px 2px #717171;">WS Ensenada Agua</h1>
    <h3 style="text-shadow: 1px 1px 2px #717171;"><img src="https://img.icons8.com/fluency/48/000000/server.png"/> Consumo de Web Service</h3>
    <hr>
<div id="foo">
<form action="" method="post" enctype="multipart/form-data" onsubmit="return validacion()">
   <div class="alert alert-primary" role="alert">
        <div style="text-align:center;">
            <h4 style="text-shadow: 0px 0px 2px #717171;">Consumo de Web Service Ensenada Agua</h4>
            <h5 style="text-shadow: 0px 0px 2px #717171;">Consulta_cuentas_stratimex</h5>
            
            
<!--            <h6 style="text-shadow: 0px 0px 2px #717171;"><i class="fas fa-info-circle"></i> Si el proceso no se ejecutó automáticamente, selecciona la opción manual de consumo.</h6><hr>-->
            
            <div class="alert alert-warning" role="alert" style="color:#000000;">
              <i class="fas fa-exclamation-triangle"></i> Si el proceso no se ejecutó automáticamente, selecciona la opción manual de consumo.
            </div>
            
            
           <button type="submit" class="btn btn-primary" name="cuentas" id="btnCargar"><img src="https://img.icons8.com/officexs/35/000000/database-restore.png"/> Ejecutar WS EnsenadaA Consulta_cuentas_stratimex</button>
           
        </div>
    </div>
    
    <div class="alert alert-dark" role="alert">
        <div style="text-align:center;">
            <h4 style="text-shadow: 0px 0px 2px #717171;">Consumo de Web Service Ensenada Agua</h4>
            <h5 style="text-shadow: 0px 0px 2px #717171;">Consulta_detalles_pagos_stratimex</h5>
            
            <div class="alert alert-warning" role="alert" style="color:#000000;">
              <i class="fas fa-exclamation-triangle"></i> Si el proceso no se ejecutó automáticamente, selecciona la opción manual de consumo.
            </div>
            
            
            <button type="submit" class="btn btn-dark" name="pagos" id="btnCargar"><img src="https://img.icons8.com/officexs/35/000000/database-restore.png"/> Ejecutar WS EnsenadaA Consulta_detalles_pagos_stratimex</button>
                      
        </div>
    </div>
</form>
</div>
<!--*******************PROGESS BAR ARCHIVO***************************************************************-->
    <div class="container" id="contenido"></div>
<!--******************FIN PROGRESS BAR ARCHIVO***********************************************************-->
    </div>
<br>
 <div style="text-align:center;">
    <a href="soporteTec.php" class="btn btn-danger btn-sm"><i class="fas fa-times"></i> Cancelar y salir</a>
 </div>
<br><br>
<?php require "include/footer.php"; ?>
</body>
<script src="../js/jquery-3.4.1.min.js"></script>
<script src="../js/popper.min.js"></script>
<script src="../js/bootstrap.js"></script>
<!--*******************************AJAX PARA PROGRESS*******************************************-->
<script type="text/javascript">
function validacion() {
    
    if('#btnCargar'){
      var docto = 1;
      var x = document.getElementById("foo");
      x.style.display = "none";

        var esperar = 0;
        $.ajax({
            url: "loadAjax.php",
               success : function(data){
                setTimeout(function(){
                $('#contenido').html(data);
                },esperar
                );
            }
    });
//return false;   
    }
}
</script>
<!--***************************FIN AJAX PARA PROGRESS*******************************************--> 
</html>