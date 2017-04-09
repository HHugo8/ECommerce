<?php
if(!empty($_POST['pass']) && !empty($_POST['email']) && !empty($_POST['nom']) && !empty($_POST['prenom']) && !empty($_POST['adresse']) && !empty($_POST['telephone'])){
	require('connect.php');
	$pass = sha1(htmlspecialchars($_POST['pass']));
	$email = htmlspecialchars(addslashes($_POST['email']));
	$nom = htmlspecialchars(addslashes($_POST['nom']));
	$prenom = htmlspecialchars(addslashes($_POST['prenom']));
	$adresse = htmlspecialchars(addslashes($_POST['adresse']));
	$tel = htmlspecialchars($_POST['telephone']);
	$id = intval($_POST['idMember']);
	$update = $bdd->prepare('UPDATE membres SET pass = :pass, email = :email, nom = :nom, prenom = :prenom, adresse = :adresse, telephone = :tel WHERE ID = :id');
	$update->execute(array('pass' => $pass, 'email' => $email, 'nom' => $nom, 'prenom' => $prenom, 'adresse' => $adresse, 'tel' => $tel, 'id' => $id));
	header('Refresh:0; URL=editProfile.php');
}

?>