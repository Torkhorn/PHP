<?php

if (isset($_GET['billet']))
	$billet = (int)$_GET['billet'];

if (empty($billet)) {

	// On demande les 5 derniers billets (modèle)
	include_once('modele/blog/get_billets.php');
	$billets = get_billets(0, 5);

	// On effectue du traitement sur les données (contrôleur)
	// Ici, on doit surtout sécuriser l'affichage
	foreach($billets as $cle => $billet)
	{
	    $billets[$cle]['titre'] = htmlspecialchars($billet['titre']);
	    $billets[$cle]['contenu'] = nl2br(htmlspecialchars($billet['contenu']));
	}

	// On affiche la page (vue)
	include_once('vue/blog/index.php');

} else {
	//on affiche les commentaires d'un billet
	include_once('modele/blog/get_billet.php');
	$datas_billet = get_billet($billet);

	// On affiche la page (vue)
	include_once('vue/blog/commentaires.php');

}

