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
include('../config.php');
$final = 1;
$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
$date = "SELECT DATE_FORMAT(data,'%d/%m/%Y') AS data_formatada FROM checklist2 LIMIT 1";
$consulta ="SELECT * FROM checklist WHERE id= '$id'LIMIT 1";
$consulta1 ="SELECT * FROM checklist2 WHERE os= '$id' ORDER BY id DESC";
$con = $conect->query($consulta);
$act1 = $conect->query($consulta1);
$act2 = $conect->query($date);
$conprint = $conect->query($consulta);
$act1print = $conect->query($consulta1);
$act2print = $conect->query($date);
?>
    <script type="text/javascript">
        function myFunction() {
              var printWindow = open();
            printWindow.document.write('<body> <style type="text/css"> #container{ border-style: solid; padding: 10px; } </style> <?php while ($contprint = $conprint->fetch_array()) { ?> <div id="container"> <h4 style="text-align: center;text-decoration: underline;">CHECKLIST RECEBIMENTO ORP150-MANUTENÇÃO</h4><br> <h5> N° DE SERIE: <span style="text-decoration: underline;">ORP150.<?php echo $contprint ["ns"] ?></span></h5> <h5> DATA DO RECEBIMENTO: <span style="text-decoration: underline;"><?php echo date('d/m/Y', strtotime($contprint ["data"])); ?></span></h5> <h5> COLABORADOR QUE RECEBEU: <span style="text-decoration: underline;"><?php echo $contprint ["recebido"] ; $cliente = $contprint ["cliente"];?></span></h5> <h5> CLIENTE: <span style="text-decoration: underline;"><?php $consulta ="SELECT * FROM clientes WHERE id='$cliente' LIMIT 1"; $conxprint = $conect->query($consulta); while ($contxprint = $conxprint->fetch_array()){echo $contxprint['nome']; ?></span></h5> <h5> PROBLEMA RELATADO: <span style="text-decoration: underline;"><?php echo $contprint ["problema"] ?></span></h5> <h5> NOME/TELEFONE SOLICITANTE: <span style="text-decoration: underline;"><?php echo $contxprint ["contato"] ?> / <?php echo $contxprint ["fone"] ?></span></h5> <?php }} ?> <hr> <h4 style="text-align: center;text-decoration: underline;">PREENCHIMENTO DURANTE A EXECUÇÃO DO SERVIÇO</h4><br> <?php while ($actprint = $act1print->fetch_array()) { ?> <h5> SERVIÇO REALIZADO: <span style="text-decoration: underline;"><?php echo $actprint ["serv"] ?></span></h5> <h5> TÉCNICO RESPONSAVEL: <span style="text-decoration: underline;"><?php echo $actprint ["tec"] ?></span></h5> <h5> DATA / HORÁRIO: <span style="text-decoration: underline;"><?php echo date('d/m/y', strtotime($actprint ["data"])); ?> | <?php echo date('h:i', strtotime($actprint ["hrs"])); ?></span></h5> <hr> <?php } ?> <h5> N° DA OS: <span style="text-decoration: underline;">________________</span></h5> <h5> DATA DA OS: <span style="text-decoration: underline;">_____/_____/_________</span></h5> </div> </body>');
            printWindow.document.close();
            printWindow.print();
        }

    </script>
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

