<?php
class Personnage
{
  private $_force;
  private $_experience;
  private $_degats;
        
  public function frapper(Personnage $persoAFrapper)
  {
    $persoAFrapper->augmenterDegats ($this->_force);
  }
  
  public function augmenterDegats ($force) {
    $this->_degats += $force;
  }   

  public function gagnerExperience()
  {
    // Ceci est un raccourci qui équivaut à écrire « $this->_experience = $this->_experience + 1 »
    // On aurait aussi pu écrire « $this->_experience += 1 »
    $this->_experience++;
  }
        
  // Ceci est la méthode degats() : elle se charge de renvoyer le contenu de l'attribut $_degats.
  public function getdegats()
  {
    return $this->_degats;
  }
        
  // Ceci est la méthode force() : elle se charge de renvoyer le contenu de l'attribut $_force.
  public function getforce()
  {
    return $this->_force;
  }
        
  // Ceci est la méthode experience() : elle se charge de renvoyer le contenu de l'attribut $_experience.
  public function getexperience()
  {
    return $this->_experience;
  }
}