<?php
ini_set("display_errors", 1);
error_reporting(E_ALL);

$new_poss = 'Florent';
$old_poss = 'Michel';
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
$req = $bdd->prepare('UPDATE jeux_video SET possesseur = :new_poss WHERE possesseur = :old_poss');
$req -> execute(array("new_poss" => $new_poss, "old_poss" => $old_poss));

$nb_modifs = $req->rowCount();
}
catch (Exception $e)
{
	die('Erreur : '.$e->getMessage());
}


echo $nb_modifs." entrées ont été modifiées!";



?>