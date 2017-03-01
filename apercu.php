<!DOCTYPE html>
<html>
   <head>
       <title>Ma galerie d'images</title>
       <meta charset="utf8" />
	   <link rel="stylesheet" href="main.css" type="text/css"/>
	   <link href="bootstrap/css/bootstrap.css" rel="stylesheet">
   </head>
   <body id="base">
 
	<?php
    if(!empty($_GET['id'])) {
	require('connect.php');
	$idImg = intval($_GET['id']);
 
	$req = $bdd->prepare('SELECT * FROM images WHERE id_img = :id');
	$req->execute(array('id' => $idImg));		
 
	if($req->rowCount() != 1)
		echo 'L\'image n\'existe pas !';
	else {
		$donnees = $req->fetch();		
		//header ("Content-type: ".$donnees['extension']);
	}
 
	$req->closeCursor();
 
    } else
           echo 'Vous n avez pas sélectionné d image !';
?>
		<div class="row">
			<div class=" col-md-offset-2 col-md-8">
				<label id="autre"><h1><?php echo $donnees['nom'] ?></h1></label>
			</div>
		</div>
		<div class="row">
			<div class=" col-md-offset-2 col-md-8">
				<label id="autre"><img src="<?php echo $donnees['chemin'] ?>"/></label><br/>
				<label id="autre"><h2>Description : <?php echo $donnees['description'] ?> </h2></label><br/>
				<label id="autre"><h2>Dimensions de l'oeuvre : <?php //echo $donnees['nom'] ?> </h2></label><br/>
				<label id="autre"><h2>Numéro de référence pour l'oeuvre : <?php //echo $donnees['nom'] ?> </h2></label><br/>
				<label id="autre"><h2>Prix : <?php //echo $donnees['nom'] ?> </h2></label><br/>
				<label id="autre"><h2>Est disponible à la location : <?php //echo $donnees['nom'] ?> </h2></label><br/>
			</div>
		</div>
</body>
</html>