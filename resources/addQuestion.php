<?php
//TODO Check if user is autorized for this site
require_once '/../model/Quiz.php';
require_once '/../model/Question.php';
require_once '/../model/Answer.php';

// var_dump($_POST);
$questionCounter = 1;
foreach ($_POST as $key => $val) {
 print "$key = $val\n";
}

// 	$answer1 = new Answer();
// 	$answer2 = new Answer();
// 	$answer3 = new Answer();
// 	$answer4 = new Answer();

// 	$answer1->__set('answer', $_POST['answer1']);
// 	$answer2->__set('answer', $_POST['answer2']);
// 	$answer3->__set('answer', $_POST['answer3']);
// 	$answer4->__set('answer', $_POST['answer4']);
// 	$answers = array($answer1, $answer2, $answer3, $answer4);

// 	$question = new Question();
// 	$question->__set('question',  $_POST['question']);
// 	$question->__set('answers', $answers);
// 	$questions = array($question);

// $quiz = new Quiz();
// $quiz->__set('categoryID', $_POST['category']);
// $quiz->__set('questions', $questions);



?>