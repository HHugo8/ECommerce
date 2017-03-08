 <!DOCTYPE html>
<html>

    <head>

        <meta charset="utf-8" />
        <title>Events</title>
        <link rel="stylesheet" href="main.css" type="text/css"/>
		<link href="bootstrap/css/bootstrap.css" rel="stylesheet">
        
    </head>
	<body id="base">
			<div class="row row-eq-height" id="autre">
				<div class="col-lg-offset-2 col-lg-8">
					<h1>Liste des évènements</h1>
				</div>
			</div>
			<?php include('menuVertical.php') ?>
				<?php
				 try
				{
					require('connect.php');
					$reponse = $bdd->query('SELECT * FROM events');
					 
					while ($donnees = $reponse->fetch())
					{?>
						<div class="row row-eq-height" id="autre">
							<div class="col-lg-offset-2 col-lg-6" >
								<div id="affichage_news">
								Nom de l'évènement : <?php echo nl2br(stripcslashes($donnees['name']))?><br/>
								Catégorie : <?php echo $donnees['category']?><br/>
								Contenu de l'évènement : <?php echo nl2br(stripcslashes($donnees['description']))?><br/>
								Date de l'évènement : <?php echo stripcslashes($donnees['date_event'])?><br/>
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
	</body>
</html>
