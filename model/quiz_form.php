<?php
include_once('technology/Sistema.php');
	
	class Quiz{
		
		private $name;
		private $description;
		public $handle;
		
		public function setName($name){
			$this->name = $name;
		}
		
		public function setDescription($description){
			$this->description = $description;
		}
		
		public function setHandle($handle){
			$this->handle = $handle;
		}
		
		public function getName(){
			return $this->name;
		}
		
		public function getDescription(){
			return $this->description;
		}
		
		public function getHandle(){
			return $this->handle;
		}
		
		public function getDateTime(){
			return date('Y-m-d H:i:s');
		}
		
		
		public function Insert(){
			
			$connection = Sistema::getConexao();
			
			$inserir = $connection->prepare("INSERT INTO `qz_quiz`(`NAME`, `DESCTIPTION`, `CREATED_AT`) VALUES (?, ?, ?)");
			$inserir->bindValue(1, $this->getName());
			$inserir->bindValue(2, $this->getDescription());
			$inserir->bindValue(3, $this->getDateTime());
			$inserir->execute();
			
			$handle_quiz_insert = $connection->lastInsertId();
			
			$connection->commit();
			
			$this->setHandle($handle_quiz_insert);
			
			if ($handle_quiz_insert > 0):
				return true;
			else:
				return false;
			endif;
		}

	}
?>