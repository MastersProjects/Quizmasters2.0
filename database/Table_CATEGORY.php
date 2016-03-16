<?php
require_once 'Database.php';

/**
 * Class for the Table CATEGORY
 * @author Chiramed Phong Penglerd, Luca Marti, Elia Perenzin
 * @version 1.0
 * Quizmasters 2.0 2016
 */
class Table_CATEGORY {

	public function getAllCategories() {
		$query = "SELECT * FROM [QUIZMASTERS].[dbo].[CATEGORY] WHERE [Active] = '1'";
		$connection = Database::getInstance ()->openConn ();		
		$stmt = sqlsrv_query ( $connection, $query);
		
		return($stmt);
	}
	
}