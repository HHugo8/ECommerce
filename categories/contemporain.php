<!DOCTYPE html>
<html>

    <head>

        <meta charset="utf-8" />
        <title>Vintage</title>
        <link rel="stylesheet" href="../main.css" type="text/css"/>
		<link href="../bootstrap/css/bootstrap.css" rel="stylesheet">
        
    </head>


    <body id="admin">
		<div class="row">
			<div class="col-lg-offset-3 col-lg-6" id="autre">
				<h1>Catégorie d'images : Vintage </h1>
			</div>
		</div>
		<div class="row" id="autre">
		<?php include('../menuVertical.php') ?>
			<div class=" col-lg-10" id="autre">
					<?php
					 try
					{
	                  
						$reponse = $bdd->query('SELECT * FROM items WHERE category = 2');
						while ($donnees = $reponse->fetch())
						{
							echo '<div class="affichages">';
							echo 'Titre : '.stripcslashes($donnees['nom']).'';
							echo '<a href="apercu.php?id='.$donnees['id_items'].'"><img class="resize" src="'.$donnees['link'].'" alt="'.stripcslashes($donnees['description']).'" /></a><br/>';
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
		</div>
	</body>
</html>