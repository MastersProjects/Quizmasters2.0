<?php
if ($_POST) {
	// For the login
	if ((isset ( $_POST ['userLogin'] )) && (isset ( $_POST ['passwordLogin'] ))) {
		$login = Database::getInstance ()->login ( $_POST ['userLogin'], $_POST ['passwordLogin'] );
		if ($login == false) {
			// When the login fails
			echo '<script type="text/javascript">swal("Login fehlgeschlagen!", "Username und Password stimmen nicht \u00fcberein!", "error");</script>';
		} else {
			// When the login succeeds
			echo '<script type="text/javascript">swal("Erfolgreich!", "Login war erfolgreich!", "success");</script>';
header("Location: " . "http://" . $_SERVER['HTTP_HOST'] . $location);		}
	}

	// For registration
	if ((isset ( $_POST ['username'] )) && (isset ( $_POST ['firstname'] )) && (isset ( $_POST ['lastname'] )) && (isset ( $_POST ['email'] )) && (isset ( $_POST ['passwordOne'] ))) {
		$result = Database::getInstance ()->registration ( $_POST ['username'], $_POST ['firstname'], $_POST ['lastname'], $_POST ['email'], $_POST ['passwordOne'] );
		if (! ($result)) {
			// When registration fails, username already in db
			echo '<script type="text/javascript">swal("Fehler!", "Username bereits vorhanden!", "error");</script>';
		} else {
			// When registration succeeds
			echo '<script type="text/javascript">swal("Erfolgreich!", "Du hast dich erfolgreich registriert und wurdest angemeldet!", "success");</script>';
		}
	}

	// For deleting a user
	if (isset ( $_POST ['delete'] ) && strtolower ( $_POST ['delete'] ) == 'ja') {
		Database::getInstance ()->deleteUser ( unserialize ( $_SESSION ['user'] )->__GET ( 'username' ) );
		header ( 'location: resources/logout.php' );
	}

	// For updating user information
	if (isset ( $_POST ['usernameUpdate'] ) && (isset ( $_POST ['firstnameUpdate'] )) && (isset ( $_POST ['lastnameUpdate'] )) && (isset ( $_POST ['emailUpdate'] ))) {
		$result = Database::getInstance ()->userUpdate ( $_POST ['usernameUpdate'], $_POST ['firstnameUpdate'], $_POST ['lastnameUpdate'], $_POST ['emailUpdate'] );
		// When change fails, username already in db
		if (! ($result)) {
			echo '<script type="text/javascript">swal("Fehler!", "Username bereits vorhanden!", "error");</script>';
		} else {
			// When change succeeds
			echo '<script type="text/javascript">swal("Erfolgreich!", "Deine Daten wurden angepasst!", "success");</script>';
		}
	}
	if (isset ( $_POST ['password1Update'] ) && (isset ( $_POST ['password2Update'] ))) {
		Database::getInstance ()->changePwd ( $_POST ['password1Update'] );
		echo '<script type="text/javascript">swal("Erfolgreich!", "Dein Passwort wurde erfolgreich geändert!", "success");</script>';
	}
}

?>