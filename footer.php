<!DOCTYPE html>
<html>

    <head>

        <meta charset="utf-8" />
        <title>E-World Art Gallery</title>
        <link rel="stylesheet" href="main.css" type="text/css"/>
		<link href="bootstrap/css/bootstrap.css" rel="stylesheet">
        
    </head>
      <footer class="row" id="base">
	  	<div class="col-md-3">
				<?php
				if(empty($_SESSION['pseudo'])){
					echo '<div class="panel panel-default">';		
						echo '<div class="panel-body"><a href="inscription.php" >Inscription</a> ou <a href="connexion.php" >Connexion</a></div>';
					echo '</div>';
				}
				else{
					echo '<div class="panel panel-default">';		
						echo '<div class="panel-heading">'.$_SESSION['pseudo'].' &nbsp;<a href="editProfile.php" title="edition des informations"><img src="pics/rouage.png" width="15" height = "15"/></a></div>';
						echo '<div class="panel-body"><a href="disconnect.php" >Se déconnecter</a></div>';
					echo '</div>';
				}
				?>
		</div>
        <div class="col-md-3">
		  <?php
			echo '&copy; 2017 ',(2017<date('Y')) ? '- '.date('Y') : '';
			?>
        </div>
		<div class="col-md-3">
			<a href="https://www.facebook.com/groups/eworldartgallery/"><img src="pics/follow/facebook.ico" id="follow" title="Facebook" width="50px"/></a><img src="pics/follow/twitter.png" id="follow" title="Twitter" width="50px"/><img src="pics/follow/instagram.jpg" id="follow" title="Instagram" width="50px"/>
		</div>
		<div class="col-md-1">
          <a href="auth.php">Espace Admin</a>
        </div>
      </footer>
</html>