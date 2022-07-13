<?php
include_once ("../config.php");
$ns= filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
$result_usuario = "UPDATE `checklist` SET `final` = '1' WHERE `checklist`.`id` = '$ns'";
$resultado_usuario = mysqli_query($conect, $result_usuario);
if(true){
    header('location: checklistview.php?id=' . urlencode($_GET['id']) );;
}