<body class="g-sidenav-show   bg-gray-100">
    <?php include("../include/menu.php") ?>
  <main class="main-content position-relative border-radius-lg ">
    <!-- Navbar -->
        <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl " id="navbarBlur" data-scroll="false">
      <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-white">Home</a></li>
            <li class="breadcrumb-item text-sm text-white active" aria-current="page">Tabelas</li>
          </ol>
          <h6 class="font-weight-bolder text-white mb-0">Log do checklist CK<?php echo $id ?> </h6>
        </nav>
        <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
          <div class="ms-md-auto pe-md-3 d-flex align-items-center">
            <div class="input-group">
              <!--<span class="input-group-text text-body"><i class="fas fa-search" aria-hidden="true"></i></span>-->
              <!--<input type="text" class="form-control" placeholder="Pesquisar...">-->
            </div>
          </div>
          <ul class="navbar-nav  justify-content-end">
            <li class="nav-item dropdown pe-2 d-flex align-items-center">
              <a href="javascript:;" class="nav-link text-white p-0" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="fa fa-user me-sm-1"></i>
                <span class="d-sm-inline d-none"><?php echo $username ?></span>
              </a>
              <ul class="dropdown-menu  dropdown-menu-end  px-2 py-3 me-sm-n4" aria-labelledby="dropdownMenuButton"onclick="location='../logout.php'">
                <li class="mb-2">
                  <a class="dropdown-item border-radius-md" href="javascript:;">
                    <div class="d-flex py-1">
                      <div class="my-auto">
                      </div>
                      <div class="d-flex flex-column justify-content-center">
                        <h6 class="text-sm font-weight-normal mb-1">
                          <span class="font-weight-bold"onclick="location='logout.php'">logout</span>
                        </h6>
                      </div>
                    </div>
                  </a>
                </li>

              </ul>
            </li>
            </li>
                  <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
                  <a href="javascript:;" class="nav-link text-white p-0" id="iconNavbarSidenav">
                  <div class="sidenav-toggler-inner">
                  <i class="sidenav-toggler-line bg-white"></i>
                  <i class="sidenav-toggler-line bg-white"></i>
                  <i class="sidenav-toggler-line bg-white"></i>
                </div>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- End Navbar -->
    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
          <div class="card mb-4">
            <div class="card-header pb-0">
              <?php while ($cont = $con->fetch_array()) { ?>
               <div class=""style="float:right; margin-left: 15px;">
                
                <a onclick="myFunction()"><i class="fa-solid fa-print text-primary opacity-10 fa-2x" aria-hidden="true"></i></a>
              </div>
                 <a href="checklistadd1.php?id=<?php echo $id ?>"><?php if ($cont ["final"] == '0') { echo'<i class="fa-solid fa-plus text-primary opacity-10 fa-2x" aria-hidden="true" style="float:right;"></i>';
                 } ?>
           </a>
        <a onclick="location='checklistedit.php?id=<?php echo $cont ["id"] ?>'">
        <?php if ($cont ["final"] == '0') { echo'<i class="fa-solid fa-pencil text-primary opacity-10 fa-2x" aria-hidden="true" style="float: right;margin-right: 15px;"></i>';$final = 0;
                 } ?></a>
          <h1> <i class="fa-solid fa-list-check opacity-10 fa-1x text-primary"></i><span >CK</h1> </span>
            </div>
              <div class="card-body px-0 pt-0 pb-2">
                <div class="table-responsive p-0">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-md-3">
                        <div class="form-group">
                          <label for="example-text-input" class="form-control-label">OCP</label>
                          <input readonly="readonly" class="form-control" type="text" value="OCP.<?php echo $cont ["ocp"] ?>" >
                         </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group">
                          <label for="example-text-input" class="form-control-label">N.Serie</label>
                          <input readonly="readonly" class="form-control" type="text" value="ORP150.<?php echo $cont ["ns"] ?>" >
                         </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group">
                          <label for="example-text-input" class="form-control-label">Técnico</label>
                          <input readonly="readonly" class="form-control" type="text" value="<?php echo $cont ["recebido"] ; $cliente = $cont ["cliente"];?>">
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group">
                          <label for="example-text-input" class="form-control-label">Data</label>
                          <input readonly="readonly" class="form-control" type="text" value="<?php echo date('d/m/Y', strtotime($cont ["data"]));  ?>">
                        </div>
                      </div>
                    </div>
<?php  $consulta ="SELECT * FROM clientes WHERE id='$cliente' LIMIT 1";
                    $conx = $conect->query($consulta);
                    while ($contx = $conx->fetch_array()){ ?>

                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="example-text-input" class="form-control-label">Cliente</label>
                          <input readonly="readonly" class="form-control" type="text" onclick="location='../clientes/pcliente.php?id=<?php echo $cliente; ?>'" value="<?php 
                    
                    echo $contx['nome']; ?>" >
                        </div>
                      </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="example-text-input" class="form-control-label">Solicitante</label>
                        <input readonly="readonly" class="form-control" type="email" value="<?php echo $contx ["contato"] ?>">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="example-text-input" class="form-control-label">Entrega</label>
                        <input readonly="readonly" class="form-control" type="text" value="<?php echo $cont ["ent"] ?>">
                      </div>
                      <div class="form-group">
                        <label for="example-text-input" class="form-control-label">Problema</label>
                        <input readonly="readonly" class="form-control" type="text" value="<?php echo $cont ["problema"] ?>">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="example-text-input" class="form-control-label">Telefone de contato</label>
                        <input readonly="readonly" class="form-control" type="text" value="<?php echo $contx ["fone"] ?>">
                      </div>
                      <div class="form-group">
                        <label for="example-text-input" class="form-control-label">Obs*</label>
                        <input readonly="readonly" class="form-control" type="text" value="<?php echo $cont ["obs"] ?>">
                      </div>
<?php } ?>

                      <?php if ($cont ["final"] == "1"){} ?>

                      <?php  if ($cont ["final"] == "0"){echo '<button class="btn btn-success btn-sm ms-auto " style="float:right;" onclick=';
                             echo "'window.location.href=";
                             echo '"final.php?id=';
                             echo $cont ["id"];
                             echo '"';
                             echo "'; >Finalizar</button>";}?>

                    </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div> 
      </div>
      <?php } ?>
