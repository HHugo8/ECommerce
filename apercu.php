<!DOCTYPE html>
<<<<<<< HEAD

=======
>>>>>>> origin/master
<html>
   <head>
       <title>Ma galerie d'images</title>
       <meta charset="utf8" />
	   <link rel="stylesheet" href="main.css" type="text/css"/>
	   <link href="bootstrap/css/bootstrap.css" rel="stylesheet">
   </head>
   <body id="base">
<<<<<<< HEAD

=======
>>>>>>> origin/master
 
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
<<<<<<< HEAD
=======
		//header ("Content-type: ".$donnees['extension']);
>>>>>>> origin/master
	}
 
	$req->closeCursor();
 
    } else
<<<<<<< HEAD
           echo 'Vous n avez pas sélectionné d\'image !';
=======
           echo 'Vous n avez pas sélectionné d image !';
>>>>>>> origin/master
?>
		<div class="row">
			<div class=" col-md-offset-2 col-md-8">
				<label id="autre"><h1><?php echo $donnees['nom'] ?></h1></label>
			</div>
		</div>
		<div class="row">
<<<<<<< HEAD
		<?php include('menuVertical.php') ?>
			<div class=" col-md-8">
				<label id="autre"><img src="<?php echo $donnees['link'] ?>"/></label><br/>
				<label id="autre"><h2>Description : <?php echo $donnees['description'] ?> </h2></label><br/>
				<label id="autre"><h2>Dimensions de l'oeuvre : <?php echo $donnees['size'] ?> </h2></label><br/>
				<label id="autre"><h2>Numéro de référence pour l'oeuvre : <?php echo $donnees['ISBN'] ?> </h2></label><br/>
				<label id="autre"><h2>Prix : <?php echo $donnees['price'] ?> </h2></label><br/>
				<label id="autre"><h2>Est disponible à la location : <?php //echo $donnees['nom'] ?> </h2></label><br/>
				<a href="contactUs.php?isbn=<?php echo $donnees['ISBN'] ?>" id="myButton" >Plus d'informations</a><br/>
				<?php
				session_start();
					if(isset($_SESSION['id'])){
						?>
						<a href="admin/imgAModifier.php?id=<?php echo $idImg ?>"><input type="submit" name="modifier" id="modifier" value="Modifier" /></a>
						<?php
					}
				?>
=======
			<div class=" col-md-offset-2 col-md-8">
				<label id="autre"><img src="<?php echo $donnees['link'] ?>"/></label><br/>
				<label id="autre"><h2>Description : <?php echo $donnees['description'] ?> </h2></label><br/>
				<label id="autre"><h2>Dimensions de l'oeuvre : <?php echo $donnees['size'] ?> </h2></label><br/>
				<label id="autre"><h2>Numéro de référence pour l'oeuvre : <?php //echo $donnees['nom'] ?> </h2></label><br/>
				<label id="autre"><h2>Prix : <?php echo $donnees['price'] ?> </h2></label><br/>
				<label id="autre"><h2>Est disponible à la location : <?php //echo $donnees['nom'] ?> </h2></label><br/>
>>>>>>> origin/master
			</div>
		</div>
</body>
<?php include('footer.php') ?>
</html>