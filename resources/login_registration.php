<?php
if ($_POST) {
	if ((isset ( $_POST ['userLogin'] )) && (isset ( $_POST ['passwordLogin'] ))) {
		$login = Database::getInstance ()->login ( $_POST ['userLogin'], $_POST ['passwordLogin'] );
		if ($_SESSION ['login'] == false) {
			echo '<div class="alert alert-danger alert-dismissible fade in">
			<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			<strong>Login Fehlgeschlagen!</strong> Username und Password stimmen nicht &uuml;berein!
			</div>';
		}
	}
	if ((isset ( $_POST ['username'] )) && (isset ( $_POST ['firstname'] )) && (isset ( $_POST ['lastname'] )) && (isset ( $_POST ['email'] )) && (isset ( $_POST ['passwordOne'] ))) {
		$re = "/^([a-z0-9_\\.-]+\\@[\\da-z\\.-]+\\.[a-z\\.]{2,6})$/";
		$result = Database::getInstance ()->checkUser ( $_POST ['username'] );
		if ($result) {
			echo '<div class="alert alert-danger alert-dismissible fade in">
			<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			<strong>Fehler!</strong> Username bereits vorhanden!
			</div>';
		} else {
			Database::getInstance ()->registration ( $_POST ['username'], $_POST ['firstname'], $_POST ['lastname'], $_POST ['email'], $_POST ['passwordOne'] );
		}
	}
}

?>