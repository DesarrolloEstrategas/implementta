<?php
require 'vendor/autoload.php';

$fromDir = $_POST['laruta'];
$lacuenta = $_POST['quecuenta'];
$laplaza = $_POST['plaza'];
$idaspuser = $_POST['gestor'];
$fechacaptura = $_POST['fechacaptura'];
$idtarea = $_POST['idtarea'];
$tipo = $_POST['tipo'];


 

$serverName = "implementta.mx";
$connectionInfo = array( 'Database'=>$laplaza, 'UID'=>'sa', 'PWD'=>'vrSxHH3TdC');
$conn = sqlsrv_connect($serverName, $connectionInfo);
date_default_timezone_set('America/Mexico_City'); 


use Aws\Exception\AwsException;
use Aws\S3\S3Client;
use Aws\CommandPool;
use Aws\CommandInterface;
use Aws\ResultInterface;
use GuzzleHttp\Promise\PromiseInterface;

// Create the client
$S3options = [
    'region' => 'us-east-1',
    'version' => '2006-03-01',
    'credentials' => [
        'key' => 'AKIAQAVQA6VN6HK3Q6GL',
        'secret' => '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'
    ]
];

$client = new S3Client($S3options); 
//$client = new S3Client([
//    'region'  => 'us-standard',
//    'version' => '2006-03-01'
//]);






echo $lacuenta;

//echo $fromDir;
//$toBucket = 'admos3';
$toBucket = 'fotos-implementta-movil';
//$fromDir = 'c:\img\gil';

// Create an iterator that yields files from a directory
$files = new DirectoryIterator($fromDir);

// Create a generator that converts the SplFileInfo objects into
// Aws\CommandInterface objects. This generator accepts the iterator that
// yields files and the name of the bucket to upload the files to.



$commandGenerator = function (\Iterator $files, $bucket, $xcta, $usuario, $conexion, $s3, $fechacap, $tarea, $tipo) use ($client) {
    $cr=0;
    foreach ($files as $file) {
      
       // $nombre = $lacuenta.'_'.$fecha;
        // Skip "." and ".." files
        if ($file->isDot()) {
            continue;
        }
       
        $filename = $file->getPath() . '/' . $file->getFilename();

        $cr++;
        $DateAndTime = date('Y-m-d h:i:s', time());  
       
        //$fecha = getdate();
        //$stringDate = $fecha->format('Y-m-d H:i:s');

        $xfto=$xcta.$DateAndTime.'_'.strval($cr);
        //crearnombre
       // $nombre = $xcta.'_'.$stringDate;
        // Yield a command that is executed by the pool
        yield $client->getCommand('PutObject', [
            'Bucket' => $bucket,
           // 'Key'    => $file->getBaseName(),
            'Key'    => $xcta.$DateAndTime.'_'.strval($cr),
         //   'Key'    => $nombre,
            'Body'   => fopen($filename, 'r')
        ]);


        //crea URL
        $cmd = $s3->getCommand('GetObject', [
            'Bucket' => $bucket,
            'Key' => $xfto
        ]);
        
        $request = $s3->createPresignedRequest($cmd, '+20 minutes');
        
        // Get the actual presigned-url
        $presignedUrl = (string)$request->getUri();
        //echo $presignedUrl;
        //$presignedUrl = "http://implemmentass3";
         /// INSERTA DATOS A registrofotomovil
        //insertadatos($xcta,$laplaza,$idaspuser,$fechacaptura);

        $fecap = date("Y-d-m", strtotime($fechacap));
      //  $anio = substr(fechacap,1,4);
      //  $mes = substr(fechacap,6,2);
      //  $dia = substr(fechacap,9,2);

      //  $fcaptura = $dia.'-'.$mes.'-'.$año;


        $xfto=$xcta.$DateAndTime.'_'.strval($cr);
        $insertar = "INSERT INTO registrofotomovil (cuenta,idAspUser,nombrefoto,urlImagen,fechacaptura,IdTarea,tipo) values 
        ('$xcta','$usuario','$xfto','$presignedUrl','$fecap','$tarea','$tipo')";

       // echo console.log($insertar);
        sqlsrv_query($conexion,$insertar); 
       
       
        
        /// FIN INSERTA DATOS
       


        //FIN URL

    }
};

// Now create the generator using the files iterator


$commands = $commandGenerator($files, $toBucket, $lacuenta, $idaspuser, $conn, $client, $fechacaptura, $idtarea, $tipo);

// Create a pool and provide an optional array of configuration
$pool = new CommandPool($client, $commands, [
    // Only send 5 files at a time (this is set to 25 by default)
    'concurrency' => 5,
    // Invoke this function before executing each command
    'before' => function (CommandInterface $cmd, $iterKey) {
        echo "About to send {$iterKey}: "
            . print_r($cmd->toArray(), true) . "\n";
    },
    // Invoke this function for each successful transfer
    'fulfilled' => function (
        ResultInterface $result,
        $iterKey,
        PromiseInterface $aggregatePromise
    ) {
        echo "Completed {$iterKey}: {$result}\n";
    },
    // Invoke this function for each failed transfer
    'rejected' => function (
        AwsException $reason,
        $iterKey,
        PromiseInterface $aggregatePromise
    ) {
        echo "Failed {$iterKey}: {$reason}\n";
    },
]);

// Initiate the pool transfers
$promise = $pool->promise();

// Force the pool to complete synchronously
$promise->wait();

// Or you can chain the calls off of the pool
$promise->then(function() { echo "Done\n"; });

sqlsrv_close($conn);






?>