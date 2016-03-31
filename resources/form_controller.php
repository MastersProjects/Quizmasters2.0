<?php
if ($_POST) {
	if ((isset ( $_POST ['userLogin'] )) && (isset ( $_POST ['passwordLogin'] ))) {
		$login = Database::getInstance ()->login ( $_POST ['userLogin'], $_POST ['passwordLogin'] );
		if ($login == false) {
			echo '<div class="alert alertLogin alert-danger alert-dismissible fade in">
			<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			<strong>Login Fehlgeschlagen!</strong> Username und Password stimmen nicht &uuml;berein!
			</div>';
		} else {
			echo '<div class="alert alertLogin alert-success alert-dismissible fade in">
			<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			<strong>Erfolgreich!</strong> Login war erfolgreich!
			</div>';
		}
	}

	if ((isset ( $_POST ['username'] )) && (isset ( $_POST ['firstname'] )) && (isset ( $_POST ['lastname'] )) && (isset ( $_POST ['email'] )) && (isset ( $_POST ['passwordOne'] ))) {
		$result = Database::getInstance ()->registration ( $_POST ['username'], $_POST ['firstname'], $_POST ['lastname'], $_POST ['email'], $_POST ['passwordOne'] );
		if(!($result)){
			echo '<div class="alert alert-danger alert-dismissible fade in">
			<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			<strong>Fehler!</strong> Username bereits vorhanden!
			</div>';
		} else {
			echo '<div class="alert alertLogin alert-success alert-dismissible fade in">
			<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			<strong>Erfolgreich!</strong> Du hast dich erfolgreich registriert!
			</div>';
		}
	}
	
	if (isset($_POST['delete']) && strtolower($_POST['delete']) == 'ja'){
		Database::getInstance()->deleteUser(unserialize($_SESSION['user'])->__GET('username'));
		header('location: resources/logout.php');
	}
	
	if (isset ( $_POST ['usernameUpdate'] ) && (isset ( $_POST ['firstnameUpdate'] )) && (isset ( $_POST ['lastnameUpdate'] )) && (isset ( $_POST ['emailUpdate'] ))) {
		$result = Database::getInstance ()->userUpdate ( $_POST ['usernameUpdate'], $_POST ['firstnameUpdate'], $_POST ['lastnameUpdate'], $_POST ['emailUpdate'] );
		if (!($result)){
			echo '<div class="alert alertLogin alert-danger alert-dismissible fade in">
			<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			<strong>Fehler!</strong> Username bereits vorhanden!
			</div>';
		} else {
			echo '<div class="alert alertLogin alert-success alert-dismissible fade in">
			<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			<strong>Erfolgreich!</strong> Deine Daten wurden angepasst!
			</div>';
		}
		
		if (isset ( $_POST ['password1Update'] ) && (isset ( $_POST ['password2Update'] ))) {
			Database::getInstance()->changePwd($_POST ['password1Update']);
			echo '<div class="alert alertLogin alert-success alert-dismissible fade in">
			<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			<strong>Erfolgreich!</strong> Dein Passwort wurde erfolgreich ge�ndert!
			</div>';
		}
	}
}

?>