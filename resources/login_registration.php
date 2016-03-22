<?php
if($_POST){
	if((isset($_POST['userLogin'])) && (isset($_POST['passwordLogin']))){
		$login = Database::getInstance()->login($_POST['userLogin'], $_POST['passwordLogin']);
		if($_SESSION['login'] == false){
			echo '<div class="alert alert-danger alert-dismissible fade in">
			<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			<strong>Danger!</strong> Indicates a dangerous or potentially negative action.
			</div>';
		}
	}
	if((isset($_POST['username'])) && (isset($_POST['surname'])) && (isset($_POST['name'])) && (isset($_POST['email'])) && (isset($_POST['passwordOne']))){
		$result = Database::getInstance()->registration($_POST['username'], $_POST['surname'], $_POST['name'], $_POST['email'], $_POST['passwordOne']);
	}
}
?>