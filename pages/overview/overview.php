<?php
header('Content-Type: text/html; charset=UTF-8');
session_start();
 
// check o login
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: ../../index.php");
    exit;
}
else {
    $username = $_SESSION['username'];
}

?>
<?php 
include ("../config.php");
$mes = date("m"); 
$ano = date("Y");
$admquerry ="SELECT * FROM users where username = '$username'";
$admconect = $conect->query($admquerry);
$adm = '';
while ($admarray = $admconect->fetch_array()) {
  $adm = $admarray ["adm"];
  $type = $admarray ["type"];
}
if ($type == "tec") {
  $querryorp ="SELECT COUNT(*) AS orpcount FROM prod where year(data) = '$ano' and month(data) = '$mes';";
$conectorp = $conect->query($querryorp);


$querryos ="SELECT COUNT(*) AS oscount FROM oss where year(data) = '$ano' and month(data) = '$mes';";
$conectos = $conect->query($querryos);

$querrycheck ="SELECT COUNT(*) AS checkcount FROM checklist where year(data) = '$ano' and month(data) = '$mes';";
$conectcheck = $conect->query($querrycheck);

$querryvisi ="SELECT COUNT(*) AS visicount FROM visitas where year(data) = '$ano' and month(data) = '$mes';";
$conectvisi = $conect->query($querryvisi);

$querrygraph ="SELECT COUNT(id) AS maquinas FROM prod;";
$conectgraph = $conect->query($querrygraph);

$consulta ="SELECT * FROM checklist ORDER BY id DESC LIMIT 4 ";
$contable = $conect->query($consulta);

$consultaoss ="SELECT * FROM oss ORDER BY id DESC LIMIT 4 ";
$contoss = $conect->query($consultaoss);
$consultaprod ="SELECT * FROM prod ORDER BY ns DESC LIMIT 4";
$contableprod = $conect->query($consultaprod);
}
if ($type == "cli") {

  $querrycliente ="SELECT * FROM clientes WHERE nome = '$username';";
  $conectcliente = $conect->query($querrycliente);
  while ($cliente = $conectcliente->fetch_array()) {
 $clienid = $cliente['id'];
  }

$querryos ="SELECT COUNT(*) AS oscount FROM oss where cliente = '$username' and year(data) = '$ano' and month(data) = '$mes' ;";
$conectos = $conect->query($querryos);

$querrycheck ="SELECT COUNT(*) AS checkcount FROM checklist where cliente = '$clienid' and year(data) = '$ano' and month(data) = '$mes' ;";
$conectcheck = $conect->query($querrycheck);

$querryvisi ="SELECT COUNT(*) AS visicount FROM visitas where cliente = '$clienid' and year(data) = '$ano' and month(data) = '$mes';";
$conectvisi = $conect->query($querryvisi);

$consultaoss ="SELECT * FROM oss WHERE cliente = '$username' ORDER BY id DESC LIMIT 4 ";
$contoss = $conect->query($consultaoss);
}

?>

<!DOCTYPE html>
<html lang="en">

<head><link rel="manifest" href="../manifest.json">
 <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="../../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../../assets/img/ico.png">
  <title>
    Company
  </title>
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
  <!-- Nucleo Icons -->
  <link href="../../assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="../../assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/4f61b4c913.js" crossorigin="anonymous"></script>
  <link href="../../assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- CSS Files -->
  <link id="pagestyle" href="../../assets/css/argon-dashboard.css?v=2.0.0" rel="stylesheet" />
</head>

