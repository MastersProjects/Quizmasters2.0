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
	if ((isset ( $_POST ['username'] )) && (isset ( $_POST ['surname'] )) && (isset ( $_POST ['name'] )) && (isset ( $_POST ['email'] )) && (isset ( $_POST ['passwordOne'] ))) {
		$re = "/^([a-z0-9_\\.-]+\\@[\\da-z\\.-]+\\.[a-z\\.]{2,6})$/";
		$result = Database::getInstance ()->checkUser ( $_POST ['username'] );
		if ($result) {
			echo '<div class="alert alert-danger alert-dismissible fade in">
			<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			<strong>Fehler!</strong> Username bereits vorhanden!
			</div>';
			$_SESSION ['regfail'] = true;
		} elseif ((strlen ( $_POST ['username'] ) > 45) || (empty ( $_POST ['username'] ))) {
			echo '<div class="alert alert-danger alert-dismissible fade in">
				<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				<strong>Fehler!</strong> Username ung&uuml;ltig!
				</div>';
			$_SESSION ['regfail'] = true;
		} elseif ((strlen ( $_POST ['name'] ) > 45) || (empty ( $_POST ['name'] ))) {
			echo '<div class="alert alert-danger alert-dismissible fade in">
			<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			<strong>Fehler!</strong>Nachname ung&uuml;ltig!
			</div>';
			$_SESSION ['regfail'] = true;
		} elseif ((strlen ( $_POST ['name'] ) > 45) || (empty ( $_POST ['name'] ))) {
			echo '<div class="alert alert-danger alert-dismissible fade in">
					<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
					<strong>Fehler!</strong> Nachname ung&uuml;ltig!
					</div>';
			$_SESSION ['regfail'] = true;
		} elseif ((strlen ( $_POST ['surname'] ) > 45) || (empty ( $_POST ['surname'] ))) {
			echo '<div class="alert alert-danger alert-dismissible fade in">
						<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
						<strong>Fehler!</strong> Vorname ung&uuml;ltig!
						</div>';
			$_SESSION ['regfail'] = true;
		} elseif (! (preg_match ( $re, $_POST ['email'], $matches ))) {
			echo '<div class="alert alert-danger alert-dismissible fade in">
								<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
								<strong>Fehler!</strong> Email ist ung&uuml;ltig!
								</div>';
			$_SESSION ['regfail'] = true;
		} elseif ($_POST ['passwordOne'] != $_POST ['passwordTwo']) {
			echo '<div class="alert alert-danger alert-dismissible fade in">
								<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
								<strong>Fehler!</strong> Passw&ouml;rter stimmen nicht &uuml;berein!
								</div>';
			$_SESSION ['regfail'] = true;
		} else {
			Database::getInstance ()->registration ( $_POST ['username'], $_POST ['surname'], $_POST ['name'], $_POST ['email'], $_POST ['passwordOne'] );
			$_SESSION ['regfail'] = false;
		}
	}
}

?>