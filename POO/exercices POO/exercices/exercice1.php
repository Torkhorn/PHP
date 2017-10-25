<?php
ini_set("display_errors", 1);
error_reporting(E_ALL);

class ville
{
	public $nom;
	public $depart;

 	public function getinfo()
 	{
  		$texte = "La ville de " . $this->nom . " est dans le département : " . $this->depart . " <br />";
  		return $texte;
 	}
}

//Création d'objets
$ville1 = new ville();

$ville1->nom    = "Nantes";
$ville1->depart = "Loire Atlantique";

$ville2 = new ville();

$ville2->nom    = "Lyon";
$ville2->depart = "Rhône";

echo $ville1->getinfo();
echo $ville2->getinfo();
?>