<body class="g-sidenav-show   bg-gray-100">
<script>
    if ('serviceWorker' in navigator) {
      navigator.serviceWorker.register('../sw.js')
      .then(function() {
        console.log('service work registered');
      })
      .catch(function(){
        console.warn('failed');});
    }
  </script>
   <?php include("../include/menu.php") ?>
  <main class="main-content position-relative border-radius-lg ">
    <!-- Navbar -->
      <?php include("../include/navbar.php") ?>
    <!-- End Navbar -->
     <div class="container-fluid py-4">

      <div class="row">
        <?php while ($os = $conectos->fetch_array()) { ?>
        <div class="col-xl col-sm-6 mb-xl-0 mb-4">
          <div class="card" style="height: 100px;">
            <div class="card-body p-3">
              <div class="row">
                <div class="col-8">
                  <div class="numbers">
                    <p class="text-sm mb-0 text-uppercase font-weight-bold">QNT. Mensais<br>
                    OS:</p>
                    <h5 class="font-weight-bolder">
                    <?php echo $os ["oscount"] ?>
                    </h5>
                    <p class="mb-0">
                      <span class="text-danger text-sm font-weight-bolder"></span>
        
                    </p>
                  </div>
                </div>
                <div class="col-4 text-end">
                  <div class="icon icon-shape  bg-gradient-danger shadow-primary text-center rounded-circle"onclick="location='../os/os.php'">
                    <i class="fa-solid fa-clipboard text-lg opacity-10" aria-hidden="true"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <?php } ?>
        <?php while ($ck = $conectcheck->fetch_array()) { ?>
        <div class="col-xl col-sm-6 mb-xl-0 mb-4">
          <div class="card"style="height: 100px;">
            <div class="card-body p-3">
              <div class="row">
                <div class="col-8">
                  <div class="numbers">
                    <p class="text-sm mb-0 text-uppercase font-weight-bold">QNT. Mensais
                    CheckList:</p>
                    <h5 class="font-weight-bolder">
                     <?php echo $ck ["checkcount"] ?>
                    </h5>
                    <p class="mb-0">
                      <span class="text-danger text-sm font-weight-bolder"></span>
        
                    </p>
                  </div>
                </div>
                <div class="col-4 text-end">
                  <div class="icon icon-shape bg-gradient-primary shadow-danger text-center rounded-circle"onclick="location='../checklist/checklist.php'">
                    <i class="fa-solid fa-list-check opacity-10" aria-hidden="true"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <?php } ?>
        <?php while ($visi = $conectvisi->fetch_array()) { ?>
        <div class="col-xl col-sm-6 mb-xl-0 mb-4">
          <div class="card"style="height: 100px;">
            <div class="card-body p-3">
              <div class="row">
                <div class="col-8">
                  <div class="numbers">
                    <p class="text-sm mb-0 text-uppercase font-weight-bold">QNT. Mensais
                    Visita:</p>
                    <h5 class="font-weight-bolder">
                     <?php echo $visi["visicount"] ?>
                    </h5>
                    <p class="mb-0">
                      <span class="text-danger text-sm font-weight-bolder"></span>
        
                    </p>
                  </div>
                </div>
                <div class="col-4 text-end">
                  <div class="icon icon-shape bg-gradient-success shadow-success text-center rounded-circle" onclick="location='../visita/visita.php'">
                    <i class="fa-solid fa-location-arrow text-lg opacity-10"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <?php } ?>
        <?php if ( $type == "tec") {while ($orp = $conectorp->fetch_array()) { ?>
        <div class="col-xl col-sm-6  mb-4">
          <div class="card"style="height: 100px;">
            <div class="card-body p-3">
              <div class="row">
                <div class="col-8">
                  <div class="numbers">
                    <p class="text-sm mb-0 text-uppercase font-weight-bold">QNT. PROD. Mensais ORP150:</p>
                      <h5 class="font-weight-bolder">
                          <?php echo $orp ["orpcount"] ?>
                          <h5 class="font-weight-bolder">
    
                      </h5>
                      <p class="mb-0">
                      <span class="text-danger text-sm font-weight-bolder"></span>
        
                      </p>
                      <p class="mb-0">
                      <span class="text-success text-sm font-weight-bolder"></span>
                    </p>
                  </div>
                </div>
                <div class="col-4 text-end">
                  <div class="icon icon-shape bg-gradient-warning shadow-warning text-center rounded-circle" onclick="location='../prod/prod.php'">
                    <i class="fa-solid fa-wrench text-lg opacity-10" aria-hidden="true"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <?php }} echo "<div class='row mt-4'>";if ($type == "tec") { ?>

      
        <div class="col-lg-12 mb-lg-0 mb-4">
          <div class="card z-index-2 h-100">
            <div class="card-header pb-0 pt-3 bg-transparent">
              <h4> <i class="fa-solid fa-cart-plus opacity-10 fa-1x text-primary"></i><span > Compras anuais de ORP.150</h4></span>
              <p class="text-sm mb-0">
                <i class="fa fa-arrow-up text-success"></i>
                <span class="font-weight-bold">5 ORP.150 </span>em 2022
              </p>
            </div>
            <div class="card-body p-3">
              <div class="chart">
                <canvas id="chart-line" class="chart-canvas" height="300"></canvas>
              </div>
            </div>
          </div>
        </div></div>
<div class="row mt-4">
        <div class="col-lg-4 mb-lg-0 mb-4">
<div class="card z-index-2 h-100">
<div class="card-header pb-0 pt-3 bg-transparent">
  <h4> <i class="fa-solid fa-robot opacity-10 fa-1x text-primary"></i><span > QNT. ORP.150 de clientes</h4></span>
</div>
  <div class="card-body p-3">
      <div class="chart">
      <canvas id="bar-chart" class="chart-canvas" height="300" width="300" style="display: block; box-sizing: border-box; height: 300px; width: 333px;"></canvas>
       </div>
      </div>
    </div>
  </div>
<?php } ?>

  <div style="height:500px;" class="col-xl col-sm-6 mb-xl-0 mb-4">
    <div class="card z-index-2 h-100">
      <div class="card-header pb-0 pt-3 bg-transparent">
        <h4> <i class="fa-solid fa-screwdriver-wrench opacity-10 fa-1x text-primary"></i><span > Problemas mais relatados</h4></span>
      </div>
      <div class="card-body p-3" >
        <div class="chart">
          <canvas id="polar-chart" class="chart-canvas" height="300" width="300" style="display: block; box-sizing: border-box; height: 269px; width: 269px;"></canvas>
        </div>
      </div>
    </div>
