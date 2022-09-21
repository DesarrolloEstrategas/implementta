<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require '../phpMailer/Exception.php';
require '../phpMailer/PHPMailer.php';
require '../phpMailer/SMTP.php';

//require "../../acnxerdm/cnx.php";

//*****************COREO CON PHPMAILER*********************************************************************
//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);
try {
    //Server settings
    $mail->SMTPDebug = 0;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'contac.centersrategas@gmail.com';                     //SMTP username
    $mail->Password   = 'Sistemas&2022';                               //SMTP password
    $mail->SMTPSecure = 'TLS';            //Enable implicit TLS encryption
    $mail->Port       = 465;             //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
    //Recipients
    $mail->setFrom('contac.centersrategas@gmail.com', 'Correos masivos');   //CORREO QUE ENVIA
    //$mail->addAddress('ciiga@estrategas.mx', 'CIIGA');     //CORREO QUE RECIVE
    $mail->addAddress('rafael.hernandez@erdm.mx');     //CORREO QUE RECIVE
    //Attachments
    //$mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
    //$mail->addAttachment('../pdf/temp/'.$qrcode['qrCode'].'.png', 'CodigoDeAccesoCIIGA.png');    //Optional name
    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = utf8_decode('Correos masivos desde el CIIGA');  //ASUNTO DEL CORREO
    $mail->Body    = utf8_decode('
                      <h1>Correos masivos desde el CIIGA</h1>');  //CUERPO DEL CORREO
    $mail->send();
    } catch (Exception $e) {
        echo "Mensaje no enviado, verifique mail. Si continua el error, contacte al departamento de sistemas. Mail Error: {$mail->ErrorInfo}";
    }
//************************* FIN COREO CON PHPMAILER ***********************************************




//echo '<meta http-equiv="refresh" content="0,url=correoMasivo.php">';




?>