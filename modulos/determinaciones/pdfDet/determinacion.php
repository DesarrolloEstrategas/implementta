<?php
require('../../fpdf/fpdf.php');
class PDF extends FPDF
{
          function Header()
          {
             $this->Image('../../img/determinacion.jpg', 1, 1, 220);
             // Arial bold 17
             $this->SetFont('Arial','B',19);
              //195 tamaño hoja
              
              
                $this->Ln(6);
                $this->SetX(52);
                $this->SetFont('Arial','B',9);
                $this->SetTextColor(0,0,0);
                $this->MultiCell(105,4,utf8_decode('DETERMINACIÓN DE LIQUIDACION DE CREDITO FISCAL POR ADEUDO DEL IMPUESTO PREDIAL'),1,'C',0);
                $this->Ln(6);
              
                //****************************************************************
                $this->SetFont('Arial','',8);
                $this->SetFillColor(217,217,217);

                $this->Cell(69,4,utf8_decode('CONTRIBUYENTE'),1,0,'C');
                $this->Cell(29,4,utf8_decode('EXPEDIENTE'),1,0,'C');
                $this->Cell(49,4,utf8_decode('CUENTA PREDIAL'),1,0,'C');
                $this->Cell(49,4,utf8_decode('NÚMERO DE CRÉDITO'),1,1,'C');

                $this->Cell(69,4,utf8_decode('C. CORTEZ GONZÁLEZ ALEJANDRO EUGENIO'),1,0,'C');
                $this->Cell(29,4,utf8_decode('TEZ/2022/50'),1,0,'C');
                $this->Cell(49,4,utf8_decode('1114326639'),1,0,'C');
                $this->Cell(49,4,utf8_decode('7474276'),1,1,'C');
                //**************************************************************
              
              
              
                $this->Cell(39,8,utf8_decode('SUPERFICIE DEL TERRENO'),1,0,'C');
                $this->Cell(59,8,utf8_decode(''),0,0,'C');
                $this->Cell(59,8,utf8_decode(''),0,0,'C');
                $this->Cell(39,8,utf8_decode('DIFERENCIA'),1,1,'C');

                $this->Cell(39,4,utf8_decode('900'),1,0,'C');
                $this->Cell(59,4,utf8_decode('885'),1,0,'C');
                $this->Cell(59,4,utf8_decode('954.08'),1,0,'C');
                $this->Cell(39,4,utf8_decode('69.00'),1,1,'C');
                //**************************************************************
                $this->SetY(38);
                $this->SetX(49);
                $this->MultiCell(59,4,utf8_decode('SUPERFICIE DE CONSTRUCCIÓN REGISTRADA'),1,'C',0);
                $this->SetY(38);
                $this->SetX(108);
                $this->MultiCell(59,4,utf8_decode('SUPERFICIE DE CONSTRUCCIÓN DETECTADA'),1,'C',0);
                $this->Ln(10);
              
              
              
              
          }
// Pie de página
function Footer(){
    // Arial italic 8
    $this->SetFont('Arial','I',8);
     // Posición: a 1,5 cm del final
    $this->SetY(-15);
    $this->Cell(0,10,utf8_decode(''.$this->PageNo().'/{nb}'),0,0,'R');
    $this->SetFont('Arial','',6);
    $this->SetY(-50);
//    $this->MultiCell(195,3,utf8_decode($texto),0,'L',0);
    }
}


//require "../../../acnxerdm/cnx.php";
$serverName = "implementta.mx";
    $connectionInfo = array( 'Database'=>'cartomaps', 'UID'=>'sa', 'PWD'=>'vrSxHH3TdC');
    $cnx = sqlsrv_connect($serverName, $connectionInfo);
    date_default_timezone_set('America/Mexico_City');

    $token=$_GET['clvCL'];
    $emp="select * from fichaResult
    where tokenResult='$token'";
    $empl=sqlsrv_query($cnx,$emp);
    $empleado=sqlsrv_fetch_array($empl);

    $fo="select * from footer";
    $foo=sqlsrv_query($cnx,$fo);
    $footer=sqlsrv_fetch_array($foo);
    $texto=$footer['text'];

$idResult=$empleado['id_fichaResult'];




	$pdf = new PDF('P', 'mm', 'Letter');
    $pdf->SetAutoPageBreak(true,10);
	$pdf->AliasNbPages();
	$pdf->AddPage();
    $archivo='Determinacion_'.date('is').rand(100,999).'.pdf';
    $pdf->SetTitle($archivo);



//****************************************************************
$pdf->SetFont('Arial','B',8);
$pdf->Cell(196,4,utf8_decode('C. CONTRIBUYENTE: C. Cortez González Alejandro Eugenio'),0,1,'L',0);
$pdf->Cell(196,4,utf8_decode('DOMICILIO PREDIO: Circuito SanEduardo No 93, Col. Bodegas de San Juan'),0,1,'L',0);
$pdf->Cell(196,4,utf8_decode('DOMICILIO PARA NOTIFICACIONES:'),0,1,'L',0);

$pdf->Cell(66,4,utf8_decode('CUENTA PREDIAL: 1114326639'),0,0,'L',0);
$pdf->Cell(65,4,utf8_decode('CLAVE CATASTRAL: 12014G1-190-0052-0000'),0,0,'L',0);
$pdf->Cell(65,4,utf8_decode('SECTOR/MANZANA 037/209'),0,1,'L',0);

$pdf->Cell(98,4,utf8_decode('CURT: 1401212001000103720900044000000'),0,0,'L',0);
$pdf->Cell(98,4,utf8_decode('ESTADO DEL PREDIO: URBANO, EDIFICADO'),0,1,'L',0);

$pdf->Cell(98,4,utf8_decode('SUPERFICIE DEL TERRENO: 900'),0,0,'L',0);
$pdf->Cell(98,4,utf8_decode('SUPERFICIE DE CONSTRUCCIÓN 954.08'),0,1,'L',0);


$pdf->SetFont('Arial','',7);
$pdf->MultiCell(196,3,utf8_decode('La Tesorería Municipal de Zapopan, Jalisco, cuyo titular es la Maestra Adriana Romo López, es competente para conocer del presente asunto en el tenor de lo siguiente: artículos 14, 16 párrafo primero, 31 fracción IV, y 115 fracción I, II y IV inciso a) de la Constitución Política de los Estados Unidos Mexicanos; artículos 1, 2, 3, 73, 78, 88,  fracción I, y 89 de la Constitución Política del Estado de Jalisco; artículos 1, 3, 11, 20 fracción III, 23 fracciones I, III inciso a), IV X, XI, XII y XIII de la Ley de Hacienda Municipal del Estado de Jalisco; artículos 32 fracciones VII, VIII y XLVII del Reglamento de la Administración Pública Municipal de Zapopan, Jalisco.
CONTRIBUYENTE: La Tesorería Municipal de Zapopan Jalisco, como autoridad fiscal con respecto de las contribuciones del orden municipal a su cargo, conforme a los artículos 1, 2, 3, 10, 11, 12, 14, 20 fracciones III, IV, VII, y 23 fracciones I, III inciso a), IV, X, XI, XII y XIII de la Ley de Hacienda Municipal del Estado de Jalisco y en particularmente estima que:
a) Esta autoridad lo ha considerado a Usted como sujeto pasivo de un crédito fiscal, en virtud de su condición de sujeto obligado al pago con fundamentos en los artículos 29, 30, fracciones I, II, III, IV, V, VII, IX, X, y XIII, 31 y 33 de la Ley de Hacienda Municipal del Estado de Jalisco, en relación con el inmueble situado en el domicilio: Circuito SanEduardo No 93, Col. Bodegas de San Juan en el Municipio de Zapopan, Jalisco.
b) Que dicha condición de sujeto obligado y su vinculación con el predio se deriva de la información y datos asentados en los registros de la Dirección de Catastro del Municipio de Zapopan, Jalisco de acuerdo con los artículos 2 y 4 fracción XLI, de la Ley de Catastro Municipal de Estado de Jalisco.
c) Por lo anterior, usted está obligado al cumplimiento del pago de las diferencias de construcción, construcciones no manifestadas y/u omisos que correspondan al mismo, con fundamento en los artículos 37 fracción III, 42,43, 46, 92, 93, 94 fracción I, II, III y IV y 97 de la Ley de Hacienda Municipal de Estado de Jalisco.
d) Que derivado de la metodología usada para la detección de diferencias en metros de construcción, construcciones no manifestadas u omisos  mediante  un análisis técnico integral realizado por el Licenciado en Ingeniería Topográfica y Fotogramétrica, Ramón Arón Rodríguez Torres, con Cédula Profesional con número 11024397, a través del uso de medio de interpretación de métodos fotométricos de traslape e imagen tridimensional por medio de un Drone marca EBEE X de ala fija, con número de serie IX-02-89713/AD1F00008, con tecnología de aterrizaje Steep Landing que proporciona datos de tráfico aéreo en tiempo real, con exclusiva extensión de resistencia y sistema de alta precisión (HPoD), sin GCP, que trabaja con una cámara fotogramétrica profesional de cartografía sensefly S.O.D.A. 3D que permite una precisión absoluta de hasta 3 cm(1,2 in) con captura de reconstrucciones en 3D en entornos verticales y con capacidad de capturar 3 imágenes cada vez (2 oblicuas a 35 grados, 1 nadir), que genera un campo de visión más amplio que garantiza un procesamiento rápido y eficiente de imágenes, que vuela sobre la clasificación de sistemas de aeronaves pilotadas a distancia baja en el espacio aéreo mexicano, en las clasificaciones 4.10, 4.11, 5.1 en la categoría del RPAS MICR, bajo la Norma Oficial mexicana NOM-107-SCT3-2019, y cuenta con la certificación de la AFAC (Agencia Federal de Aviación Civil) y la Secretaria de Comunicaciones y Transportes, con metodología de interpretación topográfica de terreno, mediante sensores LIDAR y elementos de elevación, con calibración de la imagen mediante un dispositivo GNSS en modo PPK y RTK, de conformidad con los artículos 5 y 6 del Reglamento de la Ley de Catastro Municipal del Estado de Jalisco, para identificar diferencias en metros cuadrados en las superficies de terreno y/o construcción, identificación de predios omisos y diferencias en cualquiera de los trámites y servicios donde se aplique el concepto de cobro del Impuesto Predial de conformidad con lo establecido por la Ley de Ingresos del Municipio de Zapopan, Jalisco para el ejercicio fiscal que corresponda, ello al cruzar la información con el antecedente emanado de la ortofoto en formato sw de 8 bits resolución espacial de 40 cm. RGB 123 y tomada de en la fecha de mayo a junio del 2016 con que se cuenta en la dependencia catastral, siendo 69.08 metros cuadrados de diferencia de construcción, construcción no manifestada yo omisos detectados. 
e) Esta autoridad procedió de conformidad con los artículos 94 fracción XI y 108 primer párrafo de la Ley de Hacienda Municipal del Estado de Jalisco, dicho resultado, fue notificado y enterado legalmente con fecha 29 de Julio del 2022,
POR TODO LO ANTERIOR SE DETERMINA A SU CARGO UN CREDITO FISCAL POR CONCEPTO DE DIFERENCIAS EN METROS DE CONSTRUCCIÓN, CONSTRUCCIONES NO MANIFESTADAS Y/O OMISOS POR LOS ULTIMOS CINCO AÑOS, de conformidad con la resolución de fecha 12 de Agosto del 2022, que fue notificada a usted dentro del expediente señalado al inicio de la presente determinación. En complemento de lo anterior y con fundamento en lo dispuesto en los artículos 14, 16 párrafo primero, 31 fracción IV, y 115 fracción I, II y IV inciso a) de la Constitución Política de los Estados Unidos Mexicanos; artículos 1, 2, 3, 73, 78, 88, fracción I, y 89 de la Constitución Política del Estado de Jalisco; artículo 32 del Reglamento de la Administración Pública Municipal de Zapopan, Jalisco; artículos 23 fracciones I, III inciso a), IV, X incisos  b), c), e), XI, XII y XIII,  38, 94 fracción XI, 97 y 108 primer párrafo de la Ley de Hacienda Municipal del Estado de Jalisco; artículo 40 fracción II, 43 y 45 de la Ley de Ingresos del Municipio de Zapopan, Jalisco para el ejercicio fiscal 2022, es competente para decretar en definitiva la determinación de crédito fiscal correspondiente a la diferencia en metros de construcción, construcción no manifestada u omisos detectados contra de C. C. Cortez González Alejandro Eugenio por incumplimiento a los artículos 37 fracción III, 43, 94 fracciones I, II, III y IV, 108 primer párrafo  y 109 fracción II, de la Ley de Hacienda Municipal del Estado de Jalisco; respecto al inmueble ya especificado en la parte inicial de la presente DETERMINACIÓN conforme a los siguientes valores, que fueron dados a conocer a usted y que se describen a continuación.'),0,'L',0);


//*************************************** FICHA CATASTRAL **************************************************************************************

$pdf->Ln(4);

$pdf->SetFont('Arial','B',9);
$pdf->SetFillColor(217,217,217);
$pdf->Cell(196,5,utf8_decode('CLAVE UNICA'),1,1,'C',1);

