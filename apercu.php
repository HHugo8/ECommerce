<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" >
   <head>
       <title>Ma galerie d'images</title>
       <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
	   <style type="text/css">
		body {
			width: 95%;
		}
 
		div {
			width: 22%;
			float: left;
			text-align: center;
			border: 1px solid black;
			margin: 5px;
			padding:  5px;
		}
 
		p {
			text-align: left;
		}
 
		a {
			color: #000000;
			text-decoration: none;
		}
	   </style>
   </head>
   <body>
 
	<h1>Ma galerie d'images</h1>
 
	<?php
    if(!empty($_GET['id_img'])) {
	require('connect.php');
	$idImg = intval($_GET['id_img']);
 
	$req = $bdd->prepare('SELECT extension, img FROM images WHERE id_img = ?');
	$req->execute(array($idImg));		
 
	if($req->rowCount() != 1)
		echo 'L\'image n\'existe pas !';
	else {
		//on stocke les données dans un tableau
		$donnees = $req->fetch();		
		//on indique qu'on affiche une image
		header ("Content-type: ".$donnees['extension']);
		//on affiche l'image en elle même
		echo $donnees['img'];
	}
 
	$req->closeCursor();
 
    } else
           echo 'Vous n avez pas sélectionné d image !';
?>loseCursor();
	?>
 
</body>
</html>