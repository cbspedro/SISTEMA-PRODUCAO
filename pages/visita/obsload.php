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
$obs = filter_input(INPUT_POST, 'obs', FILTER_SANITIZE_STRING);
$result_usuario = "INSERT INTO `obs`(`id`, `obs`, `tec`, `data`, `cliente`) VALUES (null,'$obs','$username',CURRENT_TIMESTAMP,'$id')";
$resultado_usuario = mysqli_query($conect, $result_usuario);
if(true){
	header('location: visitaview.php?id=' . urlencode($_GET['id']) );
}