<?php

session_start();
 
// olah se o usr ta logado
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: pages/dash/dashboard.php");
    exit;
}
 
// Inclui a conect e as configs
require_once "pages/config.php";
 
// variaves do login
$username = $password = "";
$username_err = $password_err = $login_err = "";
 
// checa se tem algum erro no form
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // usuario vasio
    if(empty(trim($_POST["username"]))){
        $username_err = "";
    } else{
        $username = trim($_POST["username"]);
    }
    
    // pass vasio
    if(empty(trim($_POST["password"]))){
        $password_err = "";
    } else{
        $password = trim($_POST["password"]);
    }
    
    // validação
    if(empty($username_err) && empty($password_err)){
        // prepara a query
        $sql = "SELECT id, username, password FROM users WHERE username = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
            
            $param_username = $username;
            
            
            if(mysqli_stmt_execute($stmt)){
                
                mysqli_stmt_store_result($stmt);
                
                // verificação
                if(mysqli_stmt_num_rows($stmt) == 1){                    
                   
                    mysqli_stmt_bind_result($stmt, $id, $username, $hashed_password);
                    if(mysqli_stmt_fetch($stmt)){
                        if(password_verify($password, $hashed_password)){
                            // se a senha estiver correta
                            session_start();
                            
                            // quarda o login
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["username"] = $username;                            
                            
                            // redirect para a pagina
                            header("location:pages/dash/dashboard.php");
                        } else{
                            // erro de pass
                            $login_err = "Senha ou usuário incorreto.";
                        }
                    }
                } else{
                    // erro de user
                    $login_err = "Senha ou usuário incorreto.";
                }
            } else{
                echo "Oops! algo deu errado";
            }

        
            mysqli_stmt_close($stmt);
        }
    }
    
    // mata a conect
    mysqli_close($link);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="manifest" href="manifest.json" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="assets/img/ico.png">
  <title>
    Company Login
  </title>
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
  <!-- Nucleo Icons -->
  <link href="assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/4f61b4c913.js" crossorigin="anonymous"></script>
  <link href="assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- CSS Files -->
  <link id="tyle" href="assets/css/argon-dashboard.css?v=2.0.0" rel="stylesheet" />
</head>

<body class="">

  <div class="container position-sticky z-index-sticky top-0">
    <div class="row">
      <div class="col-12">
        <!-- Navbar -->
       <nav class="navbar navbar-expand-lg blur border-radius-lg top-0 z-index-3 shadow position-absolute mt-4 py-2 start-0 end-0 mx-4">
          <div class="container-fluid">
            <a class="navbar-brand font-weight-bolder ms-lg-0 ms-3 " href="google.com">
              <img src="assets/img/logo.png" style="height: 30px; text-align: center ;">
              
            </a>

            <button class="navbar-toggler shadow-none ms-2" type="button" data-bs-toggle="collapse" data-bs-target="#navigation" aria-controls="navigation" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon mt-2">
                <span class="navbar-toggler-bar bar1"></span>
                <span class="navbar-toggler-bar bar2"></span>
                <span class="navbar-toggler-bar bar3"></span>
              </span>
            </button>
            <div class="collapse navbar-collapse" id="navigation">
              <ul class="navbar-nav mx-auto">
                <li class="nav-item">
                  <a class="nav-link me-2" href="google.com">
                    <i class="fa-solid fa-window-maximize opacity-6 text-dark me-1"></i>
                    Site
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link me-2" href="google.com">
                    <i class="fa-solid fa-user-group opacity-6 text-dark me-1"></i>
                    Sobre nós
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link me-2" href="google.com">
                    <i class="fa-solid fa-screwdriver-wrench opacity-6 text-dark me-1"></i>
                    Serviços
                  </a>
                </li>
              </ul>
            </div>
          </div>
        </nav>
        <!-- End Navbar -->
      </div>
    </div>
  </div>
  <main class="main-content  mt-0">
    <section>
      <div class="page-header min-vh-100">
        <div class="container">
          <div class="row">
            <div class="col-xl-4 col-lg-5 col-md-7 d-flex flex-column mx-lg-0 mx-auto">
              <div class="card card-plain">
                <div class="card-header pb-0 text-start">
                  <h4 class="font-weight-bolder">Sign In</h4>
                  <p class="mb-0">Preencha seu Usuário e senha para entrar :)
                  <?php 
        if(!empty($login_err)){
            echo '<p style="color: red; text-align: center;">'  . $login_err. '<p>';
        }        
        ?></p>
                </div>
                <div class="card-body">
                  <form role="form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" id="waterform">
                    <div class="mb-3">
                      <input  name="username"  <?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?> value="<?php echo $username; ?>" required type="text" class="form-control form-control-lg" placeholder="Usuário" aria-label="Email">
                      <span class="invalid-feedback" style="text"><?php echo $username_err; ?></span>
                    </div>
                    <div class="mb-3">
                      <input type="password" name="password" <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?> required class="form-control form-control-lg" placeholder="Senha" aria-label="Password">
                    </div>
                      <span class="invalid-feedback"><?php echo $password_err; ?></span>
                   <!--  <div class="form-check form-switch">
                      <input class="form-check-input" type="checkbox" id="rememberMe">
                      <label class="form-check-label" for="rememberMe">Remember me</label>
                    </div> -->
                    <div class="text-center">
                      <button type="submit" class="btn btn-lg btn-primary btn-lg w-100 mt-4 mb-0">Entrar</button>
                    </div>
                  </form>
                </div>
                <!-- <div class="card-footer text-center pt-0 px-lg-2 px-1">
                  <p class="mb-4 text-sm mx-auto">
                    Don't have an account?
                    <a href="javascript:;" class="text-primary text-gradient font-weight-bold">Sign up</a>
                  </p>
                </div> -->
              </div>
            </div>
            <div class="col-6 d-lg-flex d-none h-100 my-auto pe-0 position-absolute top-0 end-0 text-center justify-content-center flex-column">
              <div class="position-relative bg-gradient-primary h-100 m-3 px-7 border-radius-lg d-flex flex-column justify-content-center overflow-hidden" style="background-image: url('assets/img/1.jpg');
          background-size: cover;">
                <span class="mask bg-gradient-primary opacity-6"></span>
                <h4 class="mt-5 text-white font-weight-bolder position-relative">Company</h4>
                <p class="text-white position-relative">Uma linha completa de EQUIPAMENTOS para o tratamento de água nos setores industrial, hospitalar, farmacêutico, laboratoriais e clínicos.</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>
  <!--   Core JS Files   -->
  <script src="assets/js/core/popper.min.js"></script>
  <script src="assets/js/core/bootstrap.min.js"></script>
  <script src="assets/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="myscripts.js"></script>
  <script src="assets/js/plugins/smooth-scrollbar.min.js"></script>
  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>
      <link rel="manifest" href="manifest.json" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <script src="myscripts.js"></script>
  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example  etc -->
  <script src="assets/js/argon-dashboard.min.js?v=2.0.0"></script>
</body>

</html>