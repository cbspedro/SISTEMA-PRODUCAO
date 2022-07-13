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
$ns = filter_input(INPUT_POST, 'ns', FILTER_SANITIZE_NUMBER_INT);
$result_usuario = "INSERT INTO `maquinas` (`id`, `ns`, `clienid`) VALUES (NULL, '$ns', '$id');";
$resultado_usuario = mysqli_query($conect, $result_usuario);
if(true){
	header('location: maquinas.php?id=' . urlencode($_GET['id']) );
}