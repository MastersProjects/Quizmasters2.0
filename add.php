<?php
session_start();
// TODO Check if points >= 30
if(!(isset($_SESSION['user']))){
	header('location: index.php');
}

include_once 'database/database_infos.php';
include_once 'database/Database.php';
?>
<!DOCTYPE html>
<html>
<head>
<?php include_once 'includes/head.php'; ?>
</head>
<body>
	<?php
	include_once 'resources/form_controller.php';
	include_once 'resources/navigation.php';
	?>
	<div class="container">
		<div class="col-md-12">
			<h1>Fragen hinzuf&uuml;gen</h1>
			<p>
				Du hast gen&uuml;gend Punkte ereicht um ein Teil unserer Community
				zu werden. Von nun an hast du die M&ouml;glichkeit eigene Fragen zu
				unseren Kategorien hinzuzuf&uuml;gen. <br> Wir w&uuml;nschen dir
				viel Spass! <br><span class="grey">Wir werden deine Frage so schnell wie m&ouml;glich
				&uuml;berpr&uuml;fen und freigeben.</span>
			</p>
			<hr>
		</div>
		<div class="row">
			<form action="<?php $_SERVER['PHP_SELF']?>" method="POST"
				id="addQuestion">
				<div id="questions">
					<div class="col-md-4">
						<label for="sel1">Thema</label> <select class="form-control"
							name="category">
							<?php foreach ($categories as $category){?>
							<option><?php echo $category->__get("category");?></option>
							<?php }?>
						</select>
					</div>
					<div class="addQuestion">
						<div class="col-md-12">
							<div class="panel panel-default">
								<div class="panel-heading">
									<label for="question" class="titleQuestion">Frage:</label> <input
										type="text" class="form-control" name="question">
								</div>
								<div class="panel-body">
									<div class="row">
										<div class="col-md-6">
											<label for="answer1">Antwort:</label> <input type="text"
												class="form-control" name="answer1">
										</div>

										<div class="col-md-6">
											<label for="answer2">Antwort:</label> <input type="text"
												class="form-control" name="answer2">
										</div>

										<div class="col-md-6">
											<label for="answer3">Antwort:</label> <input type="text"
												class="form-control" name="answer3">
										</div>

										<div class="col-md-6">
											<label for="answer4">Antwort:</label> <input type="text"
												class="form-control" name="answer4">
										</div>

									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="container">
					<button type="submit" class="btn btn-default col-md-12"
						id="btnSubmit">Hinzuf&uuml;gen</button>
				</div>
			</form>
			<hr />
			<button class="btn btn-default col-md-12" id="AddQuestion">Weitere
				Frage hinzuf&uuml;gen</button>
		</div>
	</div>
	<script src="js/add.js"></script>
	<hr />
	<?php include_once 'resources/footer.php';?>

</body>
</html>
