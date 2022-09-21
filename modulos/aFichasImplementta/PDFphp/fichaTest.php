<?php
require '../../vendor/autoload.php';

use Aws\S3\S3Client;
use Aws\Exception\AwsException;


require('../../fpdf/fpdf.php');
class PDF extends FPDF
{
    function Header()
          {
             $this->Image('../../img/formatoPDF_stratimex.jpg', 1, 3, 220); 
             // Arial bold 17
             $this->SetFont('Arial','B',21);
              //195 tamaño hoja
             //$this->Ln(3);
              //$this->SetX(75);
              //$this->Cell(150,10,'Estrategas de '.utf8_decode('México'),0,0,'L');
             // $this->SetFont('Arial','',16);
              //$this->Ln(8);
              //$this->SetX(75);
             //$this->Cell(150,10,'Informe de prenomina',0,0,'L');
             // Salto de línea
             $this->Ln(27);
          }
// Pie de página
function Footer()
{
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    $this->SetY(-28);
    $this->SetFont('Arial','B',12);
    $this->SetFillColor(13,50,95);
    $this->SetTextColor(255,255,255);
    $this->Cell(196,7,utf8_decode('www.estrategas.mx'),1,1,'C',1);
    
    $this->SetFont('Arial','B',9);
    $this->SetTextColor(13,50,95);
    $this->MultiCell(196,1,'',0,'C',0);
    $this->MultiCell(196,4,utf8_decode('Grupo Estrategas de México ®'),0,'C',0);
    $this->MultiCell(196,4,utf8_decode('Paseo de la Reforma 2608, Col. Lomas Altas, Alcaldía Miguel Hidalgo, C. P. 11950 México, CDMX. (55) 2167 2666'),0,'C',0);
    $this->SetTextColor(0,0,0);
    $this->SetFont('Arial','',9);
    $this->Cell(0,5,utf8_decode('Página '.$this->PageNo().' de {nb}'),0,0,'R');
    }
}
	$pdf = new PDF('P', 'mm', 'Letter');
    $pdf->SetAutoPageBreak(true,15);
	$pdf->AliasNbPages();
	$pdf->AddPage();
    $archivo='Informe_prenomina_'.date('d_m_Y').'.pdf';
    $pdf->SetTitle($archivo);

require "../../../acnxerdm/cnx.php";




//******************* INICIA TABLA 196 ancho total de celda**************************

	$pdf->SetFont('Arial','',9);
    $pdf->Cell(196,5,'FICHA DE VISITA EXTRAJUDICIAL',0,1,'R',0);

    $pdf->Ln(2);

	$pdf->SetFillColor(222,222,222);
	$pdf->SetTextColor(0,0,0);
	$pdf->SetFont('Arial','B',10);

    $pdf->Cell(196,5,'DATOS DE LA CUENTA:',0,1,'L',0);



    $pdf->SetFont('Arial','B',9);
    $pdf->Cell(32,4,'Nombre de usuario:',0,0,'L',0);
    $pdf->SetFont('Arial','',9);
    $pdf->Cell(164,4,utf8_decode('ISABEL SANCHEZ BARRERA'),0,1,'L',0);



	$pdf->SetFont('Arial','B',9);
    $pdf->Cell(17,4,'Domicilio:',0,0,'L',0);
    $pdf->SetFont('Arial','',9);
    $pdf->Cell(179,4,utf8_decode('HORACIO ZUNIGA 102, FRANCISCO MURGUÍA (EL RANCHITO), C.P. 50120'),0,1,'L',0);


	$pdf->SetFont('Arial','B',9);
    $pdf->Cell(24,4,utf8_decode('Clave catastra:'),0,0,'L',0);
    $pdf->SetFont('Arial','',9);
    $pdf->Cell(172,4,'654654656523255551111111',0,1,'L',0);


    $pdf->SetFont('Arial','B',9);
    $pdf->Cell(9,4,utf8_decode('NIS:'),0,0,'L',0);
    $pdf->SetFont('Arial','',9);
    $pdf->Cell(187,4,utf8_decode('2022-05-16 16:38:28.867'),0,1,'L',0);


    $pdf->Ln(5);
	$pdf->SetFont('Arial','B',10);
    $pdf->Cell(196,5,utf8_decode('INFORMACIÓN DE LA VISITA:'),0,1,'L',0);

    $pdf->SetFont('Arial','B',9);
    $pdf->Cell(15,5,utf8_decode('Fecha:'),1,0,'L',0);
    $pdf->SetFont('Arial','',9);
    $pdf->Cell(40,5,utf8_decode('2022-05-16 16:38:28.867'),1,0,'L',0);

    $pdf->SetFont('Arial','B',9);
    $pdf->Cell(25,5,utf8_decode('Georreferencia:'),1,0,'L',0);
    $pdf->SetFont('Arial','',9);
    $pdf->Cell(116,5,utf8_decode('19.456295,-98.881412'),1,1,'L',0);

    $pdf->SetFont('Arial','B',9);
    $pdf->Cell(15,5,utf8_decode('Hora:'),1,0,'L',0);
    $pdf->SetFont('Arial','',9);
    $pdf->Cell(40,5,utf8_decode('16:38:28.867'),1,0,'L',0);

    $pdf->SetFont('Arial','B',9);
    $pdf->Cell(25,5,utf8_decode('Visitador:'),1,0,'L',0);
    $pdf->SetFont('Arial','',9);
    $pdf->Cell(116,5,utf8_decode('Carlos Rafael Hernández Magos'),1,0,'L',0);



    $pdf->Ln(10);
	$pdf->SetFont('Arial','B',10);
    $pdf->Cell(196,5,utf8_decode('EVIDENCIA FOTOGRÁFICA'),0,1,'L',0);