$pdf->Cell(19.6,4,utf8_decode('Estado'),1,0,'C');
$pdf->Cell(19.6,4,utf8_decode('Región'),1,0,'C');
$pdf->Cell(19.6,4,utf8_decode('Mpio'),1,0,'C');
$pdf->Cell(19.6,4,utf8_decode('Zona'),1,0,'C');
$pdf->Cell(19.6,4,utf8_decode('Loc'),1,0,'C');
$pdf->Cell(19.6,4,utf8_decode('Sector'),1,0,'C');
$pdf->Cell(19.6,4,utf8_decode('Manzana'),1,0,'C');
$pdf->Cell(19.6,4,utf8_decode('Predio'),1,0,'C');
$pdf->Cell(19.6,4,utf8_decode('Edificio'),1,0,'C');
$pdf->Cell(19.6,4,utf8_decode('Unidad'),1,1,'C');

$pdf->SetFont('Arial','',8);
$pdf->Cell(19.6,4,utf8_decode('---'),1,0,'C');
$pdf->Cell(19.6,4,utf8_decode('---'),1,0,'C');
$pdf->Cell(19.6,4,utf8_decode('---'),1,0,'C');
$pdf->Cell(19.6,4,utf8_decode('---'),1,0,'C');
$pdf->Cell(19.6,4,utf8_decode('---'),1,0,'C');
$pdf->Cell(19.6,4,utf8_decode('---'),1,0,'C');
$pdf->Cell(19.6,4,utf8_decode('---'),1,0,'C');
$pdf->Cell(19.6,4,utf8_decode('---'),1,0,'C');
$pdf->Cell(19.6,4,utf8_decode('---'),1,0,'C');
$pdf->Cell(19.6,4,utf8_decode('---'),1,1,'C');
//**************************************************************

//$pdf->Ln(5);

//*************************************************************

$pdf->SetFont('Arial','B',9);
$pdf->SetFillColor(217,217,217);
$pdf->Cell(196,5,utf8_decode('DATOS DE IDENTIFICACION'),1,1,'C',1);

$pdf->Cell(98,4,utf8_decode('Clave Catastral'),1,0,'C');
$pdf->Cell(98,4,utf8_decode('Cuenta Predial'),1,1,'C');

$pdf->SetFont('Arial','',8);
$pdf->Cell(98,4,utf8_decode('---'),1,0,'C');
$pdf->Cell(98,4,utf8_decode('---'),1,1,'C');

//*************************************************************

//*************************************************************

$pdf->SetFont('Arial','B',9);
$pdf->SetFillColor(217,217,217);
$pdf->Cell(196,5,utf8_decode('DATOS DEL PROPIETARIO'),1,1,'C',1);

$pdf->Cell(196,4,utf8_decode('Nombre'),1,1,'C');

$pdf->SetFont('Arial','',8);
$pdf->Cell(196,4,utf8_decode('---'),1,1,'C');




$pdf->SetFont('Arial','B',9);
$pdf->SetFillColor(217,217,217);
$pdf->Cell(196,4,utf8_decode('Razón Social'),1,1,'C');

$pdf->SetFont('Arial','',8);
$pdf->Cell(196,4,utf8_decode('---'),1,1,'C');


//*************************************************************


//*************************************************************

$pdf->SetFont('Arial','B',9);
$pdf->SetFillColor(217,217,217);

$pdf->Cell(60,4,utf8_decode('Calle'),1,0,'C');
$pdf->Cell(23,4,utf8_decode('Num Exterior'),1,0,'C');
$pdf->Cell(23,4,utf8_decode('Num Interior'),1,0,'C');
$pdf->Cell(60,4,utf8_decode('Colonia'),1,0,'C');
$pdf->Cell(30,4,utf8_decode('C.P.'),1,1,'C');

$pdf->SetFont('Arial','',7);
$pdf->Cell(60,4,utf8_decode('---'),1,0,'C');
$pdf->Cell(23,4,utf8_decode('---'),1,0,'C');
$pdf->Cell(23,4,utf8_decode('---'),1,0,'C');
$pdf->Cell(60,4,utf8_decode('---'),1,0,'C');
$pdf->Cell(30,4,utf8_decode('---'),1,1,'C');

//*************************************************************


$pdf->Ln(5);

//*************************************************************

$pdf->SetFont('Arial','B',9);
$pdf->SetFillColor(217,217,217);
$pdf->Cell(196,5,utf8_decode('HISTORICO DEL PREDIO'),1,1,'C',1);

$pdf->Cell(39.2,4,utf8_decode('Sup. Terreno (m2)'),1,0,'C');
$pdf->Cell(39.2,4,utf8_decode('Sup. Construcción (m2)'),1,0,'C');
$pdf->Cell(39.2,4,utf8_decode('Valor Terreno'),1,0,'C');
$pdf->Cell(39.2,4,utf8_decode('Valor Construcción'),1,0,'C');
$pdf->Cell(39.2,4,utf8_decode('Valor Catastral'),1,1,'C');

$pdf->SetFont('Arial','',8);
$pdf->Cell(39.2,4,'---',1,0,'C');
$pdf->Cell(39.2,4,'---',1,0,'C');

$pdf->Cell(39.2,4,'---',1,0,'C');

$pdf->Cell(39.2,4,'---',1,0,'C');
$pdf->Cell(39.2,4,'---',1,1,'C');

//*************************************************************

//*************************************************************

$pdf->SetFont('Arial','B',9);
$pdf->Cell(98,4,utf8_decode('Tipo de Servicio (Historico)'),1,0,'C',1);
$pdf->Cell(98,4,utf8_decode('Giro (Historico)'),1,1,'C',1);

$pdf->SetFont('Arial','',8);
$pdf->Cell(98,4,utf8_decode('---'),1,0,'C');
$pdf->Cell(98,4,utf8_decode('---'),1,1,'C');


$pdf->SetFont('Arial','B',9);
$pdf->Cell(98,4,utf8_decode('Tipo de Servicio (Actual)'),1,0,'C',1);
$pdf->Cell(98,4,utf8_decode('Giro (Actual)'),1,1,'C',1);

$pdf->SetFont('Arial','',8);
$pdf->Cell(98,4,utf8_decode('---'),1,0,'C');
$pdf->Cell(98,4,utf8_decode('---'),1,1,'C');

//*************************************************************

//$pdf->Ln(5);

//***************************196 - 102**********************************

$pdf->SetFont('Arial','B',9);
$pdf->SetFillColor(217,217,217);
$pdf->Cell(196,5,utf8_decode('DATOS DEL TERRENO'),1,1,'C',1);

$pdf->Cell(47,4,utf8_decode('Superficie'),1,0,'C');
$pdf->Cell(47,4,utf8_decode('Valor (m2)'),1,0,'C');
$pdf->Cell(17,4,utf8_decode('Frente (m)'),1,0,'C');
$pdf->Cell(17,4,utf8_decode('Factor'),1,0,'C');
$pdf->Cell(17,4,utf8_decode('Fondo (m)'),1,0,'C');
$pdf->Cell(17,4,utf8_decode('Factor'),1,0,'C');
$pdf->Cell(17,4,utf8_decode('Posición'),1,0,'C');
$pdf->Cell(17,4,utf8_decode('Factor'),1,1,'C');

$pdf->SetFont('Arial','',8);
$pdf->Cell(47,4,utf8_decode('---'),1,0,'C');
$pdf->Cell(47,4,utf8_decode('---'),1,0,'C');
$pdf->Cell(17,4,utf8_decode('---'),1,0,'C');
$pdf->Cell(17,4,utf8_decode('---'),1,0,'C');
$pdf->Cell(17,4,utf8_decode('---'),1,0,'C');
$pdf->Cell(17,4,utf8_decode('---'),1,0,'C');
$pdf->Cell(17,4,utf8_decode('---'),1,0,'C');
$pdf->Cell(17,4,utf8_decode('---'),1,1,'C');

//*************************************************************


//*************************************************************

$pdf->SetFont('Arial','B',9);
$pdf->SetFillColor(217,217,217);

$pdf->Cell(47,4,utf8_decode('Valor de Avenida'),1,0,'C',1);
$pdf->Cell(47,4,utf8_decode('Topografia'),1,0,'C',1);
$pdf->Cell(17,4,utf8_decode('Factor'),1,0,'C',1);
$pdf->Cell(85,4,utf8_decode('Valor Terreno'),1,1,'C',1);

$pdf->SetFont('Arial','',8);
$pdf->Cell(47,4,utf8_decode('---'),1,0,'C');
$pdf->Cell(47,4,utf8_decode('---'),1,0,'C');
$pdf->Cell(17,4,utf8_decode('---'),1,0,'C');
$pdf->Cell(85,4,utf8_decode('---'),1,1,'C');

//*************************************************************



//*************************************************************

$pdf->SetFont('Arial','B',9);
$pdf->Cell(98,4,utf8_decode('Estado de Edificación'),1,0,'C',1);
$pdf->Cell(98,4,utf8_decode('Uso de Suelo'),1,1,'C',1);

$pdf->SetFont('Arial','',8);
$pdf->Cell(98,4,utf8_decode('---'),1,0,'C');
$pdf->Cell(98,4,utf8_decode('---'),1,1,'C');

//*************************************************************

//$pdf->Ln(5);

//*************************************************************

$pdf->SetFont('Arial','B',9);
$pdf->SetFillColor(217,217,217);
$pdf->Cell(196,5,utf8_decode('DIFERENCIA DE CONSTRUCCION'),1,1,'C',1);

$pdf->Cell(65.3,4,utf8_decode('Construcción Historica (m2)'),1,0,'C');
$pdf->Cell(65.3,4,utf8_decode('Construcción actual (m2)'),1,0,'C');
$pdf->Cell(65.3,4,utf8_decode('Diferencia (m2)'),1,1,'C');

$pdf->SetFont('Arial','',8);
$pdf->Cell(65.3,4,utf8_decode('---'),1,0,'C');
$pdf->Cell(65.3,4,utf8_decode('---'),1,0,'C');
$pdf->Cell(65.3,4,utf8_decode('---'),1,1,'C');

//*************************************************************





$pdf->Ln(3);











//*********************************2017***************************************************************
    $de17="select * from descriptConstruct
    where id_fichaResult='$idResult' and anioDescript='2017'";
    $descr17=sqlsrv_query($cnx,$de17);
    $descript17=sqlsrv_fetch_array($descr17);
//***********************DESCRIPCION DE CONSTRUCCION 2017*****************************************

$pdf->SetFont('Arial','B',9);
$pdf->SetFillColor(217,217,217);
$pdf->Cell(196,5,utf8_decode('DESCRIPCION DE CONSTRUCCION 2017'),1,1,'C',1);

$pdf->SetFont('Arial','B',8);
$pdf->Cell(22.5,4,utf8_decode('CCC'),1,0,'C');
$pdf->Cell(24.5,4,utf8_decode('M2'),1,0,'C');
$pdf->Cell(24.5,4,utf8_decode('Valor'),1,0,'C');
$pdf->Cell(20,4,utf8_decode('Niveles'),1,0,'C');
$pdf->Cell(24.5,4,utf8_decode('Tipo/Edad'),1,0,'C');
$pdf->Cell(22,4,utf8_decode('Calidad'),1,0,'C');
$pdf->Cell(22,4,utf8_decode('Conservación'),1,0,'C');
$pdf->Cell(36,4,utf8_decode('Valor de Construcción'),1,1,'C');

$pdf->SetFont('Arial','',8);

$i2017=0;
do{
$pdf->Cell(22.5,4,utf8_decode($descript17['ccc']),1,0,'C');
$pdf->Cell(24.5,4,utf8_decode($descript17['m2']),1,0,'C');
$pdf->Cell(24.5,4,utf8_decode($descript17['valor']),1,0,'C');
$pdf->Cell(20,4,utf8_decode($descript17['niveles']),1,0,'C');
$pdf->Cell(24.5,4,utf8_decode($descript17['tipo_edad']),1,0,'C');
$pdf->Cell(22,4,utf8_decode($descript17['calidad']),1,0,'C');
$pdf->Cell(22,4,utf8_decode($descript17['conservacion']),1,0,'C');
$pdf->Cell(36,4,utf8_decode($descript17['valConstruct']),1,1,'C');
    $i2017++;
} while($descript17=sqlsrv_fetch_array($descr17));





$j2017 = 1;
$r2017 = 7 - $i2017;
while ($j2017 <= $r2017) {
    $j2017++;
    $pdf->Cell(22.5,4,'----',1,0,'C');
    $pdf->Cell(24.5,4,'----',1,0,'C');
    $pdf->Cell(24.5,4,'----',1,0,'C');
    $pdf->Cell(20,4,'----',1,0,'C');
    $pdf->Cell(24.5,4,'----',1,0,'C');
    $pdf->Cell(22,4,'----',1,0,'C');
    $pdf->Cell(22,4,'----',1,0,'C');
    $pdf->Cell(36,4,'----',1,1,'C');
}

