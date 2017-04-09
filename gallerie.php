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
		<div class="row" id="autre">
			<div class="col-md-1">
				<h3>Catégories</h3>
			</div>
		</div>
		<div class="row row-eq-height" id="autre">
			<div class="col-md-1" id="cats">
				<label>Vintage</label>
			</div>
			<div class="col-md-11">
				 <?php
				 session_start();

				 try
				{
					require('connect.php');
					$reponse = $bdd->query('SELECT * FROM items WHERE category = 1 AND isApproved = 1');
					 
					 
					while ($donnees = $reponse->fetch())
					{
						  echo '<div class="col-xs-3 col-md-3">';
								echo '<h3>'.stripcslashes($donnees['nom']).'</h3>';
									echo '<div class="embed-responsive embed-responsive-4by3">';
										echo '<a href="apercu.php?id='.$donnees['id_items'].'"><img class="embed-responsive-item" src="'.$donnees['link'].'" alt="'.stripcslashes($donnees['description']).'"/></a>';
									echo '</div>';
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
			<div class="col-md-1" id="cats">
				<label>Art contemporain</label>
			</div>
			<div class="col-md-11">
				 <?php
				 try
				{
					require('connect.php');
					$reponse = $bdd->query('SELECT * FROM items WHERE category = 2 AND isApproved = 1');
					 
					while ($donnees = $reponse->fetch())
					{
						echo '<div class="affichages">';
								echo '<h3>'.stripcslashes($donnees['nom']).'</h3>';
									echo '<div class="embed-responsive embed-responsive-4by3">';
										echo '<a href="apercu.php?id='.$donnees['id_items'].'"><img class="embed-responsive-item" src="'.$donnees['link'].'" alt="'.stripcslashes($donnees['description']).'"/></a><br/>';
									echo '</div>';
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
			<div class="col-md-1" id="cats">
				<label>Painting</label>
			</div>
			<div class="col-md-11">
				 <?php
				 try
				{
					require('connect.php');
					$reponse = $bdd->query('SELECT * FROM items WHERE category = 3 AND isApproved = 1');
					 
					while ($donnees = $reponse->fetch())
					{
						echo '<div class="affichages">';
								echo '<h3>'.stripcslashes($donnees['nom']).'</h3>';
									echo '<div class="embed-responsive embed-responsive-4by3">';
										echo '<a href="apercu.php?id='.$donnees['id_items'].'"><img class="embed-responsive-item" src="'.$donnees['link'].'" alt="'.stripcslashes($donnees['description']).'"/></a><br/>';
									echo '</div>';
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
				<div class="col-md-1" id="cats">
					<label>Black and White</label>
				</div>
				<div class="col-md-11">
					 <?php
					 try
					{
						require('connect.php');
						$reponse = $bdd->query('SELECT * FROM items WHERE category = 4 AND isApproved = 1');
						 
						while ($donnees = $reponse->fetch())
						{
							echo '<div class="affichages">';
								echo '<h3>'.stripcslashes($donnees['nom']).'</h3>';
									echo '<div class="embed-responsive embed-responsive-4by3">';
										echo '<a href="apercu.php?id='.$donnees['id_items'].'"><img class="embed-responsive-item" src="'.$donnees['link'].'" alt="'.stripcslashes($donnees['description']).'"/></a><br/>';
									echo '</div>';
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
				<div class="col-md-1" id="cats">
					<label>Photos</label>
				</div>
				<div class="col-md-11">
					 <?php
					 try
					{
						require('connect.php');
						$reponse = $bdd->query('SELECT * FROM items WHERE category = 5 AND isApproved = 1');
						 
						while ($donnees = $reponse->fetch())
						{
						  echo '<div class="col-xs-3 col-md-3">';
								echo '<h3>'.stripcslashes($donnees['nom']).'</h3>';
									echo '<div class="embed-responsive embed-responsive-4by3">';
										echo '<a href="apercu.php?id='.$donnees['id_items'].'"><img class="embed-responsive-item" src="'.$donnees['link'].'" alt="'.stripcslashes($donnees['description']).'"/></a><br/>';
									echo '</div>';
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
				<div class="col-md-1" id="cats">
					<label>Lights</label>
				</div>
				<div class="col-md-11">
					 <?php
					 try
					{
						require('connect.php');
						$reponse = $bdd->query('SELECT * FROM items WHERE category = 6 AND isApproved = 1');
						 
						while ($donnees = $reponse->fetch())
						{
							echo '<div class="affichages">';
								echo '<h3>'.stripcslashes($donnees['nom']).'</h3>';
									echo '<div class="embed-responsive embed-responsive-4by3">';
										echo '<a href="apercu.php?id='.$donnees['id_items'].'"><img class="embed-responsive-item" src="'.$donnees['link'].'" alt="'.stripcslashes($donnees['description']).'"/></a><br/>';
									echo '</div>';
							if(isset($_SESSION['id'])){
							echo '<a href="admin/supprimerImage.php?id='.$donnees['id_items'].'" id="myButton">Supprimer</a>';}
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
				<div class="col-md-1" id="cats">
					<label>Games</label>
				</div>
				<div class="col-md-11">
					 <?php
					 try
					{
						require('connect.php');
						$reponse = $bdd->query('SELECT * FROM items WHERE category = 7 AND isApproved = 1');
						 
						while ($donnees = $reponse->fetch())
						{
							echo '<div class="affichages">';
								echo '<h3>'.stripcslashes($donnees['nom']).'</h3>';
									echo '<div class="embed-responsive embed-responsive-4by3">';
										echo '<a href="apercu.php?id='.$donnees['id_items'].'"><img class="embed-responsive-item" src="'.$donnees['link'].'" alt="'.stripcslashes($donnees['description']).'"/></a><br/>';
									echo '</div>';
							if(isset($_SESSION['id'])){
							echo '<a href="admin/supprimerImage.php?id='.$donnees['id_items'].'" id="myButton">Supprimer</a>';}
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
				<div class="col-md-1" id="cats">
					<label>Sculptures</label>
				</div>
				<div class="col-md-11">
					 <?php
					 try
					{
						require('connect.php');
						$reponse = $bdd->query('SELECT * FROM items WHERE category = 8 AND isApproved = 1');
						 
						while ($donnees = $reponse->fetch())
						{
							echo '<div class="row">';
								echo '<div class="col-sm-3 col-md-3">';
								echo '<h3>'.stripcslashes($donnees['nom']).'</h3>';
									echo '<div class="embed-responsive embed-responsive-4by3">';
										echo '<a href="apercu.php?id='.$donnees['id_items'].'"><img class="embed-responsive-item" src="'.$donnees['link'].'" alt="'.stripcslashes($donnees['description']).'"/></a><br/>';
									echo '</div>';
								echo '</div>';
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
		</div>
	</body>
	<?php include('footer.php') ?>
</html>
