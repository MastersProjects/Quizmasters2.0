<?php
require_once 'Database.php';

/**
 * Class for the Table SOLVED_QUIZ
 * @author Chiramed Phong Penglerd, Luca Marti, Elia Perenzin
 * @version 1.0
 * Quizmasters 2.0 2016
 */
class Table_SOLVED_QUIZ {
	public function questionSolved($answeredRight, $solvedQuizID, $questionID){
		$params = array($answeredRight, $solvedQuizID, $questionID);
		var_dump($params);
		$sql = "INSERT INTO [dbo].[SOLVED_QUIZ_QUESTION]
           ([Answered]
           ,[SolvedQuiz_ID]
           ,[Question_ID])
    		VALUES (?, ?, ?)";
		
		$connection = Database::getInstance ()->openConn();
		$result = sqlsrv_query( $connection, $sql, $params);
		return $result;
	}
}