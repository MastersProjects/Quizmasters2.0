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
				<img class="img-responsive img-width" alt="Test" src="img/title_small.png">
			</div>
		</div>
		<div class="row">
			<form action="" method="post">
				<?php
				$quiz = unserialize($_SESSION['quiz']);	
				var_dump($_POST);
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
									<input type="radio" 
											id="<?php echo $answer->__get('answerID')?>" 
											name="<?php echo $question->__get('questionID')?>" 
											value="<?php echo $answer->__get('answerID')?>"
											<?php 	
												if(array_key_exists($question->__get('questionID'), $_POST)){
													if($_POST [$question->__get('questionID')] == $answer->__get('answerID')){
															echo 'checked="checked"';
													}
												}
											?>
									>															
										<label for="<?php echo $answer->__get('answerID')?>"><span><span></span></span><?php echo utf8_encode($answer->__get('answer'))?></label>
								</div>
								
	
								<?php } ?>
							</div>
						</div>
					</div>
				</div>
				<?php }?>
				<input type="submit" class="button" value="Auswertung">
			</form>
		</div>
	</div>

	<hr />
	<?php include_once 'resources/footer.php';?>

</body>
</html>