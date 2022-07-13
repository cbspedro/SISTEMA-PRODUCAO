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
$cliente = filter_input(INPUT_POST, 'cliente', FILTER_SANITIZE_NUMBER_INT);
$result_usuario = "UPDATE `obs` SET `ativa` = '0' WHERE id ='$id'";
$resultado_usuario = mysqli_query($conect, $result_usuario);
if('1'=='1'){
	header('location: visitaview.php?id=' . urlencode($_GET['cliente']) );
}