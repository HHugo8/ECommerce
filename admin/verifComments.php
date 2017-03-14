 <!DOCTYPE html>
 <?php
session_start();
//verifier si id session= 1 et sinon renvoyer sur une 404
?>
<html>

    <head>

        <meta charset="utf-8" />
        <title>Commentaires à vérifier</title>
        <link rel="stylesheet" href="../main.css" type="text/css"/>
		<link href="../bootstrap/css/bootstrap.css" rel="stylesheet">
        
    </head>
	<body id="base">
		<div class="row" id="autre">
			<div class="col-lg-offset-5 col-lg-2">
				<h3>Commentaires pas encore approuvés</h3>
			</div>
		</div>
		<div class="row row-eq-height">
			<div class="col-lg-11">
				 <?php
				 try
				{
					require('../connect.php');
					$reponse = $bdd->query('SELECT * FROM commentaires WHERE isApproved = 0');
					$count = $bdd->query('SELECT count(id_commentaire) as countId FROM commentaires WHERE isApproved = 0');
					$nbligne = $count->fetch();
					if($nbligne['countId'] == 0) echo 'Il n\'y a aucun commentaire à vérifier pour le moment';
					else{
						while ($donnees = $reponse->fetch())
					{
						echo '<div class="affichages">';
						echo '<form action="verificationComments.php" method="post">';
						echo '<input type="hidden" name="id_commentaire" id="id_commentaire" value="'.$donnees['id_items'].'" /><br/>';
						echo '<label id="autre">Message : </label><input type="text" name="name" id="name" value="'.stripcslashes($donnees['nom']).'" required /><br/>';
						echo '<label id="autre">Email : </label><textarea name="description" id="description" value="'.stripcslashes($donnees['description']).'" required ></textarea><br/>';
						echo '<label id="autre">Date du message : </label><input type="text" name="price" id="price" value="'.$donnees['price'].'" required /><br/>';
						echo '<input type="submit" name="save" id="save" value="save" />'; 
						echo '</form>';
						echo '</div>';
					}						
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
	<?php include('../footer.php') ?>
	<a href="adminMain.php" id="myButton">Retour</a>
</html>
