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
					<li><a data-toggle="modal" href="#myModal"><i class="fa fa-user-plus"></i> Sign Up</a></li>
					<li class="dropdown"><a class="dropdown-toggle"
						data-toggle="dropdown" href="#"><i class="fa fa-sign-in"></i> Login<span
							class="caret"></span></a>
						<ul class="dropdown-menu login-menu">
							<li>
								<form method="post" action="index.php">
									<div class="form-group">
										<label for="inputUsername">Username</label> <input type="text"
											class="form-control" id="inputUsername"
											placeholder="Username" required>
									</div>
									<div class="form-group">
										<label for="inputPassword">Passwort</label><input
											type="password" class="form-control" id="inputPassword"
											placeholder="Password" required> <a href="#"> Passwort
											vergessen?</a>
									</div>
									<button type="submit" class="btn btn-default">Anmelden</button>
								</form>
							</li>
						</ul></li>
				</ul>
			</div>
		</div>
	</nav>
	<div class="container">
		<div class="modal" id="myModal">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal"
							aria-hidden="true">
							<i class="fa fa-times"></i>
						</button>
						<h4 class="modal-title">Login</h4>
					</div>
					<div class="container"></div>
					<form method="post" action="index.php">
						<div class="modal-body">
							<div class="form-group">
								<label for="inputUsername">Username</label> <input type="text"
									class="form-control" id="inputUsername" placeholder="Username"
									required>
							</div>
							<div class="form-group">
								<label for="inputPassword">Passwort</label><input
									type="password" class="form-control" id="inputPassword"
									placeholder="Password" required> <a href="#"> Passwort
									vergessen?</a>
							</div>

						</div>
						<div class="modal-footer">
							<a href="#" data-dismiss="modal" class="btn">Close</a>
							<button type="submit" class="btn btn-default">Anmelden</button>
						</div>
					</form>
				</div>
			</div>
		</div>
		<div class="modal" id="myModal2" data-backdrop="static">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal"
							aria-hidden="true">×</button>
						<h4 class="modal-title">Second Modal title</h4>
					</div>
					<div class="container"></div>
					<div class="modal-body">Content for the dialog / modal goes here.</div>
					<div class="modal-footer">
						<a href="#" data-dismiss="modal" class="btn">Close</a> <a href="#"
							class="btn btn-primary">Save changes</a>
					</div>
				</div>
			</div>
		</div>
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
	<section id="footer">
		<div class="container text-center">
			<div class="col-md-4">
				<h3>About</h3>
				<p><a href="#">&Uuml;ber uns</a></p>
				<p><a href="#">Kontakt</a></p>
				<p><a href="#">Impressum</a></p>
			</div>
			<div class="col-md-4">
				<h3>News</h3>
				<p>Wir haben Quizmasters &uuml;berarbeitet und hoffen dir gef&auml;llt unsere neue Webseite.
			</div>
			<div class="col-md-4">
				<h3>Copyright</h3>
				<p>by Luca Marti, Phong Penglerd, Elia Perenzin <br> &copy; Quizmasters.ch <?php echo date("Y")?></p>
			</div>
		</div>
	</section>
</body>
</html>