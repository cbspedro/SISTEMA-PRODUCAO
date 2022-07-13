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
$ns = filter_input(INPUT_POST, 'ns', FILTER_SANITIZE_STRING);
$tec = filter_input(INPUT_POST, 'tec', FILTER_SANITIZE_STRING);
$problema = filter_input(INPUT_POST, 'problema', FILTER_SANITIZE_STRING);
$obs = filter_input(INPUT_POST, 'obs', FILTER_SANITIZE_STRING);
$ent = filter_input(INPUT_POST, 'ent', FILTER_SANITIZE_STRING);

$consulta ="SELECT * FROM maquinas WHERE ns='$ns' LIMIT 1";
$con = $conect->query($consulta);

$result_usuario1 = "INSERT INTO ocp SET tec='$username',type='check'";

$resultado_usuario1 = mysqli_query($conect, $result_usuario1);
$consulta1 ="SELECT * FROM ocp WHERE (tec='$username'AND type='check') ORDER BY data DESC LIMIT 1";
$con1 = $conect->query($consulta1);
while ($cont1 = $con1->fetch_array()){$ocp = $cont1['ocp'];}
while ($cont = $con->fetch_array()){$cliente = $cont['clienid'];}

$result_usuario = "INSERT INTO checklist SET ns='$ns',ocp='$ocp',recebido='$username',cliente='$cliente',problema='$problema',obs='$obs',ent='$ent',final='0'";

$resultado_usuario = mysqli_query($conect, $result_usuario);


if(true){
	header("Location: checklist.php");
}