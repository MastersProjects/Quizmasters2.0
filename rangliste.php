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
	include_once 'resources/navigation.php'; 
	$result = Database::getInstance()->getRanking();
	?>
	<div class="container">
		<div class="col-md-12"></div>
		<h1>Top 10</h1>
		<hr>
		<table class="table table-striped">
			<thead>
				<tr>
					<th>Rank</th>
					<th>Username</th>
					<th>Points</th>
			
			</thead>
			<tbody>
				<?php foreach($result as $row){
					echo "<tr>";
					foreach($row as $column){
						echo "<th>" . $column . "</th>";
					}

			}?>
			</tbody>
		</table>

	</div>
	</div>
	<hr>
	<?php include_once 'resources/footer.php';?>

</body>
</html>
