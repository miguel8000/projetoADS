<?php
session_start();
include("conexao.php");

if (empty($_POST['usuario']) || empty($_POST['senha'])) {
	header('Location: telaLoginADM.html');
	exit();
}

$login_admin = $_POST['usuario'];
$senha_admin = $_POST['senha'];

$query = "SELECT login_admin FROM admin WHERE login_admin = '{$login_admin}' AND senha_admin = md5('{$senha_admin}')";

$result = mysqli_query($conexao, $query);
$row = mysqli_num_rows($result);

if($row == 1){
	$_SESSION['usuario'] = $login_admin;
	header('Location: telaAdmRelatorio.html');
	exit();
}else{
	$_SESSION['nao_autenticado'] = true;
	header('Location: telaLoginADM.html');
	exit();
}

?>