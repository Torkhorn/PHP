<?php
ini_set("display_errors", 1);
error_reporting(E_ALL);

require "Personnage2.php";
require "factory.php";

class PersonnagesManager
{
  private $_db; // Instance de PDO

  public function __construct($db)
  {
    $this->setDb($db);
  }

  public function add(Personnage $perso)
  {
    try {

      $q = $this->_db->prepare('INSERT INTO personnages(nom, forcePerso, degats, niveau, experience) VALUES(:nom, :forcePerso, :degats, :niveau, :experience)');

      $q->bindValue(':nom', $perso->nom());
      $q->bindValue(':forcePerso', $perso->forcePerso(), PDO::PARAM_INT);
      $q->bindValue(':degats', $perso->degats(), PDO::PARAM_INT);
      $q->bindValue(':niveau', $perso->niveau(), PDO::PARAM_INT);
      $q->bindValue(':experience', $perso->experience(), PDO::PARAM_INT);

      $q->execute();

    }
    catch(Exception $e)
    {
      // En cas d'erreur, on affiche un message et on arrête tout
        die('Erreur : '.$e->getMessage());
    }
    echo "L'objet a été correctement enregistré dans la BDD<br />";
  }

  public function delete(Personnage $perso)
  {
    $this->_db->exec('DELETE FROM personnages WHERE id = '.$perso->id());
  }

  public function get($id)
  {
    $id = (int) $id;

    $q = $this->_db->query('SELECT id, nom, forcePerso, degats, niveau, experience FROM personnages WHERE id = '.$id);
    $donnees = $q->fetch(PDO::FETCH_ASSOC);

    return new Personnage($donnees);
  }

  public function getList()
  {
    $persos = [];

    $q = $this->_db->query('SELECT id, nom, forcePerso, degats, niveau, experience FROM personnages ORDER BY nom');

    while ($donnees = $q->fetch(PDO::FETCH_ASSOC))
    {
      $persos[] = new Personnage($donnees);
    }

    return $persos;
  }

  public function update(Personnage $perso)
  {
    $q = $this->_db->prepare('UPDATE personnages SET forcePerso = :forcePerso, degats = :degats, niveau = :niveau, experience = :experience WHERE id = :id');

    $q->bindValue(':forcePerso', $perso->forcePerso(), PDO::PARAM_INT);
    $q->bindValue(':degats', $perso->degats(), PDO::PARAM_INT);
    $q->bindValue(':niveau', $perso->niveau(), PDO::PARAM_INT);
    $q->bindValue(':experience', $perso->experience(), PDO::PARAM_INT);
    $q->bindValue(':id', $perso->id(), PDO::PARAM_INT);

    $q->execute();
  }

  public function setDb(PDO $db)
  {
    $this->_db = $db;
  }
}

$bdd = Factory::getDbo ();

//on oréé une instance de notre manager, en lui passant une instance de PDO.
$manager = new PersonnagesManager($bdd);

$persos = $manager->getList();
echo "<pre>";print_r($persos);echo "</pre>";

//on créé un objet Personnage
/*$perso = new Personnage([
  'nom' => 'Victor',
  'forcePerso' => 5,
  'degats' => 0,
  'niveau' => 1,
  'experience' => 0
]);*/

//on ajoute le Personnage à la BDD
//$manager->add($perso);


//on créé un deuxième objet Personnage
/*$perso = new Personnage([
  'nom' => 'Michel',
  'forcePerso' => 55,
  'degats' => 21,
  'niveau' => 3,
  'experience' => 75
]);*/

//on ajoute le Personnage à la BDD
//$manager->add($perso);

//
//$bdd = Factory::getDbo ();

//on oréé une instance de notre manager, en lui passant une instance de PDO.
//$manager = new PersonnagesManager($bdd);



/*$persos = $manager->getList();
echo "<pre>";print_r($persos);echo "</pre>";*/

$perso1 = $manager->get(29);
$manager->delete ($perso1);

$persos = $manager->getList();
echo "<pre>";print_r($persos);echo "</pre>";
