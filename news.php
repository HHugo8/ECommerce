 <!DOCTYPE html>
<html>
    <head>

        <meta charset="utf-8" />
        <title>News</title>
        <link rel="stylesheet" href="main.css" type="text/css"/>
		<link href="bootstrap/css/bootstrap.css" rel="stylesheet">
        
    </head>
	<body id="base">
	<?php include('navbar.php') ?>
			<div class="row row-eq-height" id="autre">
				<div class="col-md-offset-2 col-md-8">
					<h1>Liste des news</h1>
				</div>
			</div>
			<div>
				<div>
						<?php
						 try
						{
							require('connect.php');
							$reponse = $bdd->query('SELECT * FROM news');
							while ($donnees = $reponse->fetch())
							{?>
							<div class="row row-eq-height">
								<div class="col-md-offset-3 col-md-6" >
									<div class="panel panel-default">
										<div class="panel-heading">
											<h3 class="panel-title"><?php echo nl2br(stripcslashes($donnees['title']))?></h3>
										</div>
										<div class="panel-body"><?php echo nl2br(stripcslashes($donnees['content']))?></div><br/><a href="readMore.php?id=<?php echo $donnees['id_news']?>" >Lire plus</a>
										<?php
										$name = $bdd->query('SELECT name as name FROM categories WHERE id = '.$donnees['category'].'');
										while ($result = $name->fetch()){
											echo '<div class="panel-footer">Catégorie de la news  : <b>'.$result['name'].'</b>';
												if(!empty($donnees['video'])){
													echo '<iframe id="ytplayer" type="text/html" width="800px" height="450px"
													src="https://www.youtube.com/embed/'.$donnees['video'].'?rel=0&showinfo=0&color=white&iv_load_policy=3"
													frameborder="0" allowfullscreen></iframe> ';
												}
											}
											echo '</div>';
										?>
									</div>
								</div>
							</div><br/>
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
	<?php include('footer.php') ?>
</html>
