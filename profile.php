<?php
session_start ();
if(!(isset($_SESSION['user']))){
	header('location: index.php');
}
include_once 'database/database_infos.php';
include_once 'database/Database.php';
include_once 'resources/form_controller.php';
?>
<!DOCTYPE html>
<html>
<head>
<?php include_once 'includes/head.php'; ?>
</head>
<body>
	<?php
	include_once 'resources/navigation.php';
	?>
	<div class="container">
		<div class="col-md-12">
			<h1>Dein Profil</h1>
		</div>
		<div class="col-md-8">
			<form method="post" id="profile-form" action=#>
				<div class="modal-body">
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label for="inputUsername">Username</label> <input type="text"
									class="form-control" id="inputUsername" name="usernameUpdate"
									placeholder="Username"
									value=<?php echo $user->__GET('username')?>>
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label for="inputFirstname">Vorname</label> <input type="text"
									class="form-control" id="inputFirstname" name="firstnameUpdate"
									placeholder="Vorname"
									value=<?php echo $user->__GET('firstname')?>>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="inputName">Nachname</label> <input type="text"
									class="form-control" id="inputName" name="lastnameUpdate"
									placeholder="Nachname"
									value=<?php echo $user->__GET('lastname')?>>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="form-group">
								<label for="inputEmail">Email</label> <input type="text"
									class="form-control" id="inputEmail" name="emailUpdate"
									placeholder="Email" value=<?php echo $user->__GET('email')?>>
							</div>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<a href="#" class="btn btn-default" data-toggle="modal" data-target="#myModal">Passwort &auml;ndern</a>
					<button type="submit" class="btn btn-default">&Auml;ndern</button>
				</div>
			</form>
		</div>
		<div class="col-md-4">
			<img src="<?php echo $user->__GET('profile_img'); ?>"
				alt="Profilbild" width="304" height="236">
		</div>
		<div class="col-md-12">
		<hr />
			<h2>Konto l&ouml;schen</h2>
		</div>
		<div class="col-md-7">
			<div class="alert alert-danger">
				<form action="<?php $_SERVER['PHP_SELF']?>" method="POST">
					<div class="row">
						<div class="col-md-12">
							<label for="inputDelete">M&ouml;chtest du dein Profil wirklich
								l&ouml;schen? Gebe daf&uuml;r in das untere Felde Ja ein.</label>
						</div>
						<div class="col-md-8">
							<input class="form-control" name="delete" type="text" placeholder="Ja">
						</div>
						<div class="col-md-4">
							<button class="btn btn-danger" type="submit">L&ouml;schen!</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
	<hr />
	<?php include_once 'resources/footer.php';?>

</body>
</html>
