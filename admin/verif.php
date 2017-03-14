<?php
	require('connect.php');
	$login = $_POST['login'];
	$pass = $_POST['password'];
	$pass = 
	$resultLogin = $_SERVER['PHP_AUTH_USER'];
	$resultPass = $_SERVER['PHP_AUTH_PW'];
	if($login == $resultLogin && $pass == $resultPass){
		header('Location: espaceAdmin.php')
	}
	else if ($login == $resultLogin && $pass != $resultPass){
		?><script>alert(Mauvais mot de passe)</script><?php
	}
	else ($login != $resultLogin && $pass == $resultPass){
		?><script>alert(Mauvais login)</script><?php
	}

?>
 <?php function anti_injection( $user, $pass ) {
# on regarde s'il n'y a pas de commandes SQL
    $banlist = array (
        "insert", "select", "update", "delete", "distinct", "having", "truncate",
        "replace", "handler", "like", "procedure", "limit", "order by", "group by" 
        );
    if ( eregi ( "[a-zA-Z0-9]+", $user ) ) {
        $user = trim ( str_replace ( $banlist, '', strtolower ( $user ) ) );
    } else {
        $user = NULL;
    }

    # on regarde si le mot de passe est bien alphanumérique
    # on utilise strtolower() pour faire marcher str_ireplace()
    if ( eregi ( "[a-zA-Z0-9]+", $pass ) ) {
        $pass = trim ( str_replace ( $banlist, '', strtolower ( $pass ) ) );
    } else {
        $pass = NULL;
    }

    # on fait un tableau
    # s'il y a des charactères illégaux, on arrête tout
    $array = array ( 'user' => $user, 'pass' => $pass );
    if ( in_array ( NULL, $array ) ) {
        die ( 'ERREUR : Injection SQL détectée' );
    } else {
        return $array;
    }
} // ##########
require('connect.php');
$login = anti_injection ($_POST['login'],$_POST['password']); // on lance la fonction anti injection
$password = $login['password']; // on recupère le pass
$password=md5($password); // on met le pass en md5
$pseudo = $login['login']; // on recupère le pseudo
?>
