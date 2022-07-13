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
$not ="SELECT * FROM orp150 WHERE user= '$username'LIMIT 1";
$m01x ="SELECT * FROM users";
$desinf ="SELECT * FROM users";
$m01 = $conect->query($m01x);
$m02 = $conect->query($m01x);
$m03 = $conect->query($m01x);
$hid = $conect->query($m01x);
$ele = $conect->query($m01x);
$press = $conect->query($m01x);
$soda = $conect->query($m01x);
$men = $conect->query($m01x);
$desinf = $conect->query($m01x);
$connot = $conect->query($not);

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
              <h4><i class="fa-solid fa-file-contract opacity-10 fa-1x text-primary"></i><span > Adicionar OS's</h4></span>
            </div>
            <div class="card-body">

              <div class="row">
                  <div class="col-md-4">
                    <form action="osload.php" method="POST">
                     <div class="form-group">
                        <label for="example-text-input" class="form-control-label">Cliente</label>
                        <select name="cliente" class="form-control" required >
                    <option value="" disabled selected><span>Selecione a opção</span></option>
                    <?php 
                    $clientescon ="SELECT * FROM clientes";
                    $clientesquerry = $conect->query($clientescon);
                    while ($cliente = $clientesquerry->fetch_array()) {
                     ?>
                    <option value="<?php echo $cliente ['nome'] ?>" ><span><?php echo $cliente ['nome'] ?></span></option>
                <?php  }?>
                  </select>
                     </div>
                  </div>
                  <div class="col-md-4">
                     <div class="form-group">
                        <label for="example-text-ineput" class="form-control-label">Natureza do atendimento</label>
                        <select name="natureza" class="form-control" required >
                    <option value="" disabled selected><span>Selecione a opção</span></option>
                    <option value="Contrato" ><span>Contrato</span></option>
                    <option value="Garantia" ><span>Garantia</span ></option>
                    <option value="Instalação" ><span>Instalação</span></option>
                    <option value="Avulso" ><span>Avulso</span ></option>
                  </select>
                     </div>
                  </div>
                  <div class="col-md-4">
                     <div class="form-group">
                        <label for="example-text-input" class="form-control-label">Manutenção Solicitada</label>
                        <select name="manutencao" class="form-control" required >
                    <option value="" disabled selected><span>Selecione a opção</span></option>
                    <option value="Corretiva" ><span>Corretiva</span></option>
                    <option value="Preventiva" ><span>Preventiva</span ></option>
                  </select>
                     </div>
                  </div>
                  <div class="col-md-3">
                     <div class="form-group">
                        <label for="example-text-ineput" class="form-control-label">Equipamento</label>
                        <input required placeholder="" name="equipamento"  class="form-control" type="text" value="">
                     </div>
                  </div>
                  <div class="col-md-3">
                     <div class="form-group">
                        <label for="example-text-ineput" class="form-control-label">Modelo</label>
                        <input required placeholder="" name="modelo"  class="form-control" type="text" value="">
                     </div>
                  </div>
                  <div class="col-md-3">
                     <div class="form-group">
                        <label for="example-text-ineput" class="form-control-label">N°Serie</label>
                        <input required placeholder="" name="ns" class="form-control" type="text" value="">
                     </div>
                  </div>
                  <div class="col-md-3">
                     <div class="form-group">
                        <label for="example-text-ineput" class="form-control-label">Horas de uso</label>
                        <input required placeholder="" name="hrsdeuso" class="form-control" type="text" value="">
                     </div>
                  </div>
                  </div>
               <hr class="horizontal dark">
               <div class="row">
                  <div class="col-md-8">
                     <div class="form-group">
                        <label for="example-text-input" class="form-control-label">Problema reclamado</label>
                        <input required placeholder="" name="problema" class="form-control" type="text" value="">
                     </div>
                  </div>
                  <div class="col-md-2">
                     <div class="form-group">
                        <label for="example-text-input" class="form-control-label">Possivel causa</label>
                         <select name="causa" class="form-control" required >
                    <option value="" disabled selected><span>Selecione a opção</span></option>
                    <option value="Desgaste" ><span>Desgaste</span></option>
                    <option value="Descalibrado" ><span>Descalibrado</span ></option>
                    <option value="Operação" ><span>Operação</span ></option>
                    <option value="Fabricação" ><span>Fabricação</span ></option>
                  </select>
                     </div>
                  </div>
                  <div class="col-md-2">
                     <div class="form-group">
                        <label for="example-text-input" class="form-control-label">EQUIP. Lacrado</label>
                         <select name="lacrado" class="form-control" required >
                    <option value="" disabled selected><span>Selecione a opção</span></option>
                    <option value="Sim" ><span>Sim</span></option>
                    <option value="Não" ><span>Não</span ></option>
                  </select>
                     </div>
                  </div>
                  </div>
                  <hr class="horizontal dark">
                   <div class="row">
                  <div class="col-md-9">
                     <div class="form-group">
                        <label for="example-text-input" class="form-control-label">Avaliação Técnica</label>
                        <input required placeholder="" name="avaltec" class="form-control" type="text" value="">
                     </div>
                  </div>
                  <div class="col-md-3">
                     <div class="form-group">
                        <label for="example-text-input" class="form-control-label">Momento</label>
                         <select  name="momento" class="form-control" required >
                    <option  disabled selected><span>Selecione a opção</span></option>
                    <option value="Ao ligar" ><span>Ao ligar</span></option>
                    <option value="Durante os Testes" ><span>Durante os Testes</span ></option>
                    <option value="Em Desinfeção" ><span>Em Desinfeção</span ></option>
                    <option value="Em Funcionamento" ><span>Em Funcionamento</span ></option>
                  </select>
                     </div>
                  </div>
                  </div>
                  <hr class="horizontal dark">
                  <div class="row">
                  <div class="col-md-12">
                     <div class="form-group">
                        <label for="example-text-input" class="form-control-label">Serviço Executado</label>
                        <input required placeholder="" name="servexec" class="form-control" type="text" value="">
                     </div>
                  </div>
                  <div class="col-md-4">
                     <div class="form-group">
                        <label for="example-text-input" class="form-control-label">Hora de Início</label>
                        <input  required placeholder="" name="hrsini" class="form-control" type="time" value="">
                     </div>
                  </div>
                  <div class="col-md-4">
                     <div class="form-group">
                        <label for="example-text-input" class="form-control-label">Hora Término</label>
                        <input required placeholder="" name="hrster" class="form-control" type="time" value="">
                     </div>
                  </div>
                  <div class="col-md-4">
                     <div class="form-group">
                        <label for="example-text-input" class="form-control-label">Desinfecção realizada</label>
                        <select  name="desinf" class="form-control" required >
                    <option value="Não"><span>Não</span></option>
                    <option value="Sim" ><span>Sim</span></option>
                  </select>
                     </div>
                  </div>
                  </div>
                  <hr class="horizontal dark">
               <div class="row">
                  <div class="col-md-12">
                     <div class="form-group">
                        <label for="example-text-input" class="form-control-label">Observações</label>
                        <input  placeholder="" name="obs" class="form-control" type="text" value="">
                     </div>
                  </div>
                </div>
                <hr class="horizontal dark">
                <p class="text-uppercase text-sm">Materiais utilizados e/ou requisitados</p>
               <div class="row">
                  <div class="col-md-10">
                     <div class="form-group">
                        <label for="example-text-input" class="form-control-label">Descrição</label>
                        <input  placeholder="" name="materiais1" class="form-control" type="text" value="">
                     </div>
                  </div>
                  <div class="col-md-2">
                     <div class="form-group">
                        <label for="example-text-input" class="form-control-label">Quantidade</label>
                        <input  placeholder="" name="qtd1" class="form-control" type="number" value="">
                     </div>
                  </div>
                </div>
                 <div class="row">
                  <div class="col-md-10">
                     <div class="form-group">
                        <label for="example-text-input" class="form-control-label">Descrição</label>
                        <input  placeholder="" name="materiais2" class="form-control" type="text" value="">
                     </div>
                  </div>
                  <div class="col-md-2">
                     <div class="form-group">
                        <label for="example-text-input" class="form-control-label">Quantidade</label>
                        <input  placeholder="" name="qtd2" class="form-control" type="number" value="">
                     </div>
                  </div>
                </div>
                 <div class="row">
                  <div class="col-md-10">
                     <div class="form-group">
                        <label for="example-text-input" class="form-control-label">Descrição</label>
                        <input  placeholder="" name="materiais3" class="form-control" type="text" value="">
                     </div>
                  </div>
                  <div class="col-md-2">
                     <div class="form-group">
                        <label for="example-text-input" class="form-control-label">Quantidade</label>
                        <input  placeholder="" name="qtd3" class="form-control" type="number" value="">
                     </div>
                  </div>
                </div>
                 <div class="row">
                  <div class="col-md-10">
                     <div class="form-group">
                        <label for="example-text-input" class="form-control-label">Descrição</label>
                        <input  placeholder="" name="materiais4" class="form-control" type="text" value="">
                     </div>
                  </div>
                  <div class="col-md-2">
                     <div class="form-group">
                        <label for="example-text-input" class="form-control-label">Quantidade</label>
                        <input  placeholder="" name="qtd4" class="form-control" type="number" value="">
                     </div>
                  </div>
                </div>
                <hr class="horizontal dark">
                <p class="text-uppercase text-sm">Dados do recebedor</p>
                   <div class="row">
                  <div class="col-md-8">
                     <div class="form-group">
                        <label for="example-text-input" class="form-control-label">Nome do recebedor</label>
                        <input required placeholder="" name="recebedor" class="form-control" type="text" value="">
                     </div>
                  </div>
                  <div class="col-md-4">
                     <div class="form-group">
                         <label for="example-text-input" class="form-control-label">CPF</label>
                        <input required placeholder="" name="recebedorcpf" class="form-control" type="text" value="">
                     </div>
                  </div>
                  </div>
              <button type="submit" class="btn bg-gradient-success w-100 my-4 mb-2">Adicionar OS's</button></form>









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