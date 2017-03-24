<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

<nav class="navbar navbar-inverse">
    <div class="navbar-header">
      <a href="main.php"><img src="http://img11.hostingpics.net/pics/631764logo.jpg" /></a>
    </div>
	<div class="col-md-3" id="titre">
        <p><i><h1>E-World Art Gallery</h1></i></p>
			<div id="description">
				<h4><i>A Virtual Gallery</i></h4>
			</div>
    </div>
  <div class="container-fluid">
    <ul class="nav navbar-nav">
      <li class="active"><a href="#">Home</a></li>
      <li><a href="#">Page 1</a></li>
      <li><a href="#">Page 2</a></li>
    </ul>
    <form class="navbar-form navbar-left" action="search.php" method="post">
      <div class="input-group">
        <input type="text" class="form-control" name="search" id="search" placeholder="Mot recherché" />
        <div class="input-group-btn">
          <button class="btn btn-default" type="submit">
            <i class="glyphicon glyphicon-search"></i>
          </button>
        </div>
      </div>
    </form>
	<div class="col-md-offset-4 col-md-3">
		<a href="https://www.facebook.com/groups/eworldartgallery/"><img src="pics/follow/facebook.ico" id="follow" title="Facebook" width="50px"/></a><img src="pics/follow/twitter.png" id="follow" title="Twitter" width="50px"/><img src="pics/follow/instagram.jpg" id="follow" title="Instagram" width="50px"/> <a href="contactUs.php">Contact</a>
    </div>
  </div>
</nav>
</body>
</html>

