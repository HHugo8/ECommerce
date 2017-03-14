<!DOCTYPE HTML>
<html>
   <head>
       <title>Envoyer une image</title>
       <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<<<<<<< HEAD

   </head>
   <body id="base">
 
	<div class="row" id="autre">
		<div class="col-md-offset-3 col-md-6">
			<h1>Uploader une image</h1>
		</div>
	</div>
	<div class="row">
		<div class="col-md-offset-3 col-md-6">
			<form enctype="multipart/form-data" action="test_upload.php" method="post" id="autre">
				<p>
					<label for="category">Catégorie : </label><SELECT name="category" class="form-control">
														<OPTION selected>---</OPTION>
														<OPTION value="1">Vintage</OPTION>
														<OPTION value="2">art contemporain</OPTION>
														<OPTION value="3">painting</OPTION>
														<OPTION value="4">black and white</OPTION>
														<OPTION value="5">photos</OPTION>
														<OPTION value="6">lights</OPTION>
														<OPTION value="7">Games</OPTION>
														<OPTION value="8">Sculptures</OPTION></SELECT><br/>
					<label for="nom">Nom de l'oeuvre: </label><input type="text" class="form-control" name="nom" id="nom" /><br />
					<label for="description">Description : </label><textarea class="form-control" name="description" id="description" rows="10" cols="50"></textarea><br />
					<label for="price">Prix : </label><input class="form-control" type="number" name="price" id="price" placeholder="0.0"/><br />
					<label for="size">Dimensions : </label><input type="text" class="form-control" name="size" id="size" placeholder="L x l x h"/><br />
					<label for="artist">Nom de l'artiste : </label><input type="text" class="form-control" name="artist" id="artist" /><br />
					<label for="image" class="custom-file"></label><input type="file" id="monfichier" class="custom-file-input" name="monfichier"><span class="custom-file-control"></span><br />
					<label for="validation"></label><button type="submit" name="upload" id="upload" class="btn btn-primary" >Envoyer</button>
				</p>
			</form>
		</div>
	</div>
=======
	   <style type="text/css">
		label {
			display:block;
			width:150px;
			float:left;
		}
	   </style>
   </head>
   <body id="base">
 
	<h1>Envoyer une image</h1>
	<form enctype="multipart/form-data" action="test_upload.php" method="post">
		<p>
			<label for="category">Catégorie : </label><SELECT name="category" size="1">
												<OPTION selected>---</OPTION>
												<OPTION value="1">Vintage</OPTION>
												<OPTION value="2">art contemporain</OPTION>
												<OPTION value="3">painting</OPTION>
												<OPTION value="4">black and white</OPTION>
												<OPTION value="5">photos</OPTION>
												<OPTION value="6">lights</OPTION>
												<OPTION value="7">Games</OPTION></SELECT><br/>
			<label for="nom">Nom de l'oeuvre: </label><input type="text" name="nom" id="nom" /><br />
			<label for="description">Description : </label><textarea name="description" id="description" rows="10" cols="50"></textarea><br />
			<label for="price">Prix : </label><input type="text" name="price" id="price" /><br />
			<label for="size">Dimensions : </label><input type="text" name="size" id="size" /><br />
			<label for="artist">Nom de l'artiste : </label><input type="text" name="artist" id="artist" /><br />
			<label for="image">Image : </label><input type="file" name="monfichier" id="monfichier" /><br />
			<label for="validation"></label><input type="submit" name="upload" id="upload" value="upload" />
		</p>
	</form>
>>>>>>> origin/master
</body>
<?php include('footer.php') ?>
</html>