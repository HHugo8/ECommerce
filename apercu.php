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
 
	$req = $bdd->prepare('SELECT * FROM items WHERE id_items = :id');
	$req->execute(array('id' => $idImg));		
 
	if($req->rowCount() != 1)
		echo 'L\'image n\'existe pas !';
	else {
		$donnees = $req->fetch();		
	}
 
	$req->closeCursor();
 
    } else
           echo 'Vous n avez pas sélectionné d\'image !';
?>
		<div class="row">
			<div class=" col-md-offset-2 col-md-8">
				<label id="autre"><h1><?php echo $donnees['nom'] ?></h1></label>
			</div>
		</div>
		<div class="row">
		<?php include('menuVertical.php') ?>
			<div class=" col-md-8">
				<label id="autre"><img src="<?php echo $donnees['link'] ?>"/></label><br/>
				<label id="autre"><h2>Description : <?php echo $donnees['description'] ?> </h2></label><br/>
				<label id="autre"><h2>Dimensions de l'oeuvre : <?php echo $donnees['size'] ?> </h2></label><br/>
				<label id="autre"><h2>Numéro de référence pour l'oeuvre : <?php echo $donnees['ISBN'] ?> </h2></label><br/>
				<label id="autre"><h2>Prix : <?php echo $donnees['price'] ?> </h2></label><br/>
				<label id="autre"><h2>Est disponible à la location : <?php //echo $donnees['nom'] ?> </h2></label><br/>
				<?php
				session_start();
					if(($_SESSION['id'] == 1)){
						?>
						<a href="admin/imgAModifier.php?id=<?php echo $idImg ?>"><input type="submit" name="modifier" id="modifier" value="Modifier" /></a>
						<?php
					}
				?>
			</div>
		</div>
</body>
<?php include('footer.php') ?>
</html>