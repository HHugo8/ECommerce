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
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
		<script src="//code.jquery.com/jquery-1.10.2.js"></script>
		<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
        
    </head>
      <header class="row">
        <div class="col-md-1" id="logo">
          <a href="main.php"><img src="http://img11.hostingpics.net/pics/631764logo.jpg" /></a>
        </div>
		<div class="col-md-3" id="titre">
          	<p><i><h1>E-World Art Gallery</h1></i></p>
				<div id="description">
					<h4><i>A Virtual Gallery</i></h4>
				</div>
        </div>
		<div class="col-md-2">
			<div class="container-fluid">
			    <form class="navbar-form" action="search.php" method="post">
				    <div class="form-group">
						<input type="text" class="form-control" name="search" id="search" placeholder="Mot recherché" />
						<button type="submit" class="btn btn-default"><span class="glyphicon glyphicon-search"></span> Chercher</button>
					</div>
			    </form>
			</div>
			<script>
				$(document).ready(function() {
					$('#search').autocomplete({
						source: 'liste.php',
						dataType: 'json',
					});
				});
			</script>
        </div>
		<div class="col-md-offset-3 col-md-3">
			<a href="https://www.facebook.com/groups/eworldartgallery/"><img src="pics/follow/facebook.ico" id="follow" title="Facebook" width="50px"/></a><img src="pics/follow/twitter.png" id="follow" title="Twitter" width="50px"/><img src="pics/follow/instagram.jpg" id="follow" title="Instagram" width="50px"/> <a href="contactUs.php">Contact</a>
        </div>
      </header>