</div>
<div style="height:500px;" class="col-lg-4 mb-lg-0 mb-4">
          <div class="card z-index-2 h-100">
            <div class="card-header pb-0 pt-3 bg-transparent">
              <h4> <i class="fa-solid  fa-briefcase-medical opacity-10 fa-1x text-primary"></i><span > Serviços prestados</h4></span>
              <p class="text-sm mb-0">
                <i class="fa fa-arrow-up text-success"></i>
              </p>
            </div>
            <div class="card-body p-3">
              <div class="chart">
                <canvas id="radar-chart" class="chart-canvas" height="100"></canvas>
              </div>
            </div>
          </div>
        </div></div>
        
        <div class="row mt-4">


<div class="col-lg-6 mb-lg-0 mb-4">
          <div class="card z-index-2 h-100">
            <div class="card-header pb-0 pt-3 bg-transparent">
              <h4> <i class="fa-solid fa-clipboard opacity-10 fa-1x text-primary"></i><span > OS. anuais</h4></span>
              <p class="text-sm mb-0">
                <i class="fa fa-arrow-up text-success"></i>
                <span class="font-weight-bold">1 OS.</span> em 2022  
              </p>
            </div>
            <div class="card-body p-3">
              <div class="chart">
                <canvas id="chart-line1" class="chart-canvas1" height="300"></canvas>
              </div>
            </div>
          </div>
        </div>

        <div class="col-lg-6 mb-lg-0 mb-4">
          <div class="card z-index-2 h-100">
            <div class="card-header pb-0 pt-3 bg-transparent">
              <h4> <i class="fa-solid fa-clipboard opacity-10 fa-1x text-primary"></i><span >  Status OS. Gerais</h4></span>
              <p class="text-sm mb-0">
    
              </p>
            </div>
            <div class="card-body p-3">
              <div class="chart">
                <canvas id="doughnut-chart" class="chart-canvas1" height="300"></canvas>
              </div>
            </div>
          </div>
        </div>

        </div>

        
      <footer class="footer pt-3  ">
        <div class="container-fluid">
          <div class="row align-items-center justify-content-lg-between">
            <div class="col-lg-6 mb-lg-0 mb-4">
              <div class="copyright text-center text-sm text-muted text-lg-start">
                © <script>
                  document.write(new Date().getFullYear())
                </script>
              </div>
            </div>
            <div class="col-lg-6">
            <ul class="nav nav-footer justify-content-center justify-content-lg-end">
                <li class="nav-item">
                  <a href="google.com" class="nav-link text-muted" target="_blank">Company</a>
                </li>
                <li class="nav-item">
                  <a href="google.com" class="nav-link text-muted" target="_blank">Sobre a gente</a>
                </li>
                <li class="nav-item">
                  <a href="google.com" class="nav-link text-muted" target="_blank">Produtos</a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </footer>
    </div>
  </main>
        <!-- End Toggle Button -->
  <!--   Core JS Files   -->
  <script src="../../assets/js/core/popper.min.js"></script>
  <script src="../../assets/js/core/bootstrap.min.js"></script>
  <script src="../../assets/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="../../assets/js/plugins/smooth-scrollbar.min.js"></script>
  <script src="../../assets/js/plugins/chartjs.min.js"></script>
  <script>
    var ctx1 = document.getElementById("chart-line").getContext("2d");

    var gradientStroke1 = ctx1.createLinearGradient(0, 230, 0, 50);

    gradientStroke1.addColorStop(1, 'rgba(94, 114, 228, 0.2)');
    gradientStroke1.addColorStop(0.2, 'rgba(94, 114, 228, 0.0)');
    gradientStroke1.addColorStop(0, 'rgba(94, 114, 228, 0)');
  </script>
  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>

  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="../../assets/js/argon-dashboard.min.js?v=2.0.0"></script>
      <script src="../myscripts.js"></script>
       <script>
    var ctx1 = document.getElementById("chart-line").getContext("2d");

    var gradientStroke1 = ctx1.createLinearGradient(0, 230, 0, 50);

    gradientStroke1.addColorStop(1, 'rgba(94, 114, 228, 0.2)');
    gradientStroke1.addColorStop(0.2, 'rgba(94, 114, 228, 0.0)');
    gradientStroke1.addColorStop(0, 'rgba(94, 114, 228, 0)');
    new Chart(ctx1, {
      type: "line",
      data: {
        labels: ["Jan","Fev","Mar","Abr", "Mai", "Jun", "Jul", "Ago", "Set", "Out", "Nov", "Dez"],
        datasets: [{
          label: "ORP.150 Vendidas",
          tension: 0.4,
          borderWidth: 0,
          pointRadius: 0,
          borderColor: "#5e72e4",
          backgroundColor: gradientStroke1,
          borderWidth: 3,
          fill: true,
          <?php 
            $querryorpjan ="SELECT COUNT(*) AS orpcountjan FROM prod where year(data) = '$ano'and month(data) = '01';";
            $conectorpjan = $conect->query($querryorpjan);
            while ($orpjan = $conectorpjan->fetch_array()) {$jan = $orpjan ["orpcountjan"];}

            $querryorpfev ="SELECT COUNT(*) AS orpcountfev FROM prod where year(data) = '$ano'and month(data) = '02';";
            $conectorpfev = $conect->query($querryorpfev);
            while ($orpfev = $conectorpfev->fetch_array()) {$fev = $orpfev ["orpcountfev"];}
    
            $querryorpmar ="SELECT COUNT(*) AS orpcountmar FROM prod where year(data) = '$ano'and month(data) = '03';";
            $conectorpmar = $conect->query($querryorpmar);
            while ($orpmar = $conectorpmar->fetch_array()) {$mar = $orpmar ["orpcountmar"];}
                
            $querryorpabr ="SELECT COUNT(*) AS orpcountabr FROM prod where year(data) = '$ano'and month(data) = '04';";
            $conectorpabr = $conect->query($querryorpabr);
            while ($orpabr = $conectorpabr->fetch_array()) {$abr = $orpabr ["orpcountabr"];}
    
            $querryorpmai ="SELECT COUNT(*) AS orpcountmai FROM prod where year(data) = '$ano'and month(data) = '05';";
            $conectorpmai = $conect->query($querryorpmai);
            while ($orpmai = $conectorpmai->fetch_array()) {$mai = $orpmai ["orpcountmai"];}
                
            $querryorpjun ="SELECT COUNT(*) AS orpcountjun FROM prod where year(data) = '$ano'and month(data) = '06';";
            $conectorpjun = $conect->query($querryorpjun);
            while ($orpjun = $conectorpjun->fetch_array()) {$jun = $orpjun ["orpcountjun"];}
    
            $querryorpjul ="SELECT COUNT(*) AS orpcountjul FROM prod where year(data) = '$ano'and month(data) = '07';";
            $conectorpjul = $conect->query($querryorpjul);
            while ($orpjul = $conectorpjul->fetch_array()) {$jul = $orpjul ["orpcountjul"];}
    
            $querryorpago ="SELECT COUNT(*) AS orpcountago FROM prod where year(data) = '$ano'and month(data) = '08';";
            $conectorpago = $conect->query($querryorpago);
            while ($orpago = $conectorpago->fetch_array()) {$ago = $orpago ["orpcountago"];}
                
            $querryorpset ="SELECT COUNT(*) AS orpcountset FROM prod where year(data) = '$ano'and month(data) = '09';";
            $conectorpset = $conect->query($querryorpset);
            while ($orpset = $conectorpset->fetch_array()) {$set = $orpset ["orpcountset"];}
    
            $querryorpout ="SELECT COUNT(*) AS orpcountout FROM prod where year(data) = '$ano'and month(data) = '10';";
            $conectorpout = $conect->query($querryorpout);
            while ($orpout = $conectorpout->fetch_array()) {$out = $orpout ["orpcountout"];}
                
            $querryorpnov ="SELECT COUNT(*) AS orpcountnov FROM prod where year(data) = '$ano'and month(data) = '11';";
            $conectorpnov = $conect->query($querryorpnov);
            while ($orpnov = $conectorpnov->fetch_array()) {$nov = $orpnov ["orpcountnov"];}
    
            $querryorpdez ="SELECT COUNT(*) AS orpcountdez FROM prod where year(data) = '$ano'and month(data) = '12';";
            $conectorpdez = $conect->query($querryorpdez);
            while ($orpdez = $conectorpdez->fetch_array()) {$dez = $orpdez ["orpcountdez"];}


            ?>
          data: [<?php echo $jan; ?>,<?php echo $fev; ?>,<?php echo $mar; ?>,<?php echo $abr; ?>,<?php echo $mai; ?>,<?php echo $jun; ?>,<?php echo $jul; ?>,<?php echo $ago; ?>,<?php echo $set; ?>,<?php echo $out; ?>,<?php echo $out; ?>,<?php echo $nov; ?>,<?php echo $dez; ?>],
          maxBarThickness: 6

        }],
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
          legend: {
            display: false,
          }
        },
        interaction: {
          intersect: false,
          mode: 'index',
        },
        scales: {
          y: {
            grid: {
              drawBorder: false,
              display: true,
              drawOnChartArea: true,
              drawTicks: false,
              borderDash: [5, 5]
            },
            ticks: {
              display: true,
              padding: 10,
              color: '#fbfbfb',
              font: {
                size: 11,
                family: "Open Sans",
                style: 'normal',
                lineHeight: 2
              },
            }
          },
          x: {
            grid: {
              drawBorder: false,
              display: false,
              drawOnChartArea: false,
              drawTicks: false,
              borderDash: [5, 5]
            },
            ticks: {
              display: true,
              color: '#ccc',
              padding: 20,
              font: {
                size: 11,
                family: "Open Sans",
                style: 'normal',
                lineHeight: 2
              },
            }
          },
        },
      },
    });
  </script>
    <script>
    var ctx1 = document.getElementById("chart-line1").getContext("2d");

    var gradientStroke1 = ctx1.createLinearGradient(0, 230, 0, 50);

    gradientStroke1.addColorStop(1, 'rgba(94, 114, 228, 0.2)');
    gradientStroke1.addColorStop(0.2, 'rgba(94, 114, 228, 0.0)');
    gradientStroke1.addColorStop(0, 'rgba(94, 114, 228, 0)');
    new Chart(ctx1, {
      type: "line",
      data: {
        labels: ["Jan","Fev","Mar","Abr", "Mai", "Jun", "Jul", "Ago", "Set", "Out", "Nov", "Dez"],
        datasets: [{
          label: "OS. feitas",
          tension: 0.4,
          borderWidth: 0,
          pointRadius: 0,
          borderColor: "#5e72e4",
          backgroundColor: gradientStroke1,
          borderWidth: 3,
          fill: true,
          <?php 
          if ($type == "tec") {$querryosjan ="SELECT COUNT(*) AS oscountjan FROM oss where year(data) = '$ano'and month(data) = '01';";
            $conectosjan = $conect->query($querryosjan);
            while ($osjan = $conectosjan->fetch_array()) {$jan = $osjan ["oscountjan"];}

            $querryosfev ="SELECT COUNT(*) AS oscountfev FROM oss where year(data) = '$ano'and month(data) = '02';";
            $conectosfev = $conect->query($querryosfev);
            while ($osfev = $conectosfev->fetch_array()) {$fev = $osfev ["oscountfev"];}
    
            $querryosmar ="SELECT COUNT(*) AS oscountmar FROM oss where year(data) = '$ano'and month(data) = '03';";
            $conectosmar = $conect->query($querryosmar);
            while ($osmar = $conectosmar->fetch_array()) {$mar = $osmar ["oscountmar"];}
                
            $querryosabr ="SELECT COUNT(*) AS oscountabr FROM oss where year(data) = '$ano'and month(data) = '04';";
            $conectosabr = $conect->query($querryosabr);
            while ($osabr = $conectosabr->fetch_array()) {$abr = $osabr ["oscountabr"];}
    
            $querryosmai ="SELECT COUNT(*) AS oscountmai FROM oss where year(data) = '$ano'and month(data) = '05';";
            $conectosmai = $conect->query($querryosmai);
            while ($osmai = $conectosmai->fetch_array()) {$mai = $osmai ["oscountmai"];}
                
            $querryosjun ="SELECT COUNT(*) AS oscountjun FROM oss where year(data) = '$ano'and month(data) = '06';";
            $conectosjun = $conect->query($querryosjun);
            while ($osjun = $conectosjun->fetch_array()) {$jun = $osjun ["oscountjun"];}
    
            $querryosjul ="SELECT COUNT(*) AS oscountjul FROM oss where year(data) = '$ano'and month(data) = '07';";
            $conectosjul = $conect->query($querryosjul);
            while ($osjul = $conectosjul->fetch_array()) {$jul = $osjul ["oscountjul"];}
    
            $querryosago ="SELECT COUNT(*) AS oscountago FROM oss where year(data) = '$ano'and month(data) = '08';";
            $conectosago = $conect->query($querryosago);
            while ($osago = $conectosago->fetch_array()) {$ago = $osago ["oscountago"];}
                
            $querryosset ="SELECT COUNT(*) AS oscountset FROM oss where year(data) = '$ano'and month(data) = '09';";
            $conectosset = $conect->query($querryosset);
            while ($osset = $conectosset->fetch_array()) {$set = $osset ["oscountset"];}
    
            $querryosout ="SELECT COUNT(*) AS oscountout FROM oss where year(data) = '$ano'and month(data) = '10';";
            $conectosout = $conect->query($querryosout);
            while ($osout = $conectosout->fetch_array()) {$out = $osout ["oscountout"];}
                
            $querryosnov ="SELECT COUNT(*) AS oscountnov FROM oss where year(data) = '$ano'and month(data) = '11';";
            $conectosnov = $conect->query($querryosnov);
            while ($osnov = $conectosnov->fetch_array()) {$nov = $osnov ["oscountnov"];}
    
            $querryosdez ="SELECT COUNT(*) AS oscountdez FROM oss where year(data) = '$ano'and month(data) = '12';";
            $conectosdez = $conect->query($querryosdez);
            while ($osdez = $conectosdez->fetch_array()) {$dez = $osdez ["oscountdez"];}}


            if ($type == "cli") {
              $querryosjan ="SELECT COUNT(*) AS oscountjan FROM oss where cliente = '$username' and year(data) = '$ano'and month(data) = '01';";
            $conectosjan = $conect->query($querryosjan);
            while ($osjan = $conectosjan->fetch_array()) {$jan = $osjan ["oscountjan"];}

            $querryosfev ="SELECT COUNT(*) AS oscountfev FROM oss where cliente = '$username' and year(data) = '$ano'and month(data) = '02';";
            $conectosfev = $conect->query($querryosfev);
            while ($osfev = $conectosfev->fetch_array()) {$fev = $osfev ["oscountfev"];}
    
            $querryosmar ="SELECT COUNT(*) AS oscountmar FROM oss where cliente = '$username' and year(data) = '$ano'and month(data) = '03';";
            $conectosmar = $conect->query($querryosmar);
            while ($osmar = $conectosmar->fetch_array()) {$mar = $osmar ["oscountmar"];}
                
            $querryosabr ="SELECT COUNT(*) AS oscountabr FROM oss where cliente = '$username' and year(data) = '$ano'and month(data) = '04';";
            $conectosabr = $conect->query($querryosabr);
            while ($osabr = $conectosabr->fetch_array()) {$abr = $osabr ["oscountabr"];}
    
            $querryosmai ="SELECT COUNT(*) AS oscountmai FROM oss where cliente = '$username' and year(data) = '$ano'and month(data) = '05';";
            $conectosmai = $conect->query($querryosmai);
            while ($osmai = $conectosmai->fetch_array()) {$mai = $osmai ["oscountmai"];}
                
            $querryosjun ="SELECT COUNT(*) AS oscountjun FROM oss where cliente = '$username' and year(data) = '$ano'and month(data) = '06';";
            $conectosjun = $conect->query($querryosjun);
            while ($osjun = $conectosjun->fetch_array()) {$jun = $osjun ["oscountjun"];}
    
            $querryosjul ="SELECT COUNT(*) AS oscountjul FROM oss where cliente = '$username' and year(data) = '$ano'and month(data) = '07';";
            $conectosjul = $conect->query($querryosjul);
            while ($osjul = $conectosjul->fetch_array()) {$jul = $osjul ["oscountjul"];}
    
            $querryosago ="SELECT COUNT(*) AS oscountago FROM oss where cliente = '$username' and year(data) = '$ano'and month(data) = '08';";
            $conectosago = $conect->query($querryosago);
            while ($osago = $conectosago->fetch_array()) {$ago = $osago ["oscountago"];}
                
            $querryosset ="SELECT COUNT(*) AS oscountset FROM oss where cliente = '$username' and year(data) = '$ano'and month(data) = '09';";
            $conectosset = $conect->query($querryosset);
            while ($osset = $conectosset->fetch_array()) {$set = $osset ["oscountset"];}
    
            $querryosout ="SELECT COUNT(*) AS oscountout FROM oss where cliente = '$username' and year(data) = '$ano'and month(data) = '10';";
            $conectosout = $conect->query($querryosout);
            while ($osout = $conectosout->fetch_array()) {$out = $osout ["oscountout"];}
                
            $querryosnov ="SELECT COUNT(*) AS oscountnov FROM oss where cliente = '$username' and year(data) = '$ano'and month(data) = '11';";
            $conectosnov = $conect->query($querryosnov);
            while ($osnov = $conectosnov->fetch_array()) {$nov = $osnov ["oscountnov"];}
    
            $querryosdez ="SELECT COUNT(*) AS oscountdez FROM oss where cliente = '$username' and year(data) = '$ano'and month(data) = '12';";
            $conectosdez = $conect->query($querryosdez);
            while ($osdez = $conectosdez->fetch_array()) {$dez = $osdez ["oscountdez"];}}
           


            ?>
          data: [<?php echo $jan; ?>,<?php echo $fev; ?>,<?php echo $mar; ?>,<?php echo $abr; ?>,<?php echo $mai; ?>,<?php echo $jun; ?>,<?php echo $jul; ?>,<?php echo $ago; ?>,<?php echo $set; ?>,<?php echo $out; ?>,<?php echo $out; ?>,<?php echo $nov; ?>,<?php echo $dez; ?>],
          maxBarThickness: 6

        }],
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
          legend: {
            display: false,
          }
        },
        interaction: {
          intersect: false,
          mode: 'index',
        },
        scales: {
          y: {
            grid: {
              drawBorder: false,
              display: true,
              drawOnChartArea: true,
              drawTicks: false,
              borderDash: [5, 5]
            },
            ticks: {
              display: true,
              padding: 10,
              color: '#fbfbfb',
              font: {
                size: 11,
                family: "Open Sans",
                style: 'normal',
                lineHeight: 2
              },
            }
          },
          x: {
            grid: {
              drawBorder: false,
              display: false,
              drawOnChartArea: false,
              drawTicks: false,
              borderDash: [5, 5]
            },
            ticks: {
              display: true,
              color: '#ccc',
              padding: 20,
              font: {
                size: 11,
                family: "Open Sans",
                style: 'normal',
                lineHeight: 2
              },
            }
          },
        },
      },
    });
  </script>
  <script type="text/javascript">
    <?php 

      $querryorps ="SELECT * FROM clientes ORDER BY maq DESC LIMIT 5;";
      $conectorpscliente = $conect->query($querryorps);
      $conectorpscliente1 = $conect->query($querryorps);

     ?>
    // Bar chart
    var ctx5 = document.getElementById("bar-chart").getContext("2d");
  
    new Chart(ctx5, {
      type: "bar",
      data: {

        labels: [<?php while ($orpscliente = $conectorpscliente->fetch_array()) { ?>'<?php echo substr($orpscliente['nome'], 0, 13)?>',<?php } ?>],
        datasets: [{
          label: "ORP.150 do cliente",
          weight: 5,
          borderWidth: 0,
          borderRadius: 4,
          backgroundColor: '#3A416F',
          data: [<?php while ($orpscliente1 = $conectorpscliente1->fetch_array()) { ?><?php echo $orpscliente1['maq']?>,<?php } ?>],
          fill: false,
          maxBarThickness: 35,
          
        }],
      },
      options: {
        indexAxis: 'y',
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
          legend: {
            display: false,
          }
        },
        scales: {
          y: {
            grid: {
              drawBorder: false,
              display: true,
              drawOnChartArea: true,
              drawTicks: false,
              borderDash: [5, 5]
            },
            ticks: {
              display: true,
              padding: 10,
              color: '#9ca2b7'
            }
          },
          x: {
            grid: {
              drawBorder: false,
              display: false,
              drawOnChartArea: true,
              drawTicks: true,
            },
            ticks: {
              display: true,
              color: '#9ca2b7',
              padding: 10
            }
          },
        },
      },
    });
  </script>
  <script type="text/javascript">
    var ctx10 = document.getElementById("polar-chart").getContext("2d");
 <?php 
      if ($type == "tec" || $type == "adm") { 
        $querryprob ="SELECT serv,COUNT(*) as total FROM `checklist2` GROUP BY serv ORDER BY COUNT(*) DESC LIMIt 5;";
      $conectprob = $conect->query($querryprob);
      $conectprob1 = $conect->query($querryprob);}
      if ($type == "cli") { 
      $querryprob ="SELECT serv,COUNT(*) as total FROM `checklist2` WHERE clienid = '$clienid' GROUP BY serv ORDER BY COUNT(*) DESC LIMIt 5;";
      $conectprob = $conect->query($querryprob);
      $conectprob1 = $conect->query($querryprob);}
   
   

     ?>
    new Chart(ctx10, {
      type: "polarArea",
      data: {
        labels: [<?php while ($probs = $conectprob->fetch_array()) { ?>'<?php echo $probs['serv'];?>',<?php } ?>],
        datasets: [{
          label: 'My First Dataset',
          data: [<?php while ($probs1 = $conectprob1->fetch_array()) { ?><?php echo $probs1['total'];?>,<?php } ?>],
          backgroundColor: ['#17c1e8', '#5e72e4', '#3A416F', '#a8b8d8', '#82d616'],
        }]
      },
      options: {
        plugins: {
          legend: {
            display: false,
          }
        }
      }
    });
  </script>
