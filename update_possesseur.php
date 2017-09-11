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
	$req = $bdd->query('SELECT DISTINCT possesseur FROM jeux_video') or die(print_r($bdd -> errorInfo()));

	while ($donnees = $req->fetch())
	{
		$insert = $bdd->exec('INSERT INTO proprietaire (nom_proprietaire) VALUES ("'.$donnees['possesseur'].'")');

		if ($insert)
		{
			$lastid = $bdd->lastInsertId();
			echo "dernier enregistrement table proprietaire : ".$lastid. "<br>";

			$nb_modifs = $bdd->exec("UPDATE jeux_video SET id_proprietaire = '".$lastid."' WHERE possesseur = '".$donnees['possesseur']."'") or die (print_r($bdd->errorInfo()));

			
		}
	}

	$suppression = $bdd->exec('ALTER TABLE jeux_video DROP possesseur') or die(print_r($bdd->errorInfo()));

	echo "la colonne 'possesseur' de JEUX_VIDEO à été supprimée ave succès !";

}
catch (Exception $e)
{
	die('Erreur : '.$e->getMessage());
}


echo "La table propriétaire à été mise à jour !";



?>