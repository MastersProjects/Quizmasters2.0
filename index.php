<?php
include_once 'database/Database.php';

if($_POST){
	if((isset($_POST['userLogin'])) && (isset($_POST['passwordLogin']))){
		Database::getInstance()->login($_POST['userLogin'], $_POST['passwordLogin']);
	}
}
?>
<!DOCTYPE html>
<html>
<head>
<?php include_once 'includes/head.php'; ?>
</head>
<body>
	<?php include_once 'resources/navigation.php'; ?>
	<div class="col-md-10">
		<div class="row">
			<div class="col-md-4">
				<img class="img-responsive" alt="Test" src="img/placeholder.jpg">
			</div>
			<div class="col-md-8">
				<p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam
					nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam
					erat, sed diam voluptua. At vero eos et accusam et justo duo
					dolores et ea rebum. Stet clita kasd gubergren, no sea takimata
					sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet,
					consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt
					ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero
					eos et accusam et justo duo dolores et ea rebum. Stet clita kasd
					gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.
					Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam
					nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam
					erat, sed diam voluptua. At vero eos et accusam et justo duo
					dolores et ea rebum. Stet clita kasd gubergren, no sea takimata
					sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet,
					consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt
					ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero
					eos et accusam et justo duo dolores et ea rebum. Stet clita kasd
					gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.
				</p>
			</div>
		</div>
		<hr />
	</div>
	<div class="col-md-2">
		<img src="img/ad.jpg" alt="Werbung" class="img-responsive">
	</div>
	<?php include_once 'resources/footer.php';?>
</body>
</html>
