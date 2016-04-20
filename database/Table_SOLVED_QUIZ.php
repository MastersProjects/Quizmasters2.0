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
		$connection = Database::getInstance ()->openConn();
		$stmt = $connection->prepare("INSERT INTO SOLVED_QUIZ
		(Points
		,User_ID
		,Gamemode_ID
		,Category_ID)
		VALUES (?, ?, ?, ?)");
		
		$stmt->bind_param("ssss", $points, $userID, $gameMode, $categoryID);
		$stmt->execute();
		return  mysqli_insert_id($connection);
	}
	
	public function getPointsUser($userId){
		$params = array($userId);
		$query = "SELECT SUM(points) as points
		FROM SOLVED_QUIZ 
		WHERE User_ID = $userId";
		
		$connection = Database::getInstance ()->openConn();
		$stmt = $connection->query ( $query );
		return $stmt;
	}
	
	public function getPointsQuiz($userID){
		$params = array($userID);
		$sql = "SELECT Points
		FROM SOLVED_QUIZ
		WHERE User_ID = $userID
		ORDER BY ID_SolvedQuiz";
		
		$connection = Database::getInstance ()->openConn();
		$stmt = $connection->query ( $sql );
		return $stmt;
	}
}