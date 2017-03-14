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
				<form class="form-inline" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
					<label for="Email">Email</label><input type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Entrez votre email"><br/>
					<label for="message">Votre message</label><textarea class="form-control" id="message" rows="3"></textarea>
					<label class="form-check-label"><input type="checkbox" class="form-check-input"> Vous êtes d'accord avec ...</label><br/>
					<button type="submit" class="btn btn-primary">Envoyer</button>
				</form>
			</div>
		</div>
	</body>
<a href="adminMain.php" id="myButton">Retour</a>
<?php
  $errorMessage = '';
  $message ='';
 
  if(!empty($_POST)) 
  {
    if(!empty($_POST['email']) && !empty($_POST['message'])) 
    {
		if(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) === false) echo 'Mauvais format d\' email';
			else{
					$email = htmlspecialchars(addslashes($_POST['email']));
				}
		$message = htmlspecialchars(addslashes($_POST['message']));
		$date = date("Y-m-d h:i:s");
		require('connect.php');
		$result = $bdd->prepare("INSERT INTO commentaires(id_commentaire, id_cat, message, mail, post_date, is_approved) VALUES (0 , 2 , :message , :mail, :date, 0)");
		$result->execute(array('message' => $message, 'mail' => $email, 'date' => $date));
		echo 'Votre message a été envoyé, il devra être approuvé par un administrateur';
	}
    else
    {
      $errorMessage = 'Un des champs est vide';
    }
  }
?>