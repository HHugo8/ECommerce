<!DOCTYPE html>
<html>

    <head>

        <meta charset="utf-8" />
        <link rel="stylesheet" href="main.css" type="text/css"/>
		<link href="bootstrap/css/bootstrap.css" rel="stylesheet">
    </head>
	<body id="last_news">
			<div class="row row-eq-height" id="autre">
				<div class="col-md-offset-2 col-md-8">
					<h2>Les dernières oeuvres</h2>
				</div>
			</div>
			<div class="row" id="autre">
					<?php
					 try
					{
						require('connect.php');
						$reponse = $bdd->query('SELECT * FROM items ORDER BY upload_date LIMIT 3');
						while ($donnees = $reponse->fetch())
						{
							echo '<div class="affichages">';
							echo 'Titre : '.stripcslashes($donnees['nom']).'';
							echo '<a href="apercu.php?id='.$donnees['id_items'].'"><img class="resize" src="'.$donnees['link'].'" title="'.stripcslashes($donnees['description']).'" /></a>';
							echo '</div>';
						}							  
						$reponse->closeCursor(); 
					}
					catch(Exception $e)
					{
						die('Erreur : '.$e->getMessage());
					}
					?>
			</div>
			<div class="row" id="autre">
				<div class="col-md-offset-2 col-md-8">
					<h2>Les dernières oeuvres de l'artiste mis à l'honneur</h2>
				</div>
					<?php
					 try
					{
						require('connect.php');
						$reponse = $bdd->query('SELECT * FROM items WHERE artist = (SELECT name FROM artistes WHERE isHonor = 1) ORDER BY upload_date LIMIT 3');
						while ($donnees = $reponse->fetch())
						{
							echo '<div class="affichages">';
							echo 'Titre : '.stripcslashes($donnees['nom']).'';
							echo '<a href="apercu.php?id='.$donnees['id_items'].'"><img class="resize" src="'.$donnees['link'].'" title="'.stripcslashes($donnees['description']).'" /></a>';
							echo '</div>';
						}							  
						$reponse->closeCursor(); 
					}
					catch(Exception $e)
					{
						die('Erreur : '.$e->getMessage());
					}
					?>
			</div>
	</body>
</html>
