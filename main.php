<!DOCTYPE html>
<html>

    <head>

        <meta charset="utf-8" />
        <title>E-World Art Gallery</title>
        <link rel="stylesheet" href="main.css" type="text/css"/>
		<link href="bootstrap/css/bootstrap.css" rel="stylesheet">
<<<<<<< HEAD
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
=======
        
    </head>


    <body id="base">
	
      <header class="row">
        <div class="col-lg-1" id="logo">
          <img src="http://img11.hostingpics.net/pics/631764logo.jpg" />
        </div>
		<div class="col-lg-3" id="description">
          	<p><h1>E-World Art Gallery</h1>
			<h4>A Virtual Gallery</h4></p>
        </div>
		<div class="col-lg-offset-5 col-lg-3">
			<img src="pics/follow/facebook.ico" id="follow" title="Facebook" width="50px"/><img src="pics/follow/twitter.png" id="follow" title="Twitter" width="50px"/><img src="pics/follow/instagram.jpg" id="follow" title="Instagram" width="50px"/>
        </div>
      </header>
	  <!-- <div class="row">
		      <section class="row">
			   Pour les miniatures d'image 
				<div class="col-lg-1"><img src="pics/t1.jpg" alt="Tigre"></div>
				<div class="col-lg-1"><img src="pics/t2.jpg" alt="Tigre"></div>
				<div class="col-lg-1"><img src="pics/t3.jpg" alt="Tigre"></div>
				<div class="col-lg-1"><img src="pics/t4.jpg" alt="Tigre"></div>
				<div class="col-lg-1"><img src="pics/t5.jpg" alt="Tigre"></div>
				<div class="col-lg-1"><img src="pics/t6.jpg" alt="Tigre"></div>
				<div class="col-lg-1"><img src="pics/t7.jpg" alt="Tigre"></div>
				<div class="col-lg-1"><img src="pics/t8.jpg" alt="Tigre"></div>
				<div class="col-lg-1"><img src="pics/t9.jpg" alt="Tigre"></div>
				<div class="col-lg-1"><img src="pics/t10.jpg" alt="Tigre"></div>
				<div class="col-lg-1"><img src="pics/t11.jpg" alt="Tigre"></div>
				<div class="col-lg-1"><img src="pics/t12.jpg" alt="Tigre"></div>
			</section>
	  </div>-->
	  
	  
		<div class="row">
			<nav class="col-lg-2">
				<div class="container">
						<div class="row">
						  <div class="col-lg-3">
							<div class="sidebar-nav">
							  <div class="navbar navbar-default" role="navigation">
								<div class="navbar-collapse collapse sidebar-navbar-collapse">
								  <ul class="nav navbar-nav">
									<li><a href="#">Home</a></li>
									<li><a href="#">News</a></li>
									<li><a href="gallerie.php">Catalogue</a>
										<!--<ul>
											<li>Vintage</li>
											<li>Art contemporain</li>
											<li>Painting</li>
											<li>Black and White</li>
											<li>Photos</li>
											<li>Lights</li>
											<li>Games</li>
										</ul>-->
									</li>
									<li><a href="#">Events</a></li>
									<li><a href="#">About</a></li>
									<li><a href="#">Contact us</a></li>
								  </ul>
								</div>
							  </div>
							</div>
						  </div>
						</div>
				</div>
			</nav>
			<div class="col-lg-offset-1 col-lg-7">
				<div class="principale">
					<div id="category">
						<figure>
							<img src="http://img11.hostingpics.net/pics/217514categoryLuminaires.jpg" />
							<figcaption><a href="#">Vintage</a></figcaption>
						</figure>
					</div>
					<div id="category">
						<figure>
							<img src="http://img11.hostingpics.net/pics/795037categorydraws.jpg" />
							<figcaption><a href="#">Art contemporain</a></figcaption>
						</figure>
					</div>
					<div id="category">
						<figure>
							<img src="http://img11.hostingpics.net/pics/832232categoryVitrine.jpg" />
							<figcaption><a href="#">Painting</a></figcaption>
						</figure>
					</div>
				</div>
			</div>
		</div>
		<br/>
		<div class="row">
			<div class="col-lg-offset-3 col-lg-7">
				<div class="principale">
					<div id="category">
						<figure>
							<a><img src="http://img11.hostingpics.net/pics/217514categoryLuminaires.jpg" /></a>
							<figcaption><a href="#">Black And White</a></figcaption>
						</figure>
					</div>
					<div id="category">
						<figure>
							<img src="http://img11.hostingpics.net/pics/795037categorydraws.jpg" />
							<figcaption><a href="#">Photos</a></figcaption>
						</figure>
					</div>
					<div id="category">
						<figure>
							<img src="http://img11.hostingpics.net/pics/832232categoryVitrine.jpg" />
							<figcaption><a href="#">Lights</a></figcaption>
						</figure>
					</div>
				</div>
			</div>
		</div>
          <div class="row" id="autre">
            <div class="col-lg-6">
				<?php //include('last_images.php') ?>
            </div>
            <div class="col-lg-6">
				<?php include('last_news.php') ?>
            </div>
          </div>
        </section>
      </div>
      <footer class="row" id="autre">
        <div class="col-lg-11">
          Mentions légales
        </div>
		<div class="col-lg-1">
          <a href="admin/adminMain.php">Espace Admin</a>
        </div>
      </footer>
    </div>
>>>>>>> origin/master
    </body>
	<?php include('footer.php') ?><a href="traitement.php" >Upload</a>
</html>
