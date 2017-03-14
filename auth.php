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
			<div class="form-group has-success">
				  <label class="form-control-label" for="login">Login</label>
				  <input type="text" class="form-control form-control-success" id="login" name="login" placeholder="Nom d'utilisateur">
			</div>
		    <div class="form-group mx-sm-3 has-success">
				<label for="password" class="form-control-label">Mot de passe</label>
				<input type="password" class="form-control form-control-success" id="password" name="password" placeholder="Password">
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
        header('Location: admin/adminMain.php');
        exit();
      }
    }
      else
    {
      $errorMessage = 'Veuillez inscrire vos identifiants svp !';
    }
  }
?>