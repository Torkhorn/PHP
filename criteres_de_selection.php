<?php
ini_set("display_errors", 1);
error_reporting(E_ALL);
//phpinfo();

if(!isset($_GET['limit']) || !isset($_GET['limitstart']))
{
	$limit = 10;
	$limitstart = 0;

	?>
	<p styles="color : #f00">On séléctionne les 10 premiers enregistrements par défaut </p>
	<?php
}
else
{
	$limit = (int)$_GET['limit'];
	$limitstart = (int)$_GET['limitstart'];

	if ($limitstart == $limit && $limit == 0)
	{
		$limit = 10;
	}
}

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

$reponse = $bdd->prepare('SELECT nom, possesseur, console, prix FROM jeux_video WHERE console= ? OR console= ? ORDER BY prix DESC LIMIT '.$limitstart . ', ' . $limit);
$reponse->execute(array($_GET['console'] => 'Xbox', ));

echo '<p>Voici les 10 premières entrées de la table jeux_video :</p>';

// On affiche chaque entrée une à une
while ($donnees = $reponse->fetch())
{
?>
    <p>
    <strong>Jeu</strong> : <?php echo $donnees['nom']; ?> appartient à <?php echo $donnees['possesseur']; ?> fonctionne sur <?php echo $donnees['console']; ?> et vaut <?php echo $donnees['prix']; ?> €
   </p>
<?php
}



$reponse->closeCursor(); // Termine le traitement de la requête

?>
