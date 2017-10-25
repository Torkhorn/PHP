<?php

ini-set("display_erros",1);
error_reporting(E_ALL);

abstract class personne {

    protected $prenom;
    protected $nom;

    abstract protected function __construct($a, $b, $c);
}

class cleint extends personne {
    
    protected $adresse;

    public function __construct($nom, $prenom, $adresse) {
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->adresse = $adresse;
    }

    public function getcoord() {
        $info = "le clien $this->prenom $this->nom habite $this->adresse <br>";
    }
}

class electeur extends personne {

    public $nom;
    public $prenom;
    public $bureau_de_vote;
    public $vote;


}