//**********************************************************************************************************
/*
function compressImage($source, $destination, $quality) {
    $imgInfo = getimagesize($source); 
    $mime = $imgInfo['mime']; 
    switch($mime){
        case 'image/jpeg': 
            $image = imagecreatefromjpeg($source); 
            break;
        case 'image/png': 
            $image = imagecreatefrompng($source); 
            break; 
        case 'image/gif': 
            $image = imagecreatefromgif($source); 
            break; 
        default: 
            $image = imagecreatefromjpeg($source); 
    }
    imagejpeg($image, $destination, $quality); 
    return $destination; 
}


// Ruta subida
$uploadPath = $path.'/compressImage/'; 
if (!file_exists($uploadPath)) {
    mkdir($uploadPath, 0777, true);
}
    if(!empty($path.'/'.$imgName)){
        $fileName = $imgName; //nombre de foto comprimida (resultante)
        $imageUploadPath = $uploadPath . $fileName;
        $fileType = pathinfo($imageUploadPath, PATHINFO_EXTENSION);
            $imageTemp = $path.'/'.$imgName; // Image temp source
            $compressedImage = compressImage($imageTemp, $imageUploadPath,5); // Comprimimos el fichero
            if($compressedImage){
                $nomFoto=$path.'/'.$imgName;
//                unlink($nomFoto);  //eliminar foto original
            }
    }
*/
//************************************************************************************************************


$path = "../../img/fotoMovil/TolucaA";

if (!file_exists($path)){
    mkdir($path, 0777, true);
}
    $imagen='https://fotos-implementta-movil.s3.amazonaws.com/20324582022-05-02T16%3A36%3A13.000Z?AWSAccessKeyId=AKIAQAVQA6VNSP724ERU&Expires=1951540047&Signature=vjSkEDjHAltvmN%2FAw1fR9pN62WQ%3D';
    $imgName='cuenta_'.rand(100,999).rand(100,999).rand(100,999).'_'.date('dmY_his').'.jpeg';
    $carpeta=$path.'/'.$imgName;
    file_put_contents($carpeta, file_get_contents($imagen));




$pdf->Cell(196,4,'',0,1,'C',0);
//$pdf->Cell(7,70,'',0,0,'C',0);
//$pdf->Cell(98,80, $pdf->Image($path.'/'.$imgName, $pdf->GetX(), $pdf->GetY(),0,80),1,0,'C',0);
//$pdf->Cell(98,80, $pdf->Image($path.'/'.$imgName, $pdf->GetX(), $pdf->GetY(),0,80),1,1,'C',0);



//$pdf->Cell(11,11, $pdf->Image($path.'/'.$imgName, $pdf->GetX(), $pdf->GetY(),20),1);

$pdf->Cell(27,70,'',0,0,'C',0);
$pdf->Cell(70,15, $pdf->Image($path.'/'.$imgName, $pdf->GetX(), $pdf->GetY(),70),0);
$pdf->Cell(2,70,'',0,0,'C',0);
$pdf->Cell(70,15, $pdf->Image($path.'/'.$imgName, $pdf->GetX(), $pdf->GetY(),70),0);







$pdf->SetFont('Arial','',5);
$pdf->SetFillColor(0,0,0);
$pdf->setTextColor(255,255,255);
$pdf->SetY(172);
$pdf->Cell(7,4,'',0,0,'L',0);
$pdf->Cell(16,2.5,utf8_decode('Cuenta: 2070454'),0,0,'L',0);
$pdf->Cell(82,2.5,'',0,0,'L',0);
$pdf->Cell(16,2.5,utf8_decode('Cuenta: 2070454'),0,1,'L',0);

$pdf->Cell(7,4,'',0,0,'L',0);
$pdf->Cell(28,2.5,utf8_decode('Fecha: 2022-05-16 16:45:19.000'),0,0,'L',0);
$pdf->Cell(70,2.5,'',0,0,'L',0);
$pdf->Cell(28,2.5,utf8_decode('Fecha: 2022-05-16 16:45:27.000'),0,1,'L',0);




$pdf->setTextColor(0,0,0);








//$pdf->Cell(196,28, $pdf->Image('https://www.mapquestapi.com/staticmap/v5/map?key=TseBen3rJpSArP9MGrAaQYO8Yv5UQxBh&locations=19.456295,%20-98.881412&format=png&defaultMarker=marker-red&scalebar=true&zoom=16&size=700,170@2x&banner=Lat%2019.456295,%20Long%20-98.881412|sm'.'.png',$pdf->GetX(), $pdf->GetY(),196),0);

$pdf->Image('https://www.mapquestapi.com/staticmap/v5/map?key=TseBen3rJpSArP9MGrAaQYO8Yv5UQxBh&locations=19.456295,%20-98.881412&format=png&defaultMarker=marker-red&scalebar=true&zoom=16&size=1000,235@2x&banner=Lat%2019.456295,%20Long%20-98.881412|sm',10,205,196,0,'PNG');









$pdf->Output($archivo,'I');





