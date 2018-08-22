<?php
include_once('../model/quiz_form.php');
include_once('technology/Sistema.php');

if (isset($_GET['method'])){

	if($_GET['method'] == 'insert'){
		
		$name = Sistema::getPost('name');
		$description = Sistema::getPost('description');
		
		$q = new Quiz;
		$q->setName($name);
		$q->setDescription($description);
		$q->Insert();
		$handle = $q->getHandle();
		
		if($handle > 0){
			
			$dataReturn = array('sucess'=>'S', 'handle'=>$handle, 'datetime'=>$q->getDateTime());
			echo json_encode($dataReturn);
			
		}
		else{
			$dataReturn = array('sucess'=>'N', 'handle'=>$handle, 'datetime'=>$q->getDateTime());
			echo json_encode($dataReturn);
		}
		
	}//end insert method
	else if($_GET['method'] == 'update'){
		
	}//end insert method
	
} //if (isset($_POST['quiz_form_save']))


?>