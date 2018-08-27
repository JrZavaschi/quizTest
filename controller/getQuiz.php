<?php
include_once('technology/Sistema.php');
include_once('../model/quiz_form.php');

	$q_edit = new Quiz;
	$q_edit->setHandle(Sistema::getGet('h'));
	$q_edit->GetQuizEdit();

	if($q_edit->getHandle() > 0){
		$dataReturn = array('sucess'=>'S', 'handle'=>$q_edit->getHandle(), 'name'=>$q_edit->getName(), 'description'=>$q_edit->getDescription(), 'created_at'=>$q_edit->getCreated_at(), 'updated_at'=>$q_edit->getUpdated_at());
		echo json_encode($dataReturn);
	}
	else{
		$dataReturn = array('sucess'=>'N', 'handle'=>$q_edit->getHandle());
		echo json_encode($dataReturn);
	}
?>