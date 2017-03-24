<!DOCTYPE HTML>
<html>
   <head>
       <title>Envoyer une image</title>
        <link rel="stylesheet" href="main.css" type="text/css"/>
		<link rel="stylesheet" href="test.css" type="text/css" media="screen"/>	
		<link href="bootstrap/css/bootstrap.css" rel="stylesheet" media="screen">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

   </head>
   <body id="base">
 
	<div class="row">
		<div class="col-md-offset-3 col-md-6">
			<h1>Uploader une image</h1>
		</div>
	</div>
	<div class="row">
		<div class="col-md-offset-3 col-md-6">
			<form enctype="multipart/form-data" action="test_upload.php" method="post">
				<p>
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
					<label for="nom">Nom de l'oeuvre: </label><input type="text" class="form-control" name="nom" id="nom" /><br />
					<label for="desc">Description : </label><textarea class="form-control" name="desc" id="desc" rows="10" cols="50"></textarea><br />
					<label for="price">Prix : </label><input class="form-control" type="number" name="price" id="price" placeholder="0.0"/><br />
					<label for="size">Dimensions : </label><input type="text" class="form-control" name="size" id="size" placeholder="L x l x h"/><br />
					<div class="form-check form-check-inline">
					  <label class="form-check-label">
						<input class="form-check-input" type="radio" id="existingArtist" name="artist" value="Nouvel artiste">Artiste existant
					  </label>
					</div>
					<div class="form-check form-check-inline">
					  <label class="form-check-label">
						<input class="form-check-input" type="radio" name="artist" id="newArtist" value="Nouvel artiste">Nouvel artiste
					  </label>
					</div>
					<div id="artistToCreate">
						<label for="artist">Nom de l'artiste : </label><input type="text" class="form-control" name="artist" id="artist" /><br />
					</div>
					<div id="existing">
						<?php 
						require('connect.php');
						$result = $bdd->query("SELECT * FROM artistes");
					echo '<div class="row">';
					echo '<div class="col-md-offset-3 col-md-6">';
					echo '<label for="category"></label><SELECT class="form-control" name="artist2">';
					echo '<OPTION selected>---</OPTION>';
					while ($donnees = $result->fetch())
						{
						echo '<OPTION value="'.$donnees['name'].'">'.$donnees['name'].'</OPTION>';
					}
					echo '</SELECT>';
					echo '</div>';
					echo '</div><br />';?>
					</div>
					<label for="image" class="custom-file"></label><input type="file" id="monfichier" class="custom-file-input" name="monfichier"><span class="custom-file-control"></span><br />
					<label for="validation"></label><button type="submit" name="upload" id="upload" class="btn btn-primary" >Envoyer</button>
				</p>
			</form>
		</div>
	</div>
	<script>
			$(function(){
			$('#artistToCreate').hide();
			$('#existing').hide();
		   $('#existingArtist').click(function(){
			   $('#artistToCreate').hide();
			  $('#existing').toggle()
		   });
		   $('#newArtist').click(function(){
			   $('#existing').hide();
			  $('#artistToCreate').toggle()
		   });
		});
		</script>
</body>
<?php include('footer.php') ?>
</html>