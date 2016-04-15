<?php
session_start ();
if(!(isset($_SESSION['user']))){
	header('location: index.php');
}
// if(isset ($_SESSION['lastResult'])){
// 	$date = new DateTime();
// 	if((abs($date->getTimestamp() - $_SESSION['lastResult'] )) < 90){
// 		header('location: index.php');
// 	} else {
// 	$date = new DateTime();
// 	$_SESSION['lastResult'] = $date->getTimestamp();
// 	}
// }

include_once 'database/database_infos.php';
include_once 'database/Database.php';
require_once 'model/AnsweredQuestion.php';
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
		<div class="col-md-12">
			<div class="row">
				<img class="img-responsive img-width" alt="Test"
					src="img/title_small.png">
			</div>
		</div>
		<div class="row">
			<?php
			$quiz = unserialize($_SESSION['quiz']);
			$points = 0;
			$answeredQuestions = array();
			$countRight = 0;
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

							<div class="col-md-6 col-sm-12 answered">
								<input type="radio" id="<?php echo $answer->__get('answerID')?>"
									name="<?php echo $question->__get('questionID')?>"
									value="<?php echo $answer->__get('answerID')?>"
									<?php
									if($if_checked){
										echo 'checked="checked"';
									}
									?>
									disabled> <label
									<?php

									if($answer->__get('correct')==1 and !$if_checked){
										echo 'class="answertrue col-md-12 col-sm-12 question"';
									}elseif($answer->__get('correct')==1 and $if_checked){ //If answered right
										echo 'class="answertrue col-md-12 col-sm-12 question"';
										$points = $points + $question->__get('points');
										$answeredQuestion = new AnsweredQuestion();
										$answeredQuestion->__set('questionID', $question->__get('questionID'));
										$answeredQuestion->__set('answeredRight', 1);
										array_push($answeredQuestions, $answeredQuestion);
										$countRight = $countRight + 1;
									}elseif($answer->__get('correct')==0 and $if_checked){ //If answered false
										echo 'class="answerfalse col-md-12 col-sm-12 question"';
										$answeredQuestion = new AnsweredQuestion();
										$answeredQuestion->__set('questionID', $question->__get('questionID'));
										$answeredQuestion->__set('answeredRight', 0);
										array_push($answeredQuestions, $answeredQuestion);
									}

									?>
									for="<?php echo $answer->__get('answerID')?>"
									class="col-md-12 col-sm-12 question"> <span><span></span> </span>
									<?php echo utf8_encode($answer->__get('answer'))?>
								</label>
							</div>
							<?php } ?>
						</div>
					</div>
				</div>
			</div>
			<?php }
			if($_SESSION['solved'] == true){
				echo '<script type="text/javascript">swal("Achtung!", "Quiz wurde schon ausgerwetet!", "error");</script>';
				} else{
			Database::getInstance()->quizSolved($points, $user->__GET('userID'), '1', $quiz->__GET('categoryID'), $answeredQuestions);
			$user->__SET('points', $user->__GET('points') + $points);
			$_SESSION['user'] = serialize($user);
			$_SESSION['solved'] = true;
				}
			?>
		</div>
		<div class="col-md-12">
			<h4>
				<?php echo "Punkte " . $points?>
			</h4>
			<h4>
				<?php echo "Neuer Punktestand " . ($user->__GET('points'))?>
			</h4>

			<div class="progress">
				<div class="progress-bar" role="progressbar" aria-valuenow="<?php echo $countRight * 10?>"
					aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $countRight * 10 . "%"?>">
					<?php echo $countRight * 10 . "%"?>
				</div>
			</div>
			<h6>Richtig beantwortet</h6>

		</div>
	</div>

	<hr />
	<?php include_once 'resources/footer.php';?>

</body>
</html>
