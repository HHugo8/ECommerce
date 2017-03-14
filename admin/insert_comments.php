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
		$result = $bdd->prepare("INSERT INTO commentaires(id_commentaire, id_cat, message, mail, post_date, is_approved) VALUES (0 , 1 , :message , :mail, :date, 0)");
		$result->execute(array('message' => $message, 'mail' => $email, 'date' => $date));
		echo 'Votre message a été envoyé, il devra être approuvé par un administrateur';
	}
    else
    {
      $errorMessage = 'Un des champs est vide';
    }
  }
?>