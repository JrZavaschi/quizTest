<?php
include_once('technology/Sistema.php');
	
	class Question{
		
		private $name;
		private $type;
		private $quiz;
		private $handle;
		private $answercount;
		
		public function setName($name){
			$this->name = $name;
		}
		
		public function setType($type){
			$this->type = $type;
		}
		
		public function setQuiz($quiz){
			$this->quiz = $quiz;
		}
		
		public function setHandle($handle){
			$this->handle = $handle;
		}
		
		public function setAnswercount($answercount){
			$connection = Sistema::getConexao();
			
			$select = $connection->prepare("SELECT COUNT(HANDLE) AS COUNTER FROM qz_answer WHERE QUESTION = ?");
			
			$select->bindValue(1, $this->getHandle()());
			$select->execute();
			$row = $select->fetchObject(__CLASS__);
			return($row['COUNTER']);
		}
		
		public function getName(){
			return $this->name;
		}
		
		public function getType(){
			return $this->type;
		}
		
		public function getQuiz(){
			return $this->quiz;
		}
		
		public function getHandle(){
			return $this->handle;
		}
		
		public function getAnswercount(){
			return $this->answercount;
		}
		
		public function getDateTime(){
			return date('Y-m-d H:i:s');
		}
		
		public function Insert(){
			
			$connection = Sistema::getConexao();
			
			$inserir = $connection->prepare("INSERT INTO `qz_question`(`NAME`, `TYPE`, `QUIZ`, `CREATED_AT`) VALUES (?, ?, ?, ?)");
			
			$inserir->bindValue(1, $this->getName());
			$inserir->bindValue(2, $this->getType());
			$inserir->bindValue(3, $this->getQuiz());
			$inserir->bindValue(4, $this->getDateTime());
			$inserir->execute();
			
			$handle_question_insert = $connection->lastInsertId();
			
			$connection->commit();
			
			$this->setHandle($handle_question_insert);
			
			if ($handle_question_insert > 0):
				return true;
			else:
				return false;
			endif;
		}

	}
?>