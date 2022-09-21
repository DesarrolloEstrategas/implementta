<?php

require "../../acnxerdm/conect.php";
require "./Pagosvalidos.php";
$data = [];
$titulo = "";
$excel = "";
try {
    $idPlaza = (isset($_GET['plz'])) ? $_GET['plz'] : 0;
    $pagina = (isset($_GET['pagina'])) ? $_GET['pagina'] : 1;
    $date_range = (isset($_GET['date_range'])) ? $_GET['date_range'] : '';
    $dia = (isset($_GET['dia'])) ? $_GET['dia'] : 90;
    $option = (isset($_GET['option'])) ? $_GET['option'] : 3;
    $dates = explode('a', $date_range);

    if ($idPlaza == 0) {
        throw new Exception("No encontramos la plaza");
    }

    if ($date_range == "" || count($dates) == 0) {
        throw new Exception("Selecciona un rango de fechas");
    };

    $pagosValidos = new Pagosvalidos();
    $pagosValidos->connect = $cnxa;
    $plaza = $pagosValidos->getPlazaInformacion($_GET['plz']);

    $pagosValidos->connect = $cnx;
    $pagosValidos->finicial = date('Y-m-d', strtotime(trim($dates[0])));
    $pagosValidos->ffinal = date('Y-m-d', strtotime(trim($dates[1])));
    $pagos = $pagosValidos->getPagos($pagina, false);

    $datos = [];
    if ($pagos) {
        $i = 0;
        $validos = 0;
        $invalidos = 0;
        $totalpagos = 0;
        while ($pago = sqlsrv_fetch_array($pagos)) {
            $foundValid = false;
            $datos['cuenta'] = $pago['Cuenta'];
            $datos['fechaPago'] = ($pago['FechaPago'] == null) ? '----' : $pago['FechaPago']->format('d-m-Y');
            $datos['recibo'] = $pago['Recibo'];
            $datos['des'] = $pago['Descripcion'];
            $datos['total'] = number_format($pago['Total'], 2);
            $datos['gestor'] = "";
            $datos['tarea'] = "";
            $datos['fechaCaptura'] = "";
            $datos['carac'] = "";
            $datos['puesto'] = "";
            $datos['dias'] = "0";

            $fGestor = $pagosValidos->getFechaCaptura($pago['Cuenta'], 'RegistroGestor');
            $difGestor = null;
            if (isset($fGestor)) {
                $difGestor = $pagosValidos->getDiferenciaFechas($fGestor['FechaCaptura'], $pago['FechaPago'], $_GET['dia']);
                if(isset($difGestor)) {
                    $datos['puesto'] = "Gestor";
                    $datos['gestor'] = $pagosValidos->getUserName($fGestor['IdAspUser']);
                    $datos['tarea'] = $pagosValidos->getTareaName($fGestor['IdTarea']);
                    $datos['dias'] = $difGestor;
                    $datos['fechaCaptura'] = $fGestor['FechaCaptura']->format('d-m-Y');
                    $foundValid = true;
                }
            }

            $difAbogado = null;
            if(!$foundValid) {
                $fAbogado = $pagosValidos->getFechaCaptura($pago['Cuenta'], 'RegistroAbogado');
                if (isset($fAbogado)) {
                    $difAbogado = $pagosValidos->getDiferenciaFechas($fAbogado['FechaCaptura'], $pago['FechaPago'], $_GET['dia']);
                    if(isset($difAbogado)) {
                        $datos['tarea'] = $pagosValidos->getTareaName($fAbogado['IdTarea']);
                        $datos['gestor'] = $pagosValidos->getUserName($fAbogado['IdAspUser']);
                        $datos['puesto'] = "Abogado";
                        $datos['fechaCaptura'] = $fAbogado['FechaCaptura']->format('d-m-Y');
                        $datos['dias'] = $difAbogado;
                        $foundValid = true;
                    }
                }
            }

            $difReductor = null;
            if(!$foundValid) {
                $fReductores = $pagosValidos->getFechaCaptura($pago['Cuenta'], 'RegistroReductores');
                if (isset($fReductores)) {
                    $difReductor = $pagosValidos->getDiferenciaFechas($fReductores['FechaCaptura'], $pago['FechaPago'], $_GET['dia']);
                    if(isset($difReductor)) {
                        $datos['tarea'] = $pagosValidos->getTareaName($fReductores['IdTarea']);
                        $datos['gestor'] = $pagosValidos->getUserName($fReductores['IdAspUser']);
                        $datos['puesto'] = "Reductor";
                        $datos['fechaCaptura'] = $fReductores['FechaCaptura']->format('d-m-Y');
                        $datos['dias'] = $difReductor;
                        $foundValid = true;
                    }
                }
            }

            $difCallCenter = null;
            if(!$foundValid) {
                $fCallcenter = $pagosValidos->getFechaCapturaCallCenter($pago['Cuenta']);
                if (isset($fCallcenter)) {
                    $difCallCenter = $pagosValidos->getDiferenciaFechas($fCallcenter['FechaCaptura'], $pago['FechaPago'], $_GET['dia']);
                    if(isset($difCallCenter)) {
                        $datos['tarea'] = $pagosValidos->getTareaName($fCallcenter['IdTarea']);
                        $datos['gestor'] = $pagosValidos->getUserName($fCallcenter['IdAspUser']);
                        $datos['puesto'] = "Call Center";
                        $datos['fechaCaptura'] = $fCallcenter['FechaCaptura']->format('d-m-Y');
                        $datos['dias'] = $difCallCenter;
                        $foundValid = true;
                    }
                }
            }

            $difPregrabadas = null;
            if(!$foundValid) {
                $fPregrabadas = $pagosValidos->getFechaCapturaPregrabadas($pago['Cuenta']);
                if (isset($fPregrabadas)) {
                    $difPregrabadas = $pagosValidos->getDiferenciaFechas($fPregrabadas['FechaCaptura'], $pago['FechaPago'], $_GET['dia']);
                    if(isset($difPregrabadas)) {
                        $datos['tarea'] = $pagosValidos->getTareaName($fPregrabadas['IdTarea']);
                        $datos['gestor'] = $pagosValidos->getUserName($fPregrabadas['IdAspUser']);
                        $datos['puesto'] = "Pre Grabados";
                        $datos['fechaCaptura'] = $fPregrabadas['FechaCaptura']->format('d-m-Y');
                        $datos['dias'] = $difPregrabadas;
                        $foundValid = true;
                    }
                }
            }

            $isDiff = false;
            $datos['isDiff'] = false;
            if ($foundValid) {
                $isDiff = true;
                $datos['isDiff'] = true;
            } else {
                $datos['gestor'] = "";
                $datos['puesto'] = "";
                $datos['tarea'] = "";
                $datos['fechaCaptura'] = "";
                $datos['dias'] = 0;
            }

            if ($option == 1 && $isDiff) {
                $titulo = "V&aacute;lidos";
                $excel = "Validos";
                array_push($data, $datos);
            } elseif ($option == 2 && !$isDiff) {
                array_push($data, $datos);
                $excel = "No Validos";
                $titulo = "No V&aacute;lidos";
            } else if ($option == 3) {
                array_push($data, $datos);
                $excel = "";
                $titulo = "";
            }
        }
    }
} catch (Exception $e) {
    $data = [];
}

