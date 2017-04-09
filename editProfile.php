<!DOCTYPE html>
<?php
session_start();
if(!isset($_SESSION['pseudo'])){
	header('Location: connexion.php');
}
else if($_SESSION['pseudo'] == 'alain_boinet') echo 'Vous n\'avez pas de données personnelles.';
else {
?>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="main.css" type="text/css"/>
		<link href="bootstrap/css/bootstrap.css" rel="stylesheet" media="screen">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body id="base">
<div id="autre">
	<h1>Bienvenue sur votre page personnelle <?php echo $_SESSION['pseudo'] ?> </h1>
	<h4>Vous pouvez modifier : </h4>

	<?php
	require('connect.php');
	$rq = $bdd->prepare('SELECT * FROM membres WHERE pseudo = :id');
	$rq->execute(array('id' => $_SESSION['pseudo']));
	$donnees = $rq->fetch();
	?>
	<form method="post" action="">
		<table>
		<tr>
			<th>Pseudo</th>
			<th>Mot de passe</th>
			<th>Email</th>
			<th>Nom</th>
			<th>Prénom</th>
			<th>Adresse</th>
			<th>Téléphone</th>
		</tr>
		<tr>
		<td><input type="text" class="form-control" name="pseudo" id="pseudo" value="<?php echo stripcslashes($donnees['pseudo']) ?>" readonly/></td>
		<td><input type="password" class="form-control" name="pass" id="pass" value="<?php echo stripcslashes($donnees['pass']) ?>"/></td>
		<td><input type="email" class="form-control" name="email" id="email" value="<?php echo stripcslashes($donnees['email']) ?>"/></td>
		<td><input type="text" class="form-control" name="nom" id="nom" value="<?php echo stripcslashes($donnees['nom']) ?>"/></td>
		<td><input type="text" class="form-control" name="prenom" id="prenom" value="<?php echo stripcslashes($donnees['prenom']) ?>"/></td>
		<td><input type="text" class="form-control" name="adresse" id="adresse" value="<?php echo stripcslashes($donnees['adresse']) ?>"/></td>
		<td><input type="text" class="form-control" name="telephone" id="telephone" value="<?php echo stripcslashes($donnees['telephone']) ?>"/></td>
		<td><input type="hidden" class="form-control" name="idMember" id="idMember" value="<?php echo stripcslashes($donnees['ID']) ?>"/></td>
		<td><button type="submit" name="connect" id="connect" class="btn btn-primary" >Modifier</button></td>
		</tr>
		</table>
	</form>
</body>
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
</html>
<?php } ?>
