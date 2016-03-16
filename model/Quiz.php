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
	private $questions = array();
	
	public function getCategory(){
		return $this->category;
	}
	
	public function setCategory($category){
		$this->category = $category;
	}
	
	public function getCategoryID(){
		return $this->$categoryID;
	}
	
	public function setCategoryID($categoryID){
		$this->categoryID = $categoryID;
	}
	
	public function getQuestions(){
		return $this->category;
	}
	
	public function setQuestions($questions){
		$this->questions = $questions;
	}
}
