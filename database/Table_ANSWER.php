<?php
require_once 'Database.php';

/**
 * Class for the Table ANSWER
 * @author Chiramed Phong Penglerd, Luca Marti, Elia Perenzin
 * @version 1.0
 * Quizmasters 2.0 2016
 */
class Table_ANSWER {

/**
 * get the Answers with question_id
 * @param $question_id
 * @return sql stmt
 */
public function getAnswers($question_id) {
	$query = "SELECT ID_Answer
      		,Answer
     		,Correct
      		,Question_ID 
      		FROM ANSWER WHERE Question_ID = $question_id";
	
	$connection = Database::getInstance ()->openConn();
	$stmt = $connection->query ( $query );
	
	return($stmt);
	}
}