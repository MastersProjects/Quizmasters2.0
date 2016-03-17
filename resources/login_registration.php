<?php
session_start();
if($_POST){
	if((isset($_POST['userLogin'])) && (isset($_POST['passwordLogin']))){
		$login = Database::getInstance()->login($_POST['userLogin'], $_POST['passwordLogin']);
	}
	if((isset($_POST['username'])) && (isset($_POST['surname'])) && (isset($_POST['name'])) && (isset($_POST['email'])) && (isset($_POST['passwordOne']))){
		$result = Database::getInstance()->registration($_POST['username'], $_POST['surname'], $_POST['name'], $_POST['email'], $_POST['passwordOne']);
	}
}
?>