<script type="text/javascript">
   var ctx9 = document.getElementById("radar-chart").getContext("2d");
   <?php 
        $querryworks  ="SELECT COUNT(*) as  totalcontrato FROM oss WHERE natureza = 'Contrato';";
        $querryworks1 ="SELECT COUNT(*) as  totalinstalacao FROM oss WHERE natureza = 'Instalação';";
        $querryworks2 ="SELECT COUNT(*) as  totalcorretiva FROM oss WHERE natureza = 'Corretiva';";
        $querryworks3 ="SELECT COUNT(*) as  totalpreventiva FROM oss WHERE natureza = 'Preventiva';";
        $querryworks4 ="SELECT COUNT(*) as  totalavulso FROM oss WHERE natureza = 'Avulso';";
        $querryworks5 ="SELECT COUNT(*) as  totalvisitas FROM visitas;";
        $conectwork  = $conect->query($querryworks);
        $conectwork1 = $conect->query($querryworks1);
        $conectwork2 = $conect->query($querryworks2);
        $conectwork3 = $conect->query($querryworks3);
        $conectwork4 = $conect->query($querryworks4);
        $conectwork5 = $conect->query($querryworks5);
        while ($works =  $conectwork->fetch_array())  {$valwork =  $works ['totalcontrato'];}
        while ($works1 = $conectwork1->fetch_array()) {$valwork1 = $works1['totalinstalacao'];}
        while ($works2 = $conectwork2->fetch_array()) {$valwork2 = $works2['totalcorretiva'];}
        while ($works3 = $conectwork3->fetch_array()) {$valwork3 = $works3['totalpreventiva'];}
        while ($works4 = $conectwork4->fetch_array()) {$valwork4 = $works4['totalavulso'];}
        while ($works5 = $conectwork5->fetch_array()) {$valwork5 = $works5['totalvisitas'];}
     ?>
    new Chart(ctx9, {
      type: "radar",
      data: {
        labels: ["Visitas", "Corretivas", "Instalações", "Preventiva","Avulso","Contrato"],
        datasets: [{
          label: "Serviços",
          backgroundColor: "rgba(58,65,111,0.2)",
          data: [<?php echo $valwork;?>,<?php echo $valwork1;?>,<?php echo $valwork2;?>,<?php echo $valwork3;?>,<?php echo $valwork4;?>,<?php echo $valwork5;?>,],
          borderDash: [5, 5],
        }, {
          label: "Student B",
          backgroundColor: "rgba(203,12,159,0.2)",
          data: [, , , , , ]
        }]
      },
      options: {
        plugins: {
          legend: {
            display: false,
          }
        }
      }
    });

