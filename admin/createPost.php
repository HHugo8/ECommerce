<!DOCTYPE HTML>
<html>
   <head>
       <title>créer un post</title>
       <meta http-equiv="Content-Type" content="text/html" />
	   <link rel="stylesheet" href="../main.css" type="text/css"/>
	   <link href="../bootstrap/css/bootstrap.css" rel="stylesheet">

   </head>
   <body id="base">
 
		<div class="row">
			<div class="col-md-offset-3 col-md-6" id="autre">
				<h1>Créer un post</h1>
			</div>
		</div>
		<div class="row">
			<div class="col-md-offset-3 col-md-6" id="autre">
				<form enctype="multipart/form-data" action="insert_post.php" method="post" id="autre">
					<p>
						<label for="nom">Titre de la news : </label><input type="text" class="form-control" name="title" id="title" /><br />
						<label for="category">Catégorie : </label><SELECT name="category" class="form-control">
															<OPTION selected>---</OPTION>
															<OPTION value="1">Vintage</OPTION>
															<OPTION value="2">art contemporain</OPTION>
															<OPTION value="3">painting</OPTION>
															<OPTION value="4">black and white</OPTION>
															<OPTION value="5">photos</OPTION>
															<OPTION value="6">lights</OPTION>
															<OPTION value="7">Games</OPTION></SELECT><br/>
						<label for="description">Contenu : </label><textarea class="form-control" name="content" id="content" rows="10" cols="50"></textarea><br />
						<label for="validation"></label><button type="submit" name="upload" id="upload" class="btn btn-primary" >Envoyer</button>
					</p>
				</form>
			</div>
		</div>
</body>
</html>