<!DOCTYPE html>
 <?php
 session_start();
if(!isset($_SESSION['flag'])){
	header('Location: ../auth.php');
}
else {
	?>
<html>

    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="main.css" type="text/css"/>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        
    </head>
	<?php include('navbar.php') ?>
    <body id="base">
		<?php
		require('connect.php');
		$nb_visites = file_get_contents('data/pagesvues.txt');
		$nb_visites++;
		file_put_contents('data/pagesvues.txt', $nb_visites);
		
		echo '<div class="row">';
			echo '<div class="col-md-offset-2 col-md-2">';
				echo '<div class="panel panel-primary">';
					echo '<div class="panel-heading">Nombre de pages vues</div>';
					echo '<div class="panel-body">' . $nb_visites . '</div>';
				echo '</div>';
		    echo '</div>';

		//ETAPE 1 - Affichage du nombre de visites d'aujourd'hui
			$retour_count = $bdd->prepare("SELECT COUNT(*) AS nbre_entrees FROM visites_jour WHERE date= :date");//On compte le nombre d'entrées pour aujourd'hui
			$retour_count->execute(array('date' => date("Y-m-d")));
			$donnees_count = $retour_count->fetch();
				echo '<div class="col-md-2">';
					echo '<div class="panel panel-primary">';
						echo '<div class="panel-heading">Pages vues aujourd\'hui</div>';
						echo '<div class="panel-body">' . $nb_visites . '</div>';
					echo '</div>';
				echo '</div>';
				 // On affiche tout de suite pour pas le retaper 2 fois après
				if ($donnees_count['nbre_entrees'] == 0) //Si la date d'aujourd'hui n'a pas encore été enregistrée (première visite de la journée)
				{
					$retour_count = $bdd->query("INSERT INTO visites_jour(visites, date) VALUES (1, date('Y-m-d'))");//On rentre la date d'aujourd'hui et on marque 1 comme nombre de visites.
						//On affiche une visite car c'est la première visite de la journée
				} else { //Si la date a déjà été enregistrée
					$retour = $bdd->query("SELECT visites FROM visites_jour WHERE date= :date"); //On sélectionne l'entrée qui correspond à notre date
					$retour->execute(array('date' => date("Y-m-d")));
					$donnees = $retour->fetch();;
					$visites = $donnees['visites'] + 1; //Incrémentation du nombre de visites
					$update = $bdd->prepare("UPDATE visites_jour SET visites = visites + 1 WHERE date= :date"); //Update dans la base de données
					$update->execute(array('date' => date("Y-m-d")));
					echo '<div class="panel-body">' . $visites . '</div>';
					echo '</div>';
					echo '</div>'; //Enfin, on affiche le nombre de visites d'aujourd'hui !
				}
		//ETAPE 2 - Record des connectés par jour

			

			$retour_max = $bdd->query("SELECT visites, date FROM visites_jour ORDER BY visites DESC LIMIT 0, 1"); //On sélectionne l'entrée qui a le nombre visite le plus important
			$donnees_max = $retour_max->fetch();
				echo '<div class="col-md-2">';
					echo '<div class="panel panel-primary">';
						echo '<div class="panel-heading">Record de vistes</div>';
						echo '<div class="panel-body">' . $donnees_max['visites'] . ' visites le ' . $donnees_max['date'] . '</div>';
					echo '</div>';
				echo '</div>'; //On l'affiche ainsi que la date à laquelle le record a été établi

		$page = substr($_SERVER['PHP_SELF'], 1);
		// On stocke dans une variable le timestamp qu'il était il y a 5 minutes :
		$timestamp_5min = time() - (60 * 5); // 60 * 5 = nombre de secondes écoulées en 5 minutes
		//On commence par virer les entrées trop vieilles (+ de 5 minutes)
		$timeToDelete = $bdd->prepare("DELETE FROM connectes WHERE timestamp < :donnee");

		$retour = $bdd->prepare("SELECT COUNT(*) AS nb_connectes FROM connectes WHERE ip = :ip");
		$retour->execute(array('ip' => ip2long($_SERVER['REMOTE_ADDR'])));
		$donnees = $retour->fetch(); //On regarde si le visiteur est déjà dans la table
		if ($donnees['nb_connectes'] == 0) // Si il n'y est pas, on l'ajoute
		{
			$insert = $bdd->prepare("INSERT INTO connectes(ip, timestamp, page) VALUES(:ip, :date, :page ");
			$insert->execute(array('ip' => ip2long($_SERVER['REMOTE_ADDR']), 'date' => date("Y-m-d") , 'page' => $page));
		}
		else // Sinon, on remet le décompte de 5 minutes à 0
		{
				$update = $bdd->prepare("UPDATE connectes SET timestamp = :date, page = :page WHERE ip = :ip");
				$update->execute(array('ip' => ip2long($_SERVER['REMOTE_ADDR']), 'date' => date("Y-m-d") , 'page' => $page));
		}
		//Enfin, on calcule le nombre total d'entrées puis on l'affiche !
		$entrees = $bdd->query("SELECT COUNT(*) AS nb_connectes FROM connectes");
		$donnees = $entrees->fetch();
		$visiteurs_connectes = $donnees['nb_connectes'];
		// Affichage
				echo '<div class="col-md-2">';
					echo '<div class="panel panel-primary">';
						echo '<div class="panel-heading">Visiteurs connectés</div>';
						echo '<div class="panel-body">' . $donnees['nb_connectes'] . '</div>';
					echo '</div>';
				echo '</div>';
		echo '</div>';
		echo '<div class="row">';
			echo '<div class="col-md-offset-3 col-md-6">';
		echo '<strong>Liste des connectés : </strong>(' . $visiteurs_connectes . ')<br/>';
		$connected = $bdd->query("SELECT ip, page FROM connectes");
					echo '<table class="table table-striped">';
							echo '<tr>';
								echo '<td style="color:green">Adresse ip</td>';
								echo '<td style="color:red">Page</td>';
							echo '</tr>';
		while ($donnees = $connected->fetch())
		{
							echo '<tr>';
							    echo '<td>'.long2ip($donnees['ip']).'</td>';
								echo '<td>'.$donnees['page'].'</td>';
							echo '</tr>';
		}
					echo '</table>';
	echo '</div>';
	echo '</div>';
	echo '<div class="row row-eq-height">';
			echo '<div class="col-md-offset-3 col-md-3">';
				$newslettersCount = $bdd->query("SELECT id FROM newsletter");
				$nc = $newslettersCount->rowCount();
				echo '<strong>Nombre de personnes inscrites à la newsletter : </strong>(' . $nc . ')<br/>';
			echo '</div>';
			echo '<div class="col-md-3">';
				$newsletters = $bdd->query("SELECT email FROM newsletter");
				 echo '<div class="dropdown">';
					echo '<button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Liste des emails ';
					echo '<span class="caret"></span></button>';	
						echo '<ul class="dropdown-menu">';
						while($email = $newsletters->fetch()){
							echo '<li><a href="#">'.$email['email'].'</a></li>';						}
						echo '</ul>';  
				echo '</div>'; 
			echo '</div>';
	echo '</div>';
?>
<br/><br/>
<a href="main.php"><button name="retour" id="myButton">Retour</button></a>

</body>
</html>
<?php } ?>