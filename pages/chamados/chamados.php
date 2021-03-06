<?php
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
$ns = filter_input(INPUT_GET, 'ns', FILTER_SANITIZE_NUMBER_INT);
$consulta ="SELECT * FROM chamados  ORDER BY id DESC";
$contable = $conect->query($consulta);

?>
<!DOCTYPE html>
<html lang="en">

<head>
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
    <?php include("../include/menu.php") ?>
  <main class="main-content position-relative border-radius-lg ">
    <!-- Navbar -->
<?php include("../include/navbar.php") ?>
    <!-- End Navbar -->
    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
          <div class="card mb-4">
            <div class="card-header pb-0">  
               <div class=""       
                  style="float:right;" onclick="location='osadd.php'"><a href="chamadadd.php">
                  <a href="osadd.php"><i class="fa-solid fa-plus text-primary opacity-10 fa-2x" aria-hidden="true"></i></a>
              </div>
             <h4 onclick="location=''"> <i class="fa-solid fa-headset opacity-10 fa-1x text-primary"></i><span > Chamados</h4></span>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">N??mero do Chamado</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Cliente</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status</th>
                      <th class="text-secondary opacity-7"></th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php while ($table = $contable->fetch_array()) { ?> 
                    <tr onclick="location='chamadosview.php?id=<?php echo $table ["id"] ?>'">  
                      <td>
                        <div class="d-flex px-2 py-1">
                          <div>
                            <!-- <img src="../assets/img/team-2.jpg" class="avatar avatar-sm me-3" alt="user1"> -->
                          </div>
                          <div class="d-flex flex-column justify-content-center">
                            <h6 class="badge badge-sm bg-gradient-success"><a style="color:white;">CH.<?php echo $table ["id"] ?></a></h6>
                            <p class="text-xs text-secondary mb-0">Data: <?php echo date('d/m/Y', strtotime($table ["data"]));  ?></p>
                          </div>
                        </div>
                      </td>
                      <td>

                        <p class="text-xs font-weight-bold mb-0">
                         <?php echo $table ["cliente"];$status = $table ["status"] ?></p>
                      </td>
                      <td class="align-middle text-center text-sm">
                        <span >
                          <?php if($status == "1"){?><i class="fa-regular fa-circle fa-2x text-primary"></i><?php }?>
                          <?php if($status == "2"){?><i class="fa-regular fa-circle-check fa-2x text-success"></i><?php }?>
                          <?php if($status == "3"){?><i class="fa-regular fa-circle-xmark fa-2x text-danger"></i><?php }?>

                          </span>
                      </td>
                      <?php  }?>
                      </td>
                       <td>
                          <div class="d-flex">
                             <button class="btn btn-link btn-icon-only btn-rounded btn-sm text-dark icon-move-right my-auto"><i class="fa-solid fa-caret-right text-primary" ></i></button>
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

  </main>
  <!--   Core JS Files   -->
  <script src="../../assets/js/core/popper.min.js"></script>
  <script src="../../assets/js/core/bootstrap.min.js"></script>
  <script src="../../assets/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="../../assets/js/plugins/smooth-scrollbar.min.js"></script>
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