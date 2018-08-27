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

$handle_quiz = Sistema::getGet('h');

$question = $connection->prepare("SELECT A.HANDLE HANDLEQUESTION, 
                                  A.TYPE TYPEQUESTION, 
                                  A.NAME NAMEQUESTION, 
                                  A.CREATED_AT, 
                                  A.UPDATED_AT
                                  FROM qz_question A 
                                  WHERE A.QUIZ = $handle_quiz") or die('Select question error');

$question->execute();

$question_arr = array();

while($row = $question->FETCH(PDO::FETCH_ASSOC))  {
    
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

        $answer_arr = array($name_answer);		
     
    }

    $question_arr[] = array(
                     "elements" => [array(
                                        "type" => $type_convert,
                                        "name" => $name,
                                        "default" => $name,
                                        "choices" =>  $answer_arr
                                       
                                         , "correctAnswer" => $correct_answer
                                     )	]	
                );
                
}

echo ( json_encode( $question_arr, JSON_PRETTY_PRINT ) );
	
?>