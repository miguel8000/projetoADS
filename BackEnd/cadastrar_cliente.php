<?php
session_start();
include("conexao.php");

$nome_cliente = utf8_decode($_POST['nome']);
$sobrenome_cliente = utf8_decode($_POST['sobrenome']);
$nickname_cliente = utf8_decode($_POST['nomeDeUsuario']);
$fone1_cliente = $_POST['fone1'];
$fone2_cliente = $_POST['fone2'];
$email_cliente = utf8_decode($_POST['email']);
$senha_cliente = utf8_decode(md5($_POST['senha']));

$query = "SELECT nickname_cliente FROM cliente WHERE nickname_cliente = '$nickname_cliente";

$result = mysqli_query($conexao, $query);
$row = mysqli_fetch_assoc($result);

if($row['total'] == 1) {
	$_SESSION['usuario_existe'] = true;
	header('Location: ../FrontEnd/cadastro_cliente.html');
	exit;
}

$query = "INSERT INTO cliente(nome_cliente, sobrenome_cliente, nickname_cliente, fone1_cliente, fone2_cliente, email_cliente, senha_cliente) VALUES ('$nome_cliente', '$sobrenome_cliente', '$nickname_cliente', '$fone1_cliente', '$fone2_cliente', '$email_cliente', '$senha_cliente')";

if($conexao->query($query) === TRUE) {
	$_SESSION['status_cadastro'] = true;
	header('Location: ../FrontEnd/cadastro_cliente.html');
	exit;
}

$conexao->close();

?>