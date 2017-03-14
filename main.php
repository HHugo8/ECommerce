<!DOCTYPE html>
<html>

    <head>

        <meta charset="utf-8" />
        <title>E-World Art Gallery</title>
        <link rel="stylesheet" href="main.css" type="text/css"/>
		<link href="bootstrap/css/bootstrap.css" rel="stylesheet">
				  <meta name="viewport" content="width=device-width, initial-scale=1">
		  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
		  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        
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
	<?php include('header.php') ?>
	  <body>
		<?php include('cats.php') ?>
        <div class="row" id="autre">
            <div class="col-md-6">
				<?php include('last_images.php') ?>
            </div>
            <div class="col-md-offset-6 col-md-6">
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
					<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Open Modal</button>
					<a href="newsletter.php"  onclick="open('newsletter.php', 'Popup', 'scrollbars=1,resizable=1,height=560,width=770'); return false;" >Insciption newsletter</a><br />
            </div>
		</div>
    </body>
	<?php include('footer.php') ?><a href="traitement.php" >Upload</a>
</html>
