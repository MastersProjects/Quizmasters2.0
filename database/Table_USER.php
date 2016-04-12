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
	 * Function to get a user from the database
	 * @param $username
	 * @return sql stmt
	 */
	public function getUser($username) {
		$query = "SELECT * FROM [QUIZMASTERS].[dbo].[USER] WHERE [username] = ? AND [active] = '1'";
 		
		$connection = Database::getInstance ()->openConn();
 		$params = array($username);
		$stmt = sqlsrv_query ( $connection, $query, $params);
		
		return($stmt);
	}
	
	/**
	 * Function to register a user
	 * @param $username
	 * @param $firstname
	 * @param $lastname
	 * @param $email
	 * @param $password
	 */
	public function registration($username, $firstname, $lastname, $email, $password) {
		$params = array($username, $firstname, $lastname, $password, $email, 1);
		
		$sql = "INSERT INTO [QUIZMASTERS].[dbo].[USER] ([Username]
      	,[Firstname]
      	,[Lastname]
      	,[Password]
      	,[Email]
      	,[Active]) VALUES (?, ?, ?, ?, ?, ?)";
		
		$connection = Database::getInstance ()->openConn();
		sqlsrv_query( $connection, $sql, $params);
	}
	
	/**
	 * update user data
	 * @param $username
	 * @param $firstname
	 * @param $lastname
	 * @param $email
	 * @param $newUsername
	 */
	public function userUpdate($username, $firstname, $lastname, $email, $newUsername) {
		$params = array($newUsername, $firstname, $lastname, $email, $username);
		
		$sql = "UPDATE [dbo].[USER]
  			SET [Username] = ?
      		,[Firstname] = ?
      		,[Lastname] = ?
      		,[Email] = ?
 			WHERE [Username] = ? and [Active] = '1'";
	
		$connection = Database::getInstance ()->openConn();
		$result = sqlsrv_query( $connection, $sql, $params);
	}
	
	/**
	 * Change password of a user
	 * @param $password
	 * @param $username
	 */
	public function changePwd($password, $username){
		$params = array($password, $username);
		$sql = "UPDATE [dbo].[USER]
  		SET [Password] = ?
 		WHERE [Username] = ? and [Active] = '1'";
		
		$connection = Database::getInstance ()->openConn();
		$stmt = sqlsrv_query ( $connection, $sql, $params);
	}
	
	/**
	 * delete User from database
	 * @param $username
	 */
	public function deleteUser($username){
		$sql = "UPDATE [dbo].[USER]
  		SET [Active] = '0'
 		WHERE [Username] = ?";
		
		$connection = Database::getInstance ()->openConn();
		$params = array($username);
		$stmt = sqlsrv_query ( $connection, $sql, $params);
	}
	
	public function getRanking(){
		$query = "SELECT TOP 10 
		[dbo].[USER].[Username], sum([sq].[Points]) as Points
		FROM [dbo].[USER]
		JOIN [dbo].[SOLVED_QUIZ] as sq 
		ON [USER].[ID_User] = sq.user_id
		WHERE [dbo].[USER].[active] = '1'
		GROUP BY [dbo].[USER].[ID_User], [dbo].[USER].[Username]
		ORDER BY Points DESC";
		$connection = Database::getInstance ()->openConn();
		$stmt = sqlsrv_query ( $connection, $query);		
		return($stmt);
	}
}