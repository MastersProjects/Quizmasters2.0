<?php
require_once 'Database.php';

/**
 * Class for the Table SOLVED_QUIZ_QUESTION
 * @author Chiramed Phong Penglerd, Luca Marti, Elia Perenzin
 * @version 1.0
 * Quizmasters 2.0 2016
 */
class Table_SOLVED_QUIZ_QUESTION {
	
	public function questionSolved($answeredRight, $solvedQuizID, $questionID){
		$connection = Database::getInstance ()->openConn();
		$stmt = $connection->prepare("INSERT INTO SOLVED_QUIZ_QUESTION
		(SolvedQuiz_ID
		,Question_ID
		,Answered_right)
		VALUES (?, ?, ?)");
		$stmt->bind_param("sii", $solvedQuizID, $questionID, $answeredRight);
		$stmt->execute();
	}
	
	
	public function getFalseRight($userID){
		$sql = "SELECT count(Answered_right = 1) as t, count(Answered_right = 0 or null) as f
		FROM SOLVED_QUIZ as sq
		JOIN SOLVED_QUIZ_QUESTION as sqq ON ID_SolvedQuiz = SolvedQuiz_ID
		WHERE sq.User_ID = $userID
	  	GROUP BY sq.User_ID";
	
		$connection = Database::getInstance ()->openConn();
		$stmt = $connection->query ( $sql );
		return $stmt;
	}
	
}