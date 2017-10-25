<?php
ini_set("display_errors", 1);
error_reporting(E_ALL);

class Personnage
{
  private $_force;
  private $_localisation;
  private $_experience;
  private $_degats;

  // Déclarations des constantes en rapport avec la force.

  const FORCE_PETITE = 20;
  const FORCE_MOYENNE = 50;
  const FORCE_GRANDE = 80;

  public function __construct($forceInitiale)
  {
    // N'oubliez pas qu'il faut assigner la valeur d'un attribut uniquement depuis son setter !
    $this->setForce($forceInitiale);
  }

  public function deplacer()
  {

  }

  public function frapper()
  {

  }

  public function gagnerExperience()
  {

  }
  
  public function setForce($force)
  {
    // On vérifie qu'on nous donne bien soit une « FORCE_PETITE », soit une « FORCE_MOYENNE », soit une « FORCE_GRANDE ».
    if (in_array($force, [self::FORCE_PETITE, self::FORCE_MOYENNE, self::FORCE_GRANDE]))
    {
      $this->_force = $force;
    }
  }
}

// On envoie une « FORCE_MOYENNE » en guise de force initiale.
$perso = new Personnage(Personnage::FORCE_MOYENNE);

print_r($perso);