<?php
ini_set("display_errors", 1);
error_reporting(E_ALL);

//Classe personne
abstract class personne
{
	 private $nom;//1
	 private $prenom;//2

	 abstract protected function __construct($a ,$b, $c);

	 public function getinfo ($info) {
	 	return $this->$info;
	 }

	 public function setinfo ($attribut, $info) {
	 	return $this->$attribut = $info;
	 }
}
//Classe client
class client extends personne
{
	 protected $adresse;

	 public function __construct($nom, $prenom, $adresse)
	 {
		$this->nom     = $nom;
		$this->prenom  = $prenom;
		$this->adresse = $adresse;
	 }

	 public function getcoord()
	 {
	  	$info = "Le client $this->prenom $this->nom habite $this->adresse <br />";

	  	return $info;
	 }
}
//Classe electeur
class electeur extends personne //
{
	 /*public $nom;//3
	 public $prenom;//4*/
	 public $bureau_de_vote;
	 public $vote;

	 function __construct($nom, $prenom, $bureau_de_vote)
	 {
		$this->setinfo ("nom", $nom);
		$this->setinfo  ("prenom", $prenom);
		$this->bureau_de_vote = $bureau_de_vote;
	 }

	 public function avoter()
	 {
	  	$this->vote = TRUE;
	 }

	 public function _toString() {
		 
		$attributs = get_object_vars($this);

		$string = "";

		echo "<br><u>On affiche la liste des attributs : </u><br>";

		foreach($attributs as $nomAttribut => $attribut) {
			$string .= $attribut. " : " .$attribut. "<br>";
		}

		return $string;
	 }
}

//Création d'objets
$client1 = new client("Delmas", "Jacquou", "Bordeaux");

echo "<h4>", $client1->getcoord()," </h4>";

$electeur1 = new electeur("Tintin", "Milan", "Brussel 5");

//L'électeur vote
$electeur1->avoter();

//Controle du vote
if ($electeur1->vote)
{
	echo "L'électeur " . $electeur1->getinfo('prenom') . " " . $electeur1->getinfo('nom') . " inscrit au bureau " . $electeur1->bureau_de_vote . " a voté <br />";
}//5
else
{
	echo "L'électeur " . $electeur1->getinfo('prenom') ." " . $electeur1->getinfo('nom') ." inscrit au bureau " . $electeur1->bureau_de_vote . " peut encore voter <br />";
}//6

echo $electeur1;

?>