if(($i2017 == 8) or ($i2017 == 9) or ($i2017 == 10)){
    $pdf->Cell(22.5,4,'----',1,0,'C');
    $pdf->Cell(24.5,4,'----',1,0,'C');
    $pdf->Cell(24.5,4,'----',1,0,'C');
    $pdf->Cell(20,4,'----',1,0,'C');
    $pdf->Cell(24.5,4,'----',1,0,'C');
    $pdf->Cell(22,4,'----',1,0,'C');
    $pdf->Cell(22,4,'----',1,0,'C');
    $pdf->Cell(36,4,'----',1,1,'C');
    
    $pdf->Cell(22.5,4,'----',1,0,'C');
    $pdf->Cell(24.5,4,'----',1,0,'C');
    $pdf->Cell(24.5,4,'----',1,0,'C');
    $pdf->Cell(20,4,'----',1,0,'C');
    $pdf->Cell(24.5,4,'----',1,0,'C');
    $pdf->Cell(22,4,'----',1,0,'C');
    $pdf->Cell(22,4,'----',1,0,'C');
    $pdf->Cell(36,4,'----',1,1,'C');
    
    $pdf->Cell(22.5,4,'----',1,0,'C');
    $pdf->Cell(24.5,4,'----',1,0,'C');
    $pdf->Cell(24.5,4,'----',1,0,'C');
    $pdf->Cell(20,4,'----',1,0,'C');
    $pdf->Cell(24.5,4,'----',1,0,'C');
    $pdf->Cell(22,4,'----',1,0,'C');
    $pdf->Cell(22,4,'----',1,0,'C');
    $pdf->Cell(36,4,'----',1,1,'C');
    
    $pdf->Ln(5);
}






//********************fin DESCRIPCION DE CONSTRUCCION 2017*****************************************
    $va17="select * from valCatastrales
    where tokenValCatas='$token' and anio='2017'";
    $val17=sqlsrv_query($cnx,$va17);
    $vaCatas17=sqlsrv_fetch_array($val17);
//*************************************************************

$pdf->SetFont('Arial','B',9);
$pdf->SetFillColor(217,217,217);
$pdf->Cell(196,5,utf8_decode('VALORES CATASTRALES 2017 (del 5to al 6to bimestre)'),1,1,'C',1);

$pdf->SetFont('Arial','B',8);
$pdf->Cell(30,4,utf8_decode('Sup. Terreno (m2)'),1,0,'C');
$pdf->Cell(32.6,4,utf8_decode('Valor (m2)'),1,0,'C');
$pdf->Cell(32.6,4,utf8_decode('Valor Terreno'),1,0,'C');
$pdf->Cell(35.6,4,utf8_decode('Sup. Construcción (m2)'),1,0,'C');
$pdf->Cell(32.6,4,utf8_decode('Valor Construcción'),1,0,'C');
$pdf->Cell(32.6,4,utf8_decode('Valor Catastral'),1,1,'C');

$pdf->SetFont('Arial','',8);
$pdf->Cell(30,4,utf8_decode($vaCatas17['supTerreno']),1,0,'C');
$pdf->Cell(32.6,4,utf8_decode($vaCatas17['valor']),1,0,'C');
$pdf->Cell(32.6,4,utf8_decode($vaCatas17['valTerreno']),1,0,'C');
$pdf->Cell(35.6,4,utf8_decode($vaCatas17['supConstruct']),1,0,'C');
$pdf->Cell(32.6,4,utf8_decode($vaCatas17['valorConstruct']),1,0,'C');
$pdf->Cell(32.6,4,utf8_decode($vaCatas17['valorCatastral']),1,1,'C');

//*****************************************************2017**************************************************************************











if(($i2017 == 8) or ($i2017 == 9) or ($i2017 == 10)){
    $pdf->Ln(30);
}





//*********************************2018***************************************************************
    $de18="select * from descriptConstruct
    where id_fichaResult='$idResult' and anioDescript='2018'";
    $descr18=sqlsrv_query($cnx,$de18);
    $descript18=sqlsrv_fetch_array($descr18);
//***********************DESCRIPCION DE CONSTRUCCION 2018*****************************************

$pdf->SetFont('Arial','B',9);
$pdf->SetFillColor(217,217,217);
$pdf->Cell(196,5,utf8_decode('DESCRIPCION DE CONSTRUCCION 2018'),1,1,'C',1);

$pdf->SetFont('Arial','B',8);
$pdf->Cell(22.5,4,utf8_decode('CCC'),1,0,'C');
$pdf->Cell(24.5,4,utf8_decode('M2'),1,0,'C');
$pdf->Cell(24.5,4,utf8_decode('Valor'),1,0,'C');
$pdf->Cell(20,4,utf8_decode('Niveles'),1,0,'C');
$pdf->Cell(24.5,4,utf8_decode('Tipo/Edad'),1,0,'C');
$pdf->Cell(22,4,utf8_decode('Calidad'),1,0,'C');
$pdf->Cell(22,4,utf8_decode('Conservación'),1,0,'C');
$pdf->Cell(36,4,utf8_decode('Valor de Construcción'),1,1,'C');

$pdf->SetFont('Arial','',8);

$i2018=0;
do{
$pdf->Cell(22.5,4,utf8_decode($descript18['ccc']),1,0,'C');
$pdf->Cell(24.5,4,utf8_decode($descript18['m2']),1,0,'C');
$pdf->Cell(24.5,4,utf8_decode($descript18['valor']),1,0,'C');
$pdf->Cell(20,4,utf8_decode($descript18['niveles']),1,0,'C');
$pdf->Cell(24.5,4,utf8_decode($descript18['tipo_edad']),1,0,'C');
$pdf->Cell(22,4,utf8_decode($descript18['calidad']),1,0,'C');
$pdf->Cell(22,4,utf8_decode($descript18['conservacion']),1,0,'C');
$pdf->Cell(36,4,utf8_decode($descript18['valConstruct']),1,1,'C');
    $i2018++;
} while($descript18=sqlsrv_fetch_array($descr18));

$j2018 = 1;
$r2018 = 7 - $i2018;
while ($j2018 <= $r2018) {
    $j2018++;
    $pdf->Cell(22.5,4,'----',1,0,'C');
    $pdf->Cell(24.5,4,'----',1,0,'C');
    $pdf->Cell(24.5,4,'----',1,0,'C');
    $pdf->Cell(20,4,'----',1,0,'C');
    $pdf->Cell(24.5,4,'----',1,0,'C');
    $pdf->Cell(22,4,'----',1,0,'C');
    $pdf->Cell(22,4,'----',1,0,'C');
    $pdf->Cell(36,4,'----',1,1,'C');
}


if(($i2018 == 8) or ($i2018 == 9) or ($i2018 == 10)){
    
    $pdf->Cell(22.5,4,'----',1,0,'C');
    $pdf->Cell(24.5,4,'----',1,0,'C');
    $pdf->Cell(24.5,4,'----',1,0,'C');
    $pdf->Cell(20,4,'----',1,0,'C');
    $pdf->Cell(24.5,4,'----',1,0,'C');
    $pdf->Cell(22,4,'----',1,0,'C');
    $pdf->Cell(22,4,'----',1,0,'C');
    $pdf->Cell(36,4,'----',1,1,'C');
    
    $pdf->Cell(22.5,4,'----',1,0,'C');
    $pdf->Cell(24.5,4,'----',1,0,'C');
    $pdf->Cell(24.5,4,'----',1,0,'C');
    $pdf->Cell(20,4,'----',1,0,'C');
    $pdf->Cell(24.5,4,'----',1,0,'C');
    $pdf->Cell(22,4,'----',1,0,'C');
    $pdf->Cell(22,4,'----',1,0,'C');
    $pdf->Cell(36,4,'----',1,1,'C');
    
    $pdf->Cell(22.5,4,'----',1,0,'C');
    $pdf->Cell(24.5,4,'----',1,0,'C');
    $pdf->Cell(24.5,4,'----',1,0,'C');
    $pdf->Cell(20,4,'----',1,0,'C');
    $pdf->Cell(24.5,4,'----',1,0,'C');
    $pdf->Cell(22,4,'----',1,0,'C');
    $pdf->Cell(22,4,'----',1,0,'C');
    $pdf->Cell(36,4,'----',1,1,'C');
    
    $pdf->Ln(5);
}



//********************fin DESCRIPCION DE CONSTRUCCION 2018*****************************************
    $va18="select * from valCatastrales
    where tokenValCatas='$token' and anio='2018'";
    $val18=sqlsrv_query($cnx,$va18);
    $vaCatas18=sqlsrv_fetch_array($val18);
//*************************************************************
//$pdf->Ln(15);
$pdf->SetFont('Arial','B',9);
$pdf->SetFillColor(217,217,217);
$pdf->Cell(196,5,utf8_decode('VALORES CATASTRALES 2018 (del 1ro al 6to bimestre)'),1,1,'C',1);

$pdf->SetFont('Arial','B',8);
$pdf->Cell(30,4,utf8_decode('Sup. Terreno (m2)'),1,0,'C');
$pdf->Cell(32.6,4,utf8_decode('Valor (m2)'),1,0,'C');
$pdf->Cell(32.6,4,utf8_decode('Valor Terreno'),1,0,'C');
$pdf->Cell(35.6,4,utf8_decode('Sup. Construcción (m2)'),1,0,'C');
$pdf->Cell(32.6,4,utf8_decode('Valor Construcción'),1,0,'C');
$pdf->Cell(32.6,4,utf8_decode('Valor Catastral'),1,1,'C');

$pdf->SetFont('Arial','',8);
$pdf->Cell(30,4,utf8_decode($vaCatas18['supTerreno']),1,0,'C');
$pdf->Cell(32.6,4,utf8_decode($vaCatas18['valor']),1,0,'C');
$pdf->Cell(32.6,4,utf8_decode($vaCatas18['valTerreno']),1,0,'C');
$pdf->Cell(35.6,4,utf8_decode($vaCatas18['supConstruct']),1,0,'C');
$pdf->Cell(32.6,4,utf8_decode($vaCatas18['valorConstruct']),1,0,'C');
$pdf->Cell(32.6,4,utf8_decode($vaCatas18['valorCatastral']),1,1,'C');

//*****************************************************2018**************************************************************************



















//$pdf->Ln(160);  //****CAMBIO DE HOJA


//$pdf->Ln(5);




if(($i2018 == 8) or ($i2018 == 9) or ($i2018 == 10)){
    $pdf->Ln(15);
}















//*********************************2019***************************************************************
    $de19="select * from descriptConstruct
    where id_fichaResult='$idResult' and anioDescript='2019'";
    $descr19=sqlsrv_query($cnx,$de19);
    $descript19=sqlsrv_fetch_array($descr19);
//***********************DESCRIPCION DE CONSTRUCCION 2019*****************************************

$pdf->SetFont('Arial','B',9);
$pdf->SetFillColor(217,217,217);
$pdf->Cell(196,5,utf8_decode('DESCRIPCION DE CONSTRUCCION 2019'),1,1,'C',1);

$pdf->SetFont('Arial','B',8);
$pdf->Cell(22.5,4,utf8_decode('CCC'),1,0,'C');
$pdf->Cell(24.5,4,utf8_decode('M2'),1,0,'C');
$pdf->Cell(24.5,4,utf8_decode('Valor'),1,0,'C');
$pdf->Cell(20,4,utf8_decode('Niveles'),1,0,'C');
$pdf->Cell(24.5,4,utf8_decode('Tipo/Edad'),1,0,'C');
$pdf->Cell(22,4,utf8_decode('Calidad'),1,0,'C');
$pdf->Cell(22,4,utf8_decode('Conservación'),1,0,'C');
$pdf->Cell(36,4,utf8_decode('Valor de Construcción'),1,1,'C');

$pdf->SetFont('Arial','',8);

$i2019=0;
do{
$pdf->Cell(22.5,4,utf8_decode($descript19['ccc']),1,0,'C');
$pdf->Cell(24.5,4,utf8_decode($descript19['m2']),1,0,'C');
$pdf->Cell(24.5,4,utf8_decode($descript19['valor']),1,0,'C');
$pdf->Cell(20,4,utf8_decode($descript19['niveles']),1,0,'C');
$pdf->Cell(24.5,4,utf8_decode($descript19['tipo_edad']),1,0,'C');
$pdf->Cell(22,4,utf8_decode($descript19['calidad']),1,0,'C');
$pdf->Cell(22,4,utf8_decode($descript19['conservacion']),1,0,'C');
$pdf->Cell(36,4,utf8_decode($descript19['valConstruct']),1,1,'C');
    $i2019++;
} while($descript19=sqlsrv_fetch_array($descr19));



$j2019 = 1;
$r2019 = 7 - $i2019;
while ($j2019 <= $r2019) {
    $j2019++;
    $pdf->Cell(22.5,4,'----',1,0,'C');
    $pdf->Cell(24.5,4,'----',1,0,'C');
    $pdf->Cell(24.5,4,'----',1,0,'C');
    $pdf->Cell(20,4,'----',1,0,'C');
    $pdf->Cell(24.5,4,'----',1,0,'C');
    $pdf->Cell(22,4,'----',1,0,'C');
    $pdf->Cell(22,4,'----',1,0,'C');
    $pdf->Cell(36,4,'----',1,1,'C');
}


if(($i2019 == 8) or ($i2019 == 9) or ($i2019 == 10)){
    $pdf->Ln(5);
}

//********************fin DESCRIPCION DE CONSTRUCCION 2019*****************************************
    $va19="select * from valCatastrales
    where tokenValCatas='$token' and anio='2019'";
    $val19=sqlsrv_query($cnx,$va19);
    $vaCatas19=sqlsrv_fetch_array($val19);
//*************************************************************

$pdf->SetFont('Arial','B',9);
$pdf->SetFillColor(217,217,217);
$pdf->Cell(196,5,utf8_decode('VALORES CATASTRALES 2019 (del 1ro al 6to bimestre)'),1,1,'C',1);

