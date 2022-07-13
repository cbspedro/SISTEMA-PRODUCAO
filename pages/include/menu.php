<?php 
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: ../../index.php");
    exit;
}
else {
    $username = $_SESSION['username'];
}
$directoryURI = $_SERVER['REQUEST_URI'];
$path = parse_url($directoryURI, PHP_URL_PATH);
$components = explode('/', $path);
$first_part = $components[2];
$admquerry ="SELECT * FROM users where username = '$username'";
$admconsulta = $conect->query($admquerry);
while ($admcont = $admconsulta->fetch_array()) {
  $adm = $admcont ["adm"];
  $beta = $admcont ["beta"];
  $type = $admcont ["type"];
} 
?>


<div class="min-height-300 bg-primary position-absolute w-100"></div>
    <aside class="sidenav bg-white navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-4 " id="sidenav-main">
    <div class="sidenav-header">
      <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
      <a class="navbar-brand m-0" href="https://www.google.com" target="_blank">
        <img src="../../assets/img/logo-ct-dark.png" class="navbar-brand-img h-100" alt="main_logo">
        <span class="ms-1 font-weight-bold">Company</span>
      </a>
    </div>
    <hr class="horizontal dark mt-0">
    <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main"style="height: auto;">
      <ul class="navbar-nav"> 
        <li class="nav-item">
          <a class="nav-link <?php if ($first_part=="dash") {echo "active"; } else  {echo "";}?> " href="../dash/dashboard.php">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="fa-solid fa-chart-pie text-primary text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Dashboard </span>
          </a>
        </li>
        <?php if ($beta == '1') {
        echo '<li class="nav-item">
          <a class="nav-link '; if ($first_part=="overview") {echo "active"; } else  {echo "";}; echo ' " href="../overview/overview.php">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="fa-solid fa-chart-line text-primary text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Overview </span>
          </a>
        </li>';
        } ?>
        <li class="nav-item">
          <a class="nav-link <?php if ($first_part=="os") {echo "active"; } else  {echo "";}?>" href="../os/os.php">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="fa-solid fa-file-contract text-primary text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Tabela de OS's</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?php if ($first_part=="chamados ") {echo "active"; } else  {echo "";}?>" href="../chamados/chamados.php">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="fa-solid fa-headset text-primary text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Chamados</span>
          </a>
        </li>
        <?php if ($type == "tec") {?>
         <li class="nav-item">
          <a class="nav-link <?php if ($first_part=="prod") {echo "active"; } else  {echo "";}?> " href="../prod/prod.php">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="fa-solid fa-wrench text-primary text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Programação produção </span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?php if ($first_part=="checklist") {echo "active"; } else  {echo "";}?> " href="../checklist/checklist.php">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="fa-solid fa-list-check text-primary text-sm opacity-10"></i>
            </div>

            <span class="nav-link-text ms-1">Tabela de checklist's</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?php if ($first_part=="visita") {echo "active"; } else  {echo "";}?> " href="../visita/visita.php">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="fa-solid fa-location-arrow text-primary text-sm opacity-10"></i>
            </div>

            <span class="nav-link-text ms-1">Visitas</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?php if ($first_part=="clientes") {echo "active"; } else  {echo "";}?> " href="../clientes/clientes.php">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="fa-solid fa-user-doctor text-primary text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Clientes</span>
          </a>
        </li>
        <?php if ($adm == '1') {
          echo '<li class="nav-item">
          <a class="nav-link '; if ($first_part=="adm") {echo "active"; } else  {echo "";}echo '"href="../adm/users.php">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="fa-solid fa-user-plus text-primary text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Usuários</span>
          </a>
        </li>';
        } ?>
      <?php } ?>
      </ul>
    </div>
  </aside>
  