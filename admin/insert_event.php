<?php
function ajout_event ($name,$description,$category,$date_event)
{
	require('../connect.php');
	$result = $bdd->prepare('INSERT INTO events (id_event,name,description,category,event_date) VALUES(0 ,:name,:description,:category,:date_event)');
	$result->execute(array('name' => $name ,'description' => $description ,'category' => $category ,'date_event' => $date_event));
};
	if (!empty($_POST['name']) && !empty($_POST['content']) && !empty($_POST['date'])){
		$name = htmlspecialchars(addslashes($_POST['name']));
		$description = htmlspecialchars(addslashes($_POST['content']));
		$category = $_POST['category'];
		$date_event = $_POST['date'];
		ajout_event ($name,$description,$category,$date_event);
	}

		echo '<br/>';
		echo '<a href="../events.php" Title="Afficher la liste des events">Events</a>';
?>
