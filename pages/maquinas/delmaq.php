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
$clienid = filter_input(INPUT_GET, 'clienid', FILTER_SANITIZE_NUMBER_INT);
$consulta ="SELECT * FROM users WHERE id = '$id'; ";
$con = $conect->query($consulta);
while ($cont = $con->fetch_array()) {
$result_usuario = "DELETE FROM maquinas WHERE id= '49'";
$resultado_usuario = mysqli_query($conect, $result_usuario);
echo $resultado_usuario ;}
if(false){
  header("location: maquinas.php?id=$clienid");
}