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
		<div class="col-md-12">
			<div class="row">
				<img class="img-responsive img-width" alt="Test" src="img/title_small.png">
			</div>
		</div>
		<div class="row">
			<?php

			$quiz = Database::getInstance ()->createQuiz ( $_GET ['id'], $categories );
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

							<div class="col-md-6">
								<input type="radio" id="" name="" value="">
								<?php echo utf8_encode($answer->__get('answer'))?>
							</div>

							<?php } ?>
						</div>
					</div>
				</div>
			</div>
			<?php }?>
		</div>
	</div>

	<hr />
	<?php include_once 'resources/footer.php';?>

</body>
</html>
