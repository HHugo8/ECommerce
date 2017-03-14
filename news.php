 <!DOCTYPE html>
<html>

    <head>

        <meta charset="utf-8" />
        <title>News</title>
        <link rel="stylesheet" href="main.css" type="text/css"/>
		<link href="bootstrap/css/bootstrap.css" rel="stylesheet">
        
    </head>
	<body id="base">
			<div class="row row-eq-height" id="autre">
				<div class="col-lg-offset-2 col-lg-8">
					<h1>Liste des news</h1>
				</div>
			</div>
<<<<<<< HEAD
			<div>
				<div>
					<?php include('menuVertical.php') ?>
						<?php
						 try
						{
							require('connect.php');
							$reponse = $bdd->query('SELECT * FROM news');
							 
							while ($donnees = $reponse->fetch())
							{?>
								<div class="row row-eq-height" id="autre">
									<div class="col-lg-offset-2 col-lg-6" >
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
						}
						 
						 
						?>
				</div>
			</div>
		<?php include('comments.php') ?>
=======
				<?php
				 try
				{
					require('connect.php');
					$reponse = $bdd->query('SELECT * FROM news');
					 
					while ($donnees = $reponse->fetch())
					{?>
						<div class="row row-eq-height" id="autre">
							<div class="col-lg-offset-3 col-lg-6" >
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
				}
				 
				 
				?>
			</div>
		</div>
>>>>>>> origin/master
	</body>
</html>
