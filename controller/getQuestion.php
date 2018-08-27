<?php
header('Content-Type: application/json');

include_once('technology/Sistema.php');
include_once('../model/quiz_question_form.php');

	$question = new Question;
	$question->setQuiz(Sistema::getGet('q'));	
	$question->GetQuestion();
	
	if($question->getHandle() > 0){

		$dataReturn = array('sucess'=>'S', 'handle'=>$question->getHandle(), 'name'=>$question->getName(), 'type'=>$question->getType(), 'created_at'=>$question->getCreated_at(), 'updated_at'=>$question->getUpdated_at());
		echo json_encode($dataReturn);

	}
	else{

		$dataReturn = array('sucess'=>'N', 'handle'=>$question->getHandle());
		echo json_encode($dataReturn);

	}
?>