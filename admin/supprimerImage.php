<?php
function suppImage($idImg){
	    require('../connect.php');
		$delete = $bdd->query('DELETE FROM items WHERE id_items = '.$idImg.'');
}
	$idImg = intval($_GET['id']);
	var_dump($idImg);
		if (!empty($_GET['id'])){
			suppImage($idImg);
			header('Location : gallerie.php');
		}

		echo '<br/>';
		echo '<a href="../gallerie.php" Title="Afficher la gallerie">Gallerie</a>';
?>