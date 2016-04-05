<?php
session_start ();
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
	<?php include_once 'resources/navigation.php'; ?>
	<div class="container">
		<div class="col-md-12">
			<div class="row">
				<img class="img-responsive img-width" alt="Test"
					src="img/title_small.png">
			</div>
		</div>
		<div class="row">
			<form action="result.php" method="post">
				<?php

				$quiz = Database::getInstance ()->createQuiz ( $_GET ['id'], $categories );
				$_SESSION['quiz'] = serialize($quiz);
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
									<label class="col-md-12"> <input type="radio"
										id="<?php echo $answer->__get('answerID')?>"
										name="<?php echo $question->__get('questionID')?>"
										value="<?php echo $answer->__get('answerID')?>"> <label
										for="<?php echo $answer->__get('answerID')?>" class="col-md-12 question"><span><span></span>
										</span> <?php echo utf8_encode($answer->__get('answer'))?> </label>
							
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
