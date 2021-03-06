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
	include_once 'resources/navigation.php'; ?>
	<div class="container">
		<div class="col-md-12">
			<div class="row">
				<img class="img-responsive img-width" alt="Test"
					src="<?php //Weiss nicht ob id gut ist
					 echo $categories[$_GET ['id'] - 1]->__get('img_path') . "small.png";?>">
			</div>
		</div>
		<div class="col-md-12">
			<img src="img/ad2.png" alt="Werbung" class="img-responsive center-block">
		</div>
		<div class="row">
			<form action="result.php" method="post" name="quiz" >
			<?php

				$quiz = Database::getInstance ()->createQuiz ( $_GET ['id'], $categories );
// 				$lastId = Database::getInstance ()->getLastId();
				$_SESSION['quiz'] = serialize($quiz);
				if (!(isset($_SESSION['login'])) or ($_SESSION['login'] == false)){
					?>
				<div class="col-md-12">
				<div class="alert alert-danger" role="alert">
				<strong>Achtung!</strong> Quiz kann nicht ausgewertet werden wenn du
				nicht angemeldet bist.
				</div>
				</div>
				<?php }
				foreach ( $quiz->__get ( 'questions' ) as $question ) {
					?>
				<div class="col-md-12">
					<div class="panel panel-default">
						<div class="panel-heading">
							<h3 class="panel-title">
								<?php echo utf8_encode($question->__get('question'))?>
							</h3>
						</div>
						<div class="panel-body">
							<div class="row">
								<?php foreach ($question->__get('answers') as $answer){?>

								<div class="col-md-6 ask">
									<label class="col-md-12 col-sm-12"> <input type="radio"
										id="<?php echo $answer->__get('answerID')?>"
										name="<?php echo $question->__get('questionID')?>"
										value="<?php echo $answer->__get('answerID')?>"> <label
										for="<?php echo $answer->__get('answerID')?>"
										class="col-md-12 col-sm-12 question"><span><span></span> </span>
											<?php echo utf8_encode($answer->__get('answer'))?> </label>
								
								</div>


								<?php } ?>
							</div>
						</div>
					</div>
				</div>
				<?php } ?>
				<div class="container">
					<button type="submit" class="btn btn-default col-md-12"
						id="btnSubmit">Auswertung</button>
				</div>
				<?php 
				if (!(isset($_SESSION['login'])) or ($_SESSION['login'] == false)){
					?>
				<h6>Bitte einloggen um Quiz auszuwerten!</h6>
				<script>document.getElementById("btnSubmit").disabled = true;</script>
				<?php
		}?>
			</form>
		</div>
	</div>

	<hr />
	<?php include_once 'resources/footer.php';?>
</body>
</html>
