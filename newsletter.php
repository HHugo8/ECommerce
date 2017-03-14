<?php
function insert_newsletter($email,$ip){
	require('connect.php');
	$insert = $bdd->prepare('INSERT INTO newsletter(id, email, ip) VALUES (0,:email,:ip)');
	$insert->execute(array('email' => $email , 'ip' => $ip));
	echo '<p id="autre">Merci de vous être inscrit à la newsletter</p><br/>';
	echo '<a href="main.php" onclick="exit()"><button name="retour">Retour</button></a>';
}
if(isset($_POST['email']))
		if(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) === false) echo 'Mauvais format d\' email';
				else{
					$email = $_POST['email'];
					$ip = $_SERVER['REMOTE_ADDR'];
					insert_newsletter($email,$ip);
				}
?>