<?php
include ("../config.php");
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
$admquerry ="SELECT * FROM users where username = '$username'";
$admconect = $conect->query($admquerry);
$adm = '';
$type = '';
while ($admarray = $admconect->fetch_array()) {
  $adm = $admarray ["adm"];
  $type = $admarray ["type"];
} 
$mes = date("m"); 
$ano = date("Y");

if ($type == "tec" || $type == "adm") {
  $querryorp ="SELECT COUNT(*) AS orpcount FROM prod where year(data) = '$ano' and month(data) = '$mes';";
$conectorp = $conect->query($querryorp);

$querryos ="SELECT COUNT(*) AS oscount FROM oss where year(data) = '$ano' and month(data) = '$mes';";
$conectos = $conect->query($querryos);

$querrycheck ="SELECT COUNT(*) AS checkcount FROM checklist where year(data) = '$ano' and month(data) = '$mes';";
$conectcheck = $conect->query($querrycheck);

$querryvisi ="SELECT COUNT(*) AS visicount FROM visitas where year(data) = '$ano' and month(data) = '$mes';";
$conectvisi = $conect->query($querryvisi);

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
      <?php }} ?>
      <div class="row mt-4 ">
        <div class="col-lg-7 mb-lg-0 mb-4"  style="height:330px;">
          <div class="card z-index-2 h-100">
            <div class="card-header pb-0 pt-3 bg-transparent">
              <div class=""style="float:right;">
                                 <?php  if ($type =="tec") { ?> <a href="../os/osadd.php"><i class="fa-solid fa-plus text-primary opacity-10 fa-2x" aria-hidden="true"></i></a><?php }  ?>
              </div>
             <h4 > <i class="fa-solid fa-file-contract opacity-10 fa-1x text-primary"></i><span > OS's</h4></span>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Cliente</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Data</th>
                      <!--<th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Cliente</th>-->
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">OCP</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"></th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php while ($oss = $contoss->fetch_array()) { ?> 
                    <tr onclick="window.location.href='../os/osview.php?id=<?php echo $oss ["id"] ?>'">  
                      <td>
                        <div class="d-flex px-2 py-1">
                          <div>
                            <!-- <img src="../assets/img/team-2.jpg" class="avatar avatar-sm me-3" alt="user1"> -->
                          </div>
                          <div class="d-flex flex-column justify-content-center">
                            <h6 class="badge badge-sm bg-gradient-success"><a style="color:white;" href="../os/osview.php?id=<?php echo $oss ["id"] ?>"><?php echo $oss ["cliente"] ?></a></h6>
                            <p class="text-xs text-secondary mb-0"></p>
                          </div>
                        </div>
                      </td>
                      <td>
                        <p class="text-xs font-weight-bold mb-0"><?php echo date('d/m/Y', strtotime($oss ["data"]));  ?></p>
                      </td>
                      <!--<td class="align-middle text-center text-sm">-->
                      <!--  <span ><?php echo $oss ["cliente"] ?></span>-->
                      <!--</td>-->
                      <td class="align-middle text-center">
                        <span class="text-secondary text-xs font-weight-bold">OS.<?php echo $oss ["id"] ?></span>
                      </td>
                      <td>
                          <div class="d-flex">
                             <button class="btn btn-link btn-icon-only btn-rounded btn-sm text-dark icon-move-right my-auto"><i class="fa-solid fa-caret-right text-primary" onclick="window.location.href='../os/osview.php?id=<?php echo $oss ["id"] ?>'"></i></button>
                        </div>
                      </td>
                     
                    </tr>
                    <?php } ?>
                  </tbody>
                </table>
            </div>
          </div>
        </div>
        </div>
        <div class="col-lg-5">
          <div class="card card-carousel overflow-hidden h-100 p-0">
            <div id="carouselExampleCaptions" class="carousel slide h-100" data-bs-ride="carousel">
              <div class="carousel-inner border-radius-lg h-100">
                <div class="carousel-item h-100 active" style="background-image: url('../../assets/img/1.jpg');
      background-size: cover;">
                  <div class="carousel-caption d-none d-md-block bottom-0 text-start start-0 ms-5">
                    <div class="icon icon-shape icon-sm bg-white text-center border-radius-md mb-3">
                      <i class="fa fa-tint text-dark opacity-10"></i>
                    </div>
                    <h5 class="text-white mb-1">TITLE 1</h5>
                    <p>PHRASE 1</p>
                  </div>
                </div>
                <div class="carousel-item h-100" style="background-image: url('../../assets/img/2.jpg');
      background-size: cover;">
                  <div class="carousel-caption d-none d-md-block bottom-0 text-start start-0 ms-5">
                    <div class="icon icon-shape icon-sm bg-white text-center border-radius-md mb-3">
                      <i class="ni ni-bulb-61 text-dark opacity-10"></i>
                    </div>
                    <h5 class="text-white mb-1">TITLE 2</h5>
                    <p>PHRASE 2</p>
                  </div>
                </div>
                <div class="carousel-item h-100" style="background-image: url('../../assets/img/3.jpg');
      background-size: cover;">
                  <div class="carousel-caption d-none d-md-block bottom-0 text-start start-0 ms-5">
                    <div class="icon icon-shape icon-sm bg-white text-center border-radius-md mb-3">
                      <i class="ni ni-trophy text-dark opacity-10"></i>
                    </div>
                    <h5 class="text-white mb-1">TITLE 3</h5>
                    <p>PHRASE 3</p>
                  </div>
                </div>
              </div>
              <button class="carousel-control-prev w-5 me-3" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
              </button>
              <button class="carousel-control-next w-5 me-3" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
              </button>
            </div>
          </div>
        </div>
      </div>
      <?php if ($type == "tec") {?>
      <div class="row mt-4" >
        <div class="col-lg-6 mb-lg-0 mb-4" >
          <div class="card " style="height:330px;">
            <div class="card-header pb-0 p-3">
              <div class=""style="float:right;" onclick="location='../prod/addprod.php'">
                    <a href="../prod/addprod.php"><i class="<?php
  if ($adm == "1") {
    echo "fa-solid fa-plus text-primary opacity-10 fa-2x";
  }
?>" aria-hidden="true"></i></a>
              </div>
              <h4 onclick="location='../prod/prod.php'"> <i class="fa-solid fa-wrench opacity-10 fa-1x text-primary"></i><span > Programação produção</h4></span>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Número de série</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Embalada</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Prioridade</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Data</th>
                      <th class="text-secondary opacity-7"></th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php while ($tableprod = $contableprod->fetch_array()) { ?> 
                    <tr onclick="window.location.href='../prod/prodview.php?ns=<?php echo $tableprod ["ns"] ?>'">  
                      <td>
                        <div class="d-flex px-2 py-1">
                          <div>
                            <!-- <img src="../assets/img/team-2.jpg" class="avatar avatar-sm me-3" alt="user1"> -->
                          </div>
                          <div class="d-flex flex-column justify-content-center">
                            <h6 class="badge badge-sm bg-gradient-success"><a style="color:white;" href="../prod/prodview.php?ns=<?php echo $tableprod ["ns"] ?>">ORP150.0<?php echo $tableprod ["ns"] ?></a></h6>
                            <p class="text-xs text-secondary mb-0"></p>
                          </div>
                        </div>
                      </td>
                     
                      <td class="align-middle text-center text-sm">
                        <span ><?php
                            if ( $tableprod ["embalada"] == "1"){
                            echo '<i class="fa-solid fa-circle-check text-success fa-2x"></i>';}
                            if ( $tableprod ["embalada"] == "0"){
                            echo '<i class="fa-solid fa-circle-xmark text-danger fa-2x"></i>';}
                          ?></span>
                      </td>
                      <td class="align-middle text-center">
                        <span class="text-secondary text-xs font-weight-bold"><?php
                            if ( $tableprod ["prio"] == "1"){
                            echo '</i><i class="fa-solid  fa-triangle-exclamation text-danger fa-2x"></i>';}
                            if ( $tableprod ["prio"] == "2"){
                            echo '<i class="fa-solid fa-triangle-exclamation text-warning fa-2x"></i>';}
                            if ( $tableprod ["prio"] == "3"){
                            echo '<i class="fa-solid fa-triangle-exclamation text-success fa-2x"></i>';}
                          ?></span>
                      </td>
                      </td>
                       <td>
                        <p class="text-xs font-weight-bold mb-0"><?php echo date('d/m/Y', strtotime($tableprod ["data"]));  ?></p>
                      </td>
                      <td>
                          <div class="d-flex">
                             <button class="btn btn-link btn-icon-only btn-rounded btn-sm text-dark icon-move-right my-auto"><i class="fa-solid fa-caret-right text-primary" onclick=""></i></button>
                        </div>
                      </td>
                    </tr>
                    <?php } ?>
                  </tbody>
                </table>
            </div></div>
          </div>
        </div>
        
        <div class="col-lg-6" >
          <div class="card" style="height:330px;">
            <div class="card-header pb-0 p-3">
              <div class=""style="float:right;" onclick="location='../checklist/checklistadd.php'">
                    <a href="../checklist/checklistadd.php"><i class="fa-solid fa-plus text-primary opacity-10 fa-2x" aria-hidden="true"></i></a>
              </div>
             <h4 onclick="location='../checklist/checklist.php'"> <i class="fa-solid fa-list-check opacity-10 fa-1x text-primary"></i><span > Checklist's</h4></span>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">N.Serie</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Data</th>
                      <!--<th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Cliente</th>-->
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">OCP</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"></th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php while ($table = $contable->fetch_array()) { ?> 
                    <tr onclick="window.location.href='../checklist/checklistview.php?id=<?php echo $table ["id"] ?>'">  
                      <td>
                        <div class="d-flex px-2 py-1">
                          <div>
                            <!-- <img src="../assets/img/team-2.jpg" class="avatar avatar-sm me-3" alt="user1"> -->
                          </div>
                          <div class="d-flex flex-column justify-content-center">
                            <h6 class="badge badge-sm bg-gradient-success"><a style="color:white;" href="../checklist/checklistview.php?id=<?php echo $table ["id"] ?>">ORP150.<?php echo $table ["ns"] ?></a></h6>
                            <p class="text-xs text-secondary mb-0"></p>
                          </div>
                        </div>
                      </td>
                      <td>
                        <p class="text-xs font-weight-bold mb-0"><?php echo date('d/m/Y', strtotime($table ["data"]));  ?></p>
                      </td>
                      <!--<td class="align-middle text-center text-sm">-->
                      <!--  <span ><?php echo $table ["cliente"] ?></span>-->
                      <!--</td>-->
                      <td class="align-middle text-center">
                        <span class="text-secondary text-xs font-weight-bold">OCP.<?php echo $table ["ocp"] ?></span>
                      </td>
                      <td>
                          <div class="d-flex">
                             <button class="btn btn-link btn-icon-only btn-rounded btn-sm text-dark icon-move-right my-auto"><i class="fa-solid fa-caret-right text-primary" onclick="window.location.href='../checklist/checklistview.php?id=<?php echo $table ["id"] ?>'"></i></button>
                        </div>
                      </td>
                     
                    </tr>
                    <?php } ?>
                  </tbody>
                </table>
            </div>
          </div>
        </div>
      </div>
      <?php } ?>
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

</body>

</html>