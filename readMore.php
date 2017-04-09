<!DOCTYPE html>
<html>
   <head>
       <title>News</title>
       <meta charset="utf8" />
	   <link rel="stylesheet" href="main.css" type="text/css"/>
	   <link href="bootstrap/css/bootstrap.css" rel="stylesheet">
   </head>
   <body id="base">
	<?php include('navbar.php') ?>
 
	<?php
    if(!empty($_GET['id'])) {
	require('connect.php');
	$idNews = intval($_GET['id']);
 
	$req = $bdd->prepare('SELECT * FROM news WHERE id_news = :id');
	$req->execute(array('id' => $idNews));		
 
	if($req->rowCount() != 1)
		echo 'La news n\'existe pas !';
	else {
		$donnees = $req->fetch();		
	}
 
	$req->closeCursor();
 
    } else
           echo 'Vous n avez pas sélectionné de news !';
?>
		<div class="row">
			<div class="col-md-offset-2 col-md-8">
				<div class="row">
					<div class="col-md-offset-3 col-md-6 panel panel-primary">
					  <div class="panel-heading"><h1><?php echo stripcslashes($donnees['title']) ?></h1></div>
					  <div class="panel-body"><?php echo stripcslashes($donnees['content']) ?></div>
					</div>
				</div>
				<?php
				session_start();
				$_SESSION['idNews'] = $idNews;
					if(isset($_SESSION['id'])){
						?>
						<form action="admin/newsAModifier.php" method="post">
							<input type="hidden" name="idNews" id="idNews" value="<?php echo $idNews ?>" />
							<input type="submit" name="modifier" id="modifier" value="Modifier" />
						</form>
						<form action="admin/newsASupprimer.php" method="post">
							<input type="hidden" name="idNews" id="idNews" value="<?php echo $idNews ?>" />
							<input type="submit" name="supprimer" id="supprimer" value="Supprimer" />
						</form>
						<?php
					}
				try
				{
					echo '<p>Liste des commentaires</p>';
					$reponse = $bdd->query('SELECT * FROM commentaires WHERE is_approved = 1 AND id_news = '.$idNews.'');
						echo '<div class="row">';
						while ($donnees = $reponse->fetch())
					{
						echo '<div class="col-md-offset-2 col-md-8">';
						  echo '<div class="panel-heading">';
							echo '<input type="email" class="form-control" name="email" id="email" value="'.stripcslashes($donnees['mail']).'" readonly />';
						  echo '</div>';
						  echo '<div class="panel-body">';
							echo '<textarea class="form-control" name="message" id="message" value="'.stripcslashes($donnees['message']).'" rows="10" cols="50" readonly></textarea>';
						  echo '</div>';
						  echo '</div>';
						
					}	
					echo '</div>';
					$reponse->closeCursor(); 
				}
				catch(Exception $e)
				{
					die('Erreur : '.$e->getMessage());
				}
				?>
			</div>
		</div>
		<div class="row" id="autre">
			<div class="col-md-offset-3 col-md-6">
				<h4>Ecrire un commentaire</h4>
			</div>
		</div>
		<div class="row" id="autre">
			<div class="col-md-offset-4 col-md-4">
				<form class="form-inline" action="readMore.php?id=<?php echo $idNews?>" method="post">
					<div class="row">
						<div class="col-md-offset-2 col-md-8" id="autre">
							<label for="Email">Email : </label><input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelp" placeholder="Entrez votre email"><br/>
						</div>
					</div>
					<div class="row">
						<div class="col-md-offset-2 col-md-8" id="autre">
							<label for="Message">Votre message : </label><textarea class="form-control" id="message" name="message" rows="3"></textarea><br/>
						</div>
					</div>
					<label for="id"></label><input type="hidden" class="form-control" name="id" id="id" value="<?php echo $idNews?>">
					<button type="submit" class="btn btn-primary">Envoyer</button>
				</form>
			</div>
		</div>
		<?php
    if(isset($_POST['email'])) 
    {
		if(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) === false) echo 'Mauvais format d\' email';
			else{
					$email = htmlspecialchars(addslashes($_POST['email']));
				}
		$message = htmlspecialchars(addslashes($_POST['message']));
		$id = intval($_POST['id']);
		$date = date("Y-m-d");
		$cat = $donnees['category'];
		require('connect.php');
		$result = $bdd->prepare("INSERT INTO commentaires(id_commentaire, id_news, id_image, message, mail, post_date, is_approved) VALUES (0 ,:id, 0 , :message , :mail, :date, 0)");
		$result->execute(array('id' => $id, 'message' => $message, 'mail' => $email, 'date' => $date));
		echo '<div class="alert alert-success">';
		echo '<strong>Success!</strong> Votre message a été envoyé, il devra être approuvé par un administrateur';
		echo '</div>';
		header('refresh:2; URL= news.php');
		
	}
?>
</body>
<?php include('footer.php') ?>
</html>