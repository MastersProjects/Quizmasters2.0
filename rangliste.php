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
		<div class="col-md-6">
		<h1>Top 10</h1>
		</div>
		 <div class="col-md-6">
            <div id="search_container"> 
            <form action="<?php $_SERVER['PHP_SELF']?>" method="POST">
                <div class="input-group stylish-input-group">
                    <input type="text" class="form-control"  placeholder="Search" name="search" >
                    <span class="input-group-addon">
                        <button type="submit">
                            <span class="glyphicon glyphicon-search"></span>
                        </button>  
                    </span>
                </div>
                </form>
            </div>
        </div>
		<hr>
		<table class="table table-striped table-hover">
			<thead>
				<tr>
					<th>Rank</th>
					<th>Username</th>
					<th>Points</th>
			
			</thead>
			<tbody>
				<?php foreach($result as $row){
					echo "<tr onclick=document.location='user.php?username=$row[1]'>";
					foreach($row as $column){
						echo "<th>" . $column . "</th>";
					}
					echo "</tr>";

			}?>
			</tbody>
		</table>

	</div>
	</div>
	<hr>
	<?php include_once 'resources/footer.php';?>
</body>
</html>
