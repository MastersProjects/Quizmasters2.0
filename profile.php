<?php
session_start ();
include_once 'database/database_infos.php';
include_once 'database/Database.php';
include_once 'resources/login_registration.php';
?>
<!DOCTYPE html>
<html>
<head>
<?php include_once 'includes/head.php'; ?>
</head>
<body>
	<?php
	
	include_once 'resources/navigation.php';
	$user = unserialize ( $_SESSION ['user'] );
	?>
<div class="container">
		<div class="col-md-12">
			<h1>Dein Profil</h1>
		</div>
		<div class="col-md-8">
			<form method="post" id="user-form" action=#>
				<div class="modal-body">
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label for="inputUsername">Username</label> <input type="text"
									class="form-control" id="inputUsername" name="username"
									placeholder="Username"
									value=<?php echo $user->__GET('username')?>>
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label for="inputFirstname">Vorname</label> <input type="text"
									class="form-control" id="inputFirstname" name="firstname"
									placeholder="Vorname"
									value=<?php echo $user->__GET('firstname')?>>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="inputName">Nachname</label> <input type="text"
									class="form-control" id="inputName" name="lastname"
									placeholder="Nachname"
									value=<?php echo $user->__GET('lastname')?>>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="form-group">
								<label for="inputEmail">Email</label> <input type="text"
									class="form-control" id="inputEmail" name="email"
									placeholder="Email" value=<?php echo $user->__GET('email')?>>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="form-group">
								<label for="inputPassword">Passwort</label><input
									type="password" class="form-control" name="passwordOne"
									id="passwordOne" placeholder="Password">
							</div>
						</div>
						<div class="col-md-12">
							<div class="form-group">
								<label for="inputPassword">Passwort best&auml;tigen</label><input
									type="password" class="form-control" name="passwordTwo"
									id="passwordTwo" placeholder="Password">
							</div>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-default">&Auml;ndern</button>
				</div>
			</form>
		</div>
		<div class="col-md-4">
			<img src="img/placeholder.jpg" alt="Cinque Terre" width="304"
				height="236">
		</div>
	</div>
	<hr />
	<?php include_once 'resources/footer.php';?>

</body>
</html>
