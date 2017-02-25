<?
 $nom = md5(uniqid("produit_", true));
 $name = "site/".str_replace(' ','',$nom);
if (isset($_FILES['monfichier']) AND $_FILES['monfichier']['error'] == 0)
{
        if ($_FILES['monfichier']['size'] <= 1000000)
        {
                $infosfichier = pathinfo($_FILES['monfichier']['name']);
                $extension_upload = $infosfichier['extension'];
                $extensions_autorisees = array('jpg', 'jpeg', 'gif', 'png');
                if (in_array($extension_upload, $extensions_autorisees))
                {
                       	$resultat = $_POST['select'];    
						$req = $bdd->prepare('INSERT INTO images VALUES(:id_img ,:nom,:description,:chemin,:extension,:category)');
						$req->execute(array('id_img' =>0,
											'nom' => $_POST['nom'],
											'description' => $_POST['description'],
											'chemin' => 'pics/'.$nom,
											'extension' => $_FILES['image']['type'],
											'category' => $resultat
											));           
                }
        }
}
 
try
{   
	$resultat = $_POST['select'];
    $reponse = $bdd->query('SELECT * FROM images');
     
    $req = $bdd->prepare('INSERT INTO images VALUES(:id_img ,:nom,:description,:chemin,:extension,:category)');
	$req->execute(array('id_img' =>0,
						'nom' => $_POST['nom'],
						'description' => $_POST['description'],
						'chemin' => 'pics/'.$nom,
						'extension' => $_FILES['image']['type'],
						'category' => $resultat
						));
    // On affiche chaque entrée une à une
    while ($donnees = $reponse->fetch())
    {
    ?>
        <p>
         <img src="site/<?php echo $nom; ?>" ><br />
        </p>
    <?php
    }
              
    $reponse->closeCursor(); // Termine le traitement de la requête
 
}
catch(Exception $e)
{
    // En cas d'erreur précédemment, on affiche un message et on arrête tout
    die('Erreur : '.$e->getMessage());
}

 
?>