<!DOCTYPE>
    <head>
        <title>Upload d'images</title>
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
        <link href="style.css" rel="stylesheet" type="text/css" />
    </head>
         
    <body>
    <form action="traitement.php" method="post" enctype="multipart/form-data">
        <p>
                Formulaire d'envoi de fichier :<br />
                <input type="file" name="monfichier" /><br />
                <input type="submit" value="Envoyer le fichier" />
        </p>
</form>
 
<?php
require('connect.php');
     
 $nom = md5(uniqid("produit_", true));
 $name = "site/".str_replace(' ','',$nom);
// Testons si le fichier a bien été envoyé et s'il n'y a pas d'erreur
if (isset($_FILES['monfichier']) AND $_FILES['monfichier']['error'] == 0)
{
        // Testons si le fichier n'est pas trop gros
        if ($_FILES['monfichier']['size'] <= 1000000)
        {
                // Testons si l'extension est autorisée
                $infosfichier = pathinfo($_FILES['monfichier']['name']);
                $extension_upload = $infosfichier['extension'];
                $extensions_autorisees = array('jpg', 'jpeg', 'gif', 'png');
                if (in_array($extension_upload, $extensions_autorisees))
                {
                        // On peut valider le fichier et le stocker définitivement
                         
                       $result = move_uploaded_file($_FILES['monfichier']['tmp_name'],$name);
if ($result) echo "Transfert réussi"; else { echo 'echec transfert';}
                         
 
                }
        }
}
 
 
try
{
         
    // On récupère tout le contenu de la table photo
    $reponse = $bdd->query('SELECT * FROM images');
     
    $req = $bdd->prepare('INSERT INTO images VALUES(?,?,?,?)');
	$req->execute(array(
						'nom' => $_POST['nom'],
						'description' => $_POST['description'],
						'chemin' => 'pics/'.$nom,
						'extension' => $_FILES['image']['type']));
 
 
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
 
</body>
</html>