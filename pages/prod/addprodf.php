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
$ns= filter_input(INPUT_GET, 'ns', FILTER_SANITIZE_NUMBER_INT);
include ("../config.php");
$sera ="SELECT * FROM prod WHERE ns='$ns'";
$servcon = $conect->query($sera);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="stylesheet" type="text/css" href="check.css">
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
            <h2> <i class="fa-solid fa-wrench opacity-10 fa-1x text-primary"></i><span > Etapa de produção</h2></span>
              <h6>Adicionar etapa realizada </h6>
               <h6>Técnico responsável pela etapa: <span style="color:blue"><?php echo $username?></span></h6>
            </div>
            <form role="form" action="loadprodf.php?ns=<?php echo $ns ?>" method="POST">
            <div class="card-body">
              <div class="row">
                
              <?php while ($serv = $servcon->fetch_array()) { ?>

                <?php
                  if ($serv['1'] == "") {
                    echo '<div class="col-md-4">
                    <div class="form-group">
                    
                    <label for="example-text-input" class="form-control-label">Instalação Membrana / Filtros</label><br>
                    <label for="1" class="label-cbx">
                    <input id="1" name="v1"type="checkbox" class="invisible" value="';
                    echo $username; echo '">
                    <div class="checkbox">
                    <svg width="20px" height="20px" viewBox="0 0 20 20">
                    <path d="M3,1 L17,1 L17,1 C18.1045695,1 19,1.8954305 19,3 L19,17 L19,17 C19,18.1045695 18.1045695,19 17,19 L3,19 L3,19 C1.8954305,19 1,18.1045695 1,17 L1,3 L1,3 C1,1.8954305 1.8954305,1 3,1 Z"></path>
                    <polyline points="4 11 8 15 16 6"></polyline>
                    </svg>
                    </div>
                    </label>
                    </div>
                      </div>';
                    }
                  ?>
                <?php
                  if ($serv['2'] == "") {
                    echo '<div class="col-md-4">
                    <div class="form-group">
                    
                    <label for="example-text-input" class="form-control-label">Checagem Limpeza AMB. / EQUIP.</label><br>
                    <label for="2" class="label-cbx">
                    <input id="2" name="v2"type="checkbox" class="invisible" value="';
                    echo $username; echo '">
                    <div class="checkbox">
                    <svg width="20px" height="20px" viewBox="0 0 20 20">
                    <path d="M3,1 L17,1 L17,1 C18.1045695,1 19,1.8954305 19,3 L19,17 L19,17 C19,18.1045695 18.1045695,19 17,19 L3,19 L3,19 C1.8954305,19 1,18.1045695 1,17 L1,3 L1,3 C1,1.8954305 1.8954305,1 3,1 Z"></path>
                    <polyline points="4 11 8 15 16 6"></polyline>
                    </svg>
                    </div>
                    </label>
                    </div>
                      </div>';
                    }
                  ?>
                <?php
                  if ($serv['3'] == "") {
                    echo '<div class="col-md-4">
                    <div class="form-group">
                    
                    <label for="example-text-input" class="form-control-label">Checagem Fontes Contaminação</label><br>
                    <label for="3" class="label-cbx">
                    <input id="3" name="v3"type="checkbox" class="invisible" value="';
                    echo $username; echo '">
                    <div class="checkbox">
                    <svg width="20px" height="20px" viewBox="0 0 20 20">
                    <path d="M3,1 L17,1 L17,1 C18.1045695,1 19,1.8954305 19,3 L19,17 L19,17 C19,18.1045695 18.1045695,19 17,19 L3,19 L3,19 C1.8954305,19 1,18.1045695 1,17 L1,3 L1,3 C1,1.8954305 1.8954305,1 3,1 Z"></path>
                    <polyline points="4 11 8 15 16 6"></polyline>
                    </svg>
                    </div>
                    </label>
                    </div>
                      </div>';
                    }
                  ?>
                <?php
                  if ($serv['4'] == "") {
                    echo '<div class="col-md-4">
                    <div class="form-group">
                    
                    <label for="example-text-input" class="form-control-label">Checagem EQUIP. Adequados</label><br>
                    <label for="4" class="label-cbx">
                    <input id="4" name="v4"type="checkbox" class="invisible" value="';
                    echo $username; echo '">
                    <div class="checkbox">
                    <svg width="20px" height="20px" viewBox="0 0 20 20">
                    <path d="M3,1 L17,1 L17,1 C18.1045695,1 19,1.8954305 19,3 L19,17 L19,17 C19,18.1045695 18.1045695,19 17,19 L3,19 L3,19 C1.8954305,19 1,18.1045695 1,17 L1,3 L1,3 C1,1.8954305 1.8954305,1 3,1 Z"></path>
                    <polyline points="4 11 8 15 16 6"></polyline>
                    </svg>
                    </div>
                    </label>
                    </div>
                      </div>';
                    }
                  ?>
                <?php
                  if ($serv['5'] == "") {
                    echo '<div class="col-md-4">
                    <div class="form-group">
                    
                    <label for="example-text-input" class="form-control-label">Separaçao da Matéri-prima</label><br>
                    <label for="5" class="label-cbx">
                    <input id="5" name="v5"type="checkbox" class="invisible" value="';
                    echo $username; echo '">
                    <div class="checkbox">
                    <svg width="20px" height="20px" viewBox="0 0 20 20">
                    <path d="M3,1 L17,1 L17,1 C18.1045695,1 19,1.8954305 19,3 L19,17 L19,17 C19,18.1045695 18.1045695,19 17,19 L3,19 L3,19 C1.8954305,19 1,18.1045695 1,17 L1,3 L1,3 C1,1.8954305 1.8954305,1 3,1 Z"></path>
                    <polyline points="4 11 8 15 16 6"></polyline>
                    </svg>
                    </div>
                    </label>
                    </div>
                      </div>';
                    }
                  ?>
                <?php
                  if ($serv['6'] == "") {
                    echo '<div class="col-md-4">
                    <div class="form-group">
                    
                    <label for="example-text-input" class="form-control-label">Montagem do chassi</label><br>
                    <label for="6" class="label-cbx">
                    <input id="6" name="v6"type="checkbox" class="invisible" value="';
                    echo $username; echo '">
                    <div class="checkbox">
                    <svg width="20px" height="20px" viewBox="0 0 20 20">
                    <path d="M3,1 L17,1 L17,1 C18.1045695,1 19,1.8954305 19,3 L19,17 L19,17 C19,18.1045695 18.1045695,19 17,19 L3,19 L3,19 C1.8954305,19 1,18.1045695 1,17 L1,3 L1,3 C1,1.8954305 1.8954305,1 3,1 Z"></path>
                    <polyline points="4 11 8 15 16 6"></polyline>
                    </svg>
                    </div>
                    </label>
                    </div>
                      </div>';
                    }
                  ?>
                <?php
                  if ($serv['7'] == "") {
                    echo '<div class="col-md-4">
                    <div class="form-group">
                    
                    <label for="example-text-input" class="form-control-label">Instal. Elétrica</label><br>
                    <label for="7" class="label-cbx">
                    <input id="7" name="v7"type="checkbox" class="invisible" value="';
                    echo $username; echo '">
                    <div class="checkbox">
                    <svg width="20px" height="20px" viewBox="0 0 20 20">
                    <path d="M3,1 L17,1 L17,1 C18.1045695,1 19,1.8954305 19,3 L19,17 L19,17 C19,18.1045695 18.1045695,19 17,19 L3,19 L3,19 C1.8954305,19 1,18.1045695 1,17 L1,3 L1,3 C1,1.8954305 1.8954305,1 3,1 Z"></path>
                    <polyline points="4 11 8 15 16 6"></polyline>
                    </svg>
                    </div>
                    </label>
                    </div>
                      </div>';
                    }
                  ?>
                <?php
                  if ($serv['8'] == "") {
                    echo '<div class="col-md-4">
                    <div class="form-group">
                    
                    <label for="example-text-input" class="form-control-label">Instal. Hidráulica</label><br>
                    <label for="8" class="label-cbx">
                    <input id="8" name="v8"type="checkbox" class="invisible" value="';
                    echo $username; echo '">
                    <div class="checkbox">
                    <svg width="20px" height="20px" viewBox="0 0 20 20">
                    <path d="M3,1 L17,1 L17,1 C18.1045695,1 19,1.8954305 19,3 L19,17 L19,17 C19,18.1045695 18.1045695,19 17,19 L3,19 L3,19 C1.8954305,19 1,18.1045695 1,17 L1,3 L1,3 C1,1.8954305 1.8954305,1 3,1 Z"></path>
                    <polyline points="4 11 8 15 16 6"></polyline>
                    </svg>
                    </div>
                    </label>
                    </div>
                      </div>';
                    }
                  ?>
                  <?php
                  if ($serv['9'] == "") {
                    echo '<div class="col-md-4">
                    <div class="form-group">
                    
                    <label for="example-text-input" class="form-control-label">Instalação Membrana / Filtros</label><br>
                    <label for="9" class="label-cbx">
                    <input id="9" name="v9"type="checkbox" class="invisible" value="';
                    echo $username; echo '">
                    <div class="checkbox">
                    <svg width="20px" height="20px" viewBox="0 0 20 20">
                    <path d="M3,1 L17,1 L17,1 C18.1045695,1 19,1.8954305 19,3 L19,17 L19,17 C19,18.1045695 18.1045695,19 17,19 L3,19 L3,19 C1.8954305,19 1,18.1045695 1,17 L1,3 L1,3 C1,1.8954305 1.8954305,1 3,1 Z"></path>
                    <polyline points="4 11 8 15 16 6"></polyline>
                    </svg>
                    </div>
                    </label>
                    </div>
                      </div>';
                    }
                  ?>

                <?php } ?>

                <button type="submit" class="btn bg-gradient-success w-100 my-4 mb-2">Adicionar</button>
              </div>
                  </form>
            </div>
          </div>
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
  <div class="fixed-plugin">
    <div class="card shadow-lg">
      <div class="card-header pb-0 pt-3 ">
        <div class="float-start">
          <h5 class="mt-3 mb-0">Configurações</h5>
          <p>Veja suas opções de personalização.</p>
        </div>
        <div class="float-end mt-4">
          <button class="btn btn-link text-dark p-0 fixed-plugin-close-button">
            <i class="fa fa-close"></i>
          </button>
        </div>
        <!-- End Toggle Button -->
      </div>
      <hr class="horizontal dark my-1">
      <div class="card-body pt-sm-3 pt-0 overflow-auto">
        <!-- Sidebar Backgrounds -->
        <div>
          <h6 class="mb-0">Cores de destaque</h6>
        </div>
        <a href="javascript:void(0)" class="switch-trigger background-color">
          <div class="badge-colors my-2 text-start">
            <span class="badge filter bg-gradient-primary active" data-color="primary" onclick="sidebarColor(this)"></span>
            <span class="badge filter bg-gradient-dark" data-color="dark" onclick="sidebarColor(this)"></span>
            <span class="badge filter bg-gradient-info" data-color="info" onclick="sidebarColor(this)"></span>
            <span class="badge filter bg-gradient-success" data-color="success" onclick="sidebarColor(this)"></span>
            <span class="badge filter bg-gradient-warning" data-color="warning" onclick="sidebarColor(this)"></span>
            <span class="badge filter bg-gradient-danger" data-color="danger" onclick="sidebarColor(this)"></span>
          </div>
        </a>
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