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
	$req = $bdd->query('SELECT DISTINCT console FROM jeux_video') or die(print_r($bdd -> errorInfo()));

	while ($donnees = $req->fetch())
	{
		$insert = $bdd->exec('INSERT INTO console (nom_console) VALUES ("'.$donnees['console'].'")');

		if ($insert)
		{
			$lastid = $bdd->lastInsertId();
			echo "dernier enregistrement table CONSOLE : ".$lastid. "<br>";

			$nb_modifs = $bdd->exec("UPDATE jeux_video SET id_console = '".$lastid."' WHERE console = '".$donnees['console']."'") or die (print_r($bdd->errorInfo()));

			
		}
	}

	$suppression = $bdd->exec('ALTER TABLE jeux_video DROP console') or die(print_r($bdd->errorInfo()));

	echo "la colonne 'console' de JEUX_VIDEO à été supprimée ave succès !";

}
catch (Exception $e)
{
	die('Erreur : '.$e->getMessage());
}


// try
// {
// $req = $bdd->exec('INSERT INTO console (nom_console) SELECT DISTINCT console FROM jeux_video');
// }
// catch (Exception $e)
// {
// 	die('Erreur : '.$e->getMessage());
// }


echo "La table CONSOLE à été mise à jour !";



?>