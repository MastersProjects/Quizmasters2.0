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
	
	
	public function getFalseRight($userID){
		$params = array($userID);
		$sql = "SELECT COALESCE(sum(CASE WHEN [Answered_right] = 1 THEN 1 ELSE 0 END),0) as true, COALESCE(sum(CASE WHEN [Answered_right] = 0 THEN 1 ELSE 0 END),0) as false
		FROM [dbo].[SOLVED_QUIZ] as sq
		JOIN [dbo].[SOLVED_QUIZ_QUESTION] as sqq ON [ID_SolvedQuiz] = [SolvedQuiz_ID]
		WHERE [SQ].[User_ID] = ?
	  	GROUP BY [sq].[User_ID]";
	
		$connection = Database::getInstance ()->openConn();
		$result = sqlsrv_query($connection, $sql, $params);
		return $result;
	
	}
	
}