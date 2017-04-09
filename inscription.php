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
				<h1>Bienvenue sur l'espace d'inscription</h1>
            </div>
		</div>
		<div class="row">
			<div class="col-md-offset-3 col-md-6">
				<form action="" method="post" >
					<label for="pseudo">Pseudo : </label><input type="text" class="form-control" name="pseudo" id="pseudo" required/><br />
					<label for="pass">Mot de passe : </label><input type="password" class="form-control" name="pass" id="pass" required/><br />
					<label for="pass2">Retaper le mot de passe : </label><input type="password" class="form-control" name="pass2" id="pass2" required/><br />
					<label for="email">Email : </label><input type="email" class="form-control" name="email" id="email" required/><br />
					<label for="nom">nom : </label><input type="text" class="form-control" name="nom" id="nom" required/><br />
					<label for="prenom">prenom : </label><input type="text" class="form-control" name="prenom" id="prenom" required/><br />
					<label for="adresse">adresse : </label><input type="text" class="form-control" name="adresse" id="adresse" required/><br />
					<label for="tel">tel : </label><input type="text" class="form-control" name="tel" id="tel" required/><br />
					<label for="validation"></label><button type="submit" name="upload" id="upload" class="btn btn-primary" >S'inscrire</button>
				</form>
            </div>
		</div>
    </body>
	<?php include('footer.php') ?>
</html>
<?php
if(isset($_POST['pseudo']) && !empty($_POST['pseudo']) && isset($_POST['pass']) && !empty($_POST['pass']) && isset($_POST['pass2']) && !empty($_POST['pass2']) && isset($_POST['email']) && !empty($_POST['email'])){
	if($_POST['pass'] == $_POST['pass2']){
		$pseudo = htmlspecialchars(addslashes($_POST['pseudo']));
		$pass = sha1($_POST['pass']);
			if(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) === false) echo 'Adresse email erronée';
			else{
				$email = htmlspecialchars(addslashes($_POST['email']));
				}
		$inscription_date = date("Y-m-d");
		$nom = htmlspecialchars(addslashes($_POST['nom']));
		$prenom = htmlspecialchars(addslashes($_POST['prenom']));
		$adresse = htmlspecialchars(addslashes($_POST['adresse']));
		$tel = htmlspecialchars(addslashes($_POST['tel']));
		require('connect.php');
		$result = $bdd->prepare('INSERT INTO membres(ID, pseudo, pass, email, nom, prenom, adresse, telephone, date_inscription) VALUES(0, :pseudo, :pass, :email,:nom, :prenom, :adresse, :telephone, :date)');
		$result->execute(array('pseudo' => $pseudo, 'pass' => $pass, 'email' => $email,'nom' => $nom, 'prenom' => $prenom, 'adresse' => $adresse, 'telephone' => $tel, 'date' => $inscription_date));
		echo '<div class="alert alert-success">';
			echo '<strong>Inscription réussie</strong>, vous pouvez vous connecter <a href="connexion.php" >ici</a>';
		echo '</div>';
	}
	else{
			echo '<div class="alert alert-warning">';
				echo '<strong>Les mots de passe ne correspondent pas !</strong>';
			echo '</div>';
		}
}
else{
	echo '<div class="alert alert-warning">';
		echo '<strong>Veuillez compléter tous les champs</strong>';
	echo '</div>';
}
?>