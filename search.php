<!DOCTYPE html>
<html class="search">

    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="main.css" type="text/css"/>
        
    </head>
    <body>
<?php
require('connect.php');
if(isset($_POST['search']) != NULL){

    $requete = htmlspecialchars($_POST['search']);
    $req = $bdd->prepare("SELECT * FROM items AS A ,artistes AS B ,events AS C ,news AS D WHERE COALESCE(A.nom, '') || COALESCE(A.description, '') || COALESCE(A.artist, '')
		|| COALESCE(B.name, '') || COALESCE(C.nom, '') || COALESCE(C.description, '') || COALESCE(D.title, '') || COALESCE(D.content, '') LIKE :search"); 
    $req->execute(array(':search' =>'%'. $requete . '%'));
    
 echo "<h3>Résultats de la recherche.</h3><br/>";
 echo "<span>";
        while($donnees = $req->fetch(PDO::PARAM_STR)) {
            
			echo 'j\'ai trouvé quelque chose';
        }
 echo "<br/><br/>";
    } 
?>
<br/><br/>
<a href="main.php"><button name="retour">Retour</button></a>

</body>
</html>