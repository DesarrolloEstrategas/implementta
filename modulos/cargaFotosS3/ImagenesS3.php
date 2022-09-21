<?php

$gestor = $_GET["idreg"];
$plaza = $_GET["plz"];
$rol = $_GET["rol"];

//echo 'Gestor =' .$gestor. ' Plaza :' .$plaza. ' Rol :' .$rol;


$serverName = "implementta.mx";

$laplaza = "";

if($plaza==4){
   $laplaza = 'implementtaDemo';
}elseif($plaza==5){
   $laplaza = 'implementtaDurangoA';
}elseif($plaza==6){
   $laplaza = 'implementtaMochisA';
}elseif($plaza==7){
   $laplaza = 'implementtaTlalnepantlaA';
}elseif($plaza==8){
   $laplaza = 'implementtaTecateP';
}elseif($plaza==9){
   $laplaza = 'implementtaMochisP';
}elseif($plaza==10){
   $laplaza = 'implementtaMazatlanA';
}elseif($plaza==11){
   $laplaza = 'implementtaTolucaA';
}elseif($plaza==12){
   $laplaza = 'implementtaTecateA';
}elseif($plaza==13){
   $laplaza = 'implementtaTolucaP';
}elseif($plaza==14){
   $laplaza = 'implementtaTijuanaA';
}   

//echo $laplaza;

$elid = "";
$elrol = "";

if($rol==1){
    $elrol = 'RegistroGestorClone';
    $elid = 'IdRegistroGestor';
}elseif($rol==2){
    $elrol = 'RegistroAbogadoClone';
    $elid = 'IdRegistroAbogado';
}elseif($rol==3){
        $elrol = 'RegistroReductoresClone';  
        $elid =  'idRegistroReductores';  
}elseif($rol==4){
    $elrol = 'registroCartaInvitacionClone';  
    $elid = 'idRegistroCartaInvitacion';  
}

//echo $elrol;
//echo $elid;

$connectionInfo = array( 'Database'=>$laplaza, 'UID'=>'sa', 'PWD'=>'vrSxHH3TdC');
$conn = sqlsrv_connect($serverName, $connectionInfo);
date_default_timezone_set('America/Mexico_City'); 


$tsql = "select rgc.cuenta,SUBSTRING(CONVERT(VARCHAR(24),rgc.fechacaptura,120),1,10) as fechacaptura,rgc.IdAspUser,rgc.IdTarea,ct.DescripcionTarea as dest
FROM $elrol rgc
INNER JOIN CatalogoTareas CT on rgc.IdTarea = ct.IdTarea
where $elid = $gestor";
//echo $tsql;

$res = sqlsrv_query($conn,$tsql);


while ($ver=sqlsrv_fetch_array($res)){

$cuenta = $ver['cuenta'];
$fechacaptura = $ver['fechacaptura'];
$idaspuser = $ver['IdAspUser'];
$idtarea = $ver['IdTarea'];
$desct = $ver['dest'];

}

//echo ' Cuenta : ' .$cuenta. ' FechaCaptura: ' .$fechacaptura. ' IdAspUser : ' .$idaspuser;


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"/> 
    <link rel="stylesheet" href="css/estilos.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.2/css/all.css"> 
	<script src="https://code.jquery.com/jquery-3.4.1.js"></script> 
   
    <title>CONSULTA S3</title>
</head>
<body>
    <header>
       <div >
       <img src="img/logoes2.png"  height='80' width='220'>
        <h4>Amazon S3 Consulta de Imagenes</h4>
       </div><br>
     
    
    </header>

 
<div class="container">
       

<div class="row">
                

              

                

<br>



<br><br>

<table class="table table-striped" id="tbnota2" border="1" style="width:100%" border="1">
					<thead>
                    <tr>
                          <th scope="col">Cuenta</th>
                          <th scope="col">Key</th>
                          <th scope="col">Imagen</th>
                          <th scope="col">FechaCaptura</th>
                          <th scope="col">Eliminar</th>
                          <th scope="col">Descargar</th>
                          
                          </tr>
</thead>
                              <tbody id="contenido"></tbody>
                        </table>
    
</div>


    <form class="form-inline" action="cargarfotos.php" method="post" id="uploadfile" enctype="multipart/form-data">
    <input type="hidden" name="gestor" id="gestor" value="<?php echo $idaspuser; ?>">
        <input type="hidden" name="cuenta" id="cuenta" value="<?php echo $cuenta; ?>">
        <input type="hidden" name="fechacaptura" id="fechacaptura" value="<?php echo $fechacaptura; ?>">
        <input type="hidden" name="plaza" id="plaza" value="<?php echo $laplaza; ?>">
        <input type="hidden" name="idtarea" id="idtarea" value="<?php echo $idtarea; ?>">
        <input type="hidden" name="tipo" id="tipo" value="<?php echo $desct; ?>">
    <br><br>

    <div class="col-sm-12">
    <center>
    <button id="btn" class="btn btn-primary btn-lg" role="link" >Cargar Fotos</button>
</center>
</div>
<br><br>
    </form>


