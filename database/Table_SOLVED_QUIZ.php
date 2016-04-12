<?php
require_once 'Database.php';

/**
 * Class for the Table SOLVED_QUIZ
 * @author Chiramed Phong Penglerd, Luca Marti, Elia Perenzin
 * @version 1.0
 * Quizmasters 2.0 2016
 */
class Table_SOLVED_QUIZ {
	public function quizSolved($points, $userID, $gameMode, $categoryID){
		$params = array($points, $userID, $gameMode, $categoryID);
		$sql = "INSERT INTO [dbo].[SOLVED_QUIZ]
		([Points]
		,[User_ID]
		,[Gamemode_ID]
		,[Category_ID])
		VALUES (?, ?, ?, ?)";

		$connection = Database::getInstance ()->openConn();
		sqlsrv_query($connection, $sql, $params);
		
	}
	
	public function getPointsUser($userId){
		$params = array($userId);
		$sql = "SELECT SUM(points) as points
		FROM [dbo].[SOLVED_QUIZ] 
		WHERE [User_ID] = ?";
		
		$connection = Database::getInstance ()->openConn();
		$result = sqlsrv_query($connection, $sql, $params);
		return $result;
	}
}