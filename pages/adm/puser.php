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
$nome = filter_input(INPUT_GET, 'nome', FILTER_SANITIZE_STRING);
$consulta ="SELECT * FROM users WHERE id = '$id'; ";
$con = $conect->query($consulta);



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
   <div class="container-fluid py-4">
      <div class="row"style="padding-bottom: 100px;" >
          <div class="card mb-4">
            <div class="card-body px-0 pt-0 pb-2">
                <div class="card-header pb-0">
               <div class=""style="float:right;" onclick="location='addprod.php'">
                    <a href="addadm.php?id=<?php echo $id ?>"><i class="
                         <?php while ($cont = $con->fetch_array()) { 

                
                        if ($cont ["adm"] == "1") {
                           echo "fa-solid fa-medal text-primary opacity-10 fa-2x";
                        }
                        
                         if ($cont ["adm"] == "0") {
                           echo "fa-solid fa-medal text-danger opacity-10 fa-2x";
                         }
                        ?>
                    "aria-hidden="true"></i></a>
                    <a href="deleteuser.php?id=<?php echo $id ?>"><i class="fa-solid fa-trash-can text-danger opacity-10 fa-2x"></i></a></div>
                <div class="card-body">
               <p class="text-uppercase text-sm">Informação do Usuário</p>
               <div class="row">
                  <div class="col-md-6">
                     <div class="form-group">
                        <label for="example-text-input" class="form-control-label">Nome</label>
                        <input placeholder="Não Cadastrado" readonly="readonly" class="form-control" type="text" value="<?php echo $cont['username'] ?>">
                     </div>
                  </div>
                  <div class="col-md-6">
                     <div class="form-group">
                        <label for="example-text-ineput" class="form-control-label">ID</label>
                        <input placeholder="Não Cadastrado" readonly="readonly" class="form-control" type="email" value="<?php echo $id ?>">
                     </div>
                  </div>
                  <?php } ?>
                  </tbody>
                </table>
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