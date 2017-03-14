<?php
function insert_newsletter($email,$ip){
	require('connect.php');
	$insert = $bdd->prepare('INSERT INTO newsletter(id, email, ip) VALUES (0,:email,:ip)');
	$insert->execute(array('email' => $email , 'ip' => $ip));
	echo 'Merci de vous être inscrit à la newsletter';
	echo '<a href="main.php"><button name="retour">Retour</button></a>';
}
if(isset($_POST['email']))
	$testmail = htmlspecialchars(addslashes($_POST['email']));
		if(filter_var($testmail, FILTER_VALIDATE_EMAIL) === false) echo 'Mauvais format d\' email';
				else{
					$email = $testmail;
					$ip = $_SERVER['REMOTE_ADDR'];
					insert_newsletter($email,$ip);
				}
?>
