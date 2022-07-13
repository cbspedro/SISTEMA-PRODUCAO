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
$os = filter_input(INPUT_GET, 'os', FILTER_SANITIZE_NUMBER_INT);
$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
$obs = filter_input(INPUT_POST, 'obs', FILTER_SANITIZE_STRING);
$serv = filter_input(INPUT_POST, 'serv', FILTER_SANITIZE_STRING);
$result_usuario = "UPDATE `checklist2` SET `serv` = '$serv', `obs` = '$obs' WHERE `checklist2`.`id` = $id";
$resultado_usuario = mysqli_query($conect, $result_usuario);
if(true){
	header('location: checklistview.php?id=' . urlencode($_GET['os']) );
}