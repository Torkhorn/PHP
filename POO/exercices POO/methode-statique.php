<?php
ini_set("display_errors", 1);
error_reporting(E_ALL);

class Personnage
{
  private $_force;
  private $_localisation;
  private $_experience;
  private $_degats;

  const FORCE_PETITE = 20;
  const FORCE_MOYENNE = 50;
  const FORCE_GRANDE = 80;

  public function __construct($forceInitiale)
  {
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

  // Notez que le mot-clé static peut être placé avant la visibilité de la méthode (ici c'est public).
  public static function parler()
  {
    echo 'Je vais tous vous tuer !';
  }
}

//appelle de la méthode static par l'opérateur de résolution de portée ::
Personnage::parler();

//on peut aussi appeler la méthode statique depuis un objet
$perso = new Personnage(Personnage::FORCE_GRANDE);
$perso->parler();