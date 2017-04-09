<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Theme Made By www.w3schools.com - No Copyright -->
  <title>E-WorldArtGallery</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="onepage.css" type="text/css" media="screen"/>	
  <link rel="stylesheet" href="main.css" type="text/css"/>
  <link rel="stylesheet" href="footer1page.css" type="text/css"/>
  <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
</head>
<body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="50">

	<?php include('navbar.php') ?>
<br/><br/><br/><br/><br/><br/>

<!-- Container (The Band Section) -->
<?php include('cats.php') ?>

<!-- Container (TOUR Section) -->
<div id="news" class="bg-1">
  <div class="container">
	<div class="row row-eq-height" id="autre">
				<div class="col-md-3">
					<h2>Les dernières news</h2>
				</div>
				<?php
				 try
				{
					require('connect.php');
					$reponse = $bdd->query('SELECT * FROM news ORDER BY created LIMIT 3');
					while ($donnees = $reponse->fetch())
					{?>
							<div class="col-md-3" style="float:left;">
								<div class="panel panel-default">
									<div class="panel-heading" id="color"><?php echo nl2br(stripcslashes($donnees['title']))?></div>
									<div class="panel-body" id="color2"><?php echo nl2br(stripcslashes($donnees['content']))?><br/><a href="readMore.php?id=<?php echo $donnees['id_news']?>" >Lire plus</a></div>
								</div>
							</div>
							<?php
					}							  
					$reponse->closeCursor(); 
				}
				catch(Exception $e)
				{
					die('Erreur : '.$e->getMessage());
				} 
				?>
	</div>
    <div class="row text-center" id="autre">
			<div class="row row-eq-height" id="autre">
				<div class="col-md-3">
					<h2>Les dernières oeuvres</h2>
				</div>
					<?php
					 try
					{
						require('connect.php');
						$reponse = $bdd->query('SELECT * FROM items ORDER BY upload_date LIMIT 3');
						while ($donnees = $reponse->fetch())
						{
							echo '<div class="affichages">';
							echo 'Titre : '.stripcslashes($donnees['nom']).'';
							echo '<a href="apercu.php?id='.$donnees['id_items'].'"><img class="resize" src="'.$donnees['link'].'" title="'.stripcslashes($donnees['description']).'" /></a>';
							echo '</div>';
						}							  
						$reponse->closeCursor(); 
					}
					catch(Exception $e)
					{
						die('Erreur : '.$e->getMessage());
					}
					?>
			</div>
			<div class="row row-eq-height" id="autre">
				<div class="col-md-3">
					<h2>Les dernières oeuvres de l'artiste mis à l'honneur</h2>
				</div>
					<?php
					 try
					{
						require('connect.php');
						$reponse = $bdd->query('SELECT * FROM items WHERE artist = (SELECT name FROM artistes WHERE isHonor = 1) ORDER BY upload_date LIMIT 3');
						while ($donnees = $reponse->fetch())
						{
							echo '<div class="affichages">';
							echo 'Titre : '.stripcslashes($donnees['nom']).'';
							echo '<a href="apercu.php?id='.$donnees['id_items'].'"><img class="resize" src="'.$donnees['link'].'" title="'.stripcslashes($donnees['description']).'" /></a>';
							echo '</div>';
						}							  
						$reponse->closeCursor(); 
					}
					catch(Exception $e)
					{
						die('Erreur : '.$e->getMessage());
					}
					?>
			</div>
    </div>
  </div>
</div>
<div id="vitrine" class="bg-1">
	<div class="container">
		<div class="row row-eq-height">
			<div class="col-md-3">
				<h2>Exemple de vitrine</h2>
			</div>
			<div class="col-md-6">
				<h2>Description</h2>
			</div>
		</div>
	</div>
</div>
<!--footer-->
<footer class="footer1">
<div class="container">

<div class="row"><!-- row -->
            <div class="col-md-offset-2 col-md-3"><!-- widgets column left -->
                <ul class="list-unstyled clear-margins"><!-- widgets -->
                        	<li class="widget-container widget_nav_menu"><!-- widgets list -->
                                <h1 class="title-widget">Navigation</h1>
                                <ul>
                                	<li><a  href="#"><i class="fa fa-angle-double-right"></i>Accueil</a></li>
                                    <li><a  href="#"><i class="fa fa-angle-double-right"></i>Catalogue</a></li>
                                    <li><a  href="#"><i class="fa fa-angle-double-right"></i>Evènements</a></li>
                                    <li><a  href="#"><i class="fa fa-angle-double-right"></i>News</a></li>
                                    <li><a  href="#"><i class="fa fa-angle-double-right"></i>About Us</a></li>
                                    <li><a  href="#"><i class="fa fa-angle-double-right"></i>Contact Us</a></li>
                                </ul>
							</li>
                        </ul>
            </div><!-- widgets column left end -->
				
                <div class="col-lg-3 col-md-3"><!-- widgets column left -->
                <ul class="list-unstyled clear-margins"><!-- widgets -->
                        	<li class="widget-container widget_nav_menu"><!-- widgets list -->
                                <h1 class="title-widget">Catégories</h1>
                                <ul>
 									<li><a  href="#"><i class="fa fa-angle-double-right"></i>Vintage</a></li>
                                    <li><a  href="#"><i class="fa fa-angle-double-right"></i>Art contemporain</a></li>
                                    <li><a  href="#"><i class="fa fa-angle-double-right"></i>Painting</a></li>
                                    <li><a  href="#"><i class="fa fa-angle-double-right"></i>Black and White</a></li>
                                    <li><a  href="#"><i class="fa fa-angle-double-right"></i>Photos</a></li>
                                    <li><a  href="#"><i class="fa fa-angle-double-right"></i>Lights</a></li>
                                    <li><a  href="#"><i class="fa fa-angle-double-right"></i>Games</a></li>
                                    <li><a  href="#"><i class="fa fa-angle-double-right"></i>Sculptures</a></li>
                                </ul>
							</li>
                        </ul>
                </div><!-- widgets column left end -->
                
                <div class="col-lg-3 col-md-3"><!-- widgets column center -->
                
                   
                    
                        <ul class="list-unstyled clear-margins"><!-- widgets -->
                        	<li class="widget-container widget_recent_news"><!-- widgets list -->
                                <h1 class="title-widget">Contact Detail </h1>
                                
                                <div class="footerp"> 
									<h2 class="title-median">A.M.INVEST. sprl</h2>
									<p><b>Email :</b> <a href="mailto:alain_boinet@hotmail.com">alain_boinet@hotmail.com</a></p>
									<p><b style="color:#ffc106;">Tél./GSM: +32.475.41.07.53</b></p>
									<p><b>Rue Giroune, 17d</b></p>
									<p>1421 Ophain-Bois-Seigneur-Isaac</p>
                                </div>
                                <div class="social-icons">
                                	<ul class="nomargin">
										<a href="https://www.facebook.com/bootsnipp"><i class="fa fa-facebook-square fa-3x social-fb" id="social"></i></a>
										<a href="https://twitter.com/bootsnipp"><i class="fa fa-twitter-square fa-3x social-tw" id="social"></i></a>
										<a href="https://plus.google.com/+Bootsnipp-page"><i class="fa fa-google-plus-square fa-3x social-gp" id="social"></i></a>
										<a href="mailto:bootsnipp@gmail.com"><i class="fa fa-envelope-square fa-3x social-em" id="social"></i></a>
                                    </ul>
                                </div>
                    		</li>
                        </ul>
                       </div>
                </div>
</div>
<div class="footer-bottom">
	<div class="container">
		<div class="row">
			<div class="col-md-offset-3 col-xs-12 col-sm-6 col-md-6 col-lg-6">
				<div class="copyright">
					© 2017, A.M.INVEST., All rights reserved
				</div>
			</div>
		</div>
	</div>
</div>
</footer>

</body>
</html>
