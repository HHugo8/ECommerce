<?php
  header('Location: contactUs.php');
  exit();
?>
<?php
function ajout_contact ($name,$firstname,$email,$isbn,$renseignements,$creation_date)
{
	require('connect.php');
	$result = $bdd->prepare('INSERT INTO members (id_members,name,firstname,email,isbn,renseignements,date) VALUES(0 , :name, :firstname, :email, :isbn, :renseignements, :date)');
	$result->execute(array('name' => $name ,'firstname' => $firstname ,'email' => $email , 'isbn' => $isbn ,'renseignements' => $renseignements ,'date' => $creation_date));
};
	//$donnees = $reponse->fetch(PDO::FETCH_OBJ);	
	if (!empty($_POST['isbn']) AND !empty($_POST['mail']) AND !empty($_POST['nom']) AND !empty($_POST['prenom'])){
		try{
			require('connect.php');
			$name = htmlspecialchars(addslashes($_POST['nom']));
			$firstname = htmlspecialchars(addslashes($_POST['prenom']));
			$testisbn = htmlspecialchars($_POST['isbn']);
			$reponse = $bdd->prepare('SELECT count(*) FROM items WHERE ISBN = :isbn');
			$reponse->execute(array('isbn' => $testisbn));
			$resultat = $reponse->rowCount();
			if($resultat != 1) {echo 'L\'ISBN ne correpond à aucune entrée'; exit();}
			else $isbn = $testisbn;
			$renseignements = htmlspecialchars(addslashes($_POST['renseignements']));
			$testemail = $_POST['mail'];
			if(filter_var($testemail, FILTER_VALIDATE_EMAIL) === false){echo 'Format d\'adresse mail non valide'; exit();}
					else{
						$email = $testemail;
					}
			$email = htmlspecialchars(addslashes($_POST['mail']));
			$creation_date = date("Y-m-d");
			ajout_contact ($name,$firstname,$email,$isbn,$renseignements,$creation_date);
			}
		catch(Exception $erreur){
			echo $erreur->getMessage();
		}
	}

?>
