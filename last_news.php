 <!DOCTYPE html>
<html>
<<<<<<< HEAD
=======

>>>>>>> origin/master
    <head>

        <meta charset="utf-8" />
        <link rel="stylesheet" href="main.css" type="text/css"/>
		<link href="bootstrap/css/bootstrap.css" rel="stylesheet">
        
    </head>
	<body id="last_news">
			<div class="row row-eq-height" id="autre">
				<div class="col-md-offset-2 col-md-8">
					<h2>Les dernières news</h2>
				</div>
			</div>
<<<<<<< HEAD
			<div class="row" id="autre">
=======
>>>>>>> origin/master
				<?php
				 try
				{
					require('connect.php');
					$reponse = $bdd->query('SELECT * FROM news ORDER BY created LIMIT 5');
<<<<<<< HEAD
=======
					 
>>>>>>> origin/master
					while ($donnees = $reponse->fetch())
					{?>
						<div class="row" id="autre">
							<div class="col-md-offset-4 col-md-4" >
								<div id="affichage_news">
								Titre : <?php echo nl2br(stripcslashes($donnees['title']))?><br/>
								Catégorie : <?php echo $donnees['category']?><br/>
								Contenu : <?php echo nl2br(stripcslashes($donnees['content']))?><br/>
								</div>
							</div>
						</div><?php
					}							  
					$reponse->closeCursor(); 
				}
				catch(Exception $e)
				{
					die('Erreur : '.$e->getMessage());
<<<<<<< HEAD
				} 
				?>
			</div>
=======
				}
				 
				 
				?>
			</div>
		</div>
>>>>>>> origin/master
	</body>
</html>
