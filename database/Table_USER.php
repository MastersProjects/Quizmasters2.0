<?php
require_once 'Database.php';

/**
 * Class for the Table USER
 * @author Chiramed Phong Penglerd, Luca Marti, Elia Perenzin
 * @version 1.0
 * Quizmasters 2.0 2016
 */
class Table_USER {
	/**
	 * @todo Username with the variable $username
	 */
	//Function to get a user from the database
	public function getUser($username) {
		$query = "SELECT * FROM [QUIZMASTERS].[dbo].[USER] WHERE [username] = 'zperee' AND [active] = '1'";
 		$connection = Database::getInstance ()->openConn();
		$stmt = sqlsrv_query ( $connection, $query );
		
		return($stmt);
	}
}