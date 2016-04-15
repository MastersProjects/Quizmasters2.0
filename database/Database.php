<?php
require_once 'Table_ANSWER.php';
require_once 'Table_CATEGORY.php';
require_once 'Table_QUESTION.php';
require_once 'Table_SOLVED_QUIZ.php';
require_once 'Table_SOLVED_QUIZ_QUESTION.php';
require_once 'Table_USER.php';
require_once '/../model/User.php';
require_once '/../model/Quiz.php';
require_once '/../model/Question.php';
require_once '/../model/Answer.php';
require_once '/../model/AnsweredQuestion.php';

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
	private $TABLE_QUESTION;
	private $TABLE_SOLVED_QUIZ;
	private $TABLE_SOLVED_QUIZ_QUESTION;
	private $TABLE_USER;
	
	private function __construct() {
		$this->TABLE_ANSWER = new Table_ANSWER();
		$this->TABLE_CATEGORY = new Table_CATEGORY();
		$this->TABLE_QUESTION = new Table_QUESTION();
		$this->TABLE_SOLVED_QUIZ = new Table_SOLVED_QUIZ();
		$this->TABLE_SOLVED_QUIZ_QUESTION = new Table_SOLVED_QUIZ_QUESTION();
		$this->TABLE_USER = new Table_USER();
	}
	
	static public function getInstance() {
		if (null === self::$instance) {
			self::$instance = new self ();
		}
		return self::$instance;
	}
	
	/**
	 * Set all the information for the connection to the database
	 * @param $serverName serverName on which the DB is located
	 * @param $connectionInfo connectionInfo array with spec for the connection
	 */
	public function setConnectionInfo($serverName, $connectionInfo) {
		$this->serverName = $serverName;
		$this->connectionInfo = $connectionInfo;
	}
	
	/**
	 * Open conenction for query
	 * @return returns the connection for DB
	 */
	public function openConn(){
		$this->connection = sqlsrv_connect( $this->serverName, $this->connectionInfo);
		
		if( !($this->connection) ) {
			echo "Connection could not be established.<br />";
			die( print_r( sqlsrv_errors(), true));
		}
		return $this->connection;
	}
	
	/**
	 * Function to test the input
	 * @param $data
	 * @return data prepared for database
	 */
	private function test_input($data) {
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		$data = addslashes($data);
		return $data;
	}
	
	//Close connection afer query was executed
	public function closeConn(){
		sqlsrv_close($this->connection);
	}
	
	/**
	 * Login function
	 * @param $username
	 * @param $password
	 * @return true if login succeded, false if failed
	 */
	public function login($username, $password) {
		$result = $this->TABLE_USER->getUser($this->test_input($username));
 		$result = sqlsrv_fetch_array ($result);
 		
		if($result['Password'] == md5($password)){
			$user = new User($result['Username'], $result['Firstname'], $result['Lastname'], $result['ID_User'], $result['Email'], $result['Profile_Img']);
			$this->closeConn();
			
			$user->__SET('points', $this->getPointsUser($user->__GET('userID')));
			$_SESSION['login'] = true;
			$_SESSION['user'] = serialize($user);
			return true;
		} else {
			$this->closeConn();
			return false;
		}
	}

	/**
	 * Check if username is already in database
	 * @param $username
	 * @return true if user isn't in database,
	 * false if it's already in the db 
	 */
	public function checkUser($username) {
		$result = $this->TABLE_USER->getUser($this->test_input($username));
		
		if(sqlsrv_has_rows($result) == true){
			$this->closeConn();
			return true;
		} else {
			$this->closeConn();
			return false;
		}
	}
	
	/**
	 * Function to get a user from the database
	 * @param  $username
	 */
	public function getUser($username) {
		$result = $this->TABLE_USER->getUser($this->test_input($username));
		$result = sqlsrv_fetch_array ($result);
		$user = new User($result['Username'], $result['Firstname'], $result['Lastname'], $result['ID_User'], $result['Email'], $result['Profile_Img']);
		$this->closeConn();
		$user->__SET('points', $this->getPointsUser($user->__GET('userID')));
		return $user;
	}
	
	
	/**
	 * function for the registration
	 * @param $username
	 * @param $firstname
	 * @param $lastname
	 * @param $email
	 * @param $password
	 * @return true if registration success, false if fail
	 */
	public function registration($username, $firstname, $lastname, $email, $password) {
		if(!($this->checkUser($username))){
			$res = $this->TABLE_USER->registration($this->test_input($username), $this->test_input($firstname), $this->test_input($lastname), $this->test_input($email), md5($this->test_input($password)));
			$this->closeConn();
			$this->login($username, $password);
			return true;
		} else {
			return false;
		}
	}
	
	/**
	 * function to change the password for a user
	 * @param $password
	 */
	public function changePwd($password){
		$this->TABLE_USER-> changePwd(md5($this->test_input($password)), unserialize($_SESSION['user'])->__GET('username'));
		$this->closeConn();
	}
	
	/**
	 * function to update the user data
	 * @param $username new username
	 * @param $firstname new firstname
	 * @param $lastname new lastname
	 * @param $email new email
	 * @return true if success false if fail
	 */
	public function userUpdate($username, $firstname, $lastname, $email) {
		$user = unserialize($_SESSION['user']);
		
		if(!($user->__GET('username') == $this->test_input($username))){
			$duplicate = $this->checkUser($username);
		} else {
			$duplicate = false;
		}
		if(!($duplicate)){
			$res = $this->TABLE_USER->userUpdate($user->__GET('username'), $this->test_input($firstname), $this->test_input($lastname), $this->test_input($email), $this->test_input($username));
			$this->closeConn();
			$user->__SET('username', $this->test_input($username));
			$user->__SET('firstname', $this->test_input($firstname));
			$user->__SET('lastname', $this->test_input($lastname));
			$user->__SET('email', $this->test_input($email));
			$_SESSION['user'] = serialize($user);
			return true;
		} else {
			return false;
		}
	}
	
	/**
	 * Function to delete user
	 * @param $username
	 */
	public function deleteUser($username){
		$this->TABLE_USER->deleteUser($username);
		$this->closeConn();
	}
	
	public function getPointsUser($userId){
		$result = $this->TABLE_SOLVED_QUIZ->getPointsUser($userId);
		$result = sqlsrv_fetch_array($result);
		$points = $result['points'];
		$this->closeConn();
		return $points;
	}
	
	/**
	 * Get all categories from Database
	 * @return array with categories
	 */
	public function getAllCategories(){
		$result = $this->TABLE_CATEGORY->getAllCategories();
		
		//Categories array with quiz obj
		$categories = array();
		
		while ($category = sqlsrv_fetch_array($result)){
			$quiz = new Quiz();
			$quiz->__set('category', $category['Category']);
			$quiz->__set('categoryID', $category['ID_Category']);
			$quiz->__set('description', $category['Description']);
			$quiz->__set('img_path', $category['Img_Path']);
			array_push($categories, $quiz);
		}
		$this->closeConn();
		return $categories;
	}
	
	/**
	 * function to create new quiz with questions
	 * @param $id_category
	 * @param $quizes
	 * @return @link{quiz} obeject
	 */
	public function createQuiz($id_category, $quizes) {		
		//Get 10 questions for category
		foreach($quizes as $quiz){
			if ($quiz->__get("categoryID") == $id_category){
				//Get 10 random questions from category
				$questions = array();
				$questions = $this->parseQuiz($this->TABLE_QUESTION->getQuestions($id_category, 1, 4),$questions); //4 'Einfach' Questions			
				$questions = $this->parseQuiz($this->TABLE_QUESTION->getQuestions($id_category, 2, 3),$questions); //3 'Mittel' Questions		
				$questions = $this->parseQuiz($this->TABLE_QUESTION->getQuestions($id_category, 3, 3),$questions); //3 'Schwer' Questions
				
				$quiz->__set('questions', $questions);
				break;
			}
		}
		
		$this->closeConn();

		foreach ($quiz->__get('questions') as $question){
			$result_answer = $this->TABLE_ANSWER->getAnswers($question->__get('questionID'));
			$answers = array();
			while($answer_result = sqlsrv_fetch_array($result_answer)){
				$answer = new Answer();
				$answer->__set('answerID', $answer_result['ID_Answer']);
				$answer->__set('answer', $answer_result['Answer']);
				$answer->__set('correct', $answer_result['Correct']);
				array_push($answers, $answer);
			}
			$question->__set('answers', $answers);
		}
	
		$this->closeConn();
		return $quiz;
	}
	
	/**
	 * Parse Quiz (for createQuiz function)
	 * @return array with @link{question}
	 */
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
	
	public function quizSolved($points, $userID, $gameMode, $categoryID, $answeredQuestions){
		$this->TABLE_SOLVED_QUIZ->quizSolved($points, $userID, $gameMode, $categoryID);
		$solved_quiz_id = $this->getLastId();	
		$this->closeConn();
		$iterator = 0;
		while(count($answeredQuestions)>$iterator){
			$answeredQuestion = $answeredQuestions[$iterator];
			$this->TABLE_SOLVED_QUIZ_QUESTION->questionSolved($answeredQuestion->__get('answeredRight'), $solved_quiz_id, $answeredQuestion->__get('questionID'));
			$this->closeConn();
			$iterator = $iterator +1;
		}
	}

	
	/**
	 * Get the last ID created in current Connection
	 * USE BEFORE CLOSING CONNECTION!!
	 */
	public function getLastId(){
		$result = null;
		if($this->connection != null){
			$query = "SELECT @@IDENTITY";			
			$stmt = sqlsrv_query ($this->connection, $query);
			$result = sqlsrv_fetch_array ($stmt);
		}
		return $result[''];
	}
	
	//Getter
	public function getServerName(){
		return $this->serverName;
	}
	
	/**
	 * Array with Username Points ID_User
	 */
	public function getRanking(){
		$result = $this->TABLE_USER->getRanking();
		$rankingList = array();	
		$iterator = 1;	
		while ($rs = sqlsrv_fetch_array($result)){
			$ranking = array();
			array_push($ranking, $iterator);
			array_push($ranking, $rs['Username']);
			array_push($ranking, $rs['Points']);
			
			array_push($rankingList, $ranking);
			$iterator = $iterator + 1;
			
		}
		$this->closeConn();
		return $rankingList;
	}
}