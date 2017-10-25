<?php
ini_set("display_errors", 1);
error_reporting(E_ALL);

function chargerClasse($class) {

	// on inclue la classe correspondante au paramètre passé
	require $class . ".php";

}

//on enregistre la fonction en autoload pour qu'elle soit appelée dès qu'on instanciera une classe non déclarée
spl_autoload_register('chargerClasse'); 

// Instanciation de la classe Personnage qui n'est pas déclarée
$perso = new Personnage (10, 0);