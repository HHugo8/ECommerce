 <!DOCTYPE html>
 <?php
session_start();
?>
<html>

    <head>
        <meta charset="utf-8" />
        <title>About</title>
        <link rel="stylesheet" href="main.css" type="text/css"/>
		<link href="bootstrap/css/bootstrap.css" rel="stylesheet">   
		<link rel="stylesheet" href="test.css" type="text/css" media="screen"/>	
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </head>
	<body id="base">
	<?php include('navbar.php') ?>
	    <header class="row" id="autre">
			<div class="col-md-offset-5 col-md-2">
				<p><h1>Notre équipe</h1>
			</div>
        </header>
		<br/>
		<div class="row" id="color">
            <div class="col-md-offset-4 col-md-4 well">
				<p> Description de l'entreprise </p>
            </div>
		</div>
		<div class="row" id="color">
            <div class="col-md-offset-5 col-md-2 well">
				<p> Mr Alain Boinet </p>
				<p>
					A.M.INVEST. sprl<br/>
					Rue Giroune, 17d<br/>
					1421 Ophain-Bois-Seigneur-Isaac<br/>
					Tél./GSM: +32.475.41.07.53<br/>
				</p>
            </div>
		</div>
		<div class="row" id="color">
            <div class="col-md-offset-5 col-md-2 well">
				<p> Clement Leurquin </p>
				<p>
				<a href="https://www.facebook.com/clement.leurquin">Facebook</a><br/>
				Mail: jobstud@hotmail.fr<br/>
				Tél./GSM: <br/>
				</p>
            </div>
		</div>
		<div class="row" id="color">
			<div class="col-md-offset-5 col-md-2 well">
				<p> Hugo Duret </p>
				<p>
				<a href="https://www.linkedin.com/in/hugo-duret-564026109/">Linkedin</a><br/>
				<a href="https://www.facebook.com/hugo.duret.9">Facebook</a><br/>
				Mail: jobstud@hotmail.fr<br/>
				Tél./GSM: +32.475.26.76.27<br/>
				</p>
            </div>
		</div>
		<div class="row" id="color">
			<div class="col-md-offset-5 col-md-2 well">
				<p> Benjamin Convalli </p>
				<p>
				<a href="https://www.facebook.com/profile.php?id=1217541189">Facebook</a><br/>
				Mail: byuuki@gmail.com<br/>
				Tél./GSM: <br/>
				</p>
            </div>
        </div>
		
	</body>
	<?php include('footer.php') ?>
</html>