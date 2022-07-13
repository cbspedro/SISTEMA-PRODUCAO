<?php
$servidor = "localhost";
$usuario ="root";
$senha = "";
$banco = ""; 
//conect
$conect = mysqli_connect($servidor, $usuario, $senha, $banco)or die;
            ("Não foi possível se conectar ao servidor :(<br>
                Tente conferir as informações de login: <br>
                1)Usuario<BR>
                2)Banco de dados");
                $link = mysqli_connect($servidor, $usuario, $senha, $banco);
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());}

?>