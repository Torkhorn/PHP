<?php

class commentairesModel {

	public function get_billet($id_billet)
	{
		include('modele/connexion_sql.php');

		$datas = array ();

		$req = $bdd->prepare('SELECT id, titre, contenu, DATE_FORMAT(date_creation, \'%d/%m/%Y à %Hh%imin%ss\') AS date_creation_fr FROM billets WHERE id = ?');
		$req->execute(array($id_billet));
		$datas['billet'] = $req->fetch();
		
		$req->closeCursor(); // Important : on libère le curseur pour la prochaine requête

		if (!empty($datas['billet'])) {
			// Récupération des commentaires
			$req = $bdd->prepare('SELECT auteur, commentaire, DATE_FORMAT(date_commentaire, \'%d/%m/%Y à %Hh%imin%ss\') AS date_commentaire_fr FROM commentaires WHERE id_billet = ? ORDER BY date_commentaire');
			$req->execute(array($id_billet));
			$datas['commentaires'] = $req->fetchAll();    
		}
		
		return $datas;
	}
}