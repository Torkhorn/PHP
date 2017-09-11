<?php

function get_comments($value)
{
    global $bdd;
    $value = (int) $value;

    $req = $bdd->prepare('SELECT auteur, commentaire, DATE_FORMAT(date_commentaire, \'%d/%m/%Y à %Hh%imin%ss\') AS date_commentaire_fr FROM commentaires WHERE id_billet = ? ORDER BY date_commentaire');
    $req->bindParam(':billet', $value, PDO::PARAM_INT);
    $req->execute();
    $comments = $req->fetchAll();
    
    return $comments;
}
