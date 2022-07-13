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
$prio = filter_input(INPUT_POST, 'prio', FILTER_SANITIZE_STRING);
$obs= filter_input(INPUT_POST, 'obs', FILTER_SANITIZE_STRING);
$clienid= filter_input(INPUT_POST, 'clienid', FILTER_SANITIZE_STRING);
$result_usuario1 = "INSERT INTO ocp SET tec='$username',type='prod'";
$resultado_usuario1 = mysqli_query($conect, $result_usuario1);
$consulta1 ="SELECT * FROM ocp WHERE (tec='$username'AND type='prod') ORDER BY data DESC LIMIT 1";
$con1 = $conect->query($consulta1);
while ($cont1 = $con1->fetch_array()){$ocp = $cont1['ocp'];}


$result_usuario = "INSERT INTO `prod` (`ocp`,`clienid`, `1`, `2`, `3`, `4`, `5`, `6`, `7`, `8`, `9`, `embalada`, `prio`, `data`, `obs`) VALUES ('$ocp','$clienid', '', '', '', '', '', '', '', '','', '0', '$prio', CURRENT_TIMESTAMP, '$obs');";
$resultado_usuario = mysqli_query($conect, $result_usuario);
if(true){
	header('location: prod.php');
}