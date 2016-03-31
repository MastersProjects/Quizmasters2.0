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
	$params = array($id_category, '1', $id_difficulty);

	$query = "SELECT TOP ".$amount." [ID_Question],[Question],[Points]
				FROM [QUIZMASTERS].[dbo].[QUESTION]
				JOIN [QUIZMASTERS].[dbo].[DIFFICULTY] 
				ON [QUIZMASTERS].[dbo].[QUESTION].Difficulty_ID = [QUIZMASTERS].[dbo].[DIFFICULTY].ID_Difficulty
				WHERE [Category_ID] = ? AND [Active] = ? AND [Difficulty_ID] = ?
				ORDER BY NEWID();";
		
		$connection = Database::getInstance ()->openConn();
		$stmt = sqlsrv_query($connection, $query, $params);
		
		return($stmt);
	}
	
}