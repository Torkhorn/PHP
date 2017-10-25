<?php

class postModel {

    protected $db;

    public function __construct() {

        include('modele/connexion._sql.php');

        $this->db = $bdd;

    }

    public function get_billets($offset, $limit)
    {

        $offset = (int) $offset;
        $limit = (int) $limit;

        $bdd = $this->db;
            
        $req = $bdd->prepare('SELECT id, titre, contenu, DATE_FORMAT(date_creation, \'%d/%m/%Y à %Hh%imin%ss\') AS date_creation_fr FROM billets ORDER BY date_creation DESC LIMIT :offset, :limit');
        $req->bindParam(':offset', $offset, PDO::PARAM_INT);
        $req->bindParam(':limit', $limit, PDO::PARAM_INT);
        $req->execute();
        $billets = $req->fetchAll();    
        
        return $billets;
    }
}