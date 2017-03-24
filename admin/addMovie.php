 <!DOCTYPE html>
<html>
    <head>

        <meta charset="utf-8" />
        <link rel="stylesheet" href="main.css" type="text/css"/>
		<link href="bootstrap/css/bootstrap.css" rel="stylesheet">
        
    </head>
	<body id="last_news">
			<div class="row row-eq-height" id="autre">
				<div class="col-md-offset-2 col-md-8">
					<h2>Ajouter une vidéo</h2>
				</div>
			</div>
			<div class="row" id="autre">
				<div class="col-md-offset-2 col-md-8">
					<form action="showVideo.php" method="post">
						<label for="video">URL de la vidéo : </label><input type="text" class="form-control form-control-success" name="video"  id="video" placeholder="" />
					</form>
				</div>
			</div>
	</body>
</html>
