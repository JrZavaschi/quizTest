<?php
header('Content-Type: application/json');

include_once('technology/Sistema.php');
include_once('../model/quiz_question_form.php');

	$question = new Question;
	$question->setHandle(Sistema::getGet('h'));	
	$question->DelQuestion();
	
	if($question->getHandle() > 0){

		$dataReturn = array('sucess'=>'S', 'message'=> 'Success deleted question!');
		echo json_encode($dataReturn);

	}
	else{

		$dataReturn = array('sucess'=>'N', 'message'=> 'Error deleted question!');
		echo json_encode($dataReturn);

	}
?>