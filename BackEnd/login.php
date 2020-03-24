<?php
session_start();
include("conexao.php");

if (empty($_POST['login']) || empty($_POST['senha'])) {
	header('Location: ../FrontEnd/area_login.html');
	exit();
}

$login_ = $_POST['login'];
$senha_ = $_POST['senha'];

$query = "SELECT login_admin FROM admin WHERE login_admin = '{$login_}' AND senha_admin = md5('{$senha_}')";
$query2 = "SELECT nickname_cliente FROM cliente WHERE nickname_cliente = '{$login_}' AND senha_cliente = md5('{$senha_}')";

$result = mysqli_query($conexao, $query);
$row = mysqli_num_rows($result);
$result2 = mysqli_query($conexao, $query2);
$row2 = mysqli_num_rows($result2);

if($row == 1){
	$_SESSION['usuario'] = $login_;
	header('Location: ../FrontEnd/area_adm.html');
	exit();
}elseif($row2 == 1){
	$_SESSION['usuario'] = $login_;
	header('Location: ../FrontEnd/cadastro_servico.html');
	exit();
}else{
	$_SESSION['nao_autenticado'] = true;
	header('Location: ../FrontEnd/area_login.html');
	exit();
}

?>