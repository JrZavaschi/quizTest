<?php
include_once('technology/Sistema.php');
	
	class Question{
		
		private $name;
		private $type;
		private $quiz;
		private $handle;
		private $answercount;
		private $created_at;
		private $updated_at;
		private $questioncount;
		
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

		public function setQuestioncount($questioncount){
			$this->questioncount = $questioncount;
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

		public function getQuestioncount(){
			return $this->questioncount;
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

		public function GetQuestion(){
			
			$connection = Sistema::getConexao();
			
			$question = $connection->prepare("SELECT A.`HANDLE`, 
											  A.`QUIZ`, 
											  A.`TYPE`, 
											  A.`CREATED_AT`, 
											  A.`UPDATED_AT`,
											  A.`NAME`, 
											  (SELECT COUNT(X.HANDLE) FROM qz_question X WHERE X.QUIZ = A.QUIZ) AS COUNTER 
											  FROM `qz_question` A 
											  WHERE A.QUIZ = ?
											  GROUP BY A.`HANDLE`, A.`QUIZ`, A.`TYPE`, A.`CREATED_AT`, A.`UPDATED_AT`, A.`NAME`");
			
			$question->bindValue(1, $this->getQuiz());
			$question->execute();

			while($row_question = $question->FETCH(PDO::FETCH_ASSOC)){
				
				$handle_question = $row_question['HANDLE'];
				$name_question = $row_question['NAME'];
				$type_question = $row_question['TYPE'];
				$created_at_question = $row_question['CREATED_AT'];
				$updated_at_question = $row_question['UPDATED_AT'];
				$counter_question = $row_question['COUNTER'];
				
				$this->setHandle($handle_question);
				$this->setName($name_question);
				$this->setType($type_question);
				$this->setCreated_at($created_at_question);
				$this->setUpdated_at($updated_at_question);
				$this->setQuestioncount($counter_question);

				if ($name_question <> ''){
					return true;
				}else{
					return false;
				}
			}

		}

		public function DelQuestion(){
			
			$connection = Sistema::getConexao();
			
			$del = $connection->prepare("DELETE FROM `qz_question`  WHERE HANDLE = ?");
			
			$del->bindValue(1, $this->getHandle());
			$del->execute();
		
			$connection->commit();

			if ($del->execute()){
				return true;
			}else{
				return false;
			}
		}
			
	}
?>