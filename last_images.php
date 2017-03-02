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
				<?php
				 try
				{
					require('connect.php');
					$reponse = $bdd->query('SELECT * FROM items ORDER BY uploaded_date LIMIT 6');
					 
					while ($donnees = $reponse->fetch())
					{?>
						<div class="row" id="autre">
							<div class="col-md-offset-1 col-md-4" >
								<div>
									<a href="apercu.php?id=<?php $donnees['id_items'] ?>"><img src="<?php $donnees['link'] ?>" alt=" <?php stripcslashes($donnees['description']) ?>" /></a>
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
