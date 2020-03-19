<?php
session_start();
include("conexao.php");

if (empty($_POST['usuario']) || empty($_POST['senha'])) {
	header('Location: loginADM.html');
	exit();
}

$login_admin = $_POST['usuario'];
$senha_admin = $_POST['senha'];
#$nickname_cliente = $_POST['usuario'];
#$senha_cliente = $_POST['senha'];

$query = "SELECT login_admin FROM admin WHERE login_admin = '{$login_admin}' AND senha_admin = md5('{$senha_admin}')";
#$query2 = "SELECT nickname_cliente FROM cliente WHERE nickname_cliente = '{$nickname_cliente}' AND senha_cliente = md5('{$senha_cliente}')";

$result = mysqli_query($conexao, $query);
$row = mysqli_num_rows($result);
#$result2 = mysqli_query($conexao, $query2);
#$row2 = mysqli_num_rows($result2);

if($row == 1){
	$_SESSION['usuario'] = $login_admin;
	header('Location: admArea.html');
	exit();
}/*elseif($row2 == 1){
	$_SESSION['usuario'] = $nickname_cliente;
	header('Location: CadastroServiço.html');
	exit();
}*/else{
	$_SESSION['nao_autenticado'] = true;
	header('Location: loginADM.html');
	exit();
}

?>