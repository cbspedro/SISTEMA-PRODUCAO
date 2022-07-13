<?php
include_once ("../config.php");
$ns= filter_input(INPUT_GET, 'ns', FILTER_SANITIZE_NUMBER_INT);
$result_usuario = "UPDATE `prod` SET `embalada` = '1' WHERE `prod`.`ns` = '$ns'";
$resultado_usuario = mysqli_query($conect, $result_usuario);
if(true){
	header('location: prodview.php?ns=' . urlencode($_GET['ns']));}