<!DOCTYPE HTML>
<html>
   <head>
       <title>créer un event</title>
       <meta http-equiv="Content-Type" content="text/html" />
	   <link rel="stylesheet" href="../main.css" type="text/css"/>
	   <link href="../bootstrap/css/bootstrap.css" rel="stylesheet">

   </head>
   <body id="base">
 
	<div class="row">
		<div class="col-lg-offset-3 col-lg-6" id="autre">
			<h1>Créer un évènement</h1>
		</div>
	</div>
	<div class="row">
	<?php include('../menuVertical.php') ?>
		<div class="col-lg-offset-1 col-lg-6 form-group has-success">
			<form enctype="multipart/form-data" action="insert_event.php" method="post">
				<p>
					<div class="row">
						<div class="col-md-offset-3 col-md-6" id="autre">
							<label for="nom">Titre de l'évènement : </label><input type="text" class="form-control form-control-success" name="name" id="name" /><br />
						</div>
					</div>
					<div class="row">
						<div class="col-md-offset-3 col-md-6" id="autre">
							<label for="category">Catégorie : </label><SELECT name="category" class="form-control">
															<OPTION selected>---</OPTION>
															<OPTION value="1">Vintage</OPTION>
															<OPTION value="2">Art contemporain</OPTION>
															<OPTION value="3">Painting</OPTION>
															<OPTION value="4">Black and White</OPTION>
															<OPTION value="5">Photos</OPTION>
															<OPTION value="6">Lights</OPTION>
															<OPTION value="7">Games</OPTION>
															<OPTION value="8">Sculptures</OPTION></SELECT><br/>
						</div>
					</div>
					<div class="row">
						<div class="col-md-offset-3 col-md-6" id="autre">
							<label for="description">Description : </label><textarea class="form-control" name="content" id="content" rows="5" cols="30"></textarea><br />
						</div>
					</div>
					<div class="row">
						<div class="col-md-offset-3 col-md-6" id="autre">
							<label for="date">Date de l'évènement : </label><input type="date" class="form-control form-control-success" name="date"  id="date" placeholder="yyyy-mm-dd" /><br />    
						</div>
					</div>
					<div class="row">
						<div class="col-md-offset-3 col-md-6" id="autre">
							<label for="validation"></label><button type="submit" name="upload" id="upload" class="btn btn-primary" >Envoyer</button>
						</div>
					</div>
				</p>
	</form>
		</div>
	</div>
</body>
</html>