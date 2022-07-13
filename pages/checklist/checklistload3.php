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
$id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
$problema = filter_input(INPUT_POST, 'problema', FILTER_SANITIZE_STRING);
$obs = filter_input(INPUT_POST, 'obs', FILTER_SANITIZE_STRING);
$ent = filter_input(INPUT_POST, 'ent', FILTER_SANITIZE_STRING);
$result_usuario = "UPDATE `checklist` SET `problema` = '$problema',`ent` = '$ent', `obs` = '$obs' WHERE `checklist`.`id` = $id";
$resultado_usuario = mysqli_query($conect, $result_usuario);
if(true){
	header('location: checklistview.php?id=' . urlencode($_GET['id']) );
}