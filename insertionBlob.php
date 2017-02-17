<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" >
   <head>
       <title>Envoyer une image</title>
       <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
	   <style type="text/css">
		label {
			display:block;
			width:150px;
			float:left;
		}
	   </style>
   </head>
   <body>
 
	<h1>Envoyer une image</h1>
	<form enctype="multipart/form-data" action="insertionBlob.php" method="post">
		<p>
			<label for="nom">Nom : </label><input type="text" name="nom" id="nom" /><br />
			<label for="description">Description : </label><textarea name="description" id="description" rows="10" cols="50"></textarea><br />
			<label for="image">Image : </label><input type="file" name="image" id="image" /><br />
			<label for="validation"></label><input type="submit" name="validation" id="validation" value="Envoyer" />
		</p>
	</form>
	<?php
		require('connect.php');
  if(isset($_POST['validation'])) {
 
	 if(!is_uploaded_file($_FILES['image']['tmp_name']))
		echo 'Un problème est survenu durant l opération. Veuillez réessayer !';
	
	 else { 
	 
		$extensions = array('/png', '/gif', '/jpg', '/jpeg');
 
		$extension = strrchr($_FILES['image']['type'], '/');
            
		if(!in_array($extension, $extensions))
			echo 'Vous devez uploader un fichier de type png, gif, jpg, jpeg.';
		else {         
 
			define('MAXSIZE', 300000);        
			if($_FILES['image']['size'] > MAXSIZE)
				
			   echo 'Votre image est supérieure à la taille maximale de '.MAXSIZE.' octets';
				try {
					require('connect.php');
				} catch (Exception $e) {
					exit('Erreur : ' . $e->getMessage());
				}
 
				$image = file_get_contents($_FILES['image']['tmp_name']);
				$nom = $_POST['nom'];
				$description = $_POST['description'];
 
				$req = $bdd->prepare("INSERT INTO image(nom, description, img, extension) VALUES(:nom, :description, :image, :type)");
				$req->execute(array(
					'nom' => $nom,
					'description' => $description,
					'image' => $image,
					'type' => $_FILES['image']['type']
					));
					/*				$req = $bdd->prepare("INSERT INTO image(nom, description, img, extension) VALUES(?,?,?,?)");
				$req->execute($nom,$description,$image,$_FILES['image']['type']);*/
				echo 'L\'insertion s\'est bien déroulée !';
				var_dump($nom);
				var_dump($description);
				var_dump($image);
				var_dump($_FILES['image']['type']);
			 }
		  }
	  }
?>
	
	<?php
		require('connect.php');
		try
{
         
    $reponse = $bdd->query('SELECT * FROM image');
     
    while ($donnees = $reponse->fetch())
    {
		?>
		<div class="affichages">
		Titre : <? echo $donnees['nom']?><br/>
		<img src="<?echo $donnees['image'] . ' . ' . $donnees['type']?>"><br/>
		Description : <? echo $donnees['description']?>
		</div>
		<?php
    }
              
    $reponse->closeCursor(); 
 
}
catch(Exception $e)
{
    die('Erreur : '.$e->getMessage());
}
 
 
?>
	
</body>
</html>