$pdf->SetFont('Arial','B',8);
$pdf->Cell(30,4,utf8_decode('Sup. Terreno (m2)'),1,0,'C');
$pdf->Cell(32.6,4,utf8_decode('Valor (m2)'),1,0,'C');
$pdf->Cell(32.6,4,utf8_decode('Valor Terreno'),1,0,'C');
$pdf->Cell(35.6,4,utf8_decode('Sup. Construcción (m2)'),1,0,'C');
$pdf->Cell(32.6,4,utf8_decode('Valor Construcción'),1,0,'C');
$pdf->Cell(32.6,4,utf8_decode('Valor Catastral'),1,1,'C');

$pdf->SetFont('Arial','',8);
$pdf->Cell(30,4,utf8_decode($vaCatas19['supTerreno']),1,0,'C');
$pdf->Cell(32.6,4,utf8_decode($vaCatas19['valor']),1,0,'C');
$pdf->Cell(32.6,4,utf8_decode($vaCatas19['valTerreno']),1,0,'C');
$pdf->Cell(35.6,4,utf8_decode($vaCatas19['supConstruct']),1,0,'C');
$pdf->Cell(32.6,4,utf8_decode($vaCatas19['valorConstruct']),1,0,'C');
$pdf->Cell(32.6,4,utf8_decode($vaCatas19['valorCatastral']),1,1,'C');

//*****************************************************2019**************************************************************************














if(($i2019 == 8) or ($i2019 == 9) or ($i2019 == 10)){
    $pdf->Ln(7);
}













//*********************************2020***************************************************************
    $de20="select * from descriptConstruct
    where id_fichaResult='$idResult' and anioDescript='2020'";
    $descr20=sqlsrv_query($cnx,$de20);
    $descript20=sqlsrv_fetch_array($descr20);
//***********************DESCRIPCION DE CONSTRUCCION 2020*****************************************

$pdf->SetFont('Arial','B',9);
$pdf->SetFillColor(217,217,217);
$pdf->Cell(196,5,utf8_decode('DESCRIPCION DE CONSTRUCCION 2020'),1,1,'C',1);

$pdf->SetFont('Arial','B',8);
$pdf->Cell(22.5,4,utf8_decode('CCC'),1,0,'C');
$pdf->Cell(24.5,4,utf8_decode('M2'),1,0,'C');
$pdf->Cell(24.5,4,utf8_decode('Valor'),1,0,'C');
$pdf->Cell(20,4,utf8_decode('Niveles'),1,0,'C');
$pdf->Cell(24.5,4,utf8_decode('Tipo/Edad'),1,0,'C');
$pdf->Cell(22,4,utf8_decode('Calidad'),1,0,'C');
$pdf->Cell(22,4,utf8_decode('Conservación'),1,0,'C');
$pdf->Cell(36,4,utf8_decode('Valor de Construcción'),1,1,'C');

$pdf->SetFont('Arial','',8);

$i2020=0;
do{
$pdf->Cell(22.5,4,utf8_decode($descript20['ccc']),1,0,'C');
$pdf->Cell(24.5,4,utf8_decode($descript20['m2']),1,0,'C');
$pdf->Cell(24.5,4,utf8_decode($descript20['valor']),1,0,'C');
$pdf->Cell(20,4,utf8_decode($descript20['niveles']),1,0,'C');
$pdf->Cell(24.5,4,utf8_decode($descript20['tipo_edad']),1,0,'C');
$pdf->Cell(22,4,utf8_decode($descript20['calidad']),1,0,'C');
$pdf->Cell(22,4,utf8_decode($descript20['conservacion']),1,0,'C');
$pdf->Cell(36,4,utf8_decode($descript20['valConstruct']),1,1,'C');
    $i2020++;
} while($descript20=sqlsrv_fetch_array($descr20));




$j2020 = 1;
$r2020 = 7 - $i2020;
while ($j2020 <= $r2020) {
    $j2020++;
    $pdf->Cell(22.5,4,'----',1,0,'C');
    $pdf->Cell(24.5,4,'----',1,0,'C');
    $pdf->Cell(24.5,4,'----',1,0,'C');
    $pdf->Cell(20,4,'----',1,0,'C');
    $pdf->Cell(24.5,4,'----',1,0,'C');
    $pdf->Cell(22,4,'----',1,0,'C');
    $pdf->Cell(22,4,'----',1,0,'C');
    $pdf->Cell(36,4,'----',1,1,'C');
}


if(($i2020 == 8) or ($i2020 == 9) or ($i2020 == 10)){
    $pdf->Ln(30);
}




//********************fin DESCRIPCION DE CONSTRUCCION 2020*****************************************
    $va20="select * from valCatastrales
    where tokenValCatas='$token' and anio='2020'";
    $val20=sqlsrv_query($cnx,$va20);
    $vaCatas20=sqlsrv_fetch_array($val20);
//*************************************************************

$pdf->SetFont('Arial','B',9);
$pdf->SetFillColor(217,217,217);
$pdf->Cell(196,5,utf8_decode('VALORES CATASTRALES 2020 (del 1ro al 6to bimestre)'),1,1,'C',1);

$pdf->SetFont('Arial','B',8);
$pdf->Cell(30,4,utf8_decode('Sup. Terreno (m2)'),1,0,'C');
$pdf->Cell(32.6,4,utf8_decode('Valor (m2)'),1,0,'C');
$pdf->Cell(32.6,4,utf8_decode('Valor Terreno'),1,0,'C');
$pdf->Cell(35.6,4,utf8_decode('Sup. Construcción (m2)'),1,0,'C');
$pdf->Cell(32.6,4,utf8_decode('Valor Construcción'),1,0,'C');
$pdf->Cell(32.6,4,utf8_decode('Valor Catastral'),1,1,'C');

$pdf->SetFont('Arial','',8);
$pdf->Cell(30,4,utf8_decode($vaCatas20['supTerreno']),1,0,'C');
$pdf->Cell(32.6,4,utf8_decode($vaCatas20['valor']),1,0,'C');
$pdf->Cell(32.6,4,utf8_decode($vaCatas20['valTerreno']),1,0,'C');
$pdf->Cell(35.6,4,utf8_decode($vaCatas20['supConstruct']),1,0,'C');
$pdf->Cell(32.6,4,utf8_decode($vaCatas20['valorConstruct']),1,0,'C');
$pdf->Cell(32.6,4,utf8_decode($vaCatas20['valorCatastral']),1,1,'C');

//*****************************************************2020**************************************************************************


















if(($i2020 == 8) or ($i2020 == 9) or ($i2020 == 10)){
    $pdf->Ln(15);
}










//************************* cambio de hoja

//$pdf->Ln(170);


//$pdf->Ln(5);































//*********************************2021***************************************************************
    $de21="select * from descriptConstruct
    where id_fichaResult='$idResult' and anioDescript='2021'";
    $descr21=sqlsrv_query($cnx,$de21);
    $descript21=sqlsrv_fetch_array($descr21);
//***********************DESCRIPCION DE CONSTRUCCION 2021*****************************************

$pdf->SetFont('Arial','B',9);
$pdf->SetFillColor(217,217,217);
$pdf->Cell(196,5,utf8_decode('DESCRIPCION DE CONSTRUCCION 2021'),1,1,'C',1);

$pdf->SetFont('Arial','B',8);
$pdf->Cell(22.5,4,utf8_decode('CCC'),1,0,'C');
$pdf->Cell(24.5,4,utf8_decode('M2'),1,0,'C');
$pdf->Cell(24.5,4,utf8_decode('Valor'),1,0,'C');
$pdf->Cell(20,4,utf8_decode('Niveles'),1,0,'C');
$pdf->Cell(24.5,4,utf8_decode('Tipo/Edad'),1,0,'C');
$pdf->Cell(22,4,utf8_decode('Calidad'),1,0,'C');
$pdf->Cell(22,4,utf8_decode('Conservación'),1,0,'C');
$pdf->Cell(36,4,utf8_decode('Valor de Construcción'),1,1,'C');

$pdf->SetFont('Arial','',8);

$i2021=0;
do{
$pdf->Cell(22.5,4,utf8_decode($descript21['ccc']),1,0,'C');
$pdf->Cell(24.5,4,utf8_decode($descript21['m2']),1,0,'C');
$pdf->Cell(24.5,4,utf8_decode($descript21['valor']),1,0,'C');
$pdf->Cell(20,4,utf8_decode($descript21['niveles']),1,0,'C');
$pdf->Cell(24.5,4,utf8_decode($descript21['tipo_edad']),1,0,'C');
$pdf->Cell(22,4,utf8_decode($descript21['calidad']),1,0,'C');
$pdf->Cell(22,4,utf8_decode($descript21['conservacion']),1,0,'C');
$pdf->Cell(36,4,utf8_decode($descript21['valConstruct']),1,1,'C');
    $i2021++;
} while($descript21=sqlsrv_fetch_array($descr21));



$j2021 = 1;
$r2021 = 7 - $i2021;
while ($j2021 <= $r2021) {
    $j2021++;
    $pdf->Cell(22.5,4,'----',1,0,'C');
    $pdf->Cell(24.5,4,'----',1,0,'C');
    $pdf->Cell(24.5,4,'----',1,0,'C');
    $pdf->Cell(20,4,'----',1,0,'C');
    $pdf->Cell(24.5,4,'----',1,0,'C');
    $pdf->Cell(22,4,'----',1,0,'C');
    $pdf->Cell(22,4,'----',1,0,'C');
    $pdf->Cell(36,4,'----',1,1,'C');
}

if(($i2021 == 8) or ($i2021 == 9) or ($i2021 == 10)){
    $pdf->Ln(5);
}




//********************fin DESCRIPCION DE CONSTRUCCION 2021*****************************************
    $va21="select * from valCatastrales
    where tokenValCatas='$token' and anio='2021'";
    $val21=sqlsrv_query($cnx,$va21);
    $vaCatas21=sqlsrv_fetch_array($val21);
//*************************************************************

$pdf->SetFont('Arial','B',9);
$pdf->SetFillColor(217,217,217);
$pdf->Cell(196,5,utf8_decode('VALORES CATASTRALES 2021 (del 1ro al 6to bimestre)'),1,1,'C',1);

$pdf->SetFont('Arial','B',8);
$pdf->Cell(30,4,utf8_decode('Sup. Terreno (m2)'),1,0,'C');
$pdf->Cell(32.6,4,utf8_decode('Valor (m2)'),1,0,'C');
$pdf->Cell(32.6,4,utf8_decode('Valor Terreno'),1,0,'C');
$pdf->Cell(35.6,4,utf8_decode('Sup. Construcción (m2)'),1,0,'C');
$pdf->Cell(32.6,4,utf8_decode('Valor Construcción'),1,0,'C');
$pdf->Cell(32.6,4,utf8_decode('Valor Catastral'),1,1,'C');

$pdf->SetFont('Arial','',8);
$pdf->Cell(30,4,utf8_decode($vaCatas21['supTerreno']),1,0,'C');
$pdf->Cell(32.6,4,utf8_decode($vaCatas21['valor']),1,0,'C');
$pdf->Cell(32.6,4,utf8_decode($vaCatas21['valTerreno']),1,0,'C');
$pdf->Cell(35.6,4,utf8_decode($vaCatas21['supConstruct']),1,0,'C');
$pdf->Cell(32.6,4,utf8_decode($vaCatas21['valorConstruct']),1,0,'C');
$pdf->Cell(32.6,4,utf8_decode($vaCatas21['valorCatastral']),1,1,'C');

//*****************************************************2021**************************************************************************






if(($i2021 == 8) or ($i2021 == 9) or ($i2021 == 10)){
    $pdf->Ln(20);
}






//$pdf->Ln(5);


//*********************************2022***************************************************************
    $de22="select * from descriptConstruct
    where id_fichaResult='$idResult' and anioDescript='2022'";
    $descr22=sqlsrv_query($cnx,$de22);
    $descript22=sqlsrv_fetch_array($descr22);
//***********************DESCRIPCION DE CONSTRUCCION 2022*****************************************

$pdf->SetFont('Arial','B',9);
$pdf->SetFillColor(217,217,217);
$pdf->Cell(196,5,utf8_decode('DESCRIPCION DE CONSTRUCCION 2022'),1,1,'C',1);

$pdf->SetFont('Arial','B',8);
$pdf->Cell(22.5,4,utf8_decode('CCC'),1,0,'C');
$pdf->Cell(24.5,4,utf8_decode('M2'),1,0,'C');
$pdf->Cell(24.5,4,utf8_decode('Valor'),1,0,'C');
$pdf->Cell(20,4,utf8_decode('Niveles'),1,0,'C');
$pdf->Cell(24.5,4,utf8_decode('Tipo/Edad'),1,0,'C');
$pdf->Cell(22,4,utf8_decode('Calidad'),1,0,'C');
$pdf->Cell(22,4,utf8_decode('Conservación'),1,0,'C');
$pdf->Cell(36,4,utf8_decode('Valor de Construcción'),1,1,'C');

$pdf->SetFont('Arial','',8);

$i2022=0;
do{
$pdf->Cell(22.5,4,utf8_decode($descript22['ccc']),1,0,'C');
$pdf->Cell(24.5,4,utf8_decode($descript22['m2']),1,0,'C');
$pdf->Cell(24.5,4,utf8_decode($descript22['valor']),1,0,'C');
$pdf->Cell(20,4,utf8_decode($descript22['niveles']),1,0,'C');
$pdf->Cell(24.5,4,utf8_decode($descript22['tipo_edad']),1,0,'C');
$pdf->Cell(22,4,utf8_decode($descript22['calidad']),1,0,'C');
$pdf->Cell(22,4,utf8_decode($descript22['conservacion']),1,0,'C');
$pdf->Cell(36,4,utf8_decode($descript22['valConstruct']),1,1,'C');
    $i2022++;
} while($descript22=sqlsrv_fetch_array($descr22));



