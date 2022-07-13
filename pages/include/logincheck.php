<?php
session_start();
// check o login
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: ../../index.php");
    exit;}
else {$username = $_SESSION['username'];}
?>