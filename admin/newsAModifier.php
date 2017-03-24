 <!DOCTYPE html>
<html>

    <head>

        <meta charset="utf-8" />
        <title>News à modifier</title>
        <link rel="stylesheet" href="../main.css" type="text/css"/>
		<link href="../bootstrap/css/bootstrap.css" rel="stylesheet">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        
    </head>
	<body id="base">
		<div class="row" id="autre">
			<div class="col-md-offset-2 col-md-8">
				<h2>News à modifier</h2>
			</div>
		</div>
		<div class="row">
			<div class="col-md-offset-2 col-md-8">
				 <?php
				 try
				{
					session_start();
					require('../connect.php');
					$idNews = $_SESSION['idNews'];
					$reponse = $bdd->query('SELECT * FROM news WHERE id_news = '.$idNews.'');
					 
					while ($donnees = $reponse->fetch())
					{
						echo '<form action="" method="post" >';
							echo '<div class="form-group row">';
								echo '<label for="title" class="col-md-offset-2 col-md-2 col-form-label" id="autre">Titre</label>';
									echo '<div class="col-md-6">';
										echo '<input type="text" class="form-control" name="title" id="title" value="'.$donnees['title'].'" />';	
									echo '</div>';
							echo '</div>';
							echo '<div class="form-group row">';
								echo '<label for="content" class="col-md-offset-2 col-md-2 col-form-label" id="autre">Contenu</label>';
									echo '<div class="col-md-6">';
										echo '<textarea name="desc" class="form-control" id="desc">'.stripcslashes($donnees['content']).'</textarea>';
									echo '</div>';
							echo '</div>';
							echo '<div class="form-group row">';
								echo '<label for="created" class="col-md-offset-2 col-md-2 col-form-label" id="autre">Date de création</label>';
									echo '<div class="col-md-6">';
										echo '<input type="text" class="form-control" name="date" id="date" value="'.$donnees['created'].'" disabled/>';
									echo '</div>';
							echo '</div>';
									$name = $bdd->query('SELECT name as name FROM categories WHERE id = '.$donnees['category'].'');
									$cat = $name->fetch();
									$result = $bdd->query("SELECT * FROM categories");
							echo '<div class="form-group row">';
								echo '<label for="category" class="col-md-offset-2 col-md-2 col-form-label" id="autre">Catégorie de la news</label>';
								echo '<div class="col-md-6">';
									echo '<SELECT class="form-control" name="category">';
									echo '<OPTION selected>'.$cat['name'].'</OPTION>';
									while ($donnees = $result->fetch())
										{
												echo '<OPTION value="'.$donnees['id'].'">'.$donnees['name'].'</OPTION>';
											}
											echo '</SELECT>';
									echo '</div>';
							echo '</div>';
										}
						    echo '<button type="submit" class="btn btn-primary">Sauvegarder</button>'; 
						echo '</form>';						  
					$reponse->closeCursor(); 
				}
				catch(Exception $e)
				{
					die('Erreur : '.$e->getMessage());
				}
				 
				 
				?>
			</div>
		</div>
		<?php
				if (isset($_POST['title']) && isset($_POST['desc']) && isset($_POST['category'])){
					$category = htmlspecialchars(addslashes($_POST['category']));
					$description = htmlspecialchars(addslashes($_POST['desc']));
					$idNews = $_SESSION['idNews'];
					$title = $_POST['title'];
					$update = $bdd->prepare('UPDATE news SET title = :title, content = :description, category = :category WHERE id_news = :id');
					var_dump($title ,$description ,$category ,$idNews);
					$update->execute(array('title' => $title ,'description' => $description ,'category' => $category , 'id' => $idNews));
					echo '<div class="alert alert-success">';
						echo '<strong>Modification effectuée</strong>';
					echo '</div>';
					unset($_SESSION['idNews']);
					header("refresh:2;url=../news.php");
				}

					echo '<br/>';
					echo '<a href="../news.php" Title="Retour aux news" id="myButton">News</a>';
?>
	</body>
	<?php include('../footer.php') ?>
</html>
