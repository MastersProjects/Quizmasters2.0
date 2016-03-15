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
		$query = "SELECT * FROM [QUIZMASTERS].[dbo].[USER] WHERE [username] = ? AND [active] = '1'";
 		
		$connection = Database::getInstance ()->openConn();
 		$params = array($username);
		$stmt = sqlsrv_query ( $connection, $query, $params);
		
		return($stmt);
	}
	
	//Function to register a user
	public function register($username, $firstname, $lastname, $email, $password) {
		$params = array($username, $firstname, $lastname, $email, $password);
		
		$sql = "INSERT INTO [QUIZMASTERS].[dbo].[USER] ([Username]
      	,[Firstname]
      	,[Lastname]
      	,[Password]
      	,[Email]
      	,[Active]) VALUES (?, ?, ?, ?, ?, ?))";
		
		$connection = Database::getInstance ()->openConn();
		sqlsrv_query( $connection, $sql, $params);
	}
}