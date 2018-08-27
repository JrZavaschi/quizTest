<?php
header('Content-Type: application/json');
include_once('technology/Sistema.php');
include_once('../model/quiz_form.php');

	$connection = Sistema::getConexao();

    $handle = null;
    $subject = null;
    $description = null;
    $created_at = null;
    $updated_at = null;

	$quiz = $connection->prepare("SELECT A.*, (SELECT COUNT(B.HANDLE) FROM qz_question B WHERE B.QUIZ = A.HANDLE) AS COUNTER FROM `qz_quiz` A WHERE HANDLE = ?") or die('Erro ao selecionar quiz');
    $quiz->bindValue(1, $_GET['h']);
    $quiz->execute();

	$quiz_arr = array();

    $row = $quiz->FETCH(PDO::FETCH_ASSOC);
    		
		$handle = $row['HANDLE'];
		$subject = $row['NAME'];
		$description = $row['DESCRIPTION'];
		$created_at = $row['CREATED_AT'];
		$updated_at = $row['UPDATED_AT'];
		$counter_question = $row['COUNTER'];
		
            $quiz_arr = array(
                        'sucesso' => 'S',
                        'handle' => $handle,
                        'subject' => $subject,
                        'description' => $description,
                        'created_at' => $created_at,
                        'updated_at' => $updated_at,
                        'counter_question' => $counter_question
            );


		echo ( json_encode( $quiz_arr ) );
	
?>