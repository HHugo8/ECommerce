<?php
function ajout_image($nom, $category, $chemin, $extension, $isbn, $description, $artist, $prix, $size, $upload_date)
{
	require('connect.php');
	$result = $bdd->prepare('INSERT INTO items (id_items, nom, category, link, extension, ISBN, description, artist, price, size, upload_date, isApproved, isLocated) VALUES(0 , :nom, :category, :link, :extension, :isbn, :description, :artist, :price, :size, :upload_date, 0, 0)');
	$result->execute(array('nom' => $nom , 'category' => $category, 'link' => $chemin , 'extension' => $extension,'isbn' => $isbn, 'description' => $description , 'artist' => htmlspecialchars_decode($artist), 'price' => $prix, 'size' => $size, 'upload_date' => $upload_date ));
		$nbItems = $bdd->prepare('SELECT id_items FROM items WHERE artist = :artist');
		$nbItems->execute(array('artist' => htmlspecialchars_decode($artist)));
		$items = $nbItems->rowCount();
		$update = $bdd->prepare('UPDATE artistes SET nb_items = :nb_items WHERE name = :name');
		$update->execute(array('nb_items' => $items, 'name' => htmlspecialchars_decode($artist)));
	};
function random($car) 
{
	$string = "";
	$chaine = "abcdefghijklmnpqrstuvwxyABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890";
	srand((double)microtime()*1000000);
	for($i=0; $i<$car; $i++) {
	$string .= $chaine[rand()%strlen($chaine)];
	}
	return $string;
}
		require('connect.php');
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
					$ext = pathinfo($fichier, PATHINFO_EXTENSION);
			if(move_uploaded_file($_FILES['monfichier']['tmp_name'], $dossier . $fichier))
			{
				echo 'Upload effectué avec succès !';
				$chemin = $dossier . $fichier;
				$nom = htmlspecialchars(addslashes($_POST['nom']));
				$description = htmlspecialchars(addslashes($_POST['desc']));
				if(!empty($_POST['artist'])) $artist = htmlspecialchars(addslashes($_POST['artist']));
				else $artist = htmlspecialchars(addslashes($_POST['artist2']));
						$artistExist = $bdd->prepare('SELECT id_artist FROM artistes WHERE name = :name');
						$artistExist->execute(array('name' => htmlspecialchars_decode($artist)));
						$nb = $artistExist->rowCount();
							if($nb == 0){
								$nbItems = $bdd->prepare('SELECT id_items FROM items WHERE artist = :artist');
								$nbItems->execute(array('artist' => htmlspecialchars_decode($artist)));
								$items = $nbItems->rowCount();
								$insert = $bdd->prepare('INSERT INTO artistes VALUES (0, :name, :count, 0)');
								$insert->execute(array('name' => htmlspecialchars_decode($artist), 'count' => $items));
								echo 'Artiste inséré';
							}

								if(filter_var($_POST['price'], FILTER_VALIDATE_FLOAT) === false) echo 'Mauvais format de prix';
								else{
									$prix = htmlspecialchars(addslashes($_POST['price']));
								}
								$size = htmlspecialchars(addslashes($_POST['size']));
								$category = $_POST['category'];
								$extension = $_FILES['monfichier']['type'];
								$upload_date = date("Y-m-d h:i:s");
								$isbn = random(15);
								ajout_image($nom, $category, $chemin, $extension, $isbn, $description, $artist, $prix, $size, $upload_date);
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
