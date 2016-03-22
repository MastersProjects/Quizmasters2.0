<?php
if($_POST){
	if((isset($_POST['userLogin'])) && (isset($_POST['passwordLogin']))){
		$login = Database::getInstance()->login($_POST['userLogin'], $_POST['passwordLogin']);
		if($_SESSION['login'] == false){
			echo '<div class="alert alert-danger alert-dismissible fade in">
			<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			<strong>Login Fehlgeschlagen!</strong> Username und Password stimmen nicht überein!
			</div>';
		}
	}
	if((isset($_POST['username'])) && (isset($_POST['surname'])) && (isset($_POST['name'])) && (isset($_POST['email'])) && (isset($_POST['passwordOne']))){

		$result = Database::getInstance()->checkUser($_POST['username']);

		if($result){
			echo '<div class="alert alert-danger alert-dismissible fade in">
			<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			<strong>Fehler!</strong> Username bereits vorhanden!
			</div>';

			if((strlen($_POST['username']) <= 45) && (sterlen($_POST['username'] > 3))){
				echo '<div class="alert alert-danger alert-dismissible fade in">
				<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				<strong>Fehler!</strong> Username ung&umml;ltig!
				</div>';

				if((strlen($_POST['name']) <= 45) && (sterlen($_POST['name'] > 3))){
					echo '<div class="alert alert-danger alert-dismissible fade in">
					<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
					<strong>Fehler!</strong> Nachname ung&umml;ltig!
					</div>';

					if((strlen($_POST['surname']) <= 45) && (sterlen($_POST['surname'] > 3))){
						echo '<div class="alert alert-danger alert-dismissible fade in">
						<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
						<strong>Fehler!</strong> Vorname ung&umml;ltig!
						</div>';

						//todo
						if((strlen($_POST['mail']) <= 45) && (sterlen($_POST['username'] > 3))){


							if($_POST['paswordOne'] =  $_POST['paswordTwo']){
								echo '<div class="alert alert-danger alert-dismissible fade in">
								<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
								<strong>Fehler!</strong> Passw&ouml;rter stimmen nicht &uuml;berein!
								</div>';
							}
						}
					}
				}
			}
		}
	}
	//	$result = Database::getInstance()->registration($_POST['username'], $_POST['surname'], $_POST['name'], $_POST['email'], $_POST['passwordOne']);
}

?>