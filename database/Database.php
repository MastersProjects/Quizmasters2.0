<?php
require_once 'Table_ANSWER.php';
require_once 'Table_CATEGORY.php';
require_once 'Table_DIFFICULTY.php';
require_once 'Table_GAMEMODE.php';
require_once 'Table_QUESTION.php';
require_once 'Table_SOLVED_QUIZ.php';
require_once 'Table_USER.php';
require_once 'model/User.php';

/**
 * This is the controller between the the Database and the modell classes.
 * @author Chiramed Phong Penglerd, Luca Marti, Elia Perenzin
 * @version 1.0
 * Quizmasters 2.0 2016
 */
class Database {
	private $connection;
	private $connectionInfo = array();
	private $serverName;
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
	
	// Set all the information for the connection to the database
	public function setConnectionInfo($serverName, $connectionInfo) {
		$this->serverName = $serverName;
		$this->connectionInfo = $connectionInfo;
	}
	
	public function openConn(){
		$this->connection = sqlsrv_connect( $this->serverName, $this->connectionInfo);
		
		if( !($this->connection) ) {
			echo "Connection could not be established.<br />";
			die( print_r( sqlsrv_errors(), true));
		}
	
		return $this->connection;
	}
	
	//Function to test the input
	private function test_input($data) {
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		$data = addslashes($data);
		return $data;
	}
	
	public function closeConn(){
		sqlsrv_close($this->connection);
	}
	
	//Login function
	public function login($username, $password) {
		$result = $this->TABLE_USER->getUser($this->test_input($username));
 		$result = sqlsrv_fetch_array ($result);
 		
 		$this->closeConn();
		if($result['Password'] == md5($password)){
			$user = new User($result['Username'], $result['Firstname'], $result['Lastname'], $result['Email']);
			$_SESSION['login'] = true;
			$_SESSION['user'] = $user;
			return true;
		} else {
			return false;
		}
	}
	
	//Register function
	public function register($username, $firstname, $lastname, $email, $password) {
		$this->TABLE_USER->register($this->test_input($username), $this->test_input($firstname), $this->test_input($lastname), $this->test_input($email), md5($this->test_input($password)));
		$this->closeConn();
		$this->login($username, $password);
	}
	
	//Get Categories function
	public function getCategories(){
		$result = $this->TABLE_CATEGORY->getCategories();
		$result = sqlsrv_fetch_array ($result);
		
		$this->closeConn();
		
		echo $result['ID_Category'];
		echo $result['Category'];
	}
	
	public function getServerName(){
		return $this->serverName;
	}
}