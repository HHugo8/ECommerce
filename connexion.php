<!DOCTYPE html>
<html>

    <head>

        <meta charset="utf-8" />
        <title>E-World Art Gallery</title>
        <link rel="stylesheet" href="main.css" type="text/css"/>
		<link rel="stylesheet" href="test.css" type="text/css" media="screen"/>	
		<link href="bootstrap/css/bootstrap.css" rel="stylesheet" media="screen">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        
    </head>
    <body id="base">
			
	<?php include('navbar.php') ?>
	  <body>
		<div class="row">
			<div class="col-md-offset-3 col-md-6">
				<h1>Bienvenue sur l'espace de connexion</h1>
            </div>
		</div>
		<div class="row">
			<div class="col-md-offset-3 col-md-6">
				<form action="" method="post">
					<label for="pseudo">Pseudo : </label><input type="text" class="form-control" name="pseudo" id="pseudo" autocomplete="off" required/><br />
					<label for="pass">Mot de passe : </label><input type="password" class="form-control" name="pass" id="pass" autocomplete="off" required/><br />
					<label for="connect"></label><button type="submit" name="connect" id="connect" class="btn btn-primary" >Se connecter</button>
				</form>
            </div>
		</div>
    </body>
</html>
<?php
if(isset($_POST['pseudo']) && !empty($_POST['pseudo']) && isset($_POST['pass']) && !empty($_POST['pass'])){
		$pseudo = htmlspecialchars(addslashes($_POST['pseudo']));
		$pass = sha1($_POST['pass']);
		require('connect.php');
		$req = $bdd->prepare('SELECT ID FROM membres WHERE pseudo = :pseudo AND pass = :pass');
		$req->execute(array(
			'pseudo' => $pseudo,
			'pass' => $pass));
		$resultat = $req->fetch();
		if (!$resultat){
			echo '<div class="alert alert-warning">';
				echo '<strong>Mauvais identifiant ou mot de passe !</strong>';
			echo '</div>';
		}
		else
		{
			session_start();
			$_SESSION['ID'] = $resultat['ID'];
			$_SESSION['pseudo'] = $pseudo;
			setcookie('pseudo',$pseudo);
			setcookie('pass',$pass);
			echo '<div class="alert alert-success">';
				echo '<strong>Vous êtes connecté</strong>';
			echo '</div>';
			header('refresh:1;URL=main.php');
		}
	}
else{
	echo '<div class="alert alert-warning">';
		echo '<strong>Veuillez compléter tous les champs</strong>';
	echo '</div>';
}
?>