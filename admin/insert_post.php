<?php
function ajout_news ($title,$content,$category,$creation_date)
{
	require('../connect.php');
	$result = $bdd->prepare('INSERT INTO news (id_news,title,content,category,created) VALUES(0 ,:title,:content,:category,:created)');
	$result->execute(array('title' => $title ,'content' => $content ,'category' => $category ,'created' => $creation_date));
};
	if (!empty($_POST['title']) AND !empty($_POST['content'])){
		$title = htmlspecialchars(addslashes($_POST['title']));
		$content = htmlspecialchars(addslashes($_POST['content']));
		$category = $_POST['category'];
		$creation_date = date("Y-m-d");
		ajout_news ($title,$content,$category,$creation_date);
	}

		echo '<br/>';
		echo '<a href="../news.php" Title="Afficher la liste des news">News</a>';
?>
