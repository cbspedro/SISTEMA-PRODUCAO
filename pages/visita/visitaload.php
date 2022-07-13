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
?>
<?php
include_once ("../config.php");
$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
$os = filter_input(INPUT_POST, 'os', FILTER_SANITIZE_STRING);
$data = filter_input(INPUT_POST, 'date', FILTER_SANITIZE_STRING);
$result_usuario = "INSERT INTO `visitas`(`id`, `os`, `tec`, `data`, `cliente`) VALUES (null,'0','$username','$data','$id')";
$resultado_usuario = mysqli_query($conect, $result_usuario);
if(true){
	header('location: visitaview.php?id=' . urlencode($_GET['id']) );
}