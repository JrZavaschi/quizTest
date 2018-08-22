<?php
include_once('technology/Sistema.php');
	
	class Answer{
		
		private $name;
		private $is_correct;
		private $question;
		private $handle;
		
		public function setName($name){
			$this->name = $name;
		}
		
		public function setIs_correct($is_correct){
			$this->is_correct = $is_correct;
		}
		
		public function setQuestion($question){
			$this->question = $question;
		}
		
		public function setHandle($handle){
			$this->handle = $handle;
		}
		
		public function getName(){
			return $this->name;
		}
		
		public function getIs_correct(){
			return $this->is_correct;
		}
		
		public function getQuestion(){
			return $this->question;
		}
		
		public function getHandle(){
			return $this->handle;
		}
		
		public function getDateTime(){
			return date('Y-m-d H:i:s');
		}
		
		public function Insert(){
			
			$connection = Sistema::getConexao();
			
			$inserir = $connection->prepare("INSERT INTO `qz_answer`(`NAME`, `IS_CORRECT`, `QUESTION`, `CREATED_AT`) VALUES (?, ?, ?, ?)");
			
			$inserir->bindValue(1, $this->getName());
			$inserir->bindValue(2, $this->getIs_correct());
			$inserir->bindValue(3, $this->getQuestion());
			$inserir->bindValue(4, $this->getDateTime());
			$inserir->execute();
			
			$handle_answer_insert = $connection->lastInsertId();
			
			$connection->commit();
			
			$this->setHandle($handle_answer_insert);
			
			if ($handle_answer_insert > 0):
				return true;
			else:
				return false;
			endif;
		}

	}
?>