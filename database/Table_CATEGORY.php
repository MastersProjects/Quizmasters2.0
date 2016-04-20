<?php
require_once 'Database.php';

/**
 * Class for the Table CATEGORY
 * @author Chiramed Phong Penglerd, Luca Marti, Elia Perenzin
 * @version 1.0
 * Quizmasters 2.0 2016
 */
class Table_CATEGORY {

	/**
	 * Get all active categories
	 * @return sql stmt
	 */
	public function getAllCategories() {
		$query = "SELECT * FROM CATEGORY WHERE Active = '1'";
		$connection = Database::getInstance ()->openConn ();		
		
		$connection = Database::getInstance ()->openConn();
		$stmt = $connection->query ( $query );
		
		return $stmt;
	}	
}