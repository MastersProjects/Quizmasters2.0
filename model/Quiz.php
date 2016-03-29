<?php

/**
 * Model class Quiz. Contains all the informations for an quiz.
 * @author Chiramed Phong Penglerd, Luca Marti, Elia Perenzin
 * @version 1.0
 * Quizmasters 2.0 2016
 */

class Quiz {
	private $category;
	private $categoryID;
	private $description;
	private $img_path;
	private $questions = array();
	
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
