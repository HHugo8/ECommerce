<!DOCTYPE html>
<html>

    <head>

        <meta charset="utf-8" />
        <title>E-World Art Gallery</title>
        <link rel="stylesheet" href="main.css" type="text/css"/>
		<link rel="stylesheet" href="test.css" type="text/css" media="screen"/>	
		<link href="bootstrap/css/bootstrap.css" rel="stylesheet" media="screen">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	</head>
</html>

<?php
function insert_newsletter($email,$ip){
	require('connect.php');
	$insert = $bdd->prepare('INSERT INTO newsletter(id, email, ip) VALUES (0,:email,:ip)');
	$insert->execute(array('email' => $email , 'ip' => $ip));
		echo '<div class="alert alert-success">';
			echo '<strong>Merci de vous être inscrit à la newsletter</strong>';
		echo '</div>';
	echo '<p id="autre"></p><br/>';
	header('refresh:1;URL=main.php');
}
if(isset($_POST['email']))
		if(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) === false) echo 'Mauvais format d\' email';
				else{
					$email = $_POST['email'];
					$ip = $_SERVER['REMOTE_ADDR'];
					insert_newsletter($email,$ip);
				}
?>