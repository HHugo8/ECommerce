 <!DOCTYPE html>
<html>

    <head>

        <meta charset="utf-8" />
        <title></title>
        <link rel="stylesheet" href="main.css" type="text/css"/>
		<link href="bootstrap/css/bootstrap.css" rel="stylesheet">
        
    </head>
<?php
				require('../connect.php');
				$id = $_POST['id_item'];
				$nom = htmlspecialchars(addslashes($_POST['name']));
				$description = htmlspecialchars(addslashes($_POST['desc']));			
				if(filter_var($_POST['price'], FILTER_VALIDATE_FLOAT) === false) echo 'Mauvais format de prix';
				else{
					$prix = htmlspecialchars(addslashes($_POST['price']));
				}
				$size = htmlspecialchars(addslashes($_POST['size']));
				$update = $bdd->prepare('UPDATE items SET nom = :nom, description = :description, price = :prix, size = :size, isApproved = 1 WHERE id_items = :id');
				$update->execute(array('nom' => $nom ,'description' => $description ,'prix' => $prix ,'size' => $size, 'id' => $id));
?>
<a href="adminMain.php" id="myButton">Retour</a>