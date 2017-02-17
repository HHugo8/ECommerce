<?php
require('connect.php');
    $sql = "SELECT id, fichier FROM test ";
	$q = $bdd->prepare($sql);
	$q->execute();
 
	$q->bindColumn(1, $id);
	$q->bindColumn(2, $cover, PDO::PARAM_LOB);
 
	while($q->fetch())
	{
		file_put_contents($id.".jpg",$cover);
		echo "<img src='".$id.".jpg'> <br/>";
	}
?>