header('Set-Cookie: fileDownload=true; path=/');
header('Cache-Control: max-age=60, must-revalidate');
header("Pragma: public");
header("Expires: 0");
$filename = 'Pagos'. $excel .'_'.$plaza->nombreplaza.'_'.date('d_m_Y_H_i_s_').'.xls';
header("Content-type: application/x-msdownload");
header("Content-Disposition: attachment; filename=$filename");
header("Pragma: no-cache");

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reporte de Pagos</title>
</head>

<body>
    <table id="pagosvalidos" border="1">
        <thead class="thead-dark">
            <tr class="text-left">
                <td colspan="5"></td>
                <td colspan="6">Reporte de Pagos <strong><?= $titulo ?></strong></td>
            </tr>
            <tr class="text-left">
                <td colspan="5"></td>
                <td colspan="6">Per&iacute;odo del <strong><?= $date_range ?></strong></td>
            </tr>
            <tr class="text-left">
                <td colspan="5"></td>
                <td colspan="6">D&iacute;as V&aacute;lidos <strong><?= $dia ?></strong></td>
            </tr>
            <tr>
                <th scope="col" style="text-align:center;">Cuenta</th>
                <th scope="col" style="text-align:center;">Recibo</th>
                <th scope="col" style="text-align:center;">Descripci&oacute;n</th>
                <th scope="col" style="text-align:center;">Fecha de Pago</th>
                <th scope="col" style="text-align:center;">Total</th>
                <th scope="col" style="text-align:center;">Gestor</th>
                <th scope="col" style="text-align:center;">Tarea</th>
                <th scope="col" style="text-align:center;">Fecha Captura</th>
                <th scope="col" style="text-align:center;">Puesto</th>
                <th scope="col" style="text-align:center;">Estatus</th>
                <th scope="col" style="text-align:center;">D&iacute;as</th>
                <!--<th scope="col" style="text-align:center;">Estatus Padr&oacute;n</th>
                <th scope="col" style="text-align:center;">Caracter&iacute;stica Predio</th>
                <th scope="col" style="text-align:center;">Estatus Rezago</th>
                <th scope="col" style="text-align:center;">Estatus Cuenta</th>-->
            </tr>
        </thead>
        <tbody>
            <?php
            if (count($data) > 0) {
                foreach ($data as $pago) {
            ?>
                    <tr>
                        <td><?= $pago['cuenta'] ?></td>
                        <td><?= $pago['recibo'] ?></td>
                        <td><?= $pago['des'] ?></td>
                        <td><?= $pago['fechaPago'] ?></td>
                        <td>$<?= $pago['total'] ?></td>
                        <td><?= utf8_encode($pago['gestor']) ?></td>
                        <td><?= $pago['tarea'] ?></td>
                        <td><?= $pago['fechaCaptura'] ?></td>
                        <td><?= $pago['puesto'] ?></td>
                        <td scope="col" style="text-align:center;">
                            <?php if ($pago['isDiff']) { ?>
                                V&aacute;lido
                            <?php } else { ?>
                                No V&aacute;lido
                            <?php }  ?>
                        </td>
                        <td><?= $pago['dias'] ?></td>
                    </tr>
                <?php
                }
            } else { ?>
                <tr>
                    <td colspan="15" style="text-align: center;">No hay informaci&oacute;n</td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</body>

</html>

