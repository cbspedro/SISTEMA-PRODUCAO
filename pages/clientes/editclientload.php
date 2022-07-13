<?php
include_once ("../config.php");
$id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
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
$result_usuario = "UPDATE `clientes` SET `nome` = '$nome', `endereco` = '$endereco', `cep` = '$cep', `cidade` = '$cidade', `estado` = '$estado', `contato` = '$contato', `fone` = '$fone', `contato2` = '$contato2', `fone2` = '$fone2', `email` = '$email' WHERE `clientes`.`id` = '$id';";
$resultado_usuario = mysqli_query($conect, $result_usuario);
if(true){
	header('location: clientes.php');
}