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
		$params = array($solvedQuizID, $questionID, $answeredRight);
		$sql = "INSERT INTO [dbo].[SOLVED_QUIZ_QUESTION]
		([SolvedQuiz_ID]
		,[Question_ID]
		,[Answered_right])
		VALUES (?, ?, ?)";
	
		$connection = Database::getInstance ()->openConn();
		sqlsrv_query($connection, $sql, $params);
		
	}
}