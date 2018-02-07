<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
<!--
    <link rel="icon" href="../../../../favicon.ico">
-->

    <title>Cripto | Actividad</title>

    <!-- Bootstrap core CSS -->
    <link href="../bootstrap-4.0.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="style/index.css" rel="stylesheet">
  </head>

  <body>
    <nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0">
      <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#">Cripto, by Digitable.mx</a>
      <input class="form-control form-control-dark w-100" type="text" placeholder="Buscar" aria-label="Search">
      <ul class="navbar-nav px-3">
        <li class="nav-item text-nowrap">
          <a class="nav-link" href="#">Cerrar sesión</a>
        </li>
      </ul>
    </nav>

    <div class="container-fluid">
      <div class="row">
        <nav class="col-md-2 d-none d-md-block bg-light sidebar">
          <div class="sidebar-sticky">
            <ul class="nav flex-column">
              <li class="nav-item">
                <a class="nav-link" href="#">
                  <span data-feather="home"></span>
                  Inicio
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">
                  <span data-feather="user"></span>
                  Perfil
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" href="#">
                  <span data-feather="activity"></span>
                  Actividad <span class="sr-only">(current)</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">
                  <span data-feather="bar-chart-2"></span>
                  Estadísticas
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">
                  <span data-feather="layers"></span>
                  Integración
                </a>
              </li>
            </ul>
            <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
              <span>Histórico</span>
              <a class="d-flex align-items-center text-muted" href="#">
                <span data-feather="plus-circle"></span>
              </a>
            </h6>
            <ul class="nav flex-column mb-2">
              <li class="nav-item">
                <a class="nav-link" href="#">
                  <span data-feather="file-text"></span>
                  Enero 2018
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">
                  <span data-feather="file-text"></span>
                  Diciembre 2017
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">
                  <span data-feather="file-text"></span>
                  Noviembre 2017
                </a>
              </li>
            </ul>
          </div>
        </nav>

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
            <h2 class="h2">Actividad</h2>
            <br>
            <div class="btn-toolbar mb-2 mb-md-0">
              <div class="btn-group mr-2 content-desktop">
                <button class="btn btn-sm btn-outline-secondary" id="button_exportar">
                  <span data-feather="share"></span>
                  Exportar
                </button>
              </div>
              <div class="dropdown mr-2">
                <button class="btn btn-sm btn-outline-secondary dropdown-toggle" type="button" id="dropdownMenuButtonBook" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <span data-feather="dollar-sign"></span>
                  <span id="dropdownButtonLabelBook">Bitcoin</span>
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                  <a id="menu_btc_mxn" class="dropdown-item dropdown-item-book active" href="#">Bitcoin</a>
                  <a id="menu_eth_mxn" class="dropdown-item dropdown-item-book" href="#">Ethereum</a>
                  <a id="menu_xrp_mxn" class="dropdown-item dropdown-item-book" href="#">Ripple</a>
                  <a id="menu_ltc_mxn" class="dropdown-item dropdown-item-book" href="#">Litcoin</a>
                </div>
              </div>
              <div class="dropdown">
                <button class="btn btn-sm btn-outline-secondary dropdown-toggle" type="button" id="dropdownMenuButtonInterval" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <span data-feather="calendar"></span>
                  <span id="dropdownButtonLabelInterval">1 día</span>
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                  <a id="menu_1_day" class="dropdown-item dropdown-item-interval active" href="#">1 día</a>
                  <a id="menu_1_week" class="dropdown-item dropdown-item-interval" href="#">1 semana</a>
                  <a id="menu_1_month" class="dropdown-item dropdown-item-interval" href="#">1 mes</a>
                </div>
              </div>
            </div>
          </div>
          <div id="canvas_container" class="chart-container"></div>
          <h3>Información</h3>
          <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover" id="table_data">
              <thead></thead>
              <tbody></tbody>
            </table>
          </div>
        </main>
      </div>
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"
  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
  crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../bootstrap-4.0.0/assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
    <script src="../bootstrap-4.0.0/assets/js/vendor/popper.min.js"></script>
    <script src="../bootstrap-4.0.0/dist/js/bootstrap.min.js"></script>

    <!-- Icons -->
    <script src="https://unpkg.com/feather-icons/dist/feather.min.js"></script>
    <script>
      feather.replace()
    </script>

    <!-- Graphs -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.20.1/moment-with-locales.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.20.1/locale/es.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js"></script>

    <script>
      var book = 'btc_mxn';
      var interval = '1 DAY';

      jQuery(document).ready(function($) {

        $("body").tooltip({ selector: '[data-toggle=tooltip]' });

        $("#button_exportar").click(function() {
          window.location.replace("api/createCSV.php?book="+book);
        });

        $("#menu_btc_mxn").click(function() {
          book = 'btc_mxn';
          $("#dropdownButtonLabelBook").text('Bitcoin');
          $(".dropdown-item-book").removeClass("active");
          $("#menu_btc_mxn").addClass("active");
          loadData(book, interval);
        });

        $("#menu_eth_mxn").click(function() {
          book = 'eth_mxn';
          $("#dropdownButtonLabelBook").text("Ethereum");
          $(".dropdown-item-book").removeClass("active");
          $("#menu_eth_mxn").addClass("active");
          loadData(book, interval);
        });

        $("#menu_xrp_mxn").click(function() {
          book = 'xrp_mxn';
          $("#dropdownButtonLabelBook").text("Ripple");
          $(".dropdown-item-book").removeClass("active");
          $("#menu_xrp_mxn").addClass("active");
          loadData(book, interval);
        });

        $("#menu_ltc_mxn").click(function() {
          book = 'ltc_mxn';
          $("#dropdownButtonLabelBook").text("Litcoin");
          $(".dropdown-item-book").removeClass("active");
          $("#menu_ltc_mxn").addClass("active");
          loadData(book, interval);
        });

        $("#menu_1_day").click(function() {
          interval = '1 DAY';
          $("#dropdownButtonLabelInterval").text("1 día");
          $(".dropdown-item-interval").removeClass("active");
          $("#menu_1_day").addClass("active");
          loadData(book, interval);
        });

        $("#menu_1_week").click(function() {
          interval = '1 WEEK';
          $("#dropdownButtonLabelInterval").text("1 semana");
          $(".dropdown-item-interval").removeClass("active");
          $("#menu_1_week").addClass("active");
          loadData(book, interval);
        });

        $("#menu_1_month").click(function() {
          interval = '1 MONTH';
          $("#dropdownButtonLabelInterval").text("1 mes");
          $(".dropdown-item-interval").removeClass("active");
          $("#menu_1_month").addClass("active");
          loadData(book, interval);
        });


        loadData('btc_mxn', '1 DAY');
      });

      function loadData(book, interval) {
        $.ajax({
          url: "api/getData.php",
          contentType: "application/json; charset=utf-8",
          dataType: 'json',
          method: "GET",
          data: {'book': book, 'interval': interval},
          success: function(data) {
            var arrId = [];
            var arrHora = [];
            var arrLast = [];
            var arrVolume = [];
            var arrVwap = [];
            var arrAsk = [];
            var arrBid = [];
            var arrTickDate = [];
            var arrStatus = [];
            var lastColor = '#6495ED';
            var lastColorLight = '#00BFFF';
            var bidColor = '#56C78B';
            var bidColorLight = '#69E1A1';
            var askColor = '#FA4141';
            var askColorLight = '#F67575';
            var vwapColor = '#753396';
            var vwapColorLight = '#9d55c1';
            var tipo_cambio;
            var pointRadius = interval == '1 DAY' ? 2 : 0;
            var unit = 'hour';
            var step = 1;

            switch (book) {
              case 'btc_mxn':
                tipo_cambio = "Tipo de cambio (bitcoin a pesos mexicanos)";
                break;
              case 'eth_mxn':
                tipo_cambio = "Tipo de cambio (ethereum a pesos mexicanos)";
                break;
              case 'xrp_mxn':
                tipo_cambio = "Tipo de cambio (ripple a pesos mexicanos)";
                break;
              case 'ltc_mxn':
                tipo_cambio = "Tipo de cambio (litcoin a pesos mexicanos)";
                break;
            }

            switch (interval) {
              case '1 DAY':
                unit = 'hour';
                step = 1;
                break;
              case '1 WEEK':
                unit = 'hour';
                step = 6;
                break;
              case '1 MONTH':
                unit = 'day';
                step = 1;
                break;
            }

            for(var i in data) {
              arrId.push(data[i].id_tick);
              arrHora.push(data[i].hora);
              arrTickDate.push(data[i].tick_date);
              arrLast.push(data[i].status == 1 ? data[i].bitso_last : NaN);
              arrVolume.push(data[i].status == 1 ? data[i].bitso_volume : NaN);
              arrVwap.push(data[i].status == 1 ? data[i].bitso_vwap : NaN);
              arrAsk.push(data[i].status == 1 ? data[i].bitso_ask : NaN);
              arrBid.push(data[i].status == 1 ? data[i].bitso_bid : NaN);
              arrStatus.push(data[i].status);
            }

            $("table#table_data thead").empty();
            var head = '<tr>'
              + '<th>#</th>'
              + '<th style="color: ' + lastColor + ';" data-toggle="tooltip" data-placement="top" title="' + tipo_cambio + '">' + book +'</th>'
              + '<th data-toggle="tooltip" data-placement="top" title="Volumen de compra (últimas 24 horas)">volume</th>'
              + '<th style="color: ' + askColor + ';" data-toggle="tooltip" data-placement="top" title="Orden de venta mínima">ask</th>'
              + '<th style="color: ' + bidColor + ';" data-toggle="tooltip" data-placement="top" title="Orden de compra máxima">bid</th>'
              + '<th style="color: ' + vwapColor + ';" data-toggle="tooltip" data-placement="top" title="Precio promedio ponderado por volumen (últimas 24 horas)">vwap</th>'
              + '<th data-toggle="tooltip" data-placement="top" title="Fecha y hora de consulta">time</th>'
            + '</tr>';
            $("table#table_data thead").append(head);

            $("table#table_data tbody").empty();

            for (var i = 1; i <= 50; i++) {
              var row = '<tr><td>' + i + '</td>';
                row += '<td>' + arrLast[arrLast.length - i] + '</td>'
                + '<td>' + arrVolume[arrVolume.length - i] + '</td>'
                + '<td>' + arrAsk[arrAsk.length - i] + '</td>'
                + '<td>' + arrBid[arrBid.length - i] + '</td>'
                + '<td>' + arrVwap[arrVwap.length - i] + '</td>'
                + '<td>' + arrTickDate[arrTickDate.length - i] + '</td></tr>';
              $("table#table_data tbody").append(row);
            }

            var chartData = {
              labels: arrTickDate,
              datasets : [
                {
                  label: book,
                  backgroundColor: 'transparent',
                  borderColor: lastColor,
                  pointHoverBackgroundColor: lastColorLight,
                  borderWidth: 1,
                  pointRadius: pointRadius,
                  pointBorderColor: lastColor,
                  pointBackgroundColor: lastColor,
                  pointStyle: 'circle',
                  data: arrLast
                },
                {
                  label: 'ask',
                  backgroundColor: 'transparent',
                  borderColor: askColor,
                  pointHoverBackgroundColor: askColorLight,
                  borderWidth: 1,
                  pointRadius: pointRadius,
                  pointBorderColor: askColor,
                  pointBackgroundColor: askColor,
                  pointStyle: 'triangle',
                  data: arrAsk
                },
                {
                  label: 'bid',
                  backgroundColor: 'transparent',
                  borderColor: bidColor,
                  pointHoverBackgroundColor: bidColorLight,
                  borderWidth: 1,
                  pointRadius: pointRadius,
                  pointBorderColor: bidColor,
                  pointBackgroundColor: bidColor,
                  pointStyle: 'rect',
                  data: arrBid
                },
                {
                  label: 'vwap',
                  backgroundColor: 'transparent',
                  borderColor: vwapColor,
                  pointHoverBackgroundColor: vwapColorLight,
                  borderWidth: 1,
                  pointRadius: pointRadius,
                  pointBorderColor: vwapColor,
                  pointBackgroundColor: vwapColor,
                  pointStyle: 'rectRot',
                  data: arrVwap
                }
              ]
            };
            // Limpia el canvas para poder redibujar las graficas
            $("canvas#myChart").remove();
            $("#canvas_container").append('<canvas class="my-4" id="myChart" width="900" height="380"></canvas>');

            var ctx = $("#myChart");
            var barGraph = new Chart(ctx, {
              type: 'line',
              data: chartData,
              options: {
                maintainAspectRatio: false,
                scales: {
                  xAxes: [{
                    type: "time",
                    time: {
                      unit: unit,
                      unitStepSize: step,
                      tooltipFormat: "DD/MM/YYYY, h:mm a",
                      displayFormats: {
                        hour: 'H:mm'
                      }
                    }
                  }]
                },
                legend: {
                  labels: {
                    usePointStyle: true
                  }
                }
              }
            });
          },
          error: function(data) {
            alert("Fail");
          }
        });
      }

    </script>
  </body>
</html>