$j2022 = 1;
$r2022 = 7 - $i2022;
while ($j2022 <= $r2022) {
    $j2022++;
    $pdf->Cell(22.5,4,'----',1,0,'C');
    $pdf->Cell(24.5,4,'----',1,0,'C');
    $pdf->Cell(24.5,4,'----',1,0,'C');
    $pdf->Cell(20,4,'----',1,0,'C');
    $pdf->Cell(24.5,4,'----',1,0,'C');
    $pdf->Cell(22,4,'----',1,0,'C');
    $pdf->Cell(22,4,'----',1,0,'C');
    $pdf->Cell(36,4,'----',1,1,'C');
}


if(($i2022 == 8) or ($i2022 == 9) or ($i2022 == 10)){
    $pdf->Ln(5);
}





//********************fin DESCRIPCION DE CONSTRUCCION 2022*****************************************
    $va22="select * from valCatastrales
    where tokenValCatas='$token' and anio='2022'";
    $val22=sqlsrv_query($cnx,$va22);
    $vaCatas22=sqlsrv_fetch_array($val22);
//*************************************************************

$pdf->SetFont('Arial','B',9);
$pdf->SetFillColor(217,217,217);
$pdf->Cell(196,5,utf8_decode('VALORES CATASTRALES 2022 (del 1ro al 4to bimestre)'),1,1,'C',1);

$pdf->SetFont('Arial','B',8);
$pdf->Cell(30,4,utf8_decode('Sup. Terreno (m2)'),1,0,'C');
$pdf->Cell(32.6,4,utf8_decode('Valor (m2)'),1,0,'C');
$pdf->Cell(32.6,4,utf8_decode('Valor Terreno'),1,0,'C');
$pdf->Cell(35.6,4,utf8_decode('Sup. Construcción (m2)'),1,0,'C');
$pdf->Cell(32.6,4,utf8_decode('Valor Construcción'),1,0,'C');
$pdf->Cell(32.6,4,utf8_decode('Valor Catastral'),1,1,'C');

$pdf->SetFont('Arial','',8);
$pdf->Cell(30,4,utf8_decode($vaCatas22['supTerreno']),1,0,'C');
$pdf->Cell(32.6,4,utf8_decode($vaCatas22['valor']),1,0,'C');
$pdf->Cell(32.6,4,utf8_decode($vaCatas22['valTerreno']),1,0,'C');
$pdf->Cell(35.6,4,utf8_decode($vaCatas22['supConstruct']),1,0,'C');
$pdf->Cell(32.6,4,utf8_decode($vaCatas22['valorConstruct']),1,0,'C');
$pdf->Cell(32.6,4,utf8_decode($vaCatas22['valorCatastral']),1,1,'C');

//*****************************************************2022**************************************************************************



//*************************************** FIN FICHA CATASTRAL **********************************************************************************



$pdf->Ln(70);


$pdf->SetFont('Arial','',7);
$pdf->MultiCell(196,3,utf8_decode('En consecuencia, se le da a conocer la determinación de la diferencia anual entre los valores fiscales declarados y los determinados por la autoridad catastral, por concepto de DIFERENCIAS EN METROS DE CONSTRUCCIÓN, CONSTRUCCIONES NO MANIFESTADAS Y/O OMISOS POR LOS ULTIMOS CINCO AÑOS, de conformidad con la resolución de fecha 12 de Agosto del 2022, que fue notificada a usted dentro del expediente señalado al inicio de la presente determinación; tal y como se describe a continuación:'),0,'L',0);




$pdf->SetFont('Arial','B',8);
$pdf->SetFillColor(217,217,217);

$pdf->MultiCell(196,4,utf8_decode('DETERMINACIÓN DE LA DIFERENCIA ANUAL ENTRE LOS VALORES FISCALES DECLARADOS POR EL CONTRIBUYENTE Y LOS DETERMINADOS POR LA AUTORIDAD CATASTRAL  POR CONCEPTO DE DIFERENCIAS EN METROS DE CONSTRUCCIÓN, CONSTRUCCIONES NO MANIFESTADAS Y/O OMISOS POR LOS ULTIMOS CINCO AÑOS.'),1,'C',1);

$pdf->SetFont('Arial','B',8);

$pdf->Cell(16,8,utf8_decode('AÑO'),1,0,'C');
$pdf->Cell(60,8,utf8_decode(''),0,0,'C');
$pdf->Cell(60,8,utf8_decode(''),0,0,'C');
$pdf->Cell(60,8,utf8_decode(''),0,1,'C');

$pdf->SetY(80);
$pdf->SetX(26);
$pdf->MultiCell(60,4,utf8_decode('VALOR FISCAL DECLARADO POR EL CONTRIBUYENTE'),1,'C',0);

$pdf->SetY(80);
$pdf->SetX(86);
$pdf->MultiCell(60,4,utf8_decode('VALOR FISCAL DETERMINADO POR LA AUTORIDAD CATASTRAL'),1,'C',0);

$pdf->SetY(80);
$pdf->SetX(146);
$pdf->MultiCell(60,4,utf8_decode('DIFERENCIAS EN VALORES FISCALES DECLARADOS Y DETERMINADOS'),1,'C',0);




$pdf->SetFont('Arial','',8);
$pdf->Cell(16,4,utf8_decode('2017'),1,0,'C');
$pdf->Cell(60,4,utf8_decode('---'),1,0,'C');
$pdf->Cell(60,4,utf8_decode('---'),1,0,'C');
$pdf->Cell(60,4,utf8_decode('---'),1,1,'C');

$pdf->Cell(16,4,utf8_decode('2018'),1,0,'C');
$pdf->Cell(60,4,utf8_decode('---'),1,0,'C');
$pdf->Cell(60,4,utf8_decode('---'),1,0,'C');
$pdf->Cell(60,4,utf8_decode('---'),1,1,'C');

$pdf->Cell(16,4,utf8_decode('2019'),1,0,'C');
$pdf->Cell(60,4,utf8_decode('---'),1,0,'C');
$pdf->Cell(60,4,utf8_decode('---'),1,0,'C');
$pdf->Cell(60,4,utf8_decode('---'),1,1,'C');

$pdf->Cell(16,4,utf8_decode('2020'),1,0,'C');
$pdf->Cell(60,4,utf8_decode('---'),1,0,'C');
$pdf->Cell(60,4,utf8_decode('---'),1,0,'C');
$pdf->Cell(60,4,utf8_decode('---'),1,1,'C');

$pdf->Cell(16,4,utf8_decode('2021'),1,0,'C');
$pdf->Cell(60,4,utf8_decode('---'),1,0,'C');
$pdf->Cell(60,4,utf8_decode('---'),1,0,'C');
$pdf->Cell(60,4,utf8_decode('---'),1,1,'C');

$pdf->Cell(16,4,utf8_decode('2022'),1,0,'C');
$pdf->Cell(60,4,utf8_decode('---'),1,0,'C');
$pdf->Cell(60,4,utf8_decode('---'),1,0,'C');
$pdf->Cell(60,4,utf8_decode('---'),1,1,'C');
//**************************************************************


$pdf->Ln(3);


$pdf->SetFont('Arial','',7);
$pdf->MultiCell(196,3,utf8_decode('Motivo por el cual, y en virtud que como propietario del bien inmueble anteriormente descrito es sujeto obligado al pago del Impuesto Predial en términos del artículo 93 fracción I de la Ley de Hacienda Municipal del Estado de Jalisco, y toda vez que a la fecha no se ha realizado el pago total del Impuesto Predial, que se encontraba obligado a enterar por los bimestres del 04 al 06 del 2017, del 01 al 06 del 2018, del 01 al 06 del 2019, del 01 al 06 del 2020, del 01 al 06 del 2021, del 01 al 03 del 2022, al haber presentado de forma incorrecta sus pagos mediante recibos oficiales números 4237333 del 06 de Enero del 2017, 361035 del 15 de Enero del 2018, 1227325 del 16 de enero del 2019, 2279315 del 30 de Enero del 2020, 2960355 del 12 de Enero del 2021, 4099347 del 02 de Febrero del 2022,, aplicando a los bimestres señalados valores fiscales incorrectos, para determinar el impuesto predial que le correspondía pagar por los bimestres descritos, y toda vez que dicha conducta se considera grave debido al daño que se genera al erario público puesto que al evadir el pago de contribuciones se afectan las funciones inherentes al Municipio de Zapopan, Jalisco, en materia de la prestación de los servicios que el orden de gobierno correspondiente tiene para con la sociedad en general; a continuación se procede a determinar las diferencias que se encuentra obligado a pagar por concepto del Impuesto Predial, aplicado los valores fiscales determinados por la autoridad catastral, por concepto de DIFERENCIAS EN METROS DE CONSTRUCCIÓN, CONSTRUCCIONES NO MANIFESTADAS Y/O OMISOS POR LOS ULTIMOS CINCO AÑOS, de conformidad con la resolución de fecha 18 de Agosto del 2022, tal y como se describe a continuación:'),0,'L',0);


$pdf->Ln(2);

$pdf->SetFont('Arial','B',8);
$pdf->SetFillColor(217,217,217);

$pdf->MultiCell(196,4,utf8_decode('DETERMINACIÓN DE LAS DIFERENCIAS POR PAGAR DEL IMPUESTO PREDIAL OMITIDO'),1,'C',1);

$pdf->SetFont('Arial','B',6.5);

$pdf->Cell(10,16,utf8_decode('AÑO'),1,0,'C');
$pdf->Cell(29.2,16,utf8_decode(''),0,0,'C');
$pdf->Cell(17,16,utf8_decode(''),0,0,'C');
$pdf->Cell(25.8,16,utf8_decode(''),0,0,'C');
$pdf->Cell(19,16,utf8_decode(''),0,0,'C');
$pdf->Cell(19,16,utf8_decode(''),0,0,'C');
$pdf->Cell(19,16,utf8_decode(''),0,0,'C');
$pdf->Cell(19,16,utf8_decode(''),0,0,'C');
$pdf->Cell(19,16,utf8_decode(''),0,0,'C');
$pdf->Cell(19,16,utf8_decode(''),0,1,'C');






$pdf->SetY(154);
$pdf->SetX(20);
$pdf->MultiCell(29.2,4,utf8_decode('VALOR FISCAL DETERMINADO POR LA AUTORIDAD CATASTRAL'),1,'C',0);

