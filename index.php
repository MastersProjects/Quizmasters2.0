<!DOCTYPE html>
<html>
<head>
		<?php include_once 'includes/head.php'; ?>
	</head>
<body>
	<nav class="navbar navbar-default navbar-fixed-top">
		<div class="container">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse"
					data-target="#myNavbar">
					<!-- 3 lines for the Burger -->
					<span class="icon-bar"></span> <span class="icon-bar"></span> <span
						class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="#">QuizMasters 2.0</a>
			</div>
			<div class="collapse navbar-collapse" id="myNavbar">
				<ul class="nav navbar-nav">
					<li class="active"><a href="#">Quiz</a></li>
					<li class="dropdown"><a class="dropdown-toggle"
						data-toggle="dropdown" href="#">Profil<span class="caret"></span></a>
						<ul class="dropdown-menu">
							<li><a href="#">..Benutzername..</a></li>
							<li><a href="#">Statistik</a></li>
							<li><a href="#">Abzeichen</a></li>
						</ul></li>
				</ul>
				<ul class="nav navbar-nav navbar-right">
					<li><a href="#"><span class="glyphicon glyphicon-user"></span> Sign
							Up</a></li>
					<li class="dropdown"><a class="dropdown-toggle"
						data-toggle="dropdown" href="#"><span
							class="glyphicon glyphicon-log-in"></span> Login<span
							class="caret"></span></a>
						<ul class="dropdown-menu login-menu">
							<li>
								<form method="post" action="index.php">
									<div class="form-group">
										<label for="inputUsername">Username</label> <input
											type="text" class="form-control" id="inputUsername"
											placeholder="Username">
									</div>
									<div class="form-group">
										<label for="inputPassword">Passwort</label><input
											type="password" class="form-control"
											id="inputPassword" placeholder="Password">
											<a href="#"> Passwort vergessen?</a> 
									</div>
									<button type="submit" class="btn btn-default">Submit</button>
								</form>
							</li>
						</ul></li>
				</ul>
			</div>
		</div>
	</nav>
	<div class="container">
		<div class="col-md-10">
			<div class="row">
				<div class="col-md-4">
					<img class="img-responsive" alt="Test" src="img/placeholder.jpg">
				</div>
				<div class="col-md-8">
					<p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed
						diam nonumy eirmod tempor invidunt ut labore et dolore magna
						aliquyam erat, sed diam voluptua. At vero eos et accusam et justo
						duo dolores et ea rebum. Stet clita kasd gubergren, no sea
						takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor
						sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod
						tempor invidunt ut labore et dolore magna aliquyam erat, sed diam
						voluptua. At vero eos et accusam et justo duo dolores et ea rebum.
						Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum
						dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing
						elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore
						magna aliquyam erat, sed diam voluptua. At vero eos et accusam et
						justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea
						takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor
						sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod
						tempor invidunt ut labore et dolore magna aliquyam erat, sed diam
						voluptua. At vero eos et accusam et justo duo dolores et ea rebum.
						Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum
						dolor sit amet.
				
				</div>
			</div>
			<hr />
		</div>
		<div class="col-md-2">
			<img src="img/ad.jpg" alt="Werbung" class="img-responsive">
		</div>
	</div>
</body>
</html>