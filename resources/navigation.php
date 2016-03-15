
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
					data-toggle="dropdown" href="#">Profil<span class="caret"></span>
				</a>
					<ul class="dropdown-menu">
						<li><a href="#">..Benutzername..</a></li>
						<li><a href="#">Statistik</a></li>
						<li><a href="#">Abzeichen</a></li>
					</ul></li>
			</ul>
			<ul class="nav navbar-nav navbar-right">
				<li><a data-toggle="modal" href="#myModal"><i
						class="fa fa-user-plus"></i> Sign Up</a></li>
				<li class="dropdown"><a class="dropdown-toggle"
					data-toggle="dropdown" href="#"><i class="fa fa-sign-in"></i> Login<span
						class="caret"></span> </a>
					<ul class="dropdown-menu login-menu">
						<li>
							<form method="post" action="index.php">
								<div class="form-group">
									<label for="inputUsername">Username</label> <input type="text"
										class="form-control" id="inputUsername" name="userLogin" placeholder="Username"
										required>
								</div>
								<div class="form-group">
									<label for="inputPassword">Passwort</label><input
										type="password" class="form-control" id="inputPassword"
										placeholder="Passwort" name="passwordLogin" required> <a href="#"> Passwort
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
					<h4 class="modal-title">
						<i class="fa fa-user-plus"></i> Registrieren
					</h4>
				</div>
				<div class="container"></div>
				<form method="post" action="index.php">
					<div class="modal-body">
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label for="inputUsername">Username</label> <input type="text"
										class="form-control" id="inputUsername" name="username" placeholder="Username"
										required>
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label for="inputFirstname">Vorname</label> <input type="text"
										class="form-control" id="inputFirstname" name="surname" placeholder="Vorname"
										required>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label for="inputName">Nachname</label> <input type="text"
										class="form-control" id="inputName" name="name" placeholder="Nachname"
										required>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
								<div class="form-group">
									<label for="inputEmail">Email</label> <input type="email"
										class="form-control" id="inputEmail" name="email" placeholder="Email"
										required>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
								<div class="form-group">
									<label for="inputPassword">Passwort</label><input
										type="password" class="form-control" name="passwordOne" id="inputPassword"
										placeholder="Password" required>
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-group">
									<label for="inputPassword">Passwort best&auml;tigen</label><input
										type="password" class="form-control" name="passwordTow" id="inputPassword"
										placeholder="Password" required>
								</div>
							</div>
						</div>

					</div>
					<div class="modal-footer">
						<a href="#" data-dismiss="modal" class="btn">Abbrechen</a>
						<button type="submit" class="btn btn-default">Registrieren</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
