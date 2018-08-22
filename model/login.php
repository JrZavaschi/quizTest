<?php
include_once('technology/Sistema.php');
	class login{
		
		private $login;
		private $password;
		
		public function setLogin($login){
			$this->login = $login;
		}
		
		public function setpassword($password){
			$this->password = $password;
		}
		
		public function getLogin(){
			return $this->login;
		}
		
		public function getpassword(){
			return md5($this->password);
		}
		
		public function logar(){
			
			$connection = Sistema::getConexao();
			
			$logar = $connection->prepare("SELECT * FROM MS_LOGIN WHERE LOGIN = ? AND PASSWORD = ?");
			$logar->bindValue(1, $this->getLogin());
			$logar->bindValue(2, $this->getpassword());
			$logar->execute();
			
			if ($logar->rowCount() == 1):
				$dados = $logar->fetch(PDO::FETCH_OBJ);
				$_SESSION['logado'] = true;
				return true;
			else:
				return false;
			endif;
		}
		public static function deslogar() {
			if(isset($_SESSION['logado'])):
				unset($_SESSION['logado']);
				session_destroy();
				header("Location: login.php");
			endif;
		}
	}
?>