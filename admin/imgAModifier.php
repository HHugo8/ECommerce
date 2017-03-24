 <!DOCTYPE html>
 <?php
session_start();
?>
<html>

    <head>

        <meta charset="utf-8" />
        <title>Images à modifier</title>
        <link rel="stylesheet" href="../main.css" type="text/css"/>
		<link href="../bootstrap/css/bootstrap.css" rel="stylesheet">
        
    </head>
	<body id="base">
		<div class="row" id="autre">
			<div class="col-md-offset-2 col-md-8">
				<h2>Image à modifier</h2>
			</div>
		</div>
		<div class="row row-eq-height">
			<div class="col-md-offset-2 col-md-8">
				 <?php
				 try
				{
					require('../connect.php');
					$idImg = $_SESSION['idImg'];
					$reponse = $bdd->query('SELECT * FROM items WHERE id_items = '.$idImg.'');
					 
					while ($donnees = $reponse->fetch())
					{
						echo '<form action="" method="post">';
							echo '<div class="form-group row">';
									echo '<div class="col-md-offset-4 col-md-6" id="affichage_news">';
										echo '<img class="resize" src="../'.$donnees['link'].'"/>';	
										echo '<input type="hidden" class="form-control" name="name" id="name" "/>';
									echo '</div>';
							echo '</div>';
							echo '<div class="form-group row">';
								echo '<label for="title" class="col-md-offset-2 col-md-2 col-form-label" id="autre">Nom</label>';
									echo '<div class="col-md-6">';
										echo '<input type="text" class="form-control" name="name" id="name" value="'.stripcslashes($donnees['nom']).'" />';	
									echo '</div>';
							echo '</div>';
							echo '<div class="form-group row">';
								echo '<label for="content" class="col-md-offset-2 col-md-2 col-form-label" id="autre">Description</label>';
									echo '<div class="col-md-6">';
										echo '<textarea name="desc" class="form-control" id="desc">'.stripcslashes($donnees['description']).'</textarea>';
									echo '</div>';
							echo '</div>';
							echo '<div class="form-group row">';
								echo '<label for="created" class="col-md-offset-2 col-md-2 col-form-label" id="autre">Prix</label>';
									echo '<div class="col-md-6">';
										echo '<input type="text" class="form-control" name="price" id="price" value="'.$donnees['price'].'" />';
									echo '</div>';
							echo '</div>';
							echo '<div class="form-group row">';
								echo '<label for="created" class="col-md-offset-2 col-md-2 col-form-label" id="autre">Taille</label>';
									echo '<div class="col-md-6">';
										echo '<input type="text" class="form-control" name="size" id="size" value="'.$donnees['size'].'" />';
									echo '</div>';
							echo '</div>';
							echo '<div class="form-group row">';
								echo '<label for="created" class="col-md-offset-2 col-md-2 col-form-label" id="autre">Est disponible pour location</label>';
									echo '<div class="col-md-6">';
										echo '<label><input type="checkbox" name="oui"> Oui </label>';
										echo '<label><input type="checkbox" name="non"> Non </label>';
									echo '</div>';
							echo '</div>';
										}
						    echo '<button type="submit" class="btn btn-primary">Modifier</button>'; 
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
			function modifImage($nom, $description ,$prix, $size, $idImg, $isLocated){
					require('../connect.php');
					$update = $bdd->prepare("UPDATE items SET nom = :nom, description = :description, price = :prix, size = :size, isApproved = 1, isLocated = :isLocated WHERE id_items = :id");
					$update->execute(array('nom' => $nom, 'description' => $description, 'prix' => $prix, 'size' => $size, 'isLocated' => $isLocated, 'id' => $idImg));
			}
				if (isset($_POST['name']) AND isset($_POST['desc']) AND isset($_POST['price']) AND isset($_POST['size'])){
					$nom = htmlspecialchars(addslashes($_POST['name']));
					$description = htmlspecialchars(addslashes($_POST['desc']));
					if(isset($_POST['oui'])) $isLocated = 1;
					else $isLocated = 0;
					$prix = $_POST['price'];
					$size = $_POST['size'];
					$idImg = $_SESSION['idImg'];
					modifImage($nom, $description ,$prix, $size, $idImg, $isLocated);
					echo '<div class="alert alert-success">';
						echo '<strong>Modification effectuée</strong>';
					echo '</div>';
					unset($_SESSION['idImg']);
					header('refresh:2;url= ../apercu.php?id='.$idImg.'');
				}

					echo '<br/>';
					echo '<a href="../gallerie.php" Title="Afficher la gallerie">Images</a>';
		?>
	</body>
	<?php include('../footer.php') ?>
	<a href="adminMain.php" id="myButton">Retour</a>
</html>
