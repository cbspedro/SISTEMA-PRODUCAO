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
include('../config.php');
$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
$date = "SELECT DATE_FORMAT(data,'%d/%m/%Y') AS data_formatada FROM checklist2 LIMIT 1";
$consulta ="SELECT * FROM checklist WHERE id= '$id'LIMIT 1";
$consulta1 ="SELECT * FROM checklist2 WHERE os= '$id' ORDER BY data DESC";
$conprint = $conect->query($consulta);
$act1print = $conect->query($consulta1);
$act2print = $conect->query($date);
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title></title>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
    <script type="text/javascript">
        if(false){

            var printWindow = open('height=400,width=800');
            printWindow.document.write('');
            printWindow.document.close();
            printWindow.print();
        }
    </script>
</head>
</html>