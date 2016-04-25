<?php
session_start ();
if(!(isset($_SESSION['user']))){
	header('location: index.php');
}
include_once 'database/database_infos.php';
include_once 'database/Database.php';
$user = unserialize($_SESSION['user']);
$rightFalse = Database::getInstance()->getRightFalse($user->__get('userID'));
$pointsQuiz = Database::getInstance()->getPointsQuiz($user->__get('userID'));
$answered = Database::getInstance()->getAnsweredQuestions($user->__get('userID'));
$answeredRight = Database::getInstance()->getAnsweredRightQuestions($user->__get('userID'));
?>
<!DOCTYPE html>
<html>
<head>
<?php include_once 'includes/head.php'; ?>
<script type="text/javascript"
	src="https://www.gstatic.com/charts/loader.js"></script>

<!-- Chart Richtig Falsch -->
<script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['', ''],
          ['Richtig',     <?php echo $rightFalse[0]?>],
          ['Falsch',      <?php echo $rightFalse[1]?>],
        ]);

        var options = {
          title: 'Richtig/Falsch beantwortet'
        };
        var chart = new google.visualization.PieChart(document.getElementById('correct'));
        chart.draw(data, options);
      }
</script>
<!-- Chart Punkteentwicklung pro Quiz -->
<script type="text/javascript">
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
          var data = google.visualization.arrayToDataTable([   
            ['Quiz', 'Punkte'],
            <?php foreach ($pointsQuiz as $points){?>
            [<?php echo $points['0']?>,  <?php echo $points['1']?>],
            <?php }?>
          ]);

          var options = {
            title: 'Punkte Entwicklung pro Quiz',
            hAxis: {title: 'Quiz',  titleTextStyle: {color: '#333'}},
            vAxis: {minValue: 0}
          };
          var chart = new google.visualization.AreaChart(document.getElementById('points'));
          chart.draw(data, options);
        }
    </script>
<!-- Chart Answered -->
<script type="text/javascript">
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['', ''],
          ['beantwortet',     <?php echo $answered?>],
          ['nicht gelöst',     <?php echo 100 - $answered?>],
        ]);

        var options = {
          title: 'Beantwortete Fragen'
        };
        var chart = new google.visualization.PieChart(document.getElementById('answered'));
        chart.draw(data, options);
      }
</script>
<!-- Chart AnsweredCorrect -->
<script type="text/javascript">
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['', ''],
          ['richtig beantwortet',     <?php echo $answeredRight?>],
          ['falsch beantowrtet',     <?php echo 100 - $answeredRight?>],
        ]);

        var options = {
          title: 'Beantwortete Fragen'
        };
        var chart = new google.visualization.PieChart(document.getElementById('answeredCorrect'));
        chart.draw(data, options);
      }
</script>
</head>
<body>
	<?php include_once 'resources/form_controller.php';
	include_once 'resources/navigation.php'; ?>
	<div class="container">
		<div class="col-md-12">
			<h1>Dein Statistiken</h1>
			<hr>
		</div>
		<div class="col-md-12">
			<h3>
				<?php echo "Dein Punktzahl: " . $user->__get('points') . " Punkte";?>
			</h3>
		</div>
		<row>
		<div class="col-md-4">
			<div id="correct" style="width: auto; height: 200px;"></div>
		</div>
		<div class="col-md-4">
			<div id="answered" style="width: auto; height: 200px;"></div>
		</div>
		<div class="col-md-4">
			<div id="answeredCorrect" style="width: auto; height: 200px;"></div>
		</div>
		</row>
		<row>
		<div class="col-md-6">
			<div id="points" style="width: auto; height: 350px;"></div>
		</div>
		</row>
	</div>
	<hr />
	<?php include_once 'resources/footer.php';?>
</body>
</html>
