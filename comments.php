 <!DOCTYPE html>
<html>

    <head>

        <meta charset="utf-8" />
        <title></title>
        <link rel="stylesheet" href="main.css" type="text/css"/>
		<link href="bootstrap/css/bootstrap.css" rel="stylesheet">
        
    </head>
	<body>
		<div class="row" id="autre">
			<div class="col-md-offset-3 col-md-6">
				<h4>Ecrire un commentaire</h4>
			</div>
		</div>
		<div class="row" id="autre">
			<div class="col-md-offset-4 col-md-4">
				<form class="form-inline" action="comments.php" method="post">
					<label for="Email">Email : </label><input type="email" class="form-control" name="email"  id="email" aria-describedby="emailHelp" placeholder="Entrez votre email"><br/>
					<label for="message">Votre message : </label><textarea class="form-control" name="message" id="message" rows="3"></textarea><br/>
					<button type="submit" class="btn btn-primary">Envoyer</button>
				</form>
			</div>
		</div>
	</body>
<a href="adminMain.php" id="myButton">Retour</a>
<?php
  $errorMessage = '';
  $message ='';
    if(isset($_POST['email']) && isset($_POST['message'])) 
    {
		if(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) === false) echo 'Mauvais format d\' email';
			else{
					$email = htmlspecialchars(addslashes($_POST['email']));
				}
		$message = htmlspecialchars(addslashes($_POST['message']));
		$date = date("Y-m-d h:i:s");
		require('connect.php');
		var_dump($message,$email,$date);
		//$result = $bdd->prepare("INSERT INTO commentaires(id_commentaire, id_cat, message, mail, post_date, is_approved) VALUES (0 , 2 , :message , :mail, :date, 0)");
		//$result->execute(array('message' => $message, 'mail' => $email, 'date' => $date));
		echo '<div class="alert alert-success">';
		echo '<strong>Success!</strong> Votre message a été envoyé, il devra être approuvé par un administrateur';
		echo '</div>';
		
	}
    else
    {
      $errorMessage = 'Un des champs est vide';
    }
?>