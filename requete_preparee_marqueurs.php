<?php
ini_set("display_errors", 1);
error_reporting(E_ALL);
//phpinfo();


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

// Si tout va bien, on peut continuer

$reponse = $bdd->prepare('SELECT nom, prix FROM jeux_video WHERE possesseur = :possesseur AND prix <= :prix_max ORDER BY prix');

$reponse->execute(array("possesseur" => $_GET['possesseur'], "prix_max" => $_GET['prix_max']));

echo "<ul>";
while ($donnees = $reponse->fetch())
{

    echo '<li>' . $donnees['nom'] . ' ( ' . $donnees['prix']. ' EUR</li>';
}
echo "</ul>";


$reponse->closeCursor(); // Termine le traitement de la requête

?>
