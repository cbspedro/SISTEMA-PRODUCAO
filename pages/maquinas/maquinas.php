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
include ("../config.php");
$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
$consulta ="SELECT * FROM clientes WHERE id= '$id'";
$con = $conect->query($consulta);
$con1 = $conect->query($consulta);
$consultaq ="SELECT * FROM maquinas WHERE clienid= '$id'";
$maqu = $conect->query($consultaq);
$consulta1 ="SELECT COUNT(cliente) AS quantidade FROM oss WHERE cliente = '$id';";
$conos = $conect->query($consulta1);
$consulta2 ="SELECT COUNT(clienid) AS quantidade FROM maquinas WHERE clienid = '$id';";
$conmq = $conect->query($consulta2);
$consulta3 ="SELECT COUNT(cliente) AS quantidade FROM checklist WHERE cliente = '$id';";
$conck = $conect->query($consulta3);



?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="../../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../../assets/img/favicon.png">
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

<body class="g-sidenav-show bg-gray-100">
    <?php include("../include/menu.php") ?>
  <div class="main-content position-relative max-height-vh-100 h-100">
    <!-- Navbar -->
<?php include("../include/navbar.php") ?>
    <!-- End Navbar -->
    <?php while ($cont = $con->fetch_array()) { ?>
    <div class="container-fluid py-4">
   <div class="row">
      <div class="col-md-4" style="margin-top: 20px">
         <div class="card card-profile">
            <img src="../../assets/img/bgcliente<?php echo $cont ["id"] ?>.jpg" alt="Image placeholder" class="card-img-top">
            <div class="row justify-content-center">
               <div class="col-4 col-lg-4 order-lg-2"> 
               </div>
            </div>
            <div class="card-header text-center border-0 pt-0 pt-lg-2 pb-4 pb-lg-3">
               <div class="d-flex justify-content-between"style="margin-top: 5px">
                  <a href="https://www.google.com/maps/place/<?php echo $cont ["endereco"] ?> 
                     " class="btn btn-sm btn-primary mb-0 d-none d-lg-block"target="_blank"><i class="fa-solid fa-map-location-dot"></i></a>
                  <a href="https://waze.com/ul?q=<?php echo $cont ["endereco"] ?>&navigate=yes
                     " class="btn btn-sm btn-primary mb-0 d-block d-lg-none"target="_blank"><i class="fa-solid fa-map-location-dot"></i></a>
                  <a class="btn btn-sm btn-success float-right mb-0 d-none d-lg-block" href="tel:<?php echo $cont ["fone"] ?>"><i class="fa-solid fa-phone"></i></a>
                  <a class="btn btn-sm btn-success float-right mb-0 d-block d-lg-none" href="tel:<?php echo $cont ["fone"] ?>"><i class="fa-solid fa-phone"></i></a>
               </div>
            </div>
            <div class="card-body pt-0">
               <div class="row">
                  <div class="col">
                     <div class="d-flex justify-content-center">
                        <div class="d-grid text-center" onclick="location='maquinas.php?id=<?php echo $id?>'">
                           <?php while ($contmq = $conmq->fetch_array()) { ?>
                           <span class="text-lg font-weight-bolder" onclick="location='maquinas.php?id=<?php echo $id?>'"><?php echo $contmq ["quantidade"] ?></span>
                           <i class="fa-solid fa-microchip text-primary"onclick="location='maquinas.php?id=<?php echo $id?>'"></i>
                        </div>
                        <?php }?>
                        <?php while ($contos = $conos->fetch_array()) { ?>
                        <div class="d-grid text-center mx-4">
                           <span class="text-lg font-weight-bolder"><?php echo $contos ["quantidade"] ?></span>
                           <i class="fa-solid fa-file-contract text-primary"></i>
                        </div>
                        <?php }?>
                        <?php while ($contck = $conck->fetch_array()) { ?>
                        <div class="d-grid text-center">
                           <span class="text-lg font-weight-bolder"><?php echo $contck ["quantidade"] ?></span>
                           <i class="fa-solid fa-list-check text-primary"></i>
                        </div>
                        <?php }?>
                     </div>
                  </div>
               </div>
               <div class="text-center mt-4">
                  <h5>
                     <?php echo $cont ["nome"] ?><span class="font-weight-light"></span>
                  </h5>
                  <div class="h6 font-weight-300">
                     <i class="ni location_pin mr-2"></i><?php echo $cont ["cidade"] ?>, <?php echo $cont ["estado"] ?>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <?php }?>
      <div class="col-md-8"style="margin-top: 20px">
      <div class="row">
        <div class="col-12">
          <div class="card mb-4">
            <div class="card-header pb-0">
               <div class=""style="float:right;">
                    <a href="maqadd.php?id=<?php echo $id?>"><i class="
                <?php
  if ($username == "pedro") {
    echo "fa-solid fa-plus text-primary opacity-10 fa-2x";
  }
?>"aria-hidden="true"></i></a></div>
              <h4>Maquinas</h4>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">N.Serie</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Id da maquina</th>
                      
                    </tr>
                  </thead>
                  <tbody>
                    <?php while ($maqui = $maqu->fetch_array()) { ?> 
                    <tr>  
                      <td onclick="location='pmaq.php?id=<?php echo $maqui ["id"]?>&clienid=<?php echo $id ?>'">
                        <div class="d-flex px-2 py-1">
                          <div>
                          </div>
                          <div class="d-flex flex-column justify-content-center">
                            <h6 class="badge badge-sm bg-gradient-success"><a style="color:white;">ORP150.<?php echo $maqui ["ns"]?></a></h6>
                            <p class="text-xs text-secondary mb-0"></p>
                          </div>
                        </div>
                      </td>
                      <td>
                        <div class="d-flex px-2 py-1">
                          <div>
                            <!-- <img src="../assets/img/team-2.jpg" class="avatar avatar-sm me-3" alt="user1"> -->
                          </div>
                          <div class="d-flex flex-column justify-content-center">
                            <h6 ><a ><?php echo $maqui ["id"] ?></a></h6>
                            <p class="text-xs text-secondary mb-0"></p>
                          </div>
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
      </div>
   </div>
</div>
      <footer class="footer pt-3"style="position: relative;left: 0;bottom: 0;width: 100%;color: white;text-align: center;">
        <div class="container-fluid">
          <div class="row align-items-center justify-content-lg-between" >
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
  </div>
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