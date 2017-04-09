<!DOCTYPE>
<html>
     <head>
       <title>Formulaire d'authentification</title>
       <meta http-equiv="Content-Type" content="text/html" />
	   <link rel="stylesheet" href="main.css" type="text/css"/>
	   <link href="bootstrap/css/bootstrap.css" rel="stylesheet">

   </head>
  <body>
	<form class="form-inline" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
	    <fieldset>
			<legend>Formulaire d'identification</legend>
			<?php
			  if(!empty($errorMessage)) 
			  {
				echo '<p>', htmlspecialchars($errorMessage) ,'</p>';
			  }
			?>
			  <div class="input-group">
				<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
				<input type="text" class="form-control" id="login" name="login" placeholder="Nom d'utilisateur">
			  </div>
			  <div class="input-group">
				<span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
				<input type="password" class="form-control" id="password" name="password" placeholder="Password">
			  </div>
	  <button type="submit" class="btn btn-primary">S'enregistrer</button>
		</fieldset>
</form>
  </body>
</html>
<?php

  // Definition des constantes et variables
  define('LOGIN','alain_boinet');
  define('PASSWORD','MDPAdmin&456');
  $errorMessage = '';
 
 if(!isset($_SESSION['flag'])) {
	if(!empty($_POST)) 
	{
		if(!empty($_POST['login']) && !empty($_POST['password'])) 
		{
		  if($_POST['login'] !== LOGIN) 
		  {
			$errorMessage = 'Mauvais login !';
		  }
			elseif($_POST['password'] !== PASSWORD) 
		  {  
			$errorMessage = 'Mauvais password !';
		  }
			else
		  {
			session_start();
			$_SESSION['login'] = LOGIN;
			$_SESSION['pseudo'] = LOGIN;
			$_SESSION['flag'] = 1;
			header('Location: admin/adminMain.php');
			exit();
		  }
		}
		  else
		{
		  $errorMessage = 'Veuillez inscrire vos identifiants svp !';
		}
	}
}
else {
		header('Location: admin/adminMain.php');
	}
 

?>