$pdf->SetY(154);
$pdf->SetX(49.2);
$pdf->MultiCell(17,4,utf8_decode('TASA APLICABLE AL 
MILLAR'),1,'C',0);

$pdf->SetY(154);
$pdf->SetX(66.2);
$pdf->MultiCell(25.8,4,utf8_decode('TASA PARA APLICARSE SOBRE EL EXCEDENTE DEL LÍMITE INFERIOR'),1,'C',0);



$pdf->SetY(154);
$pdf->SetX(92);
$pdf->MultiCell(38,8,utf8_decode('IMPUESTO POR PAGAR'),1,'C',0);

$pdf->SetX(92);
$pdf->Cell(19,8,utf8_decode('BIMESTRAL'),1,0,'C');
$pdf->Cell(19,8,utf8_decode('ANUAL'),1,1,'C');


$pdf->SetY(154);
$pdf->SetX(130);
$pdf->MultiCell(38,8,utf8_decode('IMPUESTO PAGADO'),1,'C',0);

$pdf->SetX(130);
$pdf->Cell(19,8,utf8_decode('BIMESTRAL'),1,0,'C');
$pdf->Cell(19,8,utf8_decode('ANUAL'),1,1,'C');


$pdf->SetY(154);
$pdf->SetX(168);
$pdf->MultiCell(38,8,utf8_decode('DIFERENCIA POR PAGAR'),1,'C',0);

$pdf->SetX(168);
$pdf->Cell(19,8,utf8_decode('BIMESTRAL'),1,0,'C');
$pdf->Cell(19,8,utf8_decode('ANUAL'),1,1,'C');







$pdf->SetFont('Arial','',6.5);
$pdf->Cell(10,4,utf8_decode('2017'),1,0,'C');
$pdf->Cell(29.2,4,utf8_decode('$5,069,137.30'),1,0,'C');
$pdf->Cell(17,4,utf8_decode('0.23'),1,0,'C');
$pdf->Cell(25.8,4,utf8_decode('0.0003277'),1,0,'C');
$pdf->Cell(19,4,utf8_decode('$ 1,059.33'),1,0,'C');
$pdf->Cell(19,4,utf8_decode('$ 3,177.99'),1,0,'C');
$pdf->Cell(19,4,utf8_decode('$ 857.00'),1,0,'C');
$pdf->Cell(19,4,utf8_decode('$ 2,571.00'),1,0,'C');
$pdf->Cell(19,4,utf8_decode('$ 202.33'),1,0,'C');
$pdf->Cell(19,4,utf8_decode('$ 606.99'),1,1,'C');

$pdf->Cell(10,4,utf8_decode('2018'),1,0,'C');
$pdf->Cell(29.2,4,utf8_decode('$5,069,137.30'),1,0,'C');
$pdf->Cell(17,4,utf8_decode('0.23'),1,0,'C');
$pdf->Cell(25.8,4,utf8_decode('0.0003277'),1,0,'C');
$pdf->Cell(19,4,utf8_decode('$ 1,059.33'),1,0,'C');
$pdf->Cell(19,4,utf8_decode('$ 3,177.99'),1,0,'C');
$pdf->Cell(19,4,utf8_decode('$ 857.00'),1,0,'C');
$pdf->Cell(19,4,utf8_decode('$ 2,571.00'),1,0,'C');
$pdf->Cell(19,4,utf8_decode('$ 202.33'),1,0,'C');
$pdf->Cell(19,4,utf8_decode('$ 606.99'),1,1,'C');

$pdf->Cell(10,4,utf8_decode('2019'),1,0,'C');
$pdf->Cell(29.2,4,utf8_decode('$5,069,137.30'),1,0,'C');
$pdf->Cell(17,4,utf8_decode('0.23'),1,0,'C');
$pdf->Cell(25.8,4,utf8_decode('0.0003277'),1,0,'C');
$pdf->Cell(19,4,utf8_decode('$ 1,059.33'),1,0,'C');
$pdf->Cell(19,4,utf8_decode('$ 3,177.99'),1,0,'C');
$pdf->Cell(19,4,utf8_decode('$ 857.00'),1,0,'C');
$pdf->Cell(19,4,utf8_decode('$ 2,571.00'),1,0,'C');
$pdf->Cell(19,4,utf8_decode('$ 202.33'),1,0,'C');
$pdf->Cell(19,4,utf8_decode('$ 606.99'),1,1,'C');

$pdf->Cell(10,4,utf8_decode('2020'),1,0,'C');
$pdf->Cell(29.2,4,utf8_decode('$5,069,137.30'),1,0,'C');
$pdf->Cell(17,4,utf8_decode('0.23'),1,0,'C');
$pdf->Cell(25.8,4,utf8_decode('0.0003277'),1,0,'C');
$pdf->Cell(19,4,utf8_decode('$ 1,059.33'),1,0,'C');
$pdf->Cell(19,4,utf8_decode('$ 3,177.99'),1,0,'C');
$pdf->Cell(19,4,utf8_decode('$ 857.00'),1,0,'C');
$pdf->Cell(19,4,utf8_decode('$ 2,571.00'),1,0,'C');
$pdf->Cell(19,4,utf8_decode('$ 202.33'),1,0,'C');
$pdf->Cell(19,4,utf8_decode('$ 606.99'),1,1,'C');

$pdf->Cell(10,4,utf8_decode('2021'),1,0,'C');
$pdf->Cell(29.2,4,utf8_decode('$5,069,137.30'),1,0,'C');
$pdf->Cell(17,4,utf8_decode('0.23'),1,0,'C');
$pdf->Cell(25.8,4,utf8_decode('0.0003277'),1,0,'C');
$pdf->Cell(19,4,utf8_decode('$ 1,059.33'),1,0,'C');
$pdf->Cell(19,4,utf8_decode('$ 3,177.99'),1,0,'C');
$pdf->Cell(19,4,utf8_decode('$ 857.00'),1,0,'C');
$pdf->Cell(19,4,utf8_decode('$ 2,571.00'),1,0,'C');
$pdf->Cell(19,4,utf8_decode('$ 202.33'),1,0,'C');
$pdf->Cell(19,4,utf8_decode('$ 606.99'),1,1,'C');

$pdf->Cell(10,4,utf8_decode('2022'),1,0,'C');
$pdf->Cell(29.2,4,utf8_decode('$5,069,137.30'),1,0,'C');
$pdf->Cell(17,4,utf8_decode('0.23'),1,0,'C');
$pdf->Cell(25.8,4,utf8_decode('0.0003277'),1,0,'C');
$pdf->Cell(19,4,utf8_decode('$ 1,059.33'),1,0,'C');
$pdf->Cell(19,4,utf8_decode('$ 3,177.99'),1,0,'C');
$pdf->Cell(19,4,utf8_decode('$ 857.00'),1,0,'C');
$pdf->Cell(19,4,utf8_decode('$ 2,571.00'),1,0,'C');
$pdf->Cell(19,4,utf8_decode('$ 202.33'),1,0,'C');
$pdf->Cell(19,4,utf8_decode('$ 606.99'),1,1,'C');




$pdf->Ln(3);


$pdf->SetFont('Arial','',7);
$pdf->MultiCell(196,3,utf8_decode('Por todo lo anterior, esta autoridad fiscal, procede a realizar la determinación del crédito fiscal que de ello se deriva, más los accesorios legales que en términos de ley se han generado, toda vez que a la fecha no se ha realizado el pago del Impuesto Predial, que se encontraba obligado a enterar por los bimestres del 04 al 06 del 2017, del 01 al 06 del 2018, del 01 al 06 del 2019, del 01 al 06 del 2020, del 01 al 06 del 2021, del 01 al 03 del 2022, al haber presentado de forma incorrecta sus pagos que se encontraba obligado a enterar por los bimestres descrito; en virtud de que el contribuyente del Impuesto Predial, como sujeto obligado del inmueble antes señalado, a la fecha no ha cumplido con la obligación establecida en los artículos 46, y 94 fracciones I, II, III, y IV de la Ley de Hacienda Municipal del Estado de Jalisco, de declarar el valor fiscal correcto del predio de su posesión a que se refiere la presente resolución, esta autoridad municipal, con fundamento en los artículos 23 fracción X, primer párrafo y el propio 94, fracción XI de Ley de Hacienda Municipal del Estado de Jalisco, y el 32 fracción VII del Reglamento de la Administración Pública Municipal de Zapopan, Jalisco, procede a determinarlo de acuerdo con la información proporcionada por la autoridad catastral municipal, de conformidad con los registros que obran en su poder, y las Tablas de Valores Unitarios de Suelo y de Construcción del Municipio de Zapopan, Jalisco, para los ejercicios fiscales correspondientes de conformidad con la siguiente:'),0,'L',0);

$pdf->Ln(4);
$pdf->SetFont('Arial','B',8);
$pdf->MultiCell(196,3,utf8_decode('RESOLUCIÓN DETERMINANTE DEL CRÉDITO FISCAL'),0,'C',0);
$pdf->Ln(4);


$pdf->SetFont('Arial','',7);
$pdf->MultiCell(196,3,utf8_decode('BASE GRAVABLE. Conforme a las Tablas Valores Unitarios de Suelo y Construcción del Municipio de Zapopan, Jalisco, aprobadas por el H. Congreso del Estado de Jalisco, publicadas en el Periódico Oficial “El Estado de Jalisco” y en los términos del capítulo VI de la Ley de Catastro Municipal del Estado de Jalisco, para cada uno de los ejercicios por lo que presenta adeudo, conforme a las fracciones XI y XII del artículo 94 y 97 de la Ley de Hacienda Municipal del Estado de Jalisco; artículos 44 y 46 de la Ley de Ingresos del Municipio de Zapopan Jalisco, para el ejercicio fiscal del 2017; 30 y 32 de la Ley de Ingresos del Municipio de Zapopan, Jalisco para el ejercicio fiscal del 2018; 43 y 45 de la Ley de Ingresos del Municipio de Zapopan, Jalisco para el ejercicio fiscal del 2019; 43 y 45 de la Ley de Ingresos del Municipio de Zapopan, Jalisco, para el Ejercicio Fiscal del Año 2020; artículos 43 y 45 de la Ley de Ingresos del Municipio de Zapopan, Jalisco, para el Ejercicio Fiscal del Año 2021 y; 43 y 45 de la Ley de Ingresos del Municipio de Zapopan, Jalisco, para el Ejercicio Fiscal del Año 2022, así mismo el inmueble tiene una superficie registrada de 900 metros cuadrados de terreno y una superficie de construcción de 954.08 metros cuadrados, por lo que tiene un valor fiscal de $5,069,137.30 (CINCO MILLONES SESENTA Y NUEVE MIL CIENTO TREINTA Y SIETE 30/100 M.N. PESOS 00/100 M. N.) 


DE LA TASA DEL IMPUESTO. Para los años 2022, 2021 y 2020, se aplica bimestralmente a la base fiscal, la cuota fija, y tasa establecida por el artículo 45 fracción I de la Ley de Ingresos del Municipio de Zapopan, Jalisco, vigente para los Ejercicios Fiscales de los años 2022, 2021 y 2020. Para el ejercicio fiscal del año 2019 y anteriores, se aplica bimestralmente a la base fiscal la tasa que corresponda de acuerdo con lo señalado en el artículo 45 primer párrafo, fracción I, inciso a), fracción II, inciso a) de la Ley de Ingresos del Municipio de Zapopan, Jalisco, vigente para el Ejercicio Fiscal del año 2019; artículo 32 primer párrafo, fracción I inciso a), fracción II inciso a) de la Ley de Ingresos del Municipio de Zapopan, Jalisco, vigente para el Ejercicio Fiscal 2018; artículo 46 primer párrafo, fracción I, inciso a), fracción II inciso a) de la Ley de Ingresos del Municipio de Zapopan, Jalisco, para el Ejercicio Fiscal 2017.

CUOTA FIJA. Para el cálculo del impuesto predial bimestral, se aplicara la fórmula establecida para ello en el artículo que se menciona a continuación, al resultado de dicha fórmula se le sumara la Cuota Fija  que corresponda según lo establecido en la tabla 1 que desglosa la tarifa bimestral  correspondiente del impuesto  Predial con fundamento en el artículo 45  fracción I ,de la Ley de Ingresos del Municipio de Zapopan ,Jalisco, para los ejercicios fiscales de los años 2020, 2021, 2022, que dispone lo siguiente:
'),0,'L',0);

$pdf->Ln(2);

