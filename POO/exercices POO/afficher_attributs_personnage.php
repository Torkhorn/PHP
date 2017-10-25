<?php
ini_set("display_errors", 1);
error_reporting(E_ALL);
class Personnage
{
  private $_force = 50;
  private $_experience = 0;
  private $_degats = 0;
  
  public function frapper($persoAFrapper)
  {
    $persoAFrapper->augmenterDegats ($this->_force);
    //$persoAFrapper->_degats += $this->_force;
  }

  public function afficherExperience () {

    echo $this->_experience;

  }
  
  public function augmenterDegats ($force) 
  {
    $this->_degats += $force;
  } 
  
  public function gagnerExperience()
  {
    $this->_experience++;
  }
  
  // Mutateur chargé de modifier l'attribut $_force.
  public function setForce($force)
  {
    if (!is_int($force)) // S'il ne s'agit pas d'un nombre entier.
    {
      trigger_error('La force d\'un personnage doit être un nombre entier', E_USER_WARNING);
      return;
    }
    
    if ($force > 100) // On vérifie bien qu'on ne souhaite pas assigner une valeur supérieure à 100.
    {
      trigger_error('La force d\'un personnage ne peut dépasser 100', E_USER_WARNING);
      return;
    }
    
    $this->_force = $force;
  }
  
  // Mutateur chargé de modifier l'attribut $_experience.
  public function setExperience($experience)
  {
    if (!is_int($experience)) // S'il ne s'agit pas d'un nombre entier.
    {
      trigger_error('L\'expérience d\'un personnage doit être un nombre entier', E_USER_WARNING);
      return;
    }
    
    if ($experience > 100) // On vérifie bien qu'on ne souhaite pas assigner une valeur supérieure à 100.
    {
      trigger_error('L\'expérience d\'un personnage ne peut dépasser 100', E_USER_WARNING);
      return;
    }
    
    $this->_experience = $experience;
  }
  
  // Ceci est la méthode degats() : elle se charge de renvoyer le contenu de l'attribut $_degats.
  public function getDegats()
  {
    return $this->_degats;
  }
  
  // Ceci est la méthode force() : elle se charge de renvoyer le contenu de l'attribut $_force.
  public function getForce()
  {
    return $this->_force;
  }
  
  // Ceci est la méthode experience() : elle se charge de renvoyer le contenu de l'attribut $_experience.
  public function getExperience()
  {
    return $this->_experience;
  }
}
$perso1 = new Personnage;  // Un premier personnage
$perso2 = new Personnage;  // Un second personnage

$perso1->frapper($perso2);  // $perso1 frappe $perso2
$perso1->gagnerExperience(); // $perso1 gagne de l'expérience

$perso2->frapper($perso1);  // $perso2 frappe $perso1
$perso2->gagnerExperience(); // $perso2 gagne de l'expérience

echo 'Le personnage 1 a ', $perso1->getForce(), ' de force, contrairement au personnage 2 qui a ', $perso2->getForce(), ' de force.<br />';
echo 'Le personnage 1 a ', $perso1->getExperience(), ' d\'expérience, contrairement au personnage 2 qui a ', $perso2->getExperience(), ' d\'expérience.<br />';
echo 'Le personnage 1 a ', $perso1->getDegats(), ' de dégâts, contrairement au personnage 2 qui a ', $perso2->getDegats(), ' de dégâts.<br />';