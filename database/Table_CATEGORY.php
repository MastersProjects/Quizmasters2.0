<?php
require_once 'Database.php';

/**
 * Class for the Table CATEGORY
 * @author Chiramed Phong Penglerd, Luca Marti, Elia Perenzin
 * @version 1.0
 * Quizmasters 2.0 2016
 */
class Table_CATEGORY {

	//TEMPLATE
// 	public function fuctionName() {
// 		$query = "";
// 		$connection = Database::getInstance ()->getConnection ();
// 		$connection->query ( $query );
// 	}
	
	public function getCategories() {
		$query = "SELECT * FROM [dbo].[CATEGORY]";
		$connection = Database::getInstance ()->getConnection ();
		$connection->query ( $query );
		
		$stmt = sqlsrv_query ( $connection, $query);
		
		return($stmt);
	}
	
}