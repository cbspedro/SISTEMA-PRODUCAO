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
$qtd1 = '0';
$qtd2 = '0';
$qtd3 = '0';
$qtd4 = '0';
include_once ("../config.php");
$cliente = filter_input(INPUT_POST, 'cliente', FILTER_SANITIZE_STRING);
$natureza = filter_input(INPUT_POST, 'natureza', FILTER_SANITIZE_STRING);
$equipamento = filter_input(INPUT_POST, 'equipamento', FILTER_SANITIZE_STRING);
$modelo = filter_input(INPUT_POST, 'modelo', FILTER_SANITIZE_STRING);
$ns = filter_input(INPUT_POST, 'ns', FILTER_SANITIZE_STRING);
$hrsdeuso = filter_input(INPUT_POST, 'hrsdeuso', FILTER_SANITIZE_STRING);
$manutencao = filter_input(INPUT_POST, 'manutencao', FILTER_SANITIZE_STRING);
$lacrado = filter_input(INPUT_POST, 'lacrado', FILTER_SANITIZE_STRING);
$problema = filter_input(INPUT_POST, 'problema', FILTER_SANITIZE_STRING);
$causa = filter_input(INPUT_POST, 'causa', FILTER_SANITIZE_STRING);
$avaltec = filter_input(INPUT_POST, 'avaltec', FILTER_SANITIZE_STRING);
$momento = filter_input(INPUT_POST, 'momento', FILTER_SANITIZE_STRING);
$servexec = filter_input(INPUT_POST, 'servexec', FILTER_SANITIZE_STRING);
$hrsini = filter_input(INPUT_POST, 'hrsini', FILTER_SANITIZE_STRING);
$hrster = filter_input(INPUT_POST, 'hrster', FILTER_SANITIZE_STRING);
$obs = filter_input(INPUT_POST, 'obs', FILTER_SANITIZE_STRING);
$desinf = filter_input(INPUT_POST, 'desinf', FILTER_SANITIZE_STRING);
$materiais1 = filter_input(INPUT_POST, 'materiais1', FILTER_SANITIZE_STRING);
$materiais2 = filter_input(INPUT_POST, 'materiais2', FILTER_SANITIZE_STRING);
$materiais3 = filter_input(INPUT_POST, 'materiais3', FILTER_SANITIZE_STRING);
$materiais4 = filter_input(INPUT_POST, 'materiais4', FILTER_SANITIZE_STRING);
$qtd1 = filter_input(INPUT_POST, 'qtd1', FILTER_SANITIZE_STRING);
$qtd2 = filter_input(INPUT_POST, 'qtd2', FILTER_SANITIZE_STRING);
$qtd3 = filter_input(INPUT_POST, 'qtd3', FILTER_SANITIZE_STRING);
$qtd4 = filter_input(INPUT_POST, 'qtd4', FILTER_SANITIZE_STRING);
$conforme = filter_input(INPUT_POST, 'select', FILTER_SANITIZE_STRING);
$recebemos = filter_input(INPUT_POST, 'recebemos', FILTER_SANITIZE_STRING);
$recebedor = filter_input(INPUT_POST, 'recebedor', FILTER_SANITIZE_STRING);
$recebedorcpf = filter_input(INPUT_POST, 'recebedorcpf', FILTER_SANITIZE_STRING);

$consulta ="SELECT * FROM maquinas WHERE ns='$ns' LIMIT 1";
$con = $conect->query($consulta);

$result_usuario1 = "INSERT INTO ocp SET tec='$username',type='os'";

$resultado_usuario1 = mysqli_query($conect, $result_usuario1);
$consulta1 ="SELECT * FROM ocp WHERE (tec='$username'AND type='os') ORDER BY data DESC LIMIT 1";
$con1 = $conect->query($consulta1);
while ($cont1 = $con1->fetch_array()){$ocp = $cont1['ocp'];}

$result_usuario = "

INSERT INTO `oss`(`id`, `cliente`, `natureza`, `equipamento`, `modelo`, `ns`, `hrsdeuso`, `manutencao`, `lacrado`, `problema`, `causa`, `avaltec`, `momento`, `servexec`, `hrsini`, `hrster`, `desinf`, `obs`, `materiais1`, `qtd1`, `materiais2`, `qtd2`, `materiais3`, `qtd3`, `materiais4`, `qtd4`, `conforme`, `tec`, `recebemos`, `recebedor`, `recebedorcpf`, `data`, `ck`) VALUES (NULL, '$cliente', '$natureza', '$equipamento', '$modelo', '$ns', '$hrsdeuso', '$manutencao', '$lacrado', '$problema', '$causa', '$avaltec', '$momento', '$servexec', '$hrsini', '$hrster', '$desinf', '$obs', '$materiais1', '$qtd1', '$materiais2', '$qtd2', '$materiais3', '$qtd3', '$materiais4', '$qtd4', '$conforme', '$username', '$recebemos', '$recebedor', '$recebedorcpf', CURRENT_TIMESTAMP, '0')";
$resultado_usuario = mysqli_query($conect, $result_usuario);
if(true){
	header("Location: ass.php");
}
