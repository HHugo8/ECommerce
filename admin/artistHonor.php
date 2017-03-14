<!DOCTYPE html>

<html>
   <head>
       <title>Ma galerie d'images</title>
       <meta charset="utf8" />
	   <link rel="stylesheet" href="../main.css" type="text/css"/>
	   <link href="../bootstrap/css/bootstrap.css" rel="stylesheet">
   </head>
    <body id="admin">
		<div class="row" id="autre">
			<div class="col-md-offset-3 col-md-6">
				<h1>Mettre un artiste à l'honneur</h1>
			</div>
		</div>
		<?php include('../menuVertical.php') ?>
		<div class="row" id="autre">
			<div class="col-md-offset-1 col-md-6">
				<label>Choisissez l'artiste</label>
					<?php
					require('../connect.php');
					$result = $bdd->query("SELECT * FROM artistes");
					$count = $bdd->query("SELECT count(id_artist) as countId FROM artistes");
					$nbligne = $count->fetch();
							if($nbligne['countId'] == 1) echo '<p>Il y a actuellement '.$nbligne['countId'].' artiste répertorié.</p>';
							else if($nbligne['countId'] > 1) echo '<p>Il y a actuellement '.$nbligne['countId'].' artistes répertoriés.</p>';
							else echo '<p>Il n\'y actuellement aucun artiste répertorié.</p>';
					echo '<div class="row" id="autre">';
					echo '<div class="col-md-offset-4 col-md-4">';
					echo '<form action="artistHonor.php" method="post">';
					echo '<label for="category"></label><SELECT class="form-control" name="category">';
					echo '<OPTION selected>---</OPTION>';
					while ($donnees = $result->fetch())
						{
						echo '<OPTION value="'.$donnees['name'].'">'.$donnees['name'].'</OPTION>';
					}
					echo '</SELECT>';
					echo '<button type="submit" name="yes" id="yes" class="btn btn-primary">Mettre à l\'honneur</button>';
					echo '</form>';
					echo '</div>';
					echo '</div>';
				    $result->closeCursor(); ?>
			</div>
		</div>
		<?php
	if(isset($_POST['category'])){
		$artistName = htmlspecialchars($_POST['category']);
		require('../connect.php');
			$test = $bdd->prepare("SELECT count(*) FROM artistes WHERE isHonor = 1 AND name = :name");
			$test->execute(array('name' => $artistName));
			$nb = $test->rowCount();
			if($nb >= 1) {
				echo '<div class="row" id="autre">';
					echo '<div class="col-md-offset-4 col-md-4">';
						echo '<p>Cet artiste est déjà à l\'honneur</p>';
					echo '</div>';
				echo '</div>';
			}
			else {
				$update = $bdd->prepare("UPDATE  artistes SET isHonor = 1 WHERE name = :name");
				$update->execute(array('name' => $artistName));
					echo '<div class="row" id="autre">';
						echo '<div class="col-md-offset-4 col-md-4">';
							echo '<p>'.$artistName.' est maintenant l\'artiste à l\'honneur</p>';
						echo '</div>';
					echo '</div>';
			}
	}
   
   ?>
	</body>
<?php include('../footer.php') ?>
</html>