 <!DOCTYPE html>
<html>

    <head>

        <meta charset="utf-8" />
        <title>E-World Art Gallery</title>
        <link rel="stylesheet" href="main.css" type="text/css"/>
		<link href="bootstrap/css/bootstrap.css" rel="stylesheet">
        
    </head>
	<body id="base">
		<div class="row" id="autre">
			<div class="col-lg-1">
				<h3>Catégories</h3>
			</div>
		</div>
		<div class="row row-eq-height" id="autre">
			<div class="col-lg-1" id="cats">
				<label>Lights</label>
			</div>
			<div class="col-lg-11">
				 <?php
				 try
				{
					require('connect.php');
					$reponse = $bdd->query('SELECT * FROM items WHERE category = 6');
					 
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
		<div class="row row-eq-height" id="autre">
			<div class="col-lg-1" id="cats">
				<label>Vintage</label>
			</div>
			<div class="col-lg-11">
				 <?php
				 try
				{
					require('connect.php');
					$reponse = $bdd->query('SELECT * FROM items WHERE category = 1');
					 
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
