<?php
ini_set("display_errors", 1);
error_reporting(E_ALL);
include_once('modele/connexion_sql.php');

// if (!isset($_GET['section']) OR $_GET['section'] == 'index')
// {
//     include_once('controleur/blog/index.php');
// }

$act = (isset($_GET['act'])) ? htmlspecialchars($_GET['act']) : "blog";

// la valeur de la variable $act détermine le nom du controleur auquel on veut accéder
$controllerName = strtolowaer($act);

$className = strtolower($act).'Contoller';

require("controleur/".$controllerName."/controller.php");

// instanciation de la class controller ainsi détermniée
$controoler = new $className();

// on récupère la valeur du parametre "task" dans l'url qui détermine le nom de la méthode qu'on veut utiliser
$task = (isset($_GET['task'])) ? htmlspecialchars($_GET['task']) : "posts";

// Perform the Request task
$controller->execute($task);