<!DOCTYPE html>
<html>

    <head>

        <meta charset="utf-8" />
        <title>E-World Art Gallery</title>
        <link rel="stylesheet" href="main.css" type="text/css"/>
		<link href="bootstrap/css/bootstrap.css" rel="stylesheet">
        
    </head>
      <footer class="row" id="autre">
        <div class="col-lg-11">
		  <?php
			echo '&copy; 2017 ',(2017<date('Y')) ? '- '.date('Y') : '';
			echo '<a href="about.php">About</a>';
			?>
        </div>
		<div class="col-lg-1">
          <a href="auth.php">Espace Admin</a>
        </div>
      </footer>
</html>