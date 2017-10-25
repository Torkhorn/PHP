<?php
ini_set("display_errors", 1);
error_reporting(E_ALL);

class personne
{
 	private $nom;
 	private $prénom;
 	private $adresse;

 	//Constructeur
 	public function __construct($nom,$prénom,$adresse)
 	{
			$this->nom     = $nom;
			$this->prénom  = $prénom;
			$this->adresse = $adresse;
 	}
 	
 	//Destructeur
 	public function __destruct()
 	{
  		echo '<span style="color:#f00">La personne nommée ' . $this->prénom . ' ' . $this->nom . " est supprimée de vos contacts</span><br />";
 	}
 	
 	//
 	public function getpersonne()
 	{
  		$texte = " $this->prénom $this->nom <br /> $this->adresse <br />";

  		return $texte;
 	}
 	
 	//
 	public function setadresse($adresse)
 	{
  		$this->adresse = $adresse;
 	}
}

//Création d'objets
$client = new personne("Geelsen","Jan"," 145 Rue du Maine Nantes");

echo $client->getpersonne();

//Modification de l'adresse
$client->setadresse("23 Avenue Foch Lyon");

echo $client->getpersonne();

//Suppression explicite du client, donc appel du destructeur
//unset($client);

//Fin du script
echo "<br />Fin du script";
?>
