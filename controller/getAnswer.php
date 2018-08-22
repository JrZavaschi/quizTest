<?php
include_once('technology/Sistema.php');

	$connection = Sistema::getConexao();

		$handle = null;
		$subject = null;
		$description = null;
		$created_at = null;
        $updated_at = null;
        
		$handle_question = Sistema::getGet('h');

    $answer = $connection->prepare("SELECT NAME, IS_CORRECT, CREATED_AT, UPDATED_AT, HANDLE FROM `qz_answer` WHERE QUESTION = $handle_question") or die('Erro ao selecionar question');

	$answer->execute();

	$answer_arr = array();

	while($row = $answer->FETCH(PDO::FETCH_ASSOC))  {
		
		$subject = $row['SUBJECTQUIZ'];
		$description = $row['DESCRIPTIONQUIZ'];
		$handle = $row['HANDLEQUESTION'];
		$type = $row['TYPEQUESTION'];
		$name = $row['NAMEQUESTION'];
		$created_at = $row['CREATED_AT'];
		$updated_at = $row['UPDATED_AT'];
		
			   $answer_arr[] = array(
							'sucesso' => 'S',
							'handle' => $handle,
							'subject' => $subject,
							'name' => $name,
							'description' => $description,
				   			'created_at' => $created_at,
				   			'updated_at' => $updated_at,
				   			'type' => 'radiogroup'
				);

    }
    $json = preg_replace('/"([a-zA-Z_]+[a-zA-Z0-9_]*)":/','$1:', $json);
    echo ( json_encode( $answer_arr ) );
?>