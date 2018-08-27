<?php
header('Content-Type: application/json');

include_once('technology/Sistema.php');
include_once('../model/quiz_form.php');

$handle_quiz = Sistema::getGet('h');
$answer_quiz = Sistema::getPost('answer');
$yourname = Sistema::getPost('yourname');
$youremail = Sistema::getPost('youremail');
$initialized_at = Sistema::getPost('initialized_at');

$connection = Sistema::getConexao();

$executed_quiz = $connection->prepare("INSERT INTO `qz_executed`(`QUIZ`, `NAME`, `EMAIL`, `INITIALIZED_AT`, `COMPLETED_AT`) VALUES (?, ?, ?, ?, ?)") or die('insert executed error');
$executed_quiz->bindValue(1, $handle_quiz);
$executed_quiz->bindValue(2, $yourname);
$executed_quiz->bindValue(3, $youremail);
$executed_quiz->bindValue(4, $initialized_at);
$executed_quiz->bindValue(5, $datetime);
$executed_quiz->execute();
$connection->commit();

$handle_executed = $connection->lastInsertId();

if($executed_quiz->execute()){
    
    $question = $connection->prepare("INSERT INTO `qz_executed_question`(`EXECUTED`, `QUESTION`, `IS_CORRECT`) VALUES (?, ?, ?)") or die('insert quiz error');
    $question->bindValue(1, $handle_executed);
    $question->bindValue(2, $answer_quiz);
    $question->bindValue(3, null);
    $question->execute();
    $connection->commit();

    if($question->execute()){
        echo json_encode(array('sucess'=>'S'));
    }
}
else{
    echo json_encode(array('sucess'=>'N'));
}


?>