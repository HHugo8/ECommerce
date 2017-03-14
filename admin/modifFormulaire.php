<!DOCTYPE HTML>
<?php
	//recherche une image,  l'afficher, la modifier, enregistrer les modifs
?>
<html>
   <head>
       <title>Modifier une image</title>
       <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
	   <style type="text/css">
		label {
			display:block;
			width:150px;
			float:left;
		}
	   </style>
   </head>
   <body id="base">
 
	<h1>Modifier une image</h1>
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
			<label for="price">Prix : </label><input type="text" name="price" id="price" placeholder="0.0"/><br />
			<label for="size">Dimensions : </label><input type="text" name="size" id="size" placeholder="L x l x h"/><br />
			<label for="artist">Nom de l'artiste : </label><input type="text" name="artist" id="artist" /><br />
			<label for="image">Image : </label><input type="file" name="monfichier" id="monfichier" /><br />
			<label for="validation"></label><input type="submit" name="upload" id="upload" value="upload" />
		</p>
	</form>
</body>
<?php include('footer.php') ?>
</html>