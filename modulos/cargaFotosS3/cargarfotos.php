<?php

$cuenta = $_POST["cuenta"];
$laplaza = $_POST["plaza"];
$fechac =  $_POST["fechacaptura"];
$idaspuser = $_POST["gestor"];
$idtarea = $_POST['idtarea'];
$tipo = $_POST['tipo'];


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
   
    <title>SUBIR_FOTOS</title>
</head>
<body>
    <header>
       <div class="alert alert-info">
        <h3>Carga de Archivos al AWS (Servidor de Archivos de AMAZON S3)</h3>
       </div>
    </header>

<div class="container">




    <form class="form-inline" action="copiar.php" method="post" id="uploadfile" enctype="multipart/form-data">
   
   

    
    <div class="col-sm-8">
            <input type="hidden" name="ruta" id="ruta"    >
            <input type="hidden" name="quecuenta" id="quecuenta" value="<?php echo $cuenta; ?>">
            <input type="hidden" name="gestor" id="gestor" value="<?php echo $idaspuser; ?>">
            <input type="hidden" name="fechacaptura" id="fechacaptura" value="<?php echo $fechac; ?>">
            <input type="hidden" name="plaza" id="plaza" value="<?php echo $laplaza; ?>">
            <input type="hidden" name="idtarea" id="idtarea" value="<?php echo $idtarea; ?>">
            <input type="hidden" name="tipo" id="tipo" value="<?php echo $tipo; ?>">


            <input id="fileselector" type="file" webkitdirectory directory multiple="false" onchange="selectFolder(event)" required  />

            <input type="text" name="laruta" id="laruta" placeholder="Copiar Ruta del Directorio" required>
            <br><br>
            <button type="submit" class="btn btn-primary">Cargar Archivos</button>

        <br><br>
       
</div>
       
<br><br>
        <div class="col-sm-6">
        <ul id="listing">
                      
            </ul>
            </div>
        
    </form>
</div>
</body>
</html>


<script type="text/javascript">


document.getElementById("fileselector").addEventListener("change", function(event) {
   
  
  let output = document.getElementById("listing");
  let files = event.target.files;

  for (let i=0; i<files.length; i++) {
    let item = document.createElement("li");
    item.innerHTML = files[i].webkitRelativePath;
    output.appendChild(item);
  };

     //  var sourceVal = document.getElementById("fileselector").files[0].path;
     //   $("#ruta").val(sourceVal);
     //   alert(sourceVal.value);

}, false);


function selectFolder(e) {
   // alert("entre selectfolder");

    

   // var theFiles = e.target.files;
   // var rulaRelativa = theFiles[0].webkitRelativePath
   // var folder = rulaRelativa.split("/");

   // alert(folder[0]);
    


   // var txt = "";
   // var theFiles = e.target.files;
   // var relativePath = theFiles[0].webkitdirectory;
   // var relativePath = theFiles[0].webkitRelativePath;
   // var x = document.getElementById("fileselector").value;
   // document.getElementById("demo").innerHTML = x;
   // document.getElementById("demo1").innerHTML = relativePath;
   // var folder = relativePath.split("/");
   // alert(folder[0].value);
    
}
    


$('#uploadfile').submit(function(e)
    {
        e.preventDefault();

     // var Form = new FormData($('#uploadfile')[0]);
      var Form = new FormData(uploadfile);
     // var Form = new FormData();

     // Form.append("laruta", "laruta");
     // Form.append("cuenta", "cuenta"); 
  //   var xruta = $('#laruta').val();
  //       xcta = $('#quecuenta').val();
  //  alert(xcta);
           
  //                  var parametros =
   //           {
   //               "laruta" : xruta,
   //               "cuenta" : xcta
   //           };

$.ajax({

    url : "copiar.php",
    type : "post",
    data: Form,
    //data: parametros,
    processData: false,
    contentType: false,
    success : function(data)
    {
        //alert(data);
       
       // location.reload();
        //alert('Cargados Correctamente!');
        //history.back();
        history.back();
        //location.reload();
      //  location.reload();
       // header("Location: ./imagenesS3.php?plz=4&idreg=1&rol=1");
    }
});

    });





</script>