<?php
require_once 'Table_ANSWER.php';
require_once 'Table_CATEGORY.php';
require_once 'Table_DIFFICUTY.php';
require_once 'Table_GAMEMODE.php';
require_once 'Table_QUESTION.php';
require_once 'Table_SOLVED_QUIZ.php';
require_once 'Table_USER.php';

/**
 * This is the controller between the the Database and the modell classes.
 * @author Chiramed Phong Penglerd, Luca Marti, Elia Perenzin
 * @version 1.0
 * Quizmasters 2.0 2016
 */
class Database {
	private $connection;
	private static $instance = null;
	private $TABLE_ANSWER;
	private $TABLE_CATEGORY;
	private $TABLE_DIFFICULTY;
	private $TABLE_GAMEMODE;
	private $TABLE_QUESTION;
	private $TABLE_SOLVED_QUIZ;
	private $TABLE_USER;
	
	private function __construct() {
		$this->TABLE_ANSWER = new Table_ANSWER();
		$this->TABLE_CATEGORY = new Table_CATEGORY();
		$this->TABLE_DIFFICULTY = new Table_DIFFICULTY();
		$this->TABLE_GAMEMODE = new Table_GAMEMODE();
		$this->TABLE_QUESTION = new Table_QUESTION();
		$this->TABLE_QUESTION = new Table_QUESTION();
		$this->TABLE_SOLVED_QUIZ = new Table_SOLVED_QUIZ();
		$this->TABLE_USER = new Table_USER();
	}
	
	// Singelton class
	static public function getInstance() {
		if (null === self::$instance) {
			self::$instance = new self ();
		}
		return self::$instance;
	}
	
	//Function to test the input;
	function test_input($data) {
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		$data = addslashes($data);
		return $data;
	}
	
	// Set all the information for the connection to the database
	public function setConnectionInfo($serverName, $connectionInfo) {
		$this->connection = new sqlsrv_connect ( $serverName, $connectionInfo);
		
		if( !($this->connection) ) {
			echo "Connection could not be established.<br />";
			die( print_r( sqlsrv_errors(), true));
		}
	}
	
	// Returns the mysqli Object with the connection
	public function getConnection() {
		return $this->connection;
	}
	
	// Controller for setUser, the querry is executet in Table_User
	//EXAMPLE
	public function insertUser($facebook_Id, $lastname, $firstname, $email, $gender, $link, $joinDate) {
		if ($this->TABLE_USER->checkDuplicateUser ( $facebook_Id ) == false) {
			// Create boolean for gender
			if ($gender == "male") {
				$gender = 1;
			} else {
				$gender = 0;
			}
			
			// Data is sent to Table_User for execute the query
			$this->TABLE_USER->insertUser ( $facebook_Id, $firstname, $lastname, $email, $gender, $link, $joinDate );
			header ( 'Location: thanks.php' );
		} else {
 			header ( 'Location: alreadyJoined.php' );
		}
	}
}