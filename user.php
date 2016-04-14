<?php
session_start ();
include_once 'database/database_infos.php';
include_once 'database/Database.php';
$username = $_GET['username'];
$profileUser = Database::getInstance()->getUser($username);
?>
<!DOCTYPE html>
<html>
<head>
<?php include_once 'includes/head.php'; ?>
</head>
<body>
	<?php include_once 'resources/form_controller.php'; 
	include_once 'resources/navigation.php';
	?>
	<div class="container">
	<?php if(!(empty($profileUser->__get('username')))){?>
		<div class="col-md-12">
			<h1>
				<?php echo $profileUser->__get('username') ?>
			</h1>
			<hr />
		</div>
		<div class="col-md-8">
			<form method="post" id="profile-form" action=#>
				<div class="modal-body">
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label for="inputUsername">Username</label> <input type="text"
									class="form-control" id="inputUsername" name="usernameUpdate"
									placeholder="Username" disabled
									value=<?php echo $profileUser->__GET('username')?>>
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label for="inputFirstname">Vorname</label> <input type="text"
									class="form-control" id="inputFirstname" name="firstnameUpdate"
									placeholder="Vorname" disabled
									value=<?php echo $profileUser->__GET('firstname')?>>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="inputName">Nachname</label> <input type="text"
									class="form-control" id="inputName" name="lastnameUpdate"
									placeholder="Nachname" disabled
									value=<?php echo $profileUser->__GET('lastname')?>>
							</div>
						</div>
					</div>
				</div>
			</form>
		</div>
		<div class="col-md-4">
		<row>
			<img src="<?php echo $profileUser->__GET('profile_img'); ?>"
				alt="Profilbild" width="304" height="236">
		</row>
		<row>
				<h4><?php echo $profileUser->__get('points'). ' Punkte';?></h4>
			</row>
		</div>
		<?php } else {?>
			<div class="col-md-12">
			<h1>
				Kein User gefunden!
			</h1>
			<hr />
		</div>
		<?php }?>
	</div>
	<hr />
	<?php include_once 'resources/footer.php';?>
</body>
</html>
