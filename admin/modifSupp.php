<?php
session_start();
require('../connect.php');
function modifImage($nom, $description ,$prix, $size, $idImg){
		$update = $bdd->prepare('UPDATE items SET nom = :nom, description = :description, price = :prix, size = :size, isApproved = 1 WHERE id_items = :id');
		$update->execute(array('nom' => $nom ,'description' => $description ,'prix' => $prix ,'size' => $size, 'id' => $idImg));
}
	if (!empty($_POST['name']) AND !empty($_POST['description']) AND !empty($_POST['price']) AND !empty($_POST['size'])){
		$nom = htmlspecialchars(addslashes($_POST['name']));
		$description = htmlspecialchars(addslashes($_POST['desc']));
		$prix = $_POST['price'];
		$size = $_POST['size'];
		$idImg = intval($_GET['id_item']);
		modifImage($nom, $description ,$prix, $size, $idImg);
	}

		echo '<br/>';
		echo '<a href="../gallerie.php" Title="Afficher la gallerie">News</a>';
?>