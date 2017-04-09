<!DOCTYPE html>
<?php
session_start();
?>
<html>
   <head>
       <title>Ma galerie d'images</title>
       <meta charset="utf8" />
	   <link rel="stylesheet" href="main.css" type="text/css"/>
	   <link href="bootstrap/css/bootstrap.css" rel="stylesheet">
   </head>
   <body id="base">
	<?php include('navbar.php') ?>
 
	<?php
    if(!empty($_GET['id'])) {
	require('connect.php');
	$idImg = intval($_GET['id']);
	$_SESSION['idImg'] = $idImg;
	$req = $bdd->prepare('SELECT * FROM items WHERE id_items = :id');
	$req->execute(array('id' => $idImg));		
 
	if($req->rowCount() != 1)
		echo 'L\'image n\'existe pas !';
	else {
		$donnees = $req->fetch();		
	}
 
	$req->closeCursor();
 
    } else
           echo 'Vous n avez pas sélectionné d\'image !';
?>
		<div class="row">
			<div class=" col-md-offset-2 col-md-8">
				<label id="autre"><h1><?php echo $donnees['nom'] ?></h1></label>
			</div>
		</div>
		<div class="row">
			<div class="col-md-offset-2 col-md-8">
				<label id="autre"><img src="<?php echo $donnees['link'] ?>" style="max-width:1000px;"/></label><br/>
				<?php	
				if(isset($_SESSION['pseudo'])){?>
					<a href="panier.php?action=ajout&amp;l=<?php echo $donnees['nom'] ?>&amp;q=1&amp;p=<?php echo $donnees['price'] ?>" onclick="window.open(this.href, '', 'toolbar=no, location=no, directories=no, status=yes, scrollbars=yes, 
				resizable=yes, copyhistory=no, width=600, height=350'); return false;" id="myButton">Ajouter au panier</a><br/><?php }?>
				<label id="autre"><h2>Description : <?php echo $donnees['description'] ?> </h2></label><br/>
				<label id="autre"><h2>Dimensions de l'oeuvre : <?php echo $donnees['size'] ?> </h2></label><br/>
				<label id="autre"><h2>Numéro de référence pour l'oeuvre : <?php echo $donnees['ISBN'] ?> </h2></label><br/>
				<label id="autre"><h2>Prix TTC : <?php echo $donnees['price'] ?> euros</h2></label><br/>
				<label id="autre"><h2>Est disponible à la location : <?php if($donnees['isLocated'] == 1) echo 'Oui'; else echo 'Louée'; ?> </h2></label><br/>
				<a href="contactUs.php?isbn=<?php echo $donnees['ISBN'] ?>" id="myButton" >Plus d'informations</a><br/>
				<?php
				$_SESSION['idImg'] = $idImg;
					if(isset($_SESSION['id'])){
						?>
						<a href="admin/imgAModifier.php?id=<?php echo $idImg ?>" id="myButton">Modifier</a>
						<a href="admin/supprimerImage.php?id=<?php echo $idImg ?>" id="myButton">Supprimer</a>
						<?php
					}
				try
				{
					echo '<p>Liste des commentaires</p>';
					$reponse = $bdd->query('SELECT * FROM commentaires WHERE is_approved = 1 AND id_image = '.$idImg.'');
						while ($donnees = $reponse->fetch())
					{
						echo '<div class="col-md-offset-2 col-md-8">';
						echo '<label id="autre">Email : </label><input type="email" class="form-control" name="email" id="email" value="'.stripcslashes($donnees['mail']).'" readonly /><br/>';
						echo '<label id="autre">Message : </label><textarea name="message" class="form-control" id="message" value="'.stripcslashes($donnees['message']).'" readonly ></textarea><br/>';
						echo '</div>';
					}						
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
				<form class="form-inline" action="readMore.php?id=<?php echo $idImg?>" method="post">
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
					<label for="id"></label><input type="hidden" class="form-control" name="id" id="id" value="<?php echo $idImg?>">
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
		$result = $bdd->prepare("INSERT INTO commentaires(id_commentaire, id_news, id_image, message, mail, post_date, is_approved) VALUES (0 ,0, :id , :message , :mail, :date, 0)");
		$result->execute(array('id' => $id, 'message' => $message, 'mail' => $email, 'date' => $date));
		echo '<div class="alert alert-success">';
		echo '<strong>Success!</strong> Votre message a été envoyé, il devra être approuvé par un administrateur';
		echo '</div>';
		
	}
?>
</body>
<?php include('footer.php') ?>
</html>