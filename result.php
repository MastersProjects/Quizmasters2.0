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
				$points = 0;
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
								<?php foreach ($question->__get('answers') as $answer){
										//TODO Maybe random order because almost all true answer is the first
										$if_checked = false;
										if(array_key_exists($question->__get('questionID'), $_POST)){
											if($_POST [$question->__get('questionID')] == $answer->__get('answerID')){
												$if_checked = true;
											}
										}
								?>
	
								<div class="col-md-6">
									<input type="radio" 
											id="<?php echo $answer->__get('answerID')?>" 
											name="<?php echo $question->__get('questionID')?>" 
											value="<?php echo $answer->__get('answerID')?>"
											<?php 	
												if($if_checked){
													echo 'checked="checked"';
												}
											?>
									>															
										<label <?php 
													if($answer->__get('correct')==1 and !$if_checked){
														echo 'class="answertrue"';
													}elseif($answer->__get('correct')==1 and $if_checked){
														echo 'class="answertrue"';
														$points = $points + $question->__get('points');
													}elseif($answer->__get('correct')==0 and $if_checked){
														echo 'class="answerfalse"';
													}	
											   ?>  
												for="<?php echo $answer->__get('answerID')?>">
												<span><span></span></span><?php echo utf8_encode($answer->__get('answer'))?>
										</label>
								</div>
								
	
								<?php } ?>
							</div>
						</div>
					</div>
				</div>
				<?php } //TODO Points and stuff?>
			</form>
		</div>
	</div>

	<hr />
	<?php include_once 'resources/footer.php';?>

</body>
</html>