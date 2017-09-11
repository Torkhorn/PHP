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
$req = $bdd->exec('UPDATE jeux_video SET date_enregistrement = FROM_UNIXTIME(FLOOR(RAND()*UNIX_TIMESTAMP()))');

}
catch (Exception $e)
{
	die('Erreur : '.$e->getMessage());
}


echo "La table JEUX_VIDEO à été mit à jour !";



?>