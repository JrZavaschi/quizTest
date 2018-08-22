<?php
include_once('../model/quiz_question_form.php');
include_once('../model/quiz_answer_form.php');
include_once('technology/Sistema.php');

if (isset($_GET['method'])){

	if($_GET['method'] == 'insert'){
		
		$name = Sistema::getPost("name_question");
		$type = Sistema::getPost("type_question");
		$quiz = Sistema::getPost("quiz_question");
		
		$q = new Question;
		$q->setName($name);
		$q->setType($type);
		$q->setQuiz($quiz);
		$q->Insert();
		
		$handle_question = $q->getHandle();
		
		//answer insert data
		$name_answer = Sistema::getPost('name_answer');
		$is_correct_answer = Sistema::getPost('is_correct_answer');
		
		for($i=0; $i<count($_POST['name_answer']); $i++){
			
			if(isset($_POST['is_correct_answer'][$i])){
				$is_correct_answer_value = 'S';
			}
			else{
				$is_correct_answer_value = 'N';
			}
			
			$a = new Answer;
			$a->setQuestion($handle_question);
			$a->setName($_POST['name_answer'][$i]);
			$a->setIs_correct($is_correct_answer_value);

			$a->Insert();
		}
		
		
		if($handle_question > 0){
			
			$dataReturn = array('sucess'=>'S', 'handle'=>$handle_question, 'type'=>$type, 'name'=>$name, 'answercount'=>$q->getAnswercount(), 'datetime'=>$q->getDateTime());
			echo json_encode($dataReturn);
			
		}
		else{
			$dataReturn = array('sucess'=>'N', 'handle'=>0, 'datetime'=>$q->getDateTime());
			echo json_encode($dataReturn);
		}
		
	}//end insert method
	else if($_GET['method'] == 'update'){
		
	}//end update method
	
	
	
} 


?>