<?php while ($act = $act1->fetch_array()) { ?>
 <div class="container-fluid py-4"> 
          <div class="card">
            <div class="card-body px-0 pt-0 pb-2">
              <div class="table-responsive p-0">
                <div class="card-body"><div class="mb-3">
                   <div class=""style="float:right;" onclick="location='checklistedit1.php?id=<?php echo $act ["id"] ?>'">
                    <a href="checklistedit1.php?id=<?php echo $act ["id"] ?>"><i class="
                <?php
  if ($username == $act ["tec"] && $final == "0"  ) {
    echo "fa-solid fa-pencil   text-primary opacity-10 fa-2x";
  }
?>"aria-hidden="true"></i></a></div>
                    <h6>Ação do dia <?php echo date('d/m/y', strtotime($act ["data"]));  ?> </h6>
                    <p>Hórario : <?php echo date('h:i', strtotime($act ["hrs"]));  ?> </p>
                
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <h6>Técnico responsável pelo serviço</h6>
                          <input class="form-control" type="text" value="<?php echo $act ["tec"] ?>"readonly="readonly">
                        </div>
                      </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <h6>Serviço realizado</h6>
                        <input readonly="readonly"class="form-control" type="email" value="<?php echo $act ["serv"] ?>">
                      </div>
                    </div>
                  </div>
                  <h6>Obs*</h6>
                  <input readonly="readonly" type="text" name="ns" class="form-control" placeholder="N/A" aria-label="Name"value="<?php echo $act ["obs"] ?>">
                  <span class="invalid-feedback"></span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
<?php } ?>
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
        <!-- Sidenav Type -->
        <div class="mt-3">
          <h6 class="mb-0">Cores do menu de navegação</h6>
          <p class="text-sm">Escolha entre os dois tipos de menu.</p>
        </div>
        <div class="d-flex">
          <button class="btn bg-gradient-primary w-100 px-3 mb-2 active me-2" data-class="bg-white" onclick="sidebarType(this)">Claro</button>
          <button class="btn bg-gradient-primary w-100 px-3 mb-2" data-class="bg-default" onclick="sidebarType(this)">Escuro</button>
        </div>
        <p class="text-sm d-xl-none d-block mt-2">You can change the sidenav type just on desktop view.</p>
        <!-- Navbar Fixed -->
        <div class="d-flex my-3">
          <h6 class="mb-0">Fixar a barra de navegação</h6>
          <div class="form-check form-switch ps-0 ms-auto my-auto">
            <input class="form-check-input mt-1 ms-auto" type="checkbox" id="navbarFixed" onclick="navbarFixed(this)">
          </div>
        </div>
        <hr class="horizontal dark my-sm-4">
        <div class="mt-2 mb-5 d-flex">
          <h6 class="mb-0">Claro / Escuro</h6>
          <div class="form-check form-switch ps-0 ms-auto my-auto">
            <input class="form-check-input mt-1 ms-auto" type="checkbox" id="dark-version" onclick="darkMode(this)">
          </div>
        </div>
        </div>
      </div>
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