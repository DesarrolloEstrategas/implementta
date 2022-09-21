<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Implementta - Cuentas Validas</title>
  <link rel="icon" href="../icono/implementtaIcon.png">
  <link rel="stylesheet" href="../css/bootstrap.css">
  <link href="../fontawesome/css/all.css" rel="stylesheet">
  <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>
  <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/@sweetalert2/theme-material-ui/material-ui.css" id="theme-styles">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
  <style>
    .table-responsive { height: 600px; overflow-y: auto; }
    .table-responsive thead { position: sticky; top: 0; z-index: 1; background: #fff}
    body {
      background-image: url(../img/back.jpg);
      background-repeat: repeat;
      background-size: 100%;
      background-attachment: fixed;
      overflow-x: hidden;
      /* ocultar scrolBar horizontal*/
    }

    body {
      font-family: sans-serif;
      font-style: normal;
      font-weight: normal;
      width: 100%;
      height: 100%;
      margin-top: -2%;
      padding-top: 0px;
    }

    .jumbotron {
      margin-top: 0%;
      margin-bottom: 0%;
      padding-top: 4%;
      padding-bottom: 1%;
    }

    .padding {
      padding-right: 15%;
      padding-left: 15%;
    }
    .overlay {
      align-items: center;
      background: rgba(245,245,245,0.5);
      display: flex;
      height: 100vh;
      justify-content: center;
      left: 0;
      position: fixed;
      top: 0;
      transition: opacity 0.2s linear;
      width: 100%;
      z-index: 999999;
      opacity: 1;
      transform: opacity 1s linear;
    }
  </style>
</head>

<body>
  <div class="overlay" style="display: none;">
    <div class="spinner-border text-primary" id="spinner" role="status">
        <span class="sr-only">Loading...</span>
    </div>
  </div>
  <?php require "include/nav.php"; ?>
  <?php
  if (isset($_GET['plz'])) {
    $idPlz = $_GET['plz'];
    require "../../acnxerdm/conect.php";
    require "./Pagosvalidos.php";
    $pagos = new Pagosvalidos();
    $pagos->connect = $cnxa;
    $plaza = $pagos->getPlazaInformacion($_GET['plz']);
    if (!$plaza) {
  ?>
      <br>
      <div class="container">
        <div class="alert alert-danger">
          La plaza que intentas buscar no existe
        </div>
      </div>
    <?php
      exit;
    }
    ?>
    <div class="container">
      <div class="card bg-transparent border-0">
        <div class="card-header bg-transparent">
          <div class="col-sm-12">
            <h3>Pagos V&aacute;lidos Implementta</h3>
            <img src="https://img.icons8.com/external-sbts2018-flat-sbts2018/45/000000/external-kpi-basic-ui-elements-2.4-sbts2018-flat-sbts2018.png" /> Plaza: <?= $plaza->nombreplaza ?>
          </div>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-sm-12">
              <form action="./obtenerpagos.php?plz=<?=$_GET['plz']?>" onsubmit="javascript:sendForm(this); return false;" method="POST" class="was-validated">
                <div class="row">
                  <div class="col">
                    <label for="date_range">Rango de fechas</label>
                    <input type="date" name="date_range" class="form-control date_range" id="date_range" required autofocus>
                  </div>
                  <div class="col">
                    <label for="dia">D&iacute;as V&aacute;lidos *</label>
                    <input type="number" class="form-control" name="dia" id="dia" value="90" required>
                    <div class="invalid-feedback">
                      Este campo es obligatorio
                    </div>
                  </div>
                  <div class="col">
                    <button type="submit" class="btn btn-primary mt-4 btn-form-s"><i class="fas fa-search"></i> Buscar pagos v&aacute;lidos</button>
                  </div>
                </div>
              </form>
            </div>
            <div class="col-sm-12 mt-4 alertMessages">
              <div class="alert alert-info"><i class="fas fa-info-circle"></i> <span class="msgalert">Selecciona un rango de fechas para búsqueda de pagos</span></div>
            </div>
          </div>

          <div class="row mt-4" id="divTablepagos" style="display: none;">
            <div class="col-sm-12">
              <div class="tbl-information">
                <div class="table-responsive">
                  <table id="pagosvalidos" class="table table-hover table-sm text-center">
                    <thead class="thead-dark">
                      <tr class="text-left">
                        <td colspan="3">Periodo del <span class="lbl_periodo"></span></td>
                        <td>Total de Pagos V&aacute;lidos</td>
                        <td><strong><span class="lbl_pagos_validos"></span></strong></td>
                      </tr>
                      <tr class="text-left">
                        <td colspan="3">D&iacute;as V&aacute;lidos <span class="lbl_dias_validos"></span></td>
                        <td>Total de Pagos no V&aacute;lidos</td>
                        <td><strong><span class="lbl_pagos_invalidos"></span></strong></td>
                      </tr>
                      <tr class="text-left">
                        <td colspan="3">
                          <div class="download-buttons">
                            <a href="#" target="_blank" class="badge badge-success btn-validos toDownload"><i class="fas fa-file-excel"></i> Pagos v&aacute;lidos</a>
                            <a href="#" target="_blank" class="badge badge-warning btn-invalidos toDownload"><i class="far fa-file-excel"></i> Pagos no v&aacute;lidos</a>
                            <a href="#" target="_blank" class="badge badge-primary btn-total toDownload"><i class="fas fa-file-excel"></i> Total de pagos</a>
                          </div>
                        </td>
                        <td>Total</td>
                        <td><strong><span class="lbl_total_pagos"></span></strong></td>
                      </tr>
                      <tr>
                        <th scope="col" style="text-align:center;">Cuenta</th>
                        <th scope="col" style="text-align:center;">Fecha de Pago</th>
                        <th scope="col" style="text-align:center;">Recibo</th>
                        <th scope="col" style="text-align:center;">Total</th>
                        <th scope="col" style="text-align:center;">Estatus</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr class="tr_ajax_load">
                        <td class="ajax-load text-center" colspan="5" style="display: none;">
                          <div class="spinner-border" role="status">
                            <span class="sr-only">Loading...</span>
                          </div>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  <?php } else { ?>
    <div class="container">
      <div class="alert alert-danger">
        Selecciona una plaza
      </div>
    </div>
  <?php } ?>
  <?php require "include/footer.php"; ?>

  <script src="../js/jquery-3.4.1.min.js"></script>
  <script src="../js/popper.min.js"></script>
  <script src="../js/bootstrap.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
  <script src="https://npmcdn.com/flatpickr/dist/l10n/es.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.fileDownload/1.4.2/jquery.fileDownload.min.js"></script>
  <script>
    $(".date_range").flatpickr({
      mode: 'range',
      locale: "es",
      dateFormat: "d-m-Y",
      altFormat: "Y-m-d"
    });

    var current_url = "", morepages = true, isLoading = true;
    var InfiniteScroll = function () {
      return {
          pages: 2,
          currentPage: 0,
          bool: false,
          lastPage: 0,
          init: function () {
              $(".table-responsive").scroll(function () {
                var scrollHeight = $(".table-responsive").height();
                var scrollPos = $(".table-responsive").height() + $(".table-responsive").scrollTop();
                  if (
                    (((scrollHeight - 50) >= scrollPos) / scrollHeight == 0) &&
                      infinite.bool == false && morepages && isLoading
                  ){
                      infinite.bool = true;
                      $(".ajax-load").show();
                      infinite.lazyLoad(infinite.pages).then((response) => {
                          infinite.bool = false;
                          infinite.pages++;
                          $(".ajax-load").hide();
                      });
                  }
              });
          },
          lazyLoad: function (page) {
              return new Promise((resolve, reject) => {
                  $.ajax({
                      url: current_url,
                      data: {
                        pagina: page,
                        dia: $("#dia").val(),
                        date_range: $("#date_range").val(),
                      },
                      dataType: "json",
                      type: "POST",
                      beforeSend: function () {
                          $(".ajax-load").show();
                      },
                      success: function (response) {
                          if(response.type == 200) {
                            if(response.datos.length > 0) {
                              buildTable(response.datos);
                            } else {
                              morepages = false;
                            }
                          }
                          $(".ajax-load").hide();
                          resolve();
                      },
                  });
              });
          },
      };
    };

    var infinite = new InfiniteScroll();
    infinite.init();

    var buildTable = function (data) {
      var table = "";
      $.each(data, function (idx, pago){
        table += "<tr>";
        table += "<td>" + pago.cuenta + "</td>";
        table += "<td>" + pago.fechaPago + "</td>";
        table += "<td>" + pago.recibo + "</td>";
        table += "<td>$" + pago.total + "</td>";
        table += "<td>";
        if(pago.isDiffDays) {
          table += '<span class="badge badge-success"><i class="fas fa-check"></i></span>';
        } else {
          table += '<span class="badge badge-danger"><i class="fas fa-times"></i></span>';
        }
        table += "</td>";
        table += "</tr>";
      });
      $("#pagosvalidos > tbody tr.tr_ajax_load").before(table);
    }

    var sendForm = function(form) {
      $(".download-buttons").hide();
      $(".btn-form-s").prop('disabled', false);
      $("#pagosvalidos tbody > tr:not(.tr_ajax_load)").remove();
      var dia = $("#dia").val(),
        rango_fecha = $("#date_range").val(), 
        isError = false;;
        
      if (!parseInt(dia) || dia == "") {
        $("#dia").val("90");
        $(".msgalert").html("Los días deben ser n&uacute;meros.");
        isError = true;
      }

      if (rango_fecha == "") {
        $(".msgalert").html("Selecciona un rango de fechas.");
        isError = true;
      }

      if(!isError) {
        $(".alertMessages").hide();
        $(".ajax-load, #divTablepagos").show();
        current_url = $(form).attr('action');
        morepages = true;
        infinite.pages = 2;
        $.ajax({
          url: current_url,
          data: {
            pagina: 1,
            dia: $("#dia").val(),
            date_range: $("#date_range").val(),
            type: 'total',
          },
          dataType: "json",
          type: "POST",
          beforeSend: function () {
            isLoading = false;
            $(".lbl_pagos_validos").html("0");
            $(".lbl_pagos_invalidos").html("0");
            $(".lbl_total_pagos").html("0");
            $(".lbl_periodo").html("<strong>" + $(".date_range").val() + "</strong>");
            $(".lbl_dias_validos").html("<strong>" + $("#dia").val() + "</strong>");
          }, 
          success: function (response) {
            isLoading = true;
            if(response.totalpagos > 0) {
              $(".lbl_pagos_validos").html(response.pagosvalidos);
              $(".lbl_pagos_invalidos").html(response.pagosinvalidos);
              $(".lbl_total_pagos").html(response.totalpagos);
              $.ajax({
                url: current_url,
                data: {
                  pagina: 1,
                  dia: $("#dia").val(),
                  date_range: $("#date_range").val(),
                },
                dataType: "json",
                type: "POST",
                beforeSend: function () {
                  isLoading = false;
                  $(".ajax-load").show();
                },
                success: function (response) {
                  isLoading = true;
                  $(".btn-form-s").prop('disabled', false);
                  if(response.type == 200) {
                    if(response.datos.length > 0) {
                      $(".download-buttons").show();
                      $(".btn-validos").attr('href', './download.php?plz=<?=$idPlz?>&option=1&date_range='+rango_fecha+'&dia=' + dia);
                      $(".btn-invalidos").attr('href', './download.php?plz=<?=$idPlz?>&option=2&date_range='+rango_fecha+'&dia=' + dia);
                      $(".btn-total").attr('href', './download.php?plz=<?=$idPlz?>&option=3&date_range='+rango_fecha+'&dia=' + dia);
                      buildTable(response.datos);
                    } else {
                      $(".msgalert").html(response.text);
                      $(".alertMessages").show();
                      $(".ajax-load, #divTablepagos").hide();
                    }
                  } else {
                    $(".msgalert").html(response.text);
                    $(".alertMessages").show();
                    $(".ajax-load, #divTablepagos").hide();
                  }
                  $(".ajax-load").hide();
                },
              });
            }
          }
        });
      }
    }

    $('.toDownload').on('click', function () {
      toDownload($(this).attr('href'));
      return false;
    });

    var toDownload = function (url) {
      $.fileDownload(url, {
        successCallback: function (url) {
          $(".overlay").hide();
        },
        failCallback: function () {
          $(".overlay").hide();
        },
        prepareCallback: function () {
          $(".overlay").show();
        }
      });
    }
  </script>
</body>

</html>