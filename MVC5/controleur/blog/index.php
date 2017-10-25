<?php

//vue par défaut
$default_view = "posts.php";

$view = (isset($_GET['view'])) ? htmlspecialchars($_GET['view']) . ".php" : $default_view;

try
{

	//contrôle de l'existence de la fonction contrôleur qui traite la demande en cours
	$function = str_replace(".php", "", $view);
	//$function = ($function == "index") ? "posts" : $function;

	if (!function_exists($function)) {

		throw new RuntimeException("Cette fonction n'existe pas!!!!!");

	}

	include_once("modele/blog/" . $view);

	//contrôle existence fichier "modele/blog/" . $view
	if (!file_exists("modele/blog/" . $view)) {

		throw new RuntimeException("Ce fichier modèle n'existe pas!!!!!");	

	}

	//contrôle existence fichier "view/blog/" . $view
	if (!file_exists("vue/blog/" . $view)) {

		throw new RuntimeException("Ce fichier de vue n'existe pas!!!!!");	

	}

}
catch (Exception $e)
{
	// En cas d'erreur, on affiche un message et on arrête tout
    die('Erreur : '.$e->getMessage());	
}


$function ($view);

function posts ($view) {

	// On demande les 5 derniers billets (modèle)
	$model = new postModel();
	$billets = $model->get_billets(0, 5);

	// On effectue du traitement sur les données (contrôleur)
	// Ici, on doit surtout sécuriser l'affichage
	foreach($billets as $cle => $billet)
	{
	    $billets[$cle]['titre'] = htmlspecialchars($billet['titre']);
	    $billets[$cle]['contenu'] = nl2br(htmlspecialchars($billet['contenu']));
	}

	$title = "Liste des posts";

	show_view ($billets, $title, $view);

}

function commentaires ($view) {

	try
	{

		if (!isset($_GET['billet'])){

			throw new RuntimeException("Aucun post sélectionné!!!!!");

		}

		if (!$billet = (int)$_GET['billet']) {

			throw new RuntimeException("Ce post n'existe pas!!!!!");

		}

		//on affiche les commentaires d'un billet
		$model = new commentairesModel();
		$datas_billet = $model->get_billet($billet);

		$title = "Commentaires du post donr l'id est : " . $billet;

		show_view ($datas_billet, $title, $view);

	}
	catch (Exception $e)
	{
		// En cas d'erreur, on affiche un message et on arrête tout
	    die('Erreur : '.$e->getMessage());	
	}

}

function show_view (&$datas, $title, $view) {
	
	// On affiche la page (vue)
	include_once('vue/view.php');

}




