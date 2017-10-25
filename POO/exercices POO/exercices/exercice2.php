<?php
ini_set("display_errors", 1);
error_reporting(E_ALL);

class ville
{
	 private $nom;
	 private $depart;

	 public function __construct($nom,$depart)
	 {
		$this->nom    =$nom;
		$this->depart =$depart;
	 }

	 public function getinfo()
	 {
	  	$texte = "La ville de $this->nom est dans le département : $this->depart <br />";
	  	
	  	return $texte;
	 }
}
//Création d'objets
$ville1 = new ville("Nantes","Loire Atlantique");
$ville2 = new ville("Lyon","Rhône");

echo $ville1->getinfo();
echo $ville2->getinfo();
?>

