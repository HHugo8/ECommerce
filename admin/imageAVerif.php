 <!DOCTYPE html>
 <?php
session_start();
//verifier si id session= 1 et sinon renvoyer sur une 404
?>
<html>

    <head>

        <meta charset="utf-8" />
        <title>Images à vérifier</title>
        <link rel="stylesheet" href="../main.css" type="text/css"/>
		<link href="../bootstrap/css/bootstrap.css" rel="stylesheet">
        
    </head>
	<body id="base">
		<div class="row" id="autre">
			<div class="col-lg-offset-5 col-lg-2">
				<h3>Images pas encore approuvées</h3>
			</div>
		</div>
		<div class="row row-eq-height">
			<div class="col-lg-11">
				 <?php
				 try
				{
					require('../connect.php');
					$reponse = $bdd->query('SELECT * FROM items WHERE isApproved = 0');
					$count = $bdd->query('SELECT count(id_items) as countId FROM items WHERE isApproved = 0');
					$nbligne = $count->fetch();
					if($nbligne['countId'] == 0) echo 'Il n\'y a aucune image à vérifier pour le moment';
					else{
						while ($donnees = $reponse->fetch())
					{
						echo '<div class="affichages">';
						echo '<form action="verificationImages.php" method="post">';
						echo '<a href="../apercu.php?id='.$donnees['id_items'].'"><img class="resize" src="../'.$donnees['link'].'"/></a><br/>';
						echo '<input type="hidden" name="id_item" id="id_item" value="'.$donnees['id_items'].'" /><br/>';
						echo '<label id="autre">Nom : </label><input type="text" class="form-control" name="name" id="name" value="'.stripcslashes($donnees['nom']).'" required /><br/>';
						echo '<label id="autre">Description : </label><textarea name="desc" class="form-control" id="desc" required >'.stripcslashes($donnees['description']).'</textarea><br/>';
						echo '<label id="autre">Prix : </label><input type="text" class="form-control" name="price" id="price" value="'.$donnees['price'].'" required /><br/>';
						echo '<label id="autre">Taille : </label><input type="text" class="form-control" name="size" id="size" value="'.$donnees['size'].'" required /><br/>';
						echo '<input type="submit" name="save" id="save" value="Sauvegarder" />'; 
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
