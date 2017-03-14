<!DOCTYPE html>
<html class="search">

    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="main.css" type="text/css"/>
        
    </head>
    <body>
<?php
require('connect.php');
if(!empty($_POST['search'])){

    $requete = htmlspecialchars($_POST['search']);
    //$req = $bdd->prepare("SELECT * FROM items AS A ,artistes AS B ,events AS C ,news AS D WHERE A.nom LIKE :search OR A.description LIKE :search OR A.artist LIKE :search OR B.name LIKE :search OR C.name LIKE :search OR C.description LIKE :search OR D.title LIKE :search OR D.content LIKE :search"); 
	//$req = $bdd->prepare("SELECT * FROM items ,artistes ,events, WHERE artist LIKE :search AND description LIKE :search AND nom LIKE :search");
	$sql = "SELECT * FROM items WHERE artist LIKE :search OR description LIKE :search OR nom LIKE :search
		UNION SELECT * FROM artistes WHERE name LIKE :search 
		UNION SELECT * FROM events WHERE name LIKE :search OR description LIKE :search
		UNION SELECT * FROM news WHERE title LIKE :search OR content LIKE :search";
	$req = $bdd->prepare($sql);
    $req->execute(array('search' =>'%'. $requete .'%'));
    
 echo "<h3>Résultats de la recherche.</h3><br/>";
 echo "<span>";
 if($req->rowCount() >= 1) {
	         while($donnees = $req->fetch(PDO::PARAM_STR)) {
            
			echo $donnees['nom']; echo '<br/>';
        }
 }
 else echo 'La recherche n\'a rien trouvé';
 echo "<br/><br/>";
    } 
?>
<br/><br/>
<a href="main.php"><button name="retour">Retour</button></a>

</body>
</html>