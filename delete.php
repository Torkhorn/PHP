<?php
ini_set("display_errors", 1);
error_reporting(E_ALL);


try
{
	// On se connecte à MySQL
	$bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', '');
}
catch(Exception $e)
{
	// En cas d'erreur, on affiche un message et on arrête tout
    die('Erreur : '.$e->getMessage());
}

try
{
$req = $bdd->exec('DELETE FROM jeux_video WHERE nom="Battlefield 1942"');

}
catch (Exception $e)
{
	die('Erreur : '.$e->getMessage());
}


echo $req." entrées ont été supprimées !";



?>