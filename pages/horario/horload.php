<?php
header('Content-Type: text/html; charset=UTF-8');
session_start();
include ("../../config.php");
 
// check o login
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: ../index.php");
    exit;
}
else {
    $username = $_SESSION['username'];
}


$consulta ="SELECT * FROM ponto WHERE tec= '$username'";
$contable = $conect->query($consulta);
while ($table = $contable->fetch_array())   { $old = $table['s/e'];}
if ($old == "s" OR $old == "") {
    $type = "e";
}

if ($old == "e") {
    $type = "s";
}



include_once ("../config.php");
$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
$hrs = filter_input(INPUT_POST, 'hrs');
$result_usuario = "INSERT INTO `ponto` (`id`, `tec`, `s/e`, `hrs`) VALUES (NULL, '$username', '$type', '$hrs');";
$resultado_usuario = mysqli_query($conect, $result_usuario);
if(true){
	header('location: ../dash/dashboard.php');
}