<?php
require_once 'Database.php';

/**
 * Class for the Table QUESTION
 * @author Chiramed Phong Penglerd, Luca Marti, Elia Perenzin
 * @version 1.0
 * Quizmasters 2.0 2016
 */
class Table_QUESTION {

/**
 * get questions with difficulty
 * @param $id_category id from which category
 * @param $id_difficulty id from which difficulty
 * @param $amount amount of questions
 * @return sql stmt 
 */
public function getQuestions($id_category, $id_difficulty, $amount) {
	$query = "SELECT ID_Question, Question, Points
				FROM QUESTION
				JOIN DIFFICULTY
				ON QUESTION.Difficulty_ID = DIFFICULTY.ID_Difficulty
				WHERE Category_ID = '$id_category' AND Active = '1' AND Difficulty_ID = '$id_difficulty'
				ORDER BY RAND()
				LIMIT $amount;";
		$connection = Database::getInstance ()->openConn();
		$stmt = $connection->query ( $query );
	
		return($stmt);
	}
	
	public function getAllQuestions(){
		$query = "Select count(*) as count
		from QUESTION WHERE active = '1'";
	
		$connection = Database::getInstance ()->openConn();
		$stmt = $connection->query ( $query );
	
		return($stmt);
	}
	
}