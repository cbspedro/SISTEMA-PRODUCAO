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

include ("../config.php");

$querryorp ="SELECT * FROM oss ORDER BY id DESC LIMIT 1";
$conectorp = $conect->query($querryorp);
while ($os = $conectorp->fetch_array()) { $osid =  $os ["id"]; }

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="../../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../../assets/img/ico.png">
  <link rel="manifest" href="manifest.json">
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
  <script language="javascript" type="text/javascript">
        document.oncontextmenu = new Function("return false;");
        
  </script>
  <style type="text/css">

html {
  height: 100%;
}

body {
  margin: 0px;
  background-color: #336699;
  height: 100%;
  width: 100%;
}

#container:fullscreen {
  width: 100%;
  height: 100%;
  background-color: green;
}

#container:-webkit-full-screen {
  width: 100%;
  height: 100%;
  background-color: green;
}

#orientation-status {
  text-align: center;
  margin: 30px 0;
  color: white;
}

button {
  background-color: white;
  border: 1px solid #336699;
  color: #336699;
  width: 300px;
  padding: 10px;
  display: block;
  margin-left: auto;
  margin-right: auto;
  font-weight: 700;
  outline: none;
}

#unlock-button {
  display: none;
}

</style>
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
              <i class="fa-solid fa-pencil opacity-10 fa-1x text-primary"></i><span > Assinatura Cliente</h4></span>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.1/jquery.min.js"></script> 
  <script type="text/javascript" src="common/ss.js"></script>
      <style>
    
        li input
        {
            margin: 5px;
        }
        body
        {
            font-family: Segoe UI,Tahoma;
            font-size: 12px;
        }
    </style>
 </head>
  <form method="post" action="signature.php">
    <div id='ctlSignature_Container' style='width:350px;height:70;margin: 2%  ;'>
  <canvas ID='ctlSignature' width='350' height='70'></canvas>
    </div><input type="submit" value="Finalizar!" class="btn bg-gradient-success w-100 my-4 mb-2" style="padding:5px" />
    <div style="margin-top:5px;position:absolute">
    <input type="hidden" value="<?php echo $osid . '.png' ?>" id="ctlSignature_file" name="ctlSignature_file" />
    
    </div>
   <script type="text/javascript">
      var signObjects = new Array('ctlSignature');
  
  var objctlSignature = new SuperSignature({SignObject:"ctlSignature",SignWidth: "350",TransparentSign:"true",SignHeight: "70",IeModalFix: false,PenColor: "#000000",BorderStyle: "Dashed",BorderWidth: "2px",BackColor: "#FFFFFF", BorderColor: "#DDDDDD",RequiredPoints: "15",ClearImage:"common/refresh.png", PenCursor:"common/pen.cur", SuccessMessage: "Assinado com sucesso!", SignzIndex:0, Visible: "true", forceMouseEvent: true, Enabled: "true"});   
  
  $(document).ready(function() 
  {
    objctlSignature.Init();
  });

   </script>           
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