<?php
include_once 'database/database_infos.php';
include_once 'database/Database.php';

if($_POST){
	if((isset($_POST['userLogin'])) && (isset($_POST['passwordLogin']))){
		$result = Database::getInstance()->login($_POST['userLogin'], $_POST['passwordLogin']);
	}
	if((isset($_POST['username'])) && (isset($_POST['surname'])) && (isset($_POST['name'])) && (isset($_POST['email'])) && (isset($_POST['passwordOne']))){
		$result = Database::getInstance()->registration($_POST['username'], $_POST['surname'], $_POST['name'], $_POST['email'], $_POST['passwordOne']);
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
	<div id="myCarousel" class="carousel slide" data-ride="carousel">
		<!-- Indicators -->
		<ol class="carousel-indicators">
			<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
			<li data-target="#myCarousel" data-slide-to="1"></li>
		</ol>

		<!-- Wrapper for slides -->
		<div class="carousel-inner" role="listbox">
			<div class="item active">
				<img src="img/one.png" alt="Chania" width="100%">
			</div>

			<div class="item">
				<img src="img/two.png" alt="Chania" width="100%">
			</div>
		</div>

		<!-- Left and right controls -->
		<a class="left carousel-control" href="#myCarousel" role="button"
			data-slide="prev"> <span class="glyphicon glyphicon-chevron-left"
			aria-hidden="true"></span> <span class="sr-only">Previous</span>
		</a> <a class="right carousel-control" href="#myCarousel"
			role="button" data-slide="next"> <span
			class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
			<span class="sr-only">Next</span>
		</a>
	</div>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-default">
					<div class="panel-heading">
						<h3 class="panel-title">Was isst Phong am liebsten auf seiner Pizza?</h3>
					</div>
					<div class="panel-body">
						<div class="row">
							<div class="col-md-6">
								<input type="radio" id="mc" name="Zahlmethode" value="Mastercard"> Salami
							</div>
							<div class="col-md-6">
								<input type="radio" id="mc" name="Zahlmethode" value="Mastercard"> Salami
							</div>
							<div class="col-md-6">
								<input type="radio" id="mc" name="Zahlmethode" value="Mastercard"> Salami
							</div>
							<div class="col-md-6">
								<input type="radio" id="mc" name="Zahlmethode" value="Mastercard"> Salami
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-12">
				<div class="panel panel-default">
					<div class="panel-heading">
						<h3 class="panel-title">Was isst Phong am liebsten auf seiner Pizza?</h3>
					</div>
					<div class="panel-body">
						<div class="row">
							<div class="col-md-6">
								<input type="radio" id="mc" name="Zahlmethode" value="Mastercard"> Salami
							</div>
							<div class="col-md-6">
								<input type="radio" id="mc" name="Zahlmethode" value="Mastercard"> Salami
							</div>
							<div class="col-md-6">
								<input type="radio" id="mc" name="Zahlmethode" value="Mastercard"> Salami
							</div>
							<div class="col-md-6">
								<input type="radio" id="mc" name="Zahlmethode" value="Mastercard"> Salami
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>


	</div>
	<hr />
	<?php include_once 'resources/footer.php';?>
</body>
</html>
