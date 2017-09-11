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
$reponse = $bdd->query('SELECT COUNT(*) as nombre, YEAR(date_enregistrement) as annee
                        FROM jeux_video 
                        GROUP BY YEAR(date_enregistrement)');

while ($donnees = $reponse->fetch())
{
?>

   <b>Année :</b> <?php echo $donnees['annee'] ?><br>
   <b>Nombre de jeux :</b> <?php echo $donnees['nombre'] ?><br>
   <br>

<?php
}
// termine le traitement de la requete
$reponse -> closeCursor(); 

?>