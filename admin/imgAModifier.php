 <!DOCTYPE html>
 <?php
session_start();
?>
<html>

    <head>

        <meta charset="utf-8" />
        <title>Images à modifier</title>
        <link rel="stylesheet" href="../main.css" type="text/css"/>
		<link href="../bootstrap/css/bootstrap.css" rel="stylesheet">
        
    </head>
	<body id="base">
		<div class="row" id="autre">
			<div class="col-md-offset-2 col-md-8">
				<h3>Image à modifier</h3>
			</div>
		</div>
		<div class="row row-eq-height">
			<div class="col-md-offset-2 col-md-8">
				 <?php
				 try
				{
					require('../connect.php');
					$idImg = intval($_GET['id']);
					$reponse = $bdd->query('SELECT * FROM items WHERE id_items = '.$idImg.'');
					 
					while ($donnees = $reponse->fetch())
					{
						echo '<div class="affichages">';
						echo '<form action="modifSupp.php" method="post">';
						echo '<img class="resize" src="../'.$donnees['link'].'"/><br/>';
						echo '<input type="hidden" name="id_item" id="id_item" value="'.$donnees['id_items'].'" /><br/>';
						echo '<label id="autre">Nom : </label><input type="text" name="name" id="name" value="'.stripcslashes($donnees['nom']).'" /><br/>';
						echo '<label id="autre">Description : </label><textarea name="description" id="description" value="'.stripcslashes($donnees['description']).'"></textarea><br/>';
						echo '<label id="autre">Prix : </label><input type="text" name="price" id="price" value="'.$donnees['price'].'" /><br/>';
						echo '<label id="autre">Taille : </label><input type="text" name="size" id="size" value="'.$donnees['size'].'" /><br/>';
						echo '<input type="submit" name="save" id="save" value="save" />'; 
						echo '</form>';
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
	<?php include('../footer.php') ?>
	<a href="../adminMain.php" id="myButton">Retour</a>
</html>
