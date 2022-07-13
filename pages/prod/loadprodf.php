<?php
session_start();
 
// check o login
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: ../../index.php");
    exit;
}
else {
    $username = $_SESSION['username'];
}

include_once ("../config.php");
$ns= filter_input(INPUT_GET, 'ns', FILTER_SANITIZE_NUMBER_INT);
$consulta ="SELECT * FROM prod WHERE ns = '$ns'";
$contable = $conect->query($consulta);
$v1 = filter_input(INPUT_POST, 'v1', FILTER_SANITIZE_STRING);
$v2 = filter_input(INPUT_POST, 'v2', FILTER_SANITIZE_STRING);
$v3 = filter_input(INPUT_POST, 'v3', FILTER_SANITIZE_STRING);
$v4 = filter_input(INPUT_POST, 'v4', FILTER_SANITIZE_STRING);
$v5 = filter_input(INPUT_POST, 'v5', FILTER_SANITIZE_STRING);
$v6 = filter_input(INPUT_POST, 'v6', FILTER_SANITIZE_STRING);
$v7 = filter_input(INPUT_POST, 'v7', FILTER_SANITIZE_STRING);
$v8 = filter_input(INPUT_POST, 'v8', FILTER_SANITIZE_STRING);
$v9 = filter_input(INPUT_POST, 'v9', FILTER_SANITIZE_STRING);
// Gambiaraaaaaaaaa trocar esse trem o mais rapido possivel
if ($table ["1"] =!"" && $v1 == $username) {
	$result_usuario1 = "
	UPDATE `prod` SET `1` = '$v1'WHERE `prod`.`ns` = '$ns'";
 $resultado_usuario1 = mysqli_query($conect, $result_usuario1);
 

}
if ($table ["2"] =!""  && $v2 == $username) {
	$result_usuario2 = "
	UPDATE `prod` SET `2` = '$v2'WHERE `prod`.`ns` = '$ns'";
 $resultado_usuario2 = mysqli_query($conect, $result_usuario2);
 

}
if ($table ["3"] =!""  && $v3 == $username) {
	$result_usuario3 = "
	UPDATE `prod` SET `3` = '$v3'WHERE `prod`.`ns` = '$ns'";
 $resultado_usuario3 = mysqli_query($conect, $result_usuario3);
 

}
if ($table ["4"] =!""  && $v4 == $username) {
	$result_usuario4 = "
	UPDATE `prod` SET `4` = '$v4'WHERE `prod`.`ns` = '$ns'";
 $resultado_usuario4 = mysqli_query($conect, $result_usuario4);
 

}
if ($table ["5"] =!""  && $v5 == $username) {
	$result_usuario5 = "
	UPDATE `prod` SET `5` = '$v5'WHERE `prod`.`ns` = '$ns'";
 $resultado_usuario5 = mysqli_query($conect, $result_usuario5);
 

}
if ($table ["6"] =!""  && $v6 == $username) {
	$result_usuario6 = "
	UPDATE `prod` SET `6` = '$v6'WHERE `prod`.`ns` = '$ns'";
 $resultado_usuario6 = mysqli_query($conect, $result_usuario6);
 

}
if ($table ["7"] =!""  && $v7 == $username) {
	$result_usuario7 = "
	UPDATE `prod` SET `7` = '$v7'WHERE `prod`.`ns` = '$ns'";
 $resultado_usuario7 = mysqli_query($conect, $result_usuario7);
 

}
if ($table ["8"] =!""  && $v8 == $username) {
	$result_usuario8 = "
	UPDATE `prod` SET `8` = '$v8'WHERE `prod`.`ns` = '$ns'";
 $resultado_usuario8 = mysqli_query($conect, $result_usuario8);
 

}
if ($table ["9"] =!""  && $v9 == $username) {
	$result_usuario9 = "
	UPDATE `prod` SET `9` = '$v9'WHERE `prod`.`ns` = '$ns'";
 $resultado_usuario9 = mysqli_query($conect, $result_usuario9);
 

}
if(true){
	header('location: prodview.php?ns=' . urlencode($_GET['ns']));}
