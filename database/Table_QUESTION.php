<?php
require_once 'Database.php';

/**
 * Class for the Table QUESTION
 * @author Chiramed Phong Penglerd, Luca Marti, Elia Perenzin
 * @version 1.0
 * Quizmasters 2.0 2016
 */
class Table_QUESTION {

public function getQuestions($id_category) {
	$params = array($id_category, '1');
	
	$query = "SELECT TOP 10 [ID_Question]
      	,[Question]
      	,[Difficulty_ID]
      	,[Category_ID]
      	,[Active]
  		FROM [QUIZMASTERS].[dbo].[QUESTION]
  		WHERE [Category_ID] = ? AND [Active] = ?
  		ORDER BY NEWID()";
		
		$connection = Database::getInstance ()->openConn();
		$stmt = sqlsrv_query($connection, $query, $params);
		
		return($stmt);
	}
	
}