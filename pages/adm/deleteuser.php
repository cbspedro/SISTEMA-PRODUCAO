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
$consulta ="SELECT * FROM users WHERE id = '$id'; ";
$con = $conect->query($consulta);
while ($cont = $con->fetch_array()) {
  $result_usuario = "DELETE FROM users WHERE `users`.`id` = $id";
$resultado_usuario = mysqli_query($conect, $result_usuario);}
if(true){
  header('location: users.php?');
}