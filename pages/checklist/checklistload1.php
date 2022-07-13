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
$os = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
$tec = filter_input(INPUT_POST, 'tec', FILTER_SANITIZE_STRING);
$obs = filter_input(INPUT_POST, 'obs', FILTER_SANITIZE_STRING);
$serv = filter_input(INPUT_POST, 'serv', FILTER_SANITIZE_STRING);
$clienid = filter_input(INPUT_POST, 'clienid', FILTER_SANITIZE_STRING);
$result_usuario = "INSERT INTO `checklist2`(`id`, `tec`, `serv`, `obs`, `data`,`hrs`, `os`, `clienid`) VALUES (null,'$username','$serv','$obs',NOW(),NOW(),'$os','$clienid')";
$resultado_usuario = mysqli_query($conect, $result_usuario);
if(mysqli_insert_id($conect)){
	header('location: checklistview.php?id=' . urlencode($_GET['id']) );
}