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
	<?php include_once 'resources/navigation.php'; ?>
	<div class="container">
		<div class="col-md-10">
			<div class="row">
				<div class="hidden-xs hidden-sm col-md-4">
					<img class="img-responsive" alt="Test" src="img/title_large.jpg">
				</div>
				<div class="hidden-md hidden-lg col-md-4">
					<img class="img-responsive" alt="Test" src="img/title_small.png">
				</div>
				<div class="col-md-8">
					<h1>Herzlich willkommen auf Quizmasters.ch</h1>
					<p>Quizmasters ist eine Seite auf der du dein Wissen testen kannst,
						wir bieten verschiedene Quiz zu verschiedenen Themen, wie
						Fussball, Games oder Tiere an. Zeige dein K&ouml;nnen und steige
						in der Rangliste bis ganz nach oben.</p>
					<h3>
						Viel Spass! <br> dein Quizmasters Team
					</h3>
				</div>
			</div>
			<hr />
			<div class="row">
				<div class="col-xs-6 col-sm-3">
					<img class="img-responsive" alt="Test" src="img/placeholder.jpg">
				</div>
				<div class="col-xs-6 col-sm-3">
					<p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed
						diam nonumy eirmod tempor invidunt ut labore et dolore magna
						aliquyam erat, sed diam voluptua. At vero eos et accusam et justo
					</p>
				</div>
				<div class="clearfix visible-xs"></div>
				<div class="col-xs-6 col-sm-3">
					<img class="img-responsive" alt="Test" src="img/placeholder.jpg">
				</div>
				<div class="col-xs-6 col-sm-3">
					<p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed
						diam nonumy eirmod tempor invidunt ut labore et dolore magna
						aliquyam erat, sed diam voluptua. At vero eos et accusam et justo
						duo dolores et ea rebum. Stet clita kasd gubergren, no sea</p>
				</div>
			</div>
		</div>
		<div class="col-md-2">
			<img src="img/ad.jpg" alt="Werbung" class="img-responsive">
		</div>
	</div>
	<hr />
	<?php include_once 'resources/footer.php';?>
</body>
</html>
