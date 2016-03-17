<?php
require_once 'Database.php';

/**
 * Class for the Table ANSWER
 * @author Chiramed Phong Penglerd, Luca Marti, Elia Perenzin
 * @version 1.0
 * Quizmasters 2.0 2016
 */
class Table_ANSWER {

public function getAnswers($question_id) {
	$params = array($question_id);

	$query = "SELECT TOP 1000 [ID_Answer]
      		,[Answer]
     		,[Correct]
      		,[Question_ID]
  			FROM [QUIZMASTERS].[dbo].[ANSWER]
  			WHERE Question_ID = ?";
	
	$connection = Database::getInstance ()->openConn();
	$stmt = sqlsrv_query( $connection, $query, $params);
	
	return($stmt);
	}
}