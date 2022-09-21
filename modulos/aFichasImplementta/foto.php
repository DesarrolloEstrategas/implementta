<?php
//require '../vendor/autoload.php';
//
//use Aws\S3\S3Client;
//use Aws\Exception\AwsException;
//
//
//
//$credentials = new Aws\Credentials\Credentials('AKIAQAVQA6VN6HK3Q6GL','C63ZsKEIt5KeIby0Xb2xgRD');
//$client = new Aws\S3\S3Client(['version'=>'2006-03-01','region'=>'us-east-1','credentials'=>$credentials]);
//$client->registerStreamWrapper();  // link file
//$url = 's3://fotos-implementta-movil/02207000712021-05-03T16:28:44.000Z';  // add background image






//$imagen='https://fotos-implementta-movil.s3.amazonaws.com/20704542022-05-02T16%3A45%3A19.000Z?AWSAccessKeyId=AKIAQAVQA6VNSP724ERU&Expires=1951531006&Signature=q5%2B%2F%2FNTQ7l1WfCuZZshqHqYQbDs%3D';
//
////$imagen='https://img.icons8.com/color/48/000000/animated.png';
//
//$carpeta='../img/imagen1.jpeg';
//
////$destino=$carpeta.substr($imagen,strrpos($imagen,"/")+1);
//file_put_contents($carpeta, file_get_contents($imagen));


$imagen='https://fotos-implementta-movil.s3.amazonaws.com/20704542022-05-02T16%3A45%3A19.000Z?AWSAccessKeyId=AKIAQAVQA6VNSP724ERU&Expires=1951531006&Signature=q5%2B%2F%2FNTQ7l1WfCuZZshqHqYQbDs%3D';
$imgName='cuenta_'.rand(100,999).rand(100,999).rand(100,999).'_'.date('dmY_his').'.jpeg';
$carpeta='../img/'.$imgName;
file_put_contents($carpeta, file_get_contents($imagen));



?>







<!--<img src="https://fotos-implementta-movil.s3.amazonaws.com/20704542022-05-02T16%3A45%3A19.000Z?AWSAccessKeyId=AKIAQAVQA6VNSP724ERU&Expires=1951531006&Signature=q5%2B%2F%2FNTQ7l1WfCuZZshqHqYQbDs%3D">-->


<!--<img src="https://img.icons8.com/color/48/000000/picture--v1.png">-->













<?php 





//
//function s3_upload_put_object($file)
//{
//    $options = [
//        'region' => 'us-east-1',
//        'version' => '2006-03-01',
//        'credentials' => [
//            'key' => 'AKIAQAVQA6VN6HK3Q6GL',
//            'secret' => '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'
//        ]
//    ];
//    $file_name = $file['name'];
//    $file_path = $file['tmp_name'];
//    try{
//        $s3Client  = new S3Client($options);
//        $result = $s3Client->putObject([
//            'Bucket' => 'admos3',
//            'Key' => $file_name,
//            'SourceFile' => $file_path
//        ]);
//        echo "<pre>".print_r($result, true)."</pre>";
//    }catch(AwsException $e){
//        echo $e->getMessage()."\n";
//    }
//}
//














//*************************************************************************


//require '../vendor/autoload.php';
//
//use Aws\S3\S3Client;
//use Aws\Exception\AwsException;
//
//
//
//    $s3Client = new Aws\S3\S3Client([
//    'profile' => 'default',
//    'region' => 'us-east-1',
//    'version' => '2006-03-01',
//]);
//
//$cmd = $s3Client->getCommand('GetObject', [
//    'Bucket' => 'fotos-implementta-movil',
//    'Key' => 'AKIAQAVQA6VN6HK3Q6GL'
//]);
//
//$request = $s3Client->createPresignedRequest($cmd, '+20 minutes');
//



















?>



































