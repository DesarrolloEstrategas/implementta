<?php

require 'vendor/autoload.php';


use Aws\S3\S3Client;
use Aws\Exception\AwsException;


$plaza = $_POST['plaza'];


$serverName = "implementta.mx";
$connectionInfo = array( 'Database'=>$plaza, 'UID'=>'sa', 'PWD'=>'vrSxHH3TdC');
$conn = sqlsrv_connect($serverName, $connectionInfo);
date_default_timezone_set('America/Mexico_City'); 





if($_POST['key'])
{

$bucket = $_POST['bucketnombre'];
$keyname = $_POST['key'];

$tsql = "delete registrofotomovil where nombreFoto = '$keyname' ";
$res = sqlsrv_query($conn,$tsql);


//borrar registro de [registrofotomovil]


$S3options = [
    'region' => 'us-east-1',
    'version' => '2006-03-01',
    'credentials' => [
        'key' => 'AKIAQAVQA6VN6HK3Q6GL',
        'secret' => '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'
    ]
];

$s3 = new S3Client($S3options); 



// 1. Delete the object from the bucket.
try
{
    echo 'Attempting to delete ' . $keyname . '...' . PHP_EOL;

    $result = $s3->deleteObject([
        'Bucket' => $bucket,
        'Key'    => $keyname
    ]);

    if ($result['DeleteMarker'])
    {
        echo $keyname . ' was deleted or does not exist.' . PHP_EOL;
    } else {
        exit('Error: ' . $keyname . ' was not deleted.' . PHP_EOL);
    }
}
catch (S3Exception $e) {
    exit('Error: ' . $e->getAwsErrorMessage() . PHP_EOL);
}

// 2. Check to see if the object was deleted.
try
{
    echo 'Checking to see if ' . $keyname . ' still exists...' . PHP_EOL;

    $result = $s3->getObject([
        'Bucket' => $bucket,
        'Key'    => $keyname
    ]);

    echo 'Error: ' . $keyname . ' still exists.';
}
catch (S3Exception $e) {
    exit($e->getAwsErrorMessage());
} 

}

?>