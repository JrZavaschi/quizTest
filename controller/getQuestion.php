<?php
header('Content-Type: application/json');

include_once('technology/Sistema.php');

	$connection = Sistema::getConexao();

	$handle = null;
	$subject = null;
	$description = null;
	$created_at = null;
	$updated_at = null;
	
	$handle_quiz = Sistema::getGet('h');

    $question = $connection->prepare("SELECT B.NAME SUBJECTQUIZ, 
                                      B.DESCRIPTION DESCRIPTIONQUIZ, 
                                      A.HANDLE HANDLEQUESTION, 
                                      A.TYPE TYPEQUESTION, 
                                      A.NAME NAMEQUESTION, 
                                      A.CREATED_AT, 
                                      A.UPDATED_AT
                                      FROM qz_question A 
                                      LEFT JOIN qz_quiz B ON B.HANDLE = A.QUIZ
                                      WHERE B.HANDLE = $handle_quiz") or die('Erro ao selecionar question');

	$question->execute();

	$question_arr = array();

	$question_arr[] = array(
		"questions" => array(
						   "type" => "html",
						   "html" =>  'TestQUIZ'
						)		
   );
   
	while($row = $question->FETCH(PDO::FETCH_ASSOC))  {
		
		$subject = $row['SUBJECTQUIZ'];
		$description = $row['DESCRIPTIONQUIZ'];
		$handle_question = $row['HANDLEQUESTION'];
		$type = $row['TYPEQUESTION'];
		$name = $row['NAMEQUESTION'];
		$created_at = $row['CREATED_AT'];
		$updated_at = $row['UPDATED_AT'];

		if($type == 'Unique'){
			$type_convert = 'radiogroup';
		}
		if($type == 'Multiple'){
			$type_convert = 'multipletext';
		}

		$answer = $connection->prepare("SELECT * FROM `qz_answer` WHERE QUESTION = $handle_question") or die('Erro ao selecionar answer');

		$answer->execute();

		$answer_arr = array();
		$correct_answer = array();

		while($row_answer = $answer->FETCH(PDO::FETCH_ASSOC))  {
			
			$handle_answer = $row_answer['HANDLE'];
			$is_correct = $row_answer['IS_CORRECT'];
			$name_answer = $row_answer['NAME'];

			if($is_correct = 'S'){
				$correct_answer[] = $name_answer;
			}

			$answer_arr[] = array($name_answer);		
		 
		}

		$question_arr[] = array(
						 "questions" => array(
											"type" => $type_convert,
											"name" => $subject,
											"title" => $name,
											"html" => $subject,
											"choices" => [
												"1750-1800", "1800-1850", "1850-1900", "1900-1950", "after 1950"
											],
											"correctAnswer" => "after 1950" //$correct_answer
					 					)		
					);
					
	}
	
	$json = array(
		array(
			"title" => $subject,
			"description" => $description,
			"showProgressBar" => "bottom",
			"showTimerPanel" => "top",
			"maxTimeToFinishPage" => 10,
			"maxTimeToFinish" => 25,
			"firstPageIsStarted" => true,
			"startSurveyText" => "Start Quiz",
			"pages" =>  $question_arr	
		)
		//"completedHtml" => "Finish!!!"
	);
	
	$json = array_values($json);
	//echo ( json_encode( $json, JSON_PRETTY_PRINT ) );
echo json_encode( $json );
	
?>