$pdf->SetFont('Arial','I',7);
$pdf->MultiCell(196,3,utf8_decode('Artículo 45. Este impuesto se causará y pagará, de conformidad con las disposiciones contenidas en el capítulo correspondiente a la Ley de Hacienda Municipal del Estado de Jalisco y de acuerdo con lo que resulte de aplicar bimestralmente a la base fiscal las tasas a que se refiere este capítulo y demás disposiciones establecidas en esta ley, de acuerdo a lo siguiente:

I. Para Predios Rústicos y Urbanos sobre el valor determinado, se aplicará la siguiente tabla:'),0,'L',0);

$pdf->Ln(2);
$pdf->SetFont('Arial','I',8);
$pdf->MultiCell(196,3,utf8_decode('TARIFA BIMESTRAL'),0,'C',0);

//**********************************************************************************

$pdf->SetFont('Arial','I',8);
$pdf->MultiCell(196,4,utf8_decode('BASE FISCAL'),1,'C',0);

$pdf->SetFont('Arial','I',8);

$pdf->Cell(49,8,utf8_decode('Límite Inferior '),1,0,'C');
$pdf->Cell(49,8,utf8_decode('Limite Superior r'),1,0,'C');
$pdf->Cell(49,8,utf8_decode('Cuota fija '),1,0,'C');
$pdf->MultiCell(49,4,utf8_decode('Tasa para Aplicarse sobre el Excedente del Límite Inferior'),1,'C',0);

$pdf->SetFont('Arial','I',7);
$pdf->Cell(49,4,utf8_decode('620,100.01'),1,0,'C');
$pdf->Cell(49,4,utf8_decode('620,100.00'),1,0,'C');
$pdf->Cell(49,4,utf8_decode('142.63'),1,0,'C');
$pdf->Cell(49,4,utf8_decode('0.0002300'),1,1,'C');

$pdf->Cell(49,4,utf8_decode('620,100.01'),1,0,'C');
$pdf->Cell(49,4,utf8_decode('620,100.00'),1,0,'C');
$pdf->Cell(49,4,utf8_decode('142.63'),1,0,'C');
$pdf->Cell(49,4,utf8_decode('0.0002300'),1,1,'C');

$pdf->Cell(49,4,utf8_decode('620,100.01'),1,0,'C');
$pdf->Cell(49,4,utf8_decode('620,100.00'),1,0,'C');
$pdf->Cell(49,4,utf8_decode('142.63'),1,0,'C');
$pdf->Cell(49,4,utf8_decode('0.0002300'),1,1,'C');

$pdf->Cell(49,4,utf8_decode('620,100.01'),1,0,'C');
$pdf->Cell(49,4,utf8_decode('620,100.00'),1,0,'C');
$pdf->Cell(49,4,utf8_decode('142.63'),1,0,'C');
$pdf->Cell(49,4,utf8_decode('0.0002300'),1,1,'C');

$pdf->Cell(49,4,utf8_decode('620,100.01'),1,0,'C');
$pdf->Cell(49,4,utf8_decode('620,100.00'),1,0,'C');
$pdf->Cell(49,4,utf8_decode('142.63'),1,0,'C');
$pdf->Cell(49,4,utf8_decode('0.0002300'),1,1,'C');

$pdf->Cell(49,4,utf8_decode('620,100.01'),1,0,'C');
$pdf->Cell(49,4,utf8_decode('620,100.00'),1,0,'C');
$pdf->Cell(49,4,utf8_decode('142.63'),1,0,'C');
$pdf->Cell(49,4,utf8_decode('0.0002300'),1,1,'C');

$pdf->Cell(49,4,utf8_decode('620,100.01'),1,0,'C');
$pdf->Cell(49,4,utf8_decode('620,100.00'),1,0,'C');
$pdf->Cell(49,4,utf8_decode('142.63'),1,0,'C');
$pdf->Cell(49,4,utf8_decode('0.0002300'),1,1,'C');

$pdf->Cell(49,4,utf8_decode('620,100.01'),1,0,'C');
$pdf->Cell(49,4,utf8_decode('620,100.00'),1,0,'C');
$pdf->Cell(49,4,utf8_decode('142.63'),1,0,'C');
$pdf->Cell(49,4,utf8_decode('0.0002300'),1,1,'C');

$pdf->Cell(49,4,utf8_decode('620,100.01'),1,0,'C');
$pdf->Cell(49,4,utf8_decode('620,100.00'),1,0,'C');
$pdf->Cell(49,4,utf8_decode('142.63'),1,0,'C');
$pdf->Cell(49,4,utf8_decode('0.0002300'),1,1,'C');

$pdf->Cell(49,4,utf8_decode('620,100.01'),1,0,'C');
$pdf->Cell(49,4,utf8_decode('620,100.00'),1,0,'C');
$pdf->Cell(49,4,utf8_decode('142.63'),1,0,'C');
$pdf->Cell(49,4,utf8_decode('0.0002300'),1,1,'C');

$pdf->Cell(49,4,utf8_decode('620,100.01'),1,0,'C');
$pdf->Cell(49,4,utf8_decode('620,100.00'),1,0,'C');
$pdf->Cell(49,4,utf8_decode('142.63'),1,0,'C');
$pdf->Cell(49,4,utf8_decode('0.0002300'),1,1,'C');

$pdf->Cell(49,4,utf8_decode('620,100.01'),1,0,'C');
$pdf->Cell(49,4,utf8_decode('620,100.00'),1,0,'C');
$pdf->Cell(49,4,utf8_decode('142.63'),1,0,'C');
$pdf->Cell(49,4,utf8_decode('0.0002300'),1,1,'C');

$pdf->Cell(49,4,utf8_decode('620,100.01'),1,0,'C');
$pdf->Cell(49,4,utf8_decode('620,100.00'),1,0,'C');
$pdf->Cell(49,4,utf8_decode('142.63'),1,0,'C');
$pdf->Cell(49,4,utf8_decode('0.0002300'),1,1,'C');

$pdf->Cell(49,4,utf8_decode('620,100.01'),1,0,'C');
$pdf->Cell(49,4,utf8_decode('620,100.00'),1,0,'C');
$pdf->Cell(49,4,utf8_decode('142.63'),1,0,'C');
$pdf->Cell(49,4,utf8_decode('0.0002300'),1,1,'C');

$pdf->Cell(49,4,utf8_decode('620,100.01'),1,0,'C');
$pdf->Cell(49,4,utf8_decode('620,100.00'),1,0,'C');
$pdf->Cell(49,4,utf8_decode('142.63'),1,0,'C');
$pdf->Cell(49,4,utf8_decode('0.0002300'),1,1,'C');




$pdf->Ln(1);

$pdf->SetFont('Arial','I',7);
$pdf->MultiCell(196,3,utf8_decode('Para el cálculo del Impuesto Predial bimestral, al Valor Fiscal se le disminuirá el Límite Inferior que corresponda y a la diferencia de excedente del Límite Inferior, se le aplicará la tasa sobre el excedente del Límite Inferior, al resultado se le sumará la Cuota Fija que corresponda, y el importe de dicha operación será el Impuesto Predial a pagar en el bimestre.
Para el cálculo del Impuesto Predial bimestral se deberá aplicar la siguiente fórmula:
((VF-LI)*T)+CF = Impuesto Predial a pagar en el bimestre.
En donde:
VF= Valor Fiscal
LI= Límite Inferior correspondiente
T= Tasa para aplicarse sobre el excedente del Límite Inferior correspondiente
CF= Cuota Fija correspondiente”
'),0,'L',0);





$pdf->SetFont('Arial','',7);
$pdf->MultiCell(196,3,utf8_decode('DEL IMPUESTO A CARGO. El impuesto predial de los años 2022, 2021 y 2020, se calcula de acuerdo con lo que resulte de aplicar bimestralmente a la base fiscal, las cuotas y tasas establecidas por el artículo 45 fracción I de la Ley de Ingresos del Municipio de Zapopan, Jalisco, vigente para los ejercicios fiscales de los años 2022, 2021 y 2020. Para el cálculo del impuesto predial de los años 2019 y anteriores, consiste en multiplicar la base gravable por la tasa del impuesto aplicable, señalada en los párrafos anteriores de esta resolución, con fundamento en los artículos 98 y 106 de Ley de Hacienda Municipal del Estado de Jalisco, resultado un crédito fiscal a cargo del contribuyente, por omitir su obligación consagrada en el artículo 94 fracciones I, II, III y IV y que no cumplió con su obligación en los plazos establecidos en la misma ley a cargo del contribuyente, en términos de lo que establece la norma aplicable.

ACTUALIZACIÓN. Los montos de las contribuciones se actualizan por el transcurso del tiempo y con motivo de los cambios de precios del país, para lo cual se aplicará el factor de actualización, a las cantidades que se deben actualizar. Dicho factor se obtendrá dividiendo el índice nacional de precios al consumidor, del mes anterior al más reciente del periodo, entre el citado índice correspondiente al mes anterior al más antiguo de dicho periodo. Las contribuciones no se actualizarán por fracciones de mes, según como se señala en el artículo 44 bis de la Ley de Hacienda Municipal del Estado de Jalisco, y los artículos 55 fracción II y 57 de la Ley de Ingresos del Municipio de Zapopan, Jalisco para el Ejercicio Fiscal de año 2022; artículos 55 fracción II y 57 de la Ley de Ingresos del Municipio de Zapopan, Jalisco, para el Ejercicio 
Fiscal del año 2021; artículos 55 y 57 de la Ley de Ingresos del Municipio de Zapopan, Jalisco, para el Ejercicio Fiscal del año 2020; artículos 55 y 57 de la Ley de Ingresos del Municipio de Zapopan, Jalisco, para el Ejercicio Fiscal de año 2019; artículos 42 fracción II y 44 de la Ley de Ingresos del Municipio de Zapopan, Jalisco, para el Ejercicio Fiscal de año 2018; artículos 56 fracción II y 58 de la Ley de Ingresos del Municipio de Zapopan, Jalisco, para el Ejercicio Fiscal de año 2017 a partir de la fecha de la referida detección de diferencias determinadas de conformidad al artículo 108  párrafo primero de la Ley de Hacienda Municipal del Estado de Jalisco.

LOS RECARGOS. Son generados por no haber cumplido con la obligación fiscal de manifestar y de pagar en tiempo y forma el impuesto predial conforme a las disposiciones previstas en el artículo 94 fracciones I, II, III y IV de la Ley de Hacienda Municipal del Estado de Jalisco, obligación que se establece en los artículos 37, fracción III y 103 de la misma Ley, en tanto que el artículo 52 de la referida ley, que ordena que los recargos por concepto de indemnización al fisco municipal deberán cubrirse por falta de pago oportuno. Tasa de recargos que se fija a razón del 1.47% mensual que se debe aplicar sobre el impuesto omitido, conforme a los artículos 55 fracción I y 56 de la Ley de ingresos del Municipio de Zapopan, Jalisco, para los ejercicios fiscales de los años 2022, 2021 y 2020; así como a la tasa de recargos del 1% mensual que deberá ser aplicada sobre el impuesto predial omitido de los años 2019 y anteriores, en términos de lo dispuesto por los artículos 55 fracción I y 56 de la Ley de Ingresos del Municipio de Zapopan, Jalisco, para el ejercicio fiscal del año 2019; artículos 42 fracción I y 43 de la Ley de Ingresos del Municipio de Zapopan, Jalisco, para el ejercicio fiscal del año 2018; artículos 56 fracción I, 57 y 125 de la Ley de Ingresos del Municipio de Zapopan, Jalisco, para el Ejercicio Fiscal del año 2017.

LAS MULTAS.  Es la sanción administrativa causada en contra del contribuyente por incumplir con la obligación de pago, y toda vez que dicha conducta se considera grave debido al daño que se genera al erario público puesto que al evadir el pago de contribuciones se afectan las funciones inherentes al Municipio de Zapopan, Jalisco, en materia de la prestación de los servicios que el orden de gobierno correspondiente tiene para con la sociedad en general, y con la finalidad de eliminar las practicas establecidas en el incumplimiento de la obligación de contribuir al gasto público, se impone una multa equivalente al 50% del monto total de la obligación fiscal omitida, con fundamento en lo dispuesto en los artículos 55 fracción IV, 59 y 128 fracción V de la  Ley de Ingresos del Municipio de Zapopan, Jalisco, para el ejercicio fiscal de los años 2022, 2021 y 2020; artículos 55 fracción IV, 59 y 128 fracción I, inciso b) de la  Ley de Ingresos del Municipio de Zapopan, Jalisco, para el ejercicio fiscal del año 2019; artículos 42 fracción IV, 46 y 107 primer párrafo, inciso b) fracción V de la Ley de Ingresos del Municipio de Zapopan, Jalisco, para el Ejercicio Fiscal de año 2018; artículos 56 fracción IV, 60 y 121 primer párrafo inciso b) fracción V de la  Ley de Ingresos del Municipio de Zapopan, Jalisco, para el Ejercicio Fiscal de año 2017.

LOS GASTOS DE NOTIFICACIÓN. Son los accesorios legales de los adeudos y se causan por la práctica de la diligencia de notificación de créditos fiscales para hacer saber al sujeto deudor por parte del fisco municipal del incumplimiento del pago de las obligaciones fiscales establecidos en la norma vigente, y demás disposiciones fiscales aplicables, y se harán efectivas conjuntamente con el crédito fiscal, por considerarse como ya se señaló, accesorios de este, en las cantidades y porcentajes que se establecen en el artículo 60 fracción I, II, y III de la Ley de Ingresos del Municipio de Zapopan, Jalisco para el Ejercicio Fiscal de año 2022. 

CREDITO FISCAL. Se determina, conforme a las disposiciones vigentes, en el momento de su nacimiento, pero le serán aplicables las normas sobre procedimientos, que se expidan con posterioridad, dicha obligación fiscal nace, cuando se realizan las situaciones jurídicas o de hecho previstas en las leyes fiscales, conforme a los artículos 42, 43 y 52 de la Ley de Hacienda Municipal del Estado de Jalisco. Para los años 2022, 2021 y 2020 se aplica bimestralmente a la base fiscal, la cuota fija y tasas establecidas por el artículo 45, fracción I de la Ley de Ingresos del Municipio de Zapopan Jalisco, vigente para los ejercicios fiscales de los años 2022, 2021 y 2020; para los años 2019 y ejercicios anteriores, consiste en el resultado de la base gravable multiplicada por la tasa correspondiente conforme al artículo 45 fracción I, de la Ley de Ingresos del Municipio de Zapopan, Jalisco, vigente para el Ejercicio Fiscal del año 2019; artículo 32 fracción I de la Ley de Ingresos del Municipio de Zapopan, Jalisco, vigente para el Ejercicio Fiscal 2018; artículo 46 primer fracción I de la Ley de Ingresos del Municipio de Zapopan, Jalisco, para el Ejercicio Fiscal 2017; más las actualizaciones, los recargos anuales y de ejercicios anteriores, así como las multas y el acumulado del impuesto de los años anteriores y otros conceptos accesorios, tal y como se describen a continuación.
'),0,'L',0);






$pdf->Ln(2);

$pdf->SetFont('Arial','B',7);
$pdf->SetFillColor(217,217,217);

$pdf->Cell(14,12,utf8_decode(''),1,0,'C',1);
$pdf->Cell(9,12,utf8_decode(''),0,0,'C',1);
$pdf->Cell(9,12,utf8_decode(''),0,0,'C',1);
$pdf->SetFont('Arial','B',6);
$pdf->Cell(18,12,utf8_decode('VALOR FISCAL'),1,0,'C',1);
$pdf->Cell(7,12,utf8_decode('TASA'),1,0,'C',1);
$pdf->Cell(14,12,utf8_decode('CUOTA FIJA'),1,0,'C',1);
$pdf->Cell(15,12,utf8_decode(''),0,0,'C',1);
$pdf->Cell(13,12,utf8_decode('IMPUESTO'),1,0,'C',1);
$pdf->SetFont('Arial','B',5);
$pdf->Cell(16,12,utf8_decode('ACTUALIZACIÓN'),1,0,'C',1);
$pdf->SetFont('Arial','B',6);
$pdf->Cell(27,12,utf8_decode(''),0,0,'C',1);
$pdf->Cell(15,12,utf8_decode(''),0,0,'C',1);
$pdf->Cell(12.5,12,utf8_decode(''),0,0,'C',1);
$pdf->Cell(13,12,utf8_decode('MULTAS'),1,0,'C',1);
$pdf->Cell(13.5,12,utf8_decode('TOTAL'),1,1,'C',1);






$pdf->SetY(145);
$pdf->SetX(10);
$pdf->MultiCell(14,6,utf8_decode('EJECICIO FISCAL'),0,'C',0);


$pdf->SetFont('Arial','B',6);
$pdf->SetY(145);
$pdf->SetX(24);
$pdf->MultiCell(18,6,utf8_decode('BIMESTRE'),1,'C',0);
$pdf->SetX(24);
$pdf->Cell(9,6,utf8_decode('INICIAL'),1,0,'C');
$pdf->Cell(9,6,utf8_decode('FINAL'),1,1,'C');


$pdf->SetFont('Arial','B',5);
$pdf->SetY(145);
$pdf->SetX(81);
$pdf->MultiCell(15,2,utf8_decode('TASA PARA APLICARSE SOBRE EL EXCEDENTE DEL LÍMITE INFERIOR'),1,'C',0);


$pdf->SetFont('Arial','B',6);
$pdf->SetY(145);
$pdf->SetX(125);
$pdf->MultiCell(27,6,utf8_decode('RECARGOS'),1,'C',0);
$pdf->SetFont('Arial','B',5);
$pdf->SetX(125);
$pdf->MultiCell(13,3,utf8_decode('EJERCICIO CORRIENTE'),1,'C',0);
$pdf->SetY(151);
$pdf->SetX(138);
$pdf->MultiCell(14,3,utf8_decode('EJERCICIOS ANTERIORES'),1,'C',0);


$pdf->SetY(145);
$pdf->SetX(152);
$pdf->MultiCell(15,6,utf8_decode('GASTOS DE NOTIFICACIÓN'),1,'C',0);


$pdf->SetY(145);
$pdf->SetX(167);
$pdf->MultiCell(12.5,6,utf8_decode('GASTOS DE EJECUCIÓN'),1,'C',0);





$pdf->SetFont('Arial','',5.5);
$pdf->Cell(14,4,utf8_decode('2017'),1,0,'C');
$pdf->Cell(9,4,utf8_decode('4'),1,0,'C');
$pdf->Cell(9,4,utf8_decode('6'),1,0,'C');
$pdf->Cell(18,4,utf8_decode('$4 605 770.40'),1,0,'C');
$pdf->Cell(7,4,utf8_decode('0.23'),1,0,'C');
$pdf->Cell(14,4,utf8_decode('$1,009.52'),1,0,'C');
$pdf->Cell(15,4,utf8_decode('0.0003'),1,0,'C');
$pdf->Cell(13,4,utf8_decode('$606.99'),1,0,'C');
$pdf->Cell(16,4,utf8_decode('$54.11'),1,0,'C');
$pdf->Cell(13,4,utf8_decode('$402.12'),1,0,'C');
$pdf->Cell(14,4,utf8_decode('$402.12'),1,0,'C');
$pdf->Cell(15,4,utf8_decode('$577.32'),1,0,'C');
$pdf->Cell(12.5,4,utf8_decode('$577.32'),1,0,'C');
$pdf->Cell(13,4,utf8_decode('$303.50'),1,0,'C');
$pdf->Cell(13.5,4,utf8_decode('$303.50'),1,1,'C');

$pdf->Cell(14,4,utf8_decode('2018'),1,0,'C');
$pdf->Cell(9,4,utf8_decode('4'),1,0,'C');
$pdf->Cell(9,4,utf8_decode('6'),1,0,'C');
$pdf->Cell(18,4,utf8_decode('$4 605 770.40'),1,0,'C');
$pdf->Cell(7,4,utf8_decode('0.23'),1,0,'C');
$pdf->Cell(14,4,utf8_decode('$1,009.52'),1,0,'C');
$pdf->Cell(15,4,utf8_decode('0.0003'),1,0,'C');
$pdf->Cell(13,4,utf8_decode('$606.99'),1,0,'C');
$pdf->Cell(16,4,utf8_decode('$54.11'),1,0,'C');
$pdf->Cell(13,4,utf8_decode('$402.12'),1,0,'C');
$pdf->Cell(14,4,utf8_decode('$402.12'),1,0,'C');
$pdf->Cell(15,4,utf8_decode('$577.32'),1,0,'C');
$pdf->Cell(12.5,4,utf8_decode('$577.32'),1,0,'C');
$pdf->Cell(13,4,utf8_decode('$303.50'),1,0,'C');
$pdf->Cell(13.5,4,utf8_decode('$303.50'),1,1,'C');

$pdf->Cell(14,4,utf8_decode('2019'),1,0,'C');
$pdf->Cell(9,4,utf8_decode('4'),1,0,'C');
$pdf->Cell(9,4,utf8_decode('6'),1,0,'C');
$pdf->Cell(18,4,utf8_decode('$4 605 770.40'),1,0,'C');
$pdf->Cell(7,4,utf8_decode('0.23'),1,0,'C');
$pdf->Cell(14,4,utf8_decode('$1,009.52'),1,0,'C');
$pdf->Cell(15,4,utf8_decode('0.0003'),1,0,'C');
$pdf->Cell(13,4,utf8_decode('$606.99'),1,0,'C');
$pdf->Cell(16,4,utf8_decode('$54.11'),1,0,'C');
$pdf->Cell(13,4,utf8_decode('$402.12'),1,0,'C');
$pdf->Cell(14,4,utf8_decode('$402.12'),1,0,'C');
$pdf->Cell(15,4,utf8_decode('$577.32'),1,0,'C');
$pdf->Cell(12.5,4,utf8_decode('$577.32'),1,0,'C');
$pdf->Cell(13,4,utf8_decode('$303.50'),1,0,'C');
$pdf->Cell(13.5,4,utf8_decode('$303.50'),1,1,'C');

$pdf->Cell(14,4,utf8_decode('2020'),1,0,'C');
$pdf->Cell(9,4,utf8_decode('4'),1,0,'C');
$pdf->Cell(9,4,utf8_decode('6'),1,0,'C');
$pdf->Cell(18,4,utf8_decode('$4 605 770.40'),1,0,'C');
$pdf->Cell(7,4,utf8_decode('0.23'),1,0,'C');
$pdf->Cell(14,4,utf8_decode('$1,009.52'),1,0,'C');
$pdf->Cell(15,4,utf8_decode('0.0003'),1,0,'C');
$pdf->Cell(13,4,utf8_decode('$606.99'),1,0,'C');
$pdf->Cell(16,4,utf8_decode('$54.11'),1,0,'C');
$pdf->Cell(13,4,utf8_decode('$402.12'),1,0,'C');
$pdf->Cell(14,4,utf8_decode('$402.12'),1,0,'C');
$pdf->Cell(15,4,utf8_decode('$577.32'),1,0,'C');
$pdf->Cell(12.5,4,utf8_decode('$577.32'),1,0,'C');
$pdf->Cell(13,4,utf8_decode('$303.50'),1,0,'C');
$pdf->Cell(13.5,4,utf8_decode('$303.50'),1,1,'C');

$pdf->Cell(14,4,utf8_decode('2021'),1,0,'C');
$pdf->Cell(9,4,utf8_decode('4'),1,0,'C');
$pdf->Cell(9,4,utf8_decode('6'),1,0,'C');
$pdf->Cell(18,4,utf8_decode('$4 605 770.40'),1,0,'C');
$pdf->Cell(7,4,utf8_decode('0.23'),1,0,'C');
$pdf->Cell(14,4,utf8_decode('$1,009.52'),1,0,'C');
$pdf->Cell(15,4,utf8_decode('0.0003'),1,0,'C');
$pdf->Cell(13,4,utf8_decode('$606.99'),1,0,'C');
$pdf->Cell(16,4,utf8_decode('$54.11'),1,0,'C');
$pdf->Cell(13,4,utf8_decode('$402.12'),1,0,'C');
$pdf->Cell(14,4,utf8_decode('$402.12'),1,0,'C');
$pdf->Cell(15,4,utf8_decode('$577.32'),1,0,'C');
$pdf->Cell(12.5,4,utf8_decode('$577.32'),1,0,'C');
$pdf->Cell(13,4,utf8_decode('$303.50'),1,0,'C');
$pdf->Cell(13.5,4,utf8_decode('$303.50'),1,1,'C');

$pdf->Cell(14,4,utf8_decode('2022'),1,0,'C');
$pdf->Cell(9,4,utf8_decode('4'),1,0,'C');
$pdf->Cell(9,4,utf8_decode('6'),1,0,'C');
$pdf->Cell(18,4,utf8_decode('$4 605 770.40'),1,0,'C');
$pdf->Cell(7,4,utf8_decode('0.23'),1,0,'C');
$pdf->Cell(14,4,utf8_decode('$1,009.52'),1,0,'C');
$pdf->Cell(15,4,utf8_decode('0.0003'),1,0,'C');
$pdf->Cell(13,4,utf8_decode('$606.99'),1,0,'C');
$pdf->Cell(16,4,utf8_decode('$54.11'),1,0,'C');
$pdf->Cell(13,4,utf8_decode('$402.12'),1,0,'C');
$pdf->Cell(14,4,utf8_decode('$402.12'),1,0,'C');
$pdf->Cell(15,4,utf8_decode('$577.32'),1,0,'C');
$pdf->Cell(12.5,4,utf8_decode('$577.32'),1,0,'C');
$pdf->Cell(13,4,utf8_decode('$303.50'),1,0,'C');
$pdf->Cell(13.5,4,utf8_decode('$303.50'),1,1,'C');

$pdf->SetFont('Arial','B',5.5);
$pdf->Cell(157,4,utf8_decode(''),0,0,'C');
$pdf->Cell(25.5,4,utf8_decode('IMPORTE TOTAL'),1,0,'C',1);
$pdf->Cell(13.5,4,utf8_decode('$34,141.19'),1,1,'C');







$pdf->Ln(2);

$pdf->SetFont('Arial','I',7);
$pdf->MultiCell(196,3,utf8_decode('Las cantidades antes señaladas se encuentran sujetas a la actualización y recargos que corresponda en términos de las leyes aplicables y a partir de esta fecha, y deberán actualizarse hasta la fecha en que se realice el pago por parte del contribuyente deudor por lo que corresponde a la suerte principal, así como los recargos que se generan por falta de pago oportuno.

DE LAS CONDICIONES DE PAGO. Se informa que cuenta con 15 días hábiles para cubrir la presente liquidación, conforme al artículo 43 fracción I, 44, 47, 49 y 54 de la Ley de Hacienda Municipal del Estado de Jalisco.

Se le apercibe que en caso de no realizar el pago en el término de 15 días hábiles siguientes en que surta efectos la presente notificación, se procederá a instaurar en su contra el PROCEDIMIENTO ADMINISTRATIVO DE EJECUCIÓN, conforme lo establecido en los artículos 149, 150 y 151 de la ley de Procedimiento Administrativo del Estado de Jalisco, en correlación con los diversos numerales 252, 253, 254, 257, 258, 259, 259 A, 259 B y 265 y demás relativos aplicables a la Ley de Hacienda Municipal del Estado de Jalisco, y cuya consecuencia será trabar ejecución de cuentas bancarias o bienes suficientes para garantizar los créditos fiscales reclamados, y en su caso, se procederá al remate de los bienes y con su producto se pagarán las cantidades adeudadas determinadas en la presente resolución; aunado a que se deberá cubrir el 3 % del importe total del crédito fiscal, por concepto de gastos de ejecución que se generen por cada diligencia de cobro en su contra de conformidad con lo que establecido en el artículo 60 primer párrafo, fracción II, inciso a), de la Ley de Ingresos del Municipio de Zapopan, Jalisco, para el Ejercicio Fiscal del año 2022. 

Se hace del conocimiento del contribuyente deudor, que la presente resolución podrá ser impugnada dentro de los 15 días siguientes a su notificación mediante el Recurso de Reconsideración, establecido en el titulo segundo del libro Quinto de la Ley de Hacienda Municipal del Estado de Jalisco, o dentro de los 30 días siguientes aquel en que surta efectos su notificación, mediante el juicio en materia administrativa, previsto en la Ley de Justicia Administrativa del Estado de Jalisco.

Notifíquese personalmente, designando al C. Francisco Joel González Ramos, con número de credencial 379, como autorizado para llevar a cabo la diligencia de notificación de este documento, otorgándosele facultades, para que dicha notificación pueda hacerse incluso en días y horas hábiles, sin que lo anterior altere el cálculo de los plazos como se determina en el artículo 250 de la Ley de Hacienda Municipal del Estado de Jalisco.

Así lo determinó la Directora de Ingresos en ejercicio de las atribuciones conferidas en los numerales 3 y 4, del Acuerdo Delegatorio de Competencias oficio número 1400/2021/T-0156, de fecha 05 de octubre de 2021, publicado en la Gaceta Municipal el 11 de octubre de 2021, VoI. XXVIII, No.111, Segunda Época, emitido por la Tesorera Municipal, según facultades de conformidad con los artículos 20 fracciones III y IV, 23 fracciones I y III inciso a), IV, VIII y X primer párrafo, y 23 bis de la Ley de Hacienda Municipal del Estado de Jalisco en vigor, y artículo 32 fracción XLVI del Reglamento de la Administración Pública Municipal de Zapopan, Jalisco. Para que en el marco de sus atribuciones y facultades a su cargo se ejecute la diligencia, cumpliendo con las formalidades que para tal efecto señale la Ley.'),0,'L',0);



$pdf->Ln(2);

$pdf->SetFont('Arial','B',8);
$pdf->MultiCell(196,3,utf8_decode('Zapopan, Jalisco; a 29 de agosto del 2022'),0,'C',0);

$pdf->Ln(6);

$pdf->MultiCell(196,3,utf8_decode('L.C.P. MARCELA RUBI GOMEZ JUÁREZ
DIRECTORA DE INGRESOS'),0,'C',0);

$pdf->SetFont('Arial','B',7);
$pdf->MultiCell(196,3,utf8_decode('2022 Año de la atención Integral a Niñas y Adolescentes con Cáncer en Jalisco
Zapopan, Tierra de Amistad, Trabajo y Respeto'),0,'C',0);






























$pdf->Output($archivo,'I');
//$pdf->Output('F', '../../../fotosZapopan/aFiles_PDF/'.$archivo);






















