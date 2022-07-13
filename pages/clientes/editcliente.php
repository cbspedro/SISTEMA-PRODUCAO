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
$consulta1 ="SELECT COUNT(cliente) AS quantidade FROM oss WHERE cliente = '$id';";
$conos = $conect->query($consulta1);
$consulta2 ="SELECT COUNT(clienid) AS quantidade FROM maquinas WHERE clienid = '$id';";
$conmq = $conect->query($consulta2);
$consulta3 ="SELECT COUNT(cliente) AS quantidade FROM checklist WHERE cliente = '$id';";
$conck = $conect->query($consulta3);
$admquerry ="SELECT * FROM users where username = '$username'";
$admconect = $conect->query($admquerry);
$adm = '';
while ($admarray = $admconect->fetch_array()) {
  $adm = $admarray ["adm"];
} 





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
                        <div class="d-grid text-center" onclick="location='../maquinas/maquinas.php?id=<?php echo $id?>'">
                           <?php while ($contmq = $conmq->fetch_array()) { ?>
                           <span class="text-lg font-weight-bolder" onclick="location='../maquinas/maquinas.php?id=<?php echo $id?>'"><?php echo $contmq ["quantidade"] ?></span>
                           <i class="fa-solid fa-microchip text-primary"onclick="location='../maquinas/maquinas.php?id=<?php echo $id?>'"></i>
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
      <div class="col-md-8"style="margin-top: 20px">
          </form><form action="editclientload.php" method="POST">
          <div class="card">
            <form action="editcliente.php?id=<?php echo $id; ?>">

            <div class="card-header pb-0">
              <p class="text-uppercase text-sm">Informação do cliente 
                
                
              


                <?php
  if ($adm == "1") {
    echo '<input type="submit" style="float:right;" class="btn btn-primary btn-sm ms-auto" value="Atualizar"></input></p>';
  }
?>


            </div>
        
            <div class="card-body">

              <div class="row">
                  <div class="col-md-6">
                     <div class="form-group">
                        <label for="example-text-input" class="form-control-label">Nome</label>
                        <input placeholder="Não Cadastrado" name="nome" class="form-control" type="text" value="<?php echo $cont ["nome"] ?>">
                        <input placeholder="Não Cadastrado" name="id" class="form-control" type="hidden" value="<?php echo $cont ["id"] ?>">
                     </div>
                  </div>
                  <div class="col-md-6">
                     <div class="form-group">
                        <label for="example-text-ineput" class="form-control-label">E-mail</label>
                        <input placeholder="Não Cadastrado" name="email"  class="form-control" type="email" value="<?php echo $cont ["email"] ?>">
                     </div>
                  </div>
                  <div class="col-md-6">
                     <div class="form-group">
                        <label for="example-text-input" class="form-control-label">Contato 1</label>
                        <input placeholder="Não Cadastrado" name="contato" class="form-control" type="text" value="<?php echo $cont ["contato"] ?>">
                     </div>
                     <div class="form-group">
                        <label for="example-text-input" class="form-control-label">Telefone de contato</label>
                        <input placeholder="Não Cadastrado" name="fone" class="form-control" type="text" value="<?php echo $cont ["fone"] ?>">
                     </div>
                  </div>
                  <div class="col-md-6">
                     <div class="form-group">
                        <label for="example-text-input" class="form-control-label">Contato 2</label>
                        <input placeholder="Não Cadastrado" name="contato2" class="form-control" type="text" value="<?php echo $cont ["contato2"] ?>">
                     </div>
                     <div class="form-group">
                        <label for="example-text-input" class="form-control-label">Telefone de contato</label>
                        <input placeholder="Não Cadastrado" name="fone2" class="form-control" type="text" value="<?php echo $cont ["fone2"] ?>">
                     </div>
                     <?php
                        $ultima ="SELECT * FROM visitas WHERE cliente= '$id' ORDER BY id desc LIMIT 1 ";
                        $ultimavisi = $conect->query($ultima);
                        while ($ultimavisita = $ultimavisi->fetch_array()) { 
                        if ($cont ["visita"] == "1") {
                            echo '<div class="form-group"><label for="example-text-input" class="form-control-label">Última Visita</label><br>';
                        echo '<span class="text-xs">Tecnico : ';
                        echo $ultimavisita ["tec"]; 
                        echo "</span> <br>";
                        echo '<span class="text-xs"> Data: ';
                        echo date('d/m/Y', strtotime($ultimavisita ["data"])); 
                        echo "</span></div>";
                        }}
                        ?>
                  </div>
               </div>
               <hr class="horizontal dark">
               <p class="text-uppercase text-sm">Localização</p>
               <div class="row">
                  <div class="col-md-12">
                     <div class="form-group">
                        <label for="example-text-input" class="form-control-label">Endereço</label>
                        <input placeholder="Não Cadastrado" name="endereco" class="form-control" type="text" value="<?php echo $cont ["endereco"] ?>">
                     </div>
                  </div>
                  <div class="col-md-4">
                     <div class="form-group">
                        <label for="example-text-input" class="form-control-label">Cidade</label>
                        <input placeholder="Não Cadastrado" name="cidade" class="form-control" type="text" value="<?php echo $cont ["cidade"] ?>">
                     </div>
                  </div>
                  <div class="col-md-4">
                     <div class="form-group">
                        <label for="example-text-input" class="form-control-label">Estado</label>
                        <input placeholder="Não Cadastrado" name="estado" class="form-control" type="text" value="<?php echo $cont ["estado"] ?>">
                     </div>
                  </div>
                  <div class="col-md-4">
                     <div class="form-group">
                        <label for="example-text-input" class="form-control-label">CEP</label>
                        <input placeholder="Não Cadastrado" name="cep" class="form-control" type="text" value="<?php echo $cont ["cep"] ?>">
                     </div>
                  </div>
               </div><div style="float:right;"><i class="fa-solid fa-trash-can text-danger fa-2x" onclick="location='deletcliente.php?id=<?php echo $cont ["id"] ?>'"></i></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </form>
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