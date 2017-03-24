<!DOCTYPE html>
<html>

    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="main.css" type="text/css"/>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        
    </head>
    <body id="base">
<?php
require('connect.php');
if(!empty($_POST['search'])){

    $requete = htmlspecialchars($_POST['search']);
	$rech1 = $bdd->prepare("SELECT * FROM items WHERE artist LIKE :search OR description LIKE :search OR nom LIKE :search OR ISBN LIKE :search");
	$rech2 = $bdd->prepare("SELECT * FROM artistes WHERE name LIKE :search");
	$rech3 = $bdd->prepare("SELECT * FROM events WHERE name LIKE :search OR description LIKE :search");
	$rech4 = $bdd->prepare("SELECT * FROM news WHERE title LIKE :search OR content LIKE :search");
	$rech1->execute(array('search' => '%'.$requete.'%'));
	$rech2->execute(array('search' => '%'.$requete.'%'));
	$rech3->execute(array('search' => '%'.$requete.'%'));
	$rech4->execute(array('search' => '%'.$requete.'%'));	
	$nb1 = $rech1->rowCount();
	$nb2 = $rech2->rowCount();
	$nb3 = $rech3->rowCount();
	$nb4 = $rech4->rowCount();
	if($nb1 >= 1){
				echo '<div class="alert alert-success">';
					echo 'Il y a <strong>'.$nb1.'</strong> résultat correspondant dans les oeuvres';
				echo '</div><br/>';
		while($donnees = $rech1->fetch()){
			echo '<div class="row">';
			echo '<div class="col-md-offset-4 col-md-4">';
				echo '<div class="row">';
					echo '<div class="col-md-offset-4 col-md-5">';
						echo '<img class="search" src="'.$donnees['link'].'" title="'.stripcslashes($donnees['description']).'" readonly/>';
					echo '</div>';
			echo '</div>';
			echo '<a href="apercu.php?id='.$donnees['id_items'].'">Plus d\'informations</a>';
			echo '</div>';
			echo '</div>';
		}
	}
	else {
			echo '<div class="alert alert-warning">';
			echo '<strong>Aucun résultat correspondant dans les oeuvres</strong>';
			echo '</div><br/>';
	}
	if($nb2 >= 1){
				echo '<div class="alert alert-success">';
					echo 'Il y a <strong>'.$nb2.'</strong> résultat correspondant dans les artistes';
				echo '</div><br/>';
		while($donnees = $rech2->fetch()){
			echo '<div class="row">';
			echo '<div class="col-md-offset-4 col-md-4">';
			echo '<input type="text" class="form-control" name="nom" id="nom" value="'.$donnees['name'].'" readonly/>';
			$count = $bdd->prepare('SELECT id_items FROM items WHERE artist = :artist');
			$count->execute(array('artist' => $donnees['name']));
			$nb = $count->rowCount();
			echo '<input type="text" class="form-control" name="nom" id="nom" value="Nombre d\'oeuvres : '.$nb.'" readonly/>';
			echo '</div>';
			echo '</div>';
			}
	}
	else {
			echo '<div class="alert alert-warning">';
			echo '<strong>Aucun résultat correspondant dans les artistes</strong>';
			echo '</div><br/>';
	}
	if($nb3 >= 1){
				echo '<div class="alert alert-success">';
					echo 'Il y a <strong>'.$nb3.'</strong> résultat correspondant dans les évènements';
				echo '</div><br/>';
		while($donnees = $rech3->fetch()){
			echo '<div class="row">';
			echo '<div class="col-md-offset-4 col-md-4">';
			echo '<input type="text" class="form-control" name="nom" id="nom" value="'.$donnees['name'].'" readonly/>';
			echo '<input type="text" class="form-control" name="desc" id="desc" value="'.$donnees['description'].'" readonly/>';
			echo '</div>';
			echo '</div>';
		}
	}
    	else {
			echo '<div class="alert alert-warning">';
			echo '<strong>Aucun résultat correspondant dans les évènements</strong>';
			echo '</div><br/>';
	}
	if($nb4 >= 1){
				echo '<div class="alert alert-success">';
					echo 'Il y a <strong>'.$nb4.'</strong> résultat correspondant dans les news';
				echo '</div><br/>';
		while($donnees = $rech4->fetch()){
			echo '<div class="row">';
			echo '<div class="col-md-offset-4 col-md-4">';
			echo '<div class="panel panel-default">';
				echo '<div class="panel-heading">';
					echo '<h3 class="panel-title">'.nl2br(stripcslashes($donnees['title'])).'</h3>';
				echo '</div>';
				echo '<div class="panel-body">'. nl2br(stripcslashes($donnees['content'])).'</div><br/><a href="readMore.php?id='.$donnees['id_news'].'" >Lire plus</a></div>';					
			echo '</div>';
			echo '</div>';
			echo '</div>';
		}
	}
	else {
		echo '<div class="alert alert-warning">';
		echo '<strong>Aucun résultat correspondant dans les news</strong>';
		echo '</div><br/>';
	}
}
else{
		echo '<div class="alert alert-danger">';
			echo '<strong>Attention!</strong> Vous n\'avez rien indiqué dans le champ de la recherche.';
		echo '</div>';
	}
?>
<br/><br/>
<a href="main.php"><button name="retour" id="myButton">Retour</button></a>

</body>
</html>