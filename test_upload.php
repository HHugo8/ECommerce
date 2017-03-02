<?php
function ajout_image($nom, $category, $chemin, $extension, $description, $artist, $prix, $size, $upload_date)
{
	require('connect.php');
	$result = $bdd->prepare('INSERT INTO items (id_items, nom, category, link, extension, description, artist, price, size, upload_date, isApproved) VALUES(0 , :nom, :category, :link, :extension, :description, :artist, :price, :size, :upload_date, 0)');
	$result->execute(array('nom' => $nom , 'category' => $category, 'link' => $chemin , 'extension' => $extension, 'description' => $description , 'artist' => $artist, 'price' => $prix, 'size' => $size, 'upload_date' => $upload_date ));
};
		$dossier = 'site/';
		$fichier = basename($_FILES['monfichier']['name']);
		$taille_maxi = 300000;
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
				$nom = htmlspecialchars(addslashes($_POST['nom']));
				$description = htmlspecialchars(addslashes($_POST['description']));
				$artist = htmlspecialchars(addslashes($_POST['artist']));
				$prix = htmlspecialchars(addslashes($_POST['price']));
				$size = htmlspecialchars(addslashes($_POST['size']));
				$category = $_POST['category'];
				$extension = $_FILES['monfichier']['type'];
				$upload_date = date("Y-m-d h:i:s");
				ajout_image($nom, $category, $chemin, $extension, $description, $artist, $prix, $size, $upload_date);
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
