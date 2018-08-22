<?php
include_once('../model/login.php');

	if (isset($_POST['logar'])){
			$login = filter_input(INPUT_POST, "login", FILTER_SANITIZE_MAGIC_QUOTES);
			$password = filter_input(INPUT_POST, "password", FILTER_SANITIZE_MAGIC_QUOTES);
			$l = new Login;
			$l->setLogin($login);
			$l->setSenha($password);
			if($l->logar()){
				header("Location: index.php");
			}else{
				$erro = "Erro ao logar!";
				return $erro;
			}
	}

	if(isset($_SESSION['logado'])){
		header("Location: index.php");
	}
?>