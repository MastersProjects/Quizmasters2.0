<?php
session_start ();
include_once 'database/database_infos.php';
include_once 'database/Database.php';
$user = unserialize($_SESSION['user']);
$rightFalse = Database::getInstance()->getRightFalse($user->__get('userID'));
$pointsQuiz = Database::getInstance()->getPointsQuiz($user->__get('userID'));
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
        var chart = new google.visualization.PieChart(document.getElementById('piechart'));
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
            hAxis: {title: 'Year',  titleTextStyle: {color: '#333'}},
            vAxis: {minValue: 0}
          };
          var chart = new google.visualization.AreaChart(document.getElementById('chart_div'));
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
		<div class="col-md-6">
			<div id="piechart" style="width: auto; height: 350px;"></div>
		</div>
		<div class="col-md-6">
			<div id="chart_div" style="width: auto; height: 350px;"></div>
		</div>
	</div>
	<hr />
	<?php include_once 'resources/footer.php';?>
</body>
</html>
