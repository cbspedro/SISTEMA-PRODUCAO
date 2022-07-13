<?php
include_once ("../config.php");
$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
$endereco = filter_input(INPUT_POST, 'endereco', FILTER_SANITIZE_STRING);
$cep= filter_input(INPUT_POST, 'cep', FILTER_SANITIZE_STRING);
$cidade = filter_input(INPUT_POST, 'cidade', FILTER_SANITIZE_STRING);
$estado = filter_input(INPUT_POST, 'estado', FILTER_SANITIZE_STRING);
$contato = filter_input(INPUT_POST, 'contato', FILTER_SANITIZE_STRING);
$fone = filter_input(INPUT_POST, 'fone', FILTER_SANITIZE_STRING);
$contato2 = filter_input(INPUT_POST, 'contato2', FILTER_SANITIZE_STRING);
$fone2 = filter_input(INPUT_POST, 'fone2', FILTER_SANITIZE_STRING);
$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);
$tipo = filter_input(INPUT_POST, 'tipo', FILTER_SANITIZE_STRING);
$cpf = filter_input(INPUT_POST, 'cpf', FILTER_SANITIZE_STRING);
$result_usuario = "INSERT INTO `clientes` (`id`, `nome`, `endereco`, `cep`, `cidade`, `estado`, `contato`, `fone`, `contato2`, `fone2`, `email`) 
VALUES (NULL, '$nome', '$endereco', '$cep', '$cidade', '$estado', '$contato', '$fone', '$contato2', '$fone2', '$email');";
$resultado_usuario = mysqli_query($conect, $result_usuario);
if(mysqli_insert_id($conect)){
	header('location: upcliente.php');
}