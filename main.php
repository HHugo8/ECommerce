<!DOCTYPE html>
<?php
session_start();
?>
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
		<script type="text/javascript" src="https://cdn.rawgit.com/mikeflynn/egg.js/master/egg.min.js"></script>  
		<script>
				var egg = new Egg();  
		egg.addCode("r,o,o,t", function() {  
		  location.href="auth.php";
		}).listen();
		</script>
        
    </head>
    <body id="base">
			<script>
		$(function(){
			$('#myModal').hide();
		});
		$(window).load(function(){
        $('#myModal').modal('show');
    });
		</script>
	<?php include('navbar.php') ?>
	  <body>
	  <br/>
		<?php include('cats.php') ?>
		<br/>
        <div class="row" id="autre">
            <div class="col-md-6">
				<?php include('last_images.php') ?>
            </div>
            <div class="col-md-6">
				<?php include('last_news.php') ?>
            </div>
        </div>
		<div class="row">
			<div class="col-md-6">
				<div class="modal fade" id="myModal" role="dialog">
					<div class="modal-dialog">
					
					  <!-- Modal content-->
					  <div class="modal-content">
						<div class="modal-header">
						  <button type="button" class="close" data-dismiss="modal">&times;</button>
						  <h4 class="modal-title">S'inscrire à la newsletter</h4>
						</div>
						<div class="modal-body">
						  <form method="post" action="newsletter.php" onsubmit="self.close()">
								<label for="email"></label><input type="email" name="email" id="email" class="form-control" placeholder="you@example.com" />
								<label for="validation"></label><button type="submit" name="upload" id="upload" class="btn btn-primary" >S'inscrire</button>
							</form>
						</div>
						<div class="modal-footer">
						  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
						</div>
					  </div>
					  
					</div>
				  </div>
					<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Inscrivez-vous à notre newsletter</button>
            </div>
		</div>
		
    </body>
	<?php include('footer.php') ?><a href="traitement.php" >Upload</a><br/>
</html>
