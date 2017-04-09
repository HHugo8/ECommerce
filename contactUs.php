 <!DOCTYPE html>
<html>

    <head>

        <meta charset="utf-8" />
		<title>Contact Us</title>
        <link rel="stylesheet" href="main.css" type="text/css"/>
		<link href="bootstrap/css/bootstrap.css" rel="stylesheet">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
        	   <style type="text/css">
		label {
			display:block;
			width:150px;
			float:left;
			color: red;
		}
	   </style>
    </head>
	<body id="base">
	<?php include('navbar.php') ?>
		<div class="row" id="autre">
		 <div class="col-md-offset-4 col-md-4" >
				<h1>Formulaire de contact</h1>
			</div>
		</div>
		<div class="row">
			<div class="col-md-offset-4 col-md-2" >
			<a id="button1">Plus de renseignement sur une oeuvre</a>
			</div>
			<div class="col-md-2" >
			<a id="button2">Vous désirez partager une oeuvre</a>
			</div>
		</div>
		<div class="row">
			<div id="formContact1">
				<div class="col-md-offset-4 col-md-4">
				<form method="post" action="sent.php">
					<label for="nom">Nom : </label><input type="text" class="form-control" name="nom" id="nom" required/><br />
					<label for="prenom">Prénom : </label><input type="text" class="form-control" name="prenom" id="prenom" required/><br />
					<?php
						if(isset($_GET['isbn'])){
							$isbn = htmlspecialchars($_GET['isbn']);
							echo '<label for="isbn">ISBN de l\'oeuvre : </label><input type="text" class="form-control" name="isbn" id="isbn" value="'.$isbn.'" required/><br />';
						}
						else echo '<label for="isbn">ISBN de l\'oeuvre : </label><input type="text" class="form-control" name="isbn" id="isbn" required/><br />';
					?>
					
					<label for="renseignements">Renseignements : </label><textarea class="form-control" id="renseignements" rows="3" name="renseignements"></textarea><br />
					<label for="mail">Adresse E-mail : </label><input type="email" class="form-control" name="mail" id="mail" aria-describedby="emailHelp" placeholder="Entrez email" required><br />
					<label for="validation"><button type="submit" class="btn btn-primary">Envoyer</button>
				</form>
				</div>
			</div>
			<div id="formContact2">
				<div class="col-md-offset-4 col-md-4">
	<form enctype="multipart/form-data" action="test_upload.php" method="post">
		<p>
			<label for="category">Catégorie : </label><SELECT name="category" class="form-control">
												<OPTION selected>---</OPTION>
												<OPTION value="1">Vintage</OPTION>
												<OPTION value="2">art contemporain</OPTION>
												<OPTION value="3">painting</OPTION>
												<OPTION value="4">black and white</OPTION>
												<OPTION value="5">photos</OPTION>
												<OPTION value="6">lights</OPTION>
												<OPTION value="7">Games</OPTION></SELECT><br/>
			<label for="nom">Nom de l'oeuvre: </label><input type="text" class="form-control" name="nom" id="nom" /><br />
			<label for="description">Description : </label><textarea class="form-control" name="description" id="description" rows="10" cols="50"></textarea><br />
			<label for="price">Prix : </label><input type="text" class="form-control" name="price" id="price" placeholder="0.0"/><br />
			<label for="size">Dimensions : </label><input type="text" class="form-control" name="size" id="size" placeholder="L x l x h"/><br />
			<label for="artist">Nom de l'artiste : </label><input type="text" class="form-control" name="artist" id="artist" /><br />
			<label for="image">Image : </label><input type="file" "form-control-file" name="monfichier" id="monfichier" /><br />
			<label for="validation"></label><button type="submit" name="upload" id="upload" class="btn btn-primary" >Envoyer</button>
		</p>
	</form>
				</div>
			</div>
		</div>
		<div class="row" id="cacher">
			<p>Merci d'avoir rempli le formulaire, vous serez recontactés sous peu. </p>
		</div>
		<script>
		$(function(){
			$('#formContact1').hide();
			$('#cacher').hide();
			$('#formContact2').hide();
		   $('#button1').click(function(){
			   $('#formContact2').hide();
			  $('#formContact1').toggle()
		   });
		   $('#button2').click(function(){
			   $('#formContact1').hide();
			  $('#formContact2').toggle()
		   });
		   	$('#valid').click(function(){
			   $('#cacher').toggle()
		   });
		});
		</script>
	</body>
	<?php include('footer.php') ?>
</html>