</script>
<script type="text/javascript">
   var ctx3 = document.getElementById("doughnut-chart").getContext("2d");
    <?php 
        $querryaberta  ="SELECT COUNT(*) as  totalaberta FROM oss WHERE natureza = 'Aberta';";
        $querryfechada ="SELECT COUNT(*) as  totalfechada FROM oss WHERE natureza = 'Fechada';";
        $querrycancelada ="SELECT COUNT(*) as  totalcanceladas FROM oss WHERE natureza = 'Canceladas';";
        $conectaberta  = $conect->query($querryaberta);
        $conectfechada = $conect->query($querryfechada);
        $conectcancelada = $conect->query($querrycancelada);
        while ($aberta =  $conectaberta->fetch_array())  {$aberta1 =  $aberta ['totalaberta'];}
        while ($fechada = $conectfechada->fetch_array()) {$fechada1 = $fechada['totalfechada'];}
        while ($cancelada = $conectcancelada->fetch_array()) {$cancelada1 = $cancelada['totalcanceladas'];}
     ?>
    new Chart(ctx3, {
      type: "doughnut",
      data: {
        labels: ['Abertas', 'Fechadas','Canceladas'],
        datasets: [{
          label: "Chamados",
          weight: 9,
          cutout: 60,
          tension: 0.9,
          pointRadius: 2,
          borderWidth: 2,
          backgroundColor: ['#2152ff', '#67ff8E', '#f53939'],
          data: [<?php echo $aberta1 ?>, <?php echo $fechada1 ?>,<?php echo $cancelada1 ?>],
          fill: false
        }],
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
          legend: {
            display: false,
          }
        },
        interaction: {
          intersect: false,
          mode: 'index',
        },
        scales: {
          y: {
            grid: {
              drawBorder: false,
              display: false,
              drawOnChartArea: false,
              drawTicks: false,
            },
            ticks: {
              display: false
            }
          },
          x: {
            grid: {
              drawBorder: false,
              display: false,
              drawOnChartArea: false,
              drawTicks: false,
            },
            ticks: {
              display: false,
            }
          },
        },
      },
    });
</script>
</body>

</html>