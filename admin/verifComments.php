 <!DOCTYPE html>
 <?php
session_start();
//verifier si id session= 1 et sinon renvoyer sur une 404
?>
<html>

    <head>

        <meta charset="utf-8" />
        <title>Commentaires à vérifier</title>
        <link rel="stylesheet" href="../main.css" type="text/css"/>
		<link href="../bootstrap/css/bootstrap.css" rel="stylesheet">
        
    </head>
	<body id="base">
		<div class="row" id="autre">
			<div class="col-lg-offset-5 col-lg-2">
				<h3>Commentaires pas encore approuvés</h3>
			</div>
		</div>
		<div class="row row-eq-height">
			<div class="col-lg-11">
				 <?php
				 try
				{
					require('../connect.php');
					$reponse = $bdd->query('SELECT * FROM commentaires WHERE is_approved = 0');
					$count = $bdd->query('SELECT count(*) FROM commentaires WHERE is_approved = 0');
					if($count == 0) echo 'Il n\'y a aucun commentaire à vérifier pour le moment<br/>';
					else{
						while ($donnees = $reponse->fetch())
					{
						echo '<div class="affichages">';
						echo '<form action="verifComments.php" method="post">';
						echo '<input type="hidden" name="id_commentaire" id="id_commentaire" value="'.$donnees['id_commentaire'].'" /><br/>';
						echo '<label id="autre">Email : </label><input type="email" name="email" id="email" value="'.stripcslashes($donnees['mail']).'" required /><br/>';
						echo '<label id="autre">Description : </label><textarea name="message" id="message" value="'.stripcslashes($donnees['message']).'" required ></textarea><br/>';
						echo '<button type="submit" class="btn btn-primary">Save</button>'; 
						echo '</form>';
						echo '</div>';
					}						
					}
					$reponse->closeCursor(); 
				}
				catch(Exception $e)
				{
					die('Erreur : '.$e->getMessage());
				}
				 
				 
				?>

				<?php
					if(isset($_POST['email']) && isset($_POST['message'])) 
					{
						if(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) === false) echo 'Mauvais format d\' email';
							else{
									$email = htmlspecialchars(addslashes($_POST['email']));
								}
						$message = htmlspecialchars(addslashes($_POST['message']));
						$date = date("Y-m-d");
						require('../connect.php');
						$result = $bdd->prepare("UPDATE commentaires SET is_approved = 1");
						$result->execute(array('message' => $message, 'mail' => $email, 'date' => $date));
						echo '<div class="alert alert-success">';
						echo '<strong>Success!</strong> Votre message a été envoyé, il devra être approuvé par un administrateur';
						echo '</div>';
						
					}
?>
<a href="adminMain.php" id="myButton">Retour</a>
			</div>
		</div>
	</body>
	<?php include('../footer.php') ?>
</html>
