<?php
session_start ();
include_once 'database/database_infos.php';
include_once 'database/Database.php';
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

		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">
					&Uuml;ber uns <small>It's Nice to Meet You!</small>
				</h1>
				<p>Quizmasters ist eine Webseite von drei Lehrlingen aus Z&uuml;rich. Die
					Idee entstand im Jahr 2015, als gemeinsames Projekt von Chiramet
					Phong Penglerd, Luca Marti und Elia Perenzin. Das Projekt begann im
					Bbc (Berufsbildungscenter Z&uuml;rich) und war f&uuml;r uns ein guter Start
					in das Thema Webentwicklung/Webdesign. Auf Quizmasters.ch bieten
					wir verschiedene Quiz f&uuml;r Jung und Alt zu diversen Themen von Sport
					bis zu Games.</p>
			</div>
		</div>

		<!-- Team Members Row -->
		<div class="row">
			<div class="col-lg-12">
				<h2 class="page-header">Unser Team</h2>
			</div>
			<div class="col-lg-4 col-sm-6 text-center">
				<img class="img-circle img-responsive center-block"
					src="img/team/luca.png" alt="luca">
				<h3>
					Luca Marti <br><small>Zurich Airport</small>
				</h3>
				<p>What does this team member to? Keep it short! This is also a
					great spot for social links! (Er isch en pisser hhahah)</p>
			</div>
			<div class="col-lg-4 col-sm-6 text-center">
				<img class="img-circle img-responsive center-block"
					src="img/team/phong.png" alt="phong">
				<h3>
					Chiramet Phong Penglerd <br><small>Raiffeisen Schweiz</small>
				</h3>
				<p>What does this team member to? Keep it short! This is also a
					great spot for social links! Er isch en thai</p>
			</div>
			<div class="col-lg-4 col-sm-6 text-center">
				<img class="img-circle img-responsive center-block"
					src="img/team/elia.png" alt="elia">
				<h3>
					Elia Perenzin <br><small>Hewlett-Packard Enterprise</small>
				</h3>
				<p>What does this team member to? Keep it short! This is also a
					great spot for social links! Er isch beste</p>
			</div>
		</div>

		<hr>
		<?php include_once 'resources/footer.php';?>
</body>
</html>
