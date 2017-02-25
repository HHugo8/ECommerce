<?php
function ajout_image ($nom,$description,$chemin,$extension,$category)
{
	require('connect.php');
	$result = $bdd->prepare('INSERT INTO images (id_img,nom,description,chemin,extension,category) VALUES(0 ,:nom,:description,:chemin,:extension,:category)');
	$result->execute(array('nom' => $nom ,'description' => $description ,'chemin' => $chemin ,'extension' => $extension,'category' => $category));
};
		$dossier = 'site/';
		$fichier = basename($_FILES['monfichier']['name']);
		$taille_maxi = 100000;
		$taille = filesize($_FILES['monfichier']['tmp_name']);
		$extensions = array('.png', '.gif', '.jpg', '.jpeg', '.PNG', '.GIF', '.JPG');
		$extension = strrchr($_FILES['monfichier']['name'], '.'); 
 
		//Début des vérifications de sécurité...
		if(!in_array($extension, $extensions)) 
		{
			$erreur = 'Vous devez uploader un fichier de type png, gif, jpg, jpeg...';
		}
		if($taille>$taille_maxi)
		{
			$erreur = 'Le fichier est trop gros...';
		}
		if(!isset($erreur))
		{
			$fichier = strtr($fichier, 'ÀÁÂÃÄÅÇÈÉÊËÌÍÎÏÒÓÔÕÖÙÚÛÜÝàáâãäåçèéêëìíîïðòóôõöùúûüýÿ', 'AAAAAACEEEEIIIIOOOOOUUUUYaaaaaaceeeeiiiioooooouuuuyy');
			$fichier = preg_replace('/([^.a-z0-9]+)/i', '-', $fichier);
			if(move_uploaded_file($_FILES['monfichier']['tmp_name'], $dossier . $fichier))
			{
				echo 'Upload effectué avec succès !';
				$chemin = $dossier . $fichier;
				$nom = $_POST['nom'];
				$description = $_POST['description'];
				$category = $_POST['category'];
				$extension = $_FILES['monfichier']['type'];
				ajout_image($nom,$description,$chemin,$extension,$category);
			}
			else 
			{
				echo 'Echec de l\'upload !';
		    }
		}
		else
		{
			echo $erreur;
		}
		//header('Location: gallerie.php');
		echo '<br/>';
		echo '<a href="gallerie.php" Title="Afficher la gallerie d\' images">Gallerie</a>';
?>
