<?php
include_once('technology/Sistema.php');
	
	class Quiz{
		
		private $name;
		private $description;
		public $handle;
		public $created_at;
		public $updated_at;
		
		public function setName($name){
			$this->name = $name;
		}
		
		public function setDescription($description){
			$this->description = $description;
		}
		
		public function setHandle($handle){
			$this->handle = $handle;
		}

		public function setCreated_at($created_at){
			$this->created_at = $created_at;
		}

		public function setUpdated_at($updated_at){
			$this->updated_at = $updated_at;
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

		public function getCreated_at(){
			return $this->created_at;
		}

		public function getUpdated_at(){
			return $this->updated_at;
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

		public function Update(){
			
			$connection = Sistema::getConexao();
			
			$update = $connection->prepare("UPDATE `qz_quiz` 
											 SET `NAME`= ?,
											 `DESCRIPTION`= ?,
											 `UPDATED_AT`= ? 
											 WHERE `HANDLE` = ?");

			$update->bindValue(1, $this->getName());
			$update->bindValue(2, $this->getDescription());
			$update->bindValue(3, $this->getDateTime());
			$update->bindValue(4, $this->getHandle());
			$update->execute();
			
			$connection->commit();
			
			if ($update):
				return true;
			else:
				return false;
			endif;
		}

		public function GetQuizEdit(){
			

			$connection = Sistema::getConexao();
			
			$edit = $connection->prepare("SELECT * FROM `qz_quiz` WHERE HANDLE = ?");
			$edit->bindValue(1, $this->getHandle());
			$edit->execute();
			
			$row_quiz_edit = $edit->FETCH(PDO::FETCH_ASSOC);

			$handle_quiz_edit = $row_quiz_edit['HANDLE'];
			$name_quiz_edit = $row_quiz_edit['NAME'];
			$description_quiz_edit = $row_quiz_edit['DESCRIPTION'];
			$created_at_quiz_edit = $row_quiz_edit['CREATED_AT'];
			$updated_at_quiz_edit = $row_quiz_edit['UPDATED_AT'];
			
			$this->setHandle($handle_quiz_edit);
			$this->setName($name_quiz_edit);
			$this->setDescription($description_quiz_edit);
			$this->setCreated_at($created_at_quiz_edit);
			$this->setUpdated_at($updated_at_quiz_edit);
			
			if ($name_quiz_edit <> ''):
				return true;
			else:
				return false;
			endif;

		}

	}
?>