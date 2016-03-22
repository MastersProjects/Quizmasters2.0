<?php
require_once 'Table_ANSWER.php';
require_once 'Table_CATEGORY.php';
require_once 'Table_DIFFICULTY.php';
require_once 'Table_GAMEMODE.php';
require_once 'Table_QUESTION.php';
require_once 'Table_SOLVED_QUIZ.php';
require_once 'Table_USER.php';
require_once '/../model/User.php';
require_once '/../model/Quiz.php';
require_once '/../model/Question.php';
require_once '/../model/Answer.php';

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
	
	
	public function checkUser($username) {
		$result = $this->TABLE_USER->getUser($this->test_input($username));
		$result = sqlsrv_has_rows($result);
		$this->closeConn();
		return($result);
		
	}
	
	//Register function
	public function registration($username, $firstname, $lastname, $email, $password) {
		$result = $this->TABLE_USER->getUser($this->test_input($username));
		$hasRows = sqlsrv_has_rows ($result);
			
		$this->closeConn();
		
		if(!($hasRows)){
			$res = $this->TABLE_USER->registration($this->test_input($username), $this->test_input($firstname), $this->test_input($lastname), $this->test_input($email), md5($this->test_input($password)));
			echo 'true';
			return $this->login($username, $password);
		} else {
			echo 'false';
			return false;
		}
		$this->closeConn();
	}
	
	//Get Categories function
	public function getAllCategories(){
		$result = $this->TABLE_CATEGORY->getAllCategories();
		
		//Categories array with quiz obj
		$categories = array();
		
		while ($category = sqlsrv_fetch_array($result)){
			$quiz = new Quiz();
			$quiz->__set('category', $category['Category']);
			$quiz->__set('categoryID', $category['ID_Category']);
			array_push($categories, $quiz);
		}

		$this->closeConn();
		
		return $categories;
	}
	
	//Create Quiz
	public function createQuiz($id_category, $quizes) {		
		//Get 10 questions for category
		foreach($quizes as $quiz){
			if ($quiz->__get("categoryID") == $id_category){
				//Get 10 random questions from category
				$questions = array();
				echo $questions;
				$questions = $this->parseQuiz($this->TABLE_QUESTION->getQuestions($id_category, 4, 1),$questions); //4 'Einfach' Questions
				echo $questions;
				$questions = $this->parseQuiz($this->TABLE_QUESTION->getQuestions($id_category, 3, 2),$questions); //3 'Mittel' Questions
				echo $questions;
				$questions = $this->parseQuiz($this->TABLE_QUESTION->getQuestions($id_category, 3, 3),$questions); //3 'Schwer' Questions
				echo $questions;
				
				$quiz->__set('questions', $questions);
				break;
			}
		}
		
		$this->closeConn();

		//Get all the answers for each question
		foreach ($quiz->__get('questions') as $question){
			$result_answer = $this->TABLE_ANSWER->getAnswers($question->__get('questionID'));
			$answers = array();
			while($answer_result = sqlsrv_fetch_array($result_answer)){
				$answer = new Answer();
				$answer->__set('answer', $answer_result['Answer']);
				$answer->__set('correct', $answer_result['Correct']);
				array_push($answers, $answer);
			}
			$question->__set('answers', $answers);
		}
	
		$this->closeConn();
		return $quiz;
	}
	
	//Parse Quiz (for createQuiz function)
	public function parseQuiz($result_question, $questions){
		$newquestions = $questions;
		while ($question_result = sqlsrv_fetch_array($result_question)){
			$question = new Question();
			$question->__set("questionID", $question_result['ID_Question']);
			$question->__set("question", $question_result['Question']);
			$question->__set("points", $question_result['Points']);
				
			array_push($newquestions, $question);
		}
		return $newquestions;
	}
		
	public function getServerName(){
		return $this->serverName;
	}
}