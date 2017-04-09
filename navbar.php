<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="main.css" type="text/css"/>
		<link href="bootstrap/css/bootstrap.css" rel="stylesheet" media="screen">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

	<nav class="navbar navbar-toggleable-md navbar-light bg-faded navbar-fixed-top">
	<div class="row-eq-height" style="background-color:rgba(0, 0, 0, 0.3);">
		<div class="col-md-1">
				<a href="main.php"><img alt="Brand" src="http://img11.hostingpics.net/pics/631764logo.jpg"></a>
		</div>
		<div class="col-md-3" id="titre">
			<p><i><h1>E-World Art Gallery</h1></i></p>
				<div id="description">
					<h4><i>A Virtual Gallery</i></h4>
				</div>
		</div>
		<div class="col-md-8">
			<div class="container-fluid">
				<ul class="nav navbar-nav">
					<li class="active"><a href="main.php">Accueil</a></li>
					<li><a href="gallerie.php">Catalogue</a>
					<li><a href="events.php">Events</a></li>
					<li><a href="news.php">News</a></li>
					<li><a href="about.php">About us</a></li>
					<li><a href="contactUs.php">Contact us</a></li>
				</ul>
				<form class="form-inline" action="search.php" method="post">
						<input class="form-control mr-sm-2" type="text" name="search" id="search" placeholder="Mot recherché" >
						<button class="btn btn-outline-success my-2 my-sm-0" type="submit">Chercher</button>
				</form>
				<?php
					if(!empty($_SESSION['pseudo'])){
							echo '<a href="panier.php" >Panier</a>';
					}
				?>
			</div>
		</div>
		</div>
	</nav>

</body>
</html>

