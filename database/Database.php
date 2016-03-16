<?php
require_once 'Table_ANSWER.php';
require_once 'Table_CATEGORY.php';
require_once 'Table_DIFFICULTY.php';
require_once 'Table_GAMEMODE.php';
require_once 'Table_QUESTION.php';
require_once 'Table_SOLVED_QUIZ.php';
require_once 'Table_USER.php';
require_once '/../model/User.php';

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
			$_SESSION['login'] = false;
			return false;
		}
	}
	
	//Register function
	public function registration($username, $firstname, $lastname, $email, $password) {
		$this->TABLE_USER->registration($this->test_input($username), $this->test_input($firstname), $this->test_input($lastname), $this->test_input($email), md5($this->test_input($password)));
		$this->closeConn();
		$this->login($username, $password);
	}
	
	//Get Categories function
	public function getAllCategories(){
		$result = $this->TABLE_CATEGORY->getAllCategories();
		
		//Categories array with quiz obj
		$categories = array();
		
		while ($category = sqlsrv_fetch_array($result)){
			$quiz = new Quiz();
			$quiz->setCategory($category['Category']);
			$quiz->setCategoryID($category['ID_Category']);
			array_push($categories, $quiz);
		}
		$this->closeConn();
		
		return $categories;
	}
	
	//Create Quiz
	public function createQuiz($id_category) {
		/*
		 * get random
		 */
		$quiz = array();
		//Get 10 random questions from category
		$result = $this->TABLE_QUESTION->getQuestions($id_category);
		
		$questions = array();
		$question_id = array();
		//Save every question and question_id into array
		//question_id array is needed for params for answer
		while ($question = sqlsrv_fetch_array($result)){
			array_push($questions, $question);
			array_push($question_id, $question['ID_Question']);
		}
		//Add questions to quiz
		array_push($quiz, $questions);
		
		$this->closeConn();
		
		//Get all answers for the 10 questions
		$result = $this->TABLE_ANSWER->getAnswers($question_id);
	
		$answers = array();
		//Save all answers
		while ($answer = sqlsrv_fetch_array($result)){
			array_push($answers, $answer);
		}
		//Add answers to quiz
		array_push($quiz, $answers);
		
		$this->closeConn();
		return $quiz;
	}
		
	public function getServerName(){
		return $this->serverName;
	}
}