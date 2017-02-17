<?php

try

{

    $bdd = new PDO('mysql:host=localhost;dbname=ecommerce;charset=utf8','root','');
	array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);
	echo "je suis connecté";
}

catch(Exception $e)

{

        die('Erreur : '.$e->getMessage());
		echo 'N° : '.$e->getCode();
}
?>