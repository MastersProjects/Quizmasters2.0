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
	private $points;
	
	public function __construct($username, $firstname, $lastname, $email){
		$this->username = $username;
		$this->firstname = $firstname;
		$this->lastname = $lastname;
		$this->email = $email;
	}
	
	public function __get($property) {
		if (property_exists($this, $property)) {
			return $this->$property;
		}
	}
	
	public function __set($property, $value) {
		if (property_exists($this, $property)) {
			$this->$property = $value;
		}
	}
	
}
