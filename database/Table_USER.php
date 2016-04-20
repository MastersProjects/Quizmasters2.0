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
		$query = "SELECT * FROM USER 
		WHERE username = '$username' AND active = '1'";
 		
		$connection = Database::getInstance ()->openConn();
		$stmt = $connection->query ( $query );
		return $stmt;
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
		$connection = Database::getInstance ()->openConn();
		$stmt = $connection->prepare("INSERT INTO USER (Username
      	,Firstname
      	,Lastname
      	,Password
      	,Email
      	,Active) VALUES (?, ?, ?, ?, ?, 1)");
		
		$stmt->bind_param('sssss', $username, $firstname, $lastname, $password, $email);
		$stmt->execute();
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
		$connection = Database::getInstance ()->openConn();
		$stmt = $connection->prepare("UPDATE USER
  			SET Username = ?
      		,Firstname = ?
      		,Lastname = ?
      		,Email = ?
 			WHERE Username = ? and Active = '1'");
	
		$stmt->bind_param("sssss", $newUsername, $firstname, $lastname, $email, $username);
		$stmt->execute();
	}
	
	/**
	 * Change password of a user
	 * @param $password
	 * @param $username
	 */
	public function changePwd($password, $username){
		$connection = Database::getInstance ()->openConn();
		$stmt = $connection->prepare("UPDATE USER
  		SET Password = ?
 		WHERE Username = ? and Active = '1'");
		
		$stmt->bind_param("ss", $password, $username);
		$stmt->execute();
	}

	/**
	 * delete User from database
	 * @param $username
	 */
	public function deleteUser($username){
		$query = "UPDATE USER
  		SET Active = '0'
 		WHERE Username = '$username'";
		
		$connection = Database::getInstance ()->openConn();
		$stmt = $connection->query ( $query );
	}
	
	public function getRanking(){
		$query = "SELECT Username, sum(Points) as Points
		FROM USER
		JOIN SOLVED_QUIZ as sq 
		ON ID_User = sq.user_id
		WHERE USER.active = '1'
		GROUP BY ID_User, Username
		ORDER BY Points DESC
		LIMIT 10";
		
		$connection = Database::getInstance ()->openConn();
		$stmt = $connection->query ( $query );
		return($stmt);
	}
}