<!DOCTYPE html>
<html class="search">

    <head>
        <meta charset="utf-8" />
		<title>Members</title>
        <link rel="stylesheet" href="../main.css" type="text/css"/>
		<link href="../bootstrap/css/bootstrap.css" rel="stylesheet">
		  <meta name="viewport" content="width=device-width, initial-scale=1">
		  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
		  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        
    </head>
    <body>
<h2>Personnes inscrites à notre newsletter.</h2><br/>
<span>
<?php	
		try
			{
				require('../connect.php');
				$reponse = $bdd->query("SELECT B.name as name, B.firstname as firstname, B.email as email, A.ip as ip FROM newsletter AS A, members AS B WHERE A.email = B.email");
					 $nb = $reponse->rowCount();
					while ($donnees = $reponse->fetch())
					{
					echo '<table class="table table-hover">';
						echo '<thead>';
							echo '<tr>';
								echo '<td>Nom</td>';
								echo '<td>Prénom</td>';
								echo '<td>Adresse mail</td>';
								echo '<td>Adresse ip</td>';
							echo '</tr>';
						echo '</thead>';
						echo '<tbody>';
							echo '<tr>';
							    echo '<td>'.$donnees['name'].'</td>';
								echo '<td>'.$donnees['firstname'].'</td>';
								echo '<td>'.$donnees['email'].'</td>';
								echo '<td>'.$donnees['ip'].'</td>';
							echo '</tr>';
					echo '</table>';
					}							  
					$reponse->closeCursor(); 
				}
				catch(Exception $e)
				{
					die('Erreur : '.$e->getMessage());
				}
?>
<br/><br/>
<a href="adminMain.php"><button name="retour">Retour</button></a>

</body>
</html>