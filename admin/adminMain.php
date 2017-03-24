<!DOCTYPE html>
<?php
session_start();
$_SESSION['username'] = 'alain_boinet';
$_SESSION['id'] = '1';
if(!isset($_SESSION['id'])){
	echo 'Vous ne pouvez pas avoir accès à cette page';
}
else {
?>
<html>

    <head>

        <meta charset="utf-8" />
        <title>Admin</title>
        <link rel="stylesheet" href="../main.css" type="text/css"/>
		<link href="../bootstrap/css/bootstrap.css" rel="stylesheet">
        
    </head>


    <body id="admin">
		<div class="row">
			<div class="col-md-offset-3 col-md-6" id="autre">
				<h1>Bienvenue sur l'espace d'administration <?php echo $_SESSION['login'] ?></h1>
			</div>
		</div>
		<div class="row" id="choix">
			<div class="col-md-offset-3 col-md-2">
				<a href="createPost.php" id="myButton">Créer une news</a>
			</div>
			<div class="col-md-2">
				<a href="../traitement.php" id="myButton">Uploader des images</a>
			</div>
			<div class="col-md-2">
				<a href="createEvent.php" id="myButton">Créer un event</a>
			</div>
		</div>
		<div class="row" id="choix">
			<div class="col-md-offset-3 col-md-2">
				<a href="../gallerie.php" id="myButton">Gallerie d'images</a>
			</div>
			<div class="col-md-2">
				<a href="imageAVerif.php" id="myButton">Images à vérifier</a>
			</div>
			<div class="col-md-2">
				<a href="artistHonor.php" id="myButton">Mettre un artiste à l'honneur</a>
			</div>
		</div>
		<div class="row" id="choix">
			<div class="col-md-offset-3 col-md-2">
				<a href="newslettersMembers.php" id="myButton">Les abonnés</a>
			</div>
			<div class=" col-md-2">
				<a href="logout.php" id="myButton">Se déconnecter</a>
			</div>
			<div class="col-md-2">
				<a href="verifComments.php" id="myButton">Vérifier les commentaires</a>
			</div>
		</div>
		<div class="row" id="choix">
			<div class="col-md-offset-3 col-md-2">
				<a href="../stats.php" id="myButton">Les statistiques du site</a>
			</div>
		</div>
	</body>
</html>
<?php } ?>