</body>
</html>


<script type="text/javascript">
   $(document).ready(function(){
    
    var gestor = $('#gestor').val();
   // var plaza = $('#plaza').val();
    var cuenta = $('#cuenta').val();
    var fechacaptura = $('#fechacaptura').val();  
    var plaza = $('#plaza').val();  

   // alert(plaza);


    muestra2(gestor,cuenta,fechacaptura,plaza);

    //$('#lista1').change(function(){
    //    recargarlista();
    //});


   })
    

   function recargarlista(){
    $.ajax({
        type:"POST",
        url:"mstragestores.php",
        data:"rol=" + $('#lista1').val(),
        success : function(r){
            $("#select2lista").html(r);
        }
    });
   }

function llenar()

{
   
    var elrol = $('#rol').val();
    alert(elrol);
           
                    var parametros =
              {
                  "rol" : elrol
              };
    $.ajax({
        data: parametros,
       url : "mstragestores.php",
       type: 'post',
       beforeSend: function()
			 {
                alert("entre");
			//	$('.formulario').hide();
			//	$('.cargando').show();  
			//	alert(valores.cvecurt);
			  },
            
			  error: function()
			  {alert("error");},
       success : function(data)
      {
           alert(data);
         //  alert(data);
         // $("#contenido").append(data);
          document.getElementById("listaGestores").innerHTML = data;
      }
    });
  
  }

//{
    
//    $.ajax({
//       url : "mstrabucket.php",
//       success : function(data)
//      {
          // alert("si entro");
         //  alert(data);
         // $("#contenido").append(data);
//          document.getElementById("listaBuckets").innerHTML = data;
//      }
//    });
  
//  }
//muestra2(gestor,cuenta,fechacaptura,laplaza);

function muestra2(idgestor,lacuenta,lafechacaptura,xplaza){
    //alert(idgestor);
    var gestor = idgestor;
        cuenta = lacuenta;
        fechacaptura = lafechacaptura;
        plaza = xplaza;
            //fechacaptura = $('#fechacap').val();
           
                    var parametros =
              {
                  "gestor" : gestor,
                  "cuenta" : cuenta,
                  "fechacaptura" : fechacaptura,
                  "plaza" : plaza
          //        "fechacaptura" : fechacaptura 
              };
$.ajax({
        type:"POST",
        url:"muestra2.php",
        data: parametros,
        //data:"gestor=" + $('#lista2').val(),
        success : function(r){
          //  $("#select2lista").html(r);
            document.getElementById("contenido").innerHTML = r;

        }
    });
   }

  
  function muestra()
    
	{
	  var elbucket = $('#listaBuckets').val();
	  	 		 
	  	  var parametros =
	  {
		  "nombrebucket" : elbucket
	  };
	  $.ajax(
		  {
			  data: parametros,
			  url: 'muestra.php',
              type: 'post',
			  success: function (data)
			  {
                document.getElementById("contenido").innerHTML = data;
			  }
		  });
	  }  


    function getfile(Key)
    {
        var elbucket = "fotos-implementta-movil";
            plaza = $('#plaza').val();  
            key = Key; 
	  	 		 
                    var parametros =
              {
                  "bucketnombre" : elbucket,
                  "plaza" : plaza,
                  "key" : key
        
              };
        $.ajax(
            {
                url: "deletefile.php",
                data: parametros,
                //data: {key: Key},
                type: "post",
              		
                success: function(data)
                {
                   // alert(data);
                    alert('Eliminado Correctamente!'); 
                    window.location.reload()
                  //  muestra2(idgestor,lacuenta,lafechacaptura,xplaza);
                    //muestra2();
                }
            }
        )
    }


    function getDescarga(Key)
    {
        var elbucket = "fotos-implementta-movil";
            key = Key; 
	  	 		 
                    var parametros =
              {
                  "bucketnombre" : elbucket,
                  "key" : key
        
              };
        $.ajax(
            {
                url: "Descargar.php",
                data: parametros,
                //data: {key: Key},
                type: "post",
              		
                success: function(data)
                {
                  //alert(data);
                  // $('#url').val(data)
                   window.location = data
                 // document.getElementById("imagen").src=data;
                //  document.getElementById("imagen").src=data;
                    alert("Descargado Correctamente"); 
                   // muestra();
                }
            }
        )
    }

    function getURL(Key)
    {
        var elbucket = $('#listaBuckets').val();
            key = Key; 
	  	 		 
                    var parametros =
              {
                  "bucketnombre" : elbucket,
                  "key" : key
        
              };
        $.ajax(
            {
                url: "laurl.php",
                data: parametros,
                //data: {key: Key},
                type: "post",
              		
                success: function(data)
                {
                     const url = data.getSignedUrl('getObject', {
                        Bucket: elbucket,
                        Key: key,
                        Expires: signedUrlExpireSeconds
                      })
                    alert(url);
                  // $('#url').val(data)
                  // window.location = data
                  //  alert("Descargado Correctamente"); 
                   // muestra();
                }
            }
        )
    }

</script>
