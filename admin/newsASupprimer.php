<!DOCTYPE html>
<html>

    <head>

        <meta charset="utf-8" />
        <title>E-World Art Gallery</title>
        <link rel="stylesheet" href="main.css" type="text/css"/>
		<link href="bootstrap/css/bootstrap.css" rel="stylesheet">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        
    </head>
</html>

							<?php
								if(isset($_POST['idNews'])) {
									require('../connect.php');
									$id = intval($_POST['idNews']);
									$delete = $bdd->prepare("DELETE FROM news WHERE id_news = :id");
									$delete->execute(array('id' => $id));
									echo '<div class="alert alert-success">';
										echo '<strong>La news à bien été supprimée</strong>';
									echo '</div>';
									echo '<a href="../news.php" Title="Retour aux news" id="myButton">News</a>';
								}
							?>