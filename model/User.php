<?php

/**
 * Model class User. Contains all the informations about an User
 * @author Chiramed Phong Penglerd, Luca Marti, Elia Perenzin
 * @version 1.0
 * Quizmasters 2.0 2016
 */
Class User{
	private $username;
	private $firstname;
	private $lastname;
	private $email;
	private $points = array();
	
	public function __construct($username, $firstname, $lastname, $email){
		$this->username = $username;
		$this->firstname = $firstname;
		$this->lastname = $lastname;
		$this->email = $email;
	}
	
	public function addPoints($point){
		array_push($this->points, $point);
	}
	
	public function getPoints(){
		return $this->points;
	}
	
}