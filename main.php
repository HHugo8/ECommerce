<!DOCTYPE html>
<html>

    <head>

        <meta charset="utf-8" />
        <title>E-World Art Gallery</title>
        <link rel="stylesheet" href="main.css" type="text/css"/>
		<link href="bootstrap/css/bootstrap.css" rel="stylesheet">
        
    </head>


    <body id="base">
	
      <header class="row">
        <div class="col-md-1" id="logo">
          <img src="http://img11.hostingpics.net/pics/631764logo.jpg" />
        </div>
		<div class="col-md-3" id="description">
          	<p><h1>E-World Art Gallery</h1>
			<h4>A Virtual Gallery</h4></p>
        </div>
		<div class="col-md-2">
			<form action="search.php" method="post">
				<input type="text" name="search" id="search" placeholder="mot recherché" /><input type="submit" name="submit" value="Chercher" /> 
			</form>
        </div>
		<div class="col-md-offset-3 col-md-3">
			<img src="pics/follow/facebook.ico" id="follow" title="Facebook" width="50px"/><img src="pics/follow/twitter.png" id="follow" title="Twitter" width="50px"/><img src="pics/follow/instagram.jpg" id="follow" title="Instagram" width="50px"/> <a href="contactUs.php">Contact</a>
        </div>
      </header>
	  <body>
		<?php include('cats.php') ?>
          <div class="row" id="autre">
            <div class="col-lg-6">
				<?php include('last_images.php') ?>
            </div>
            <div class="col-lg-offset-6 col-lg-6">
				<?php include('last_news.php') ?>
            </div>
          </div>

    </body>
	<?php include('footer.php') ?>
</html>
