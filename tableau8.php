<?php

	$tableau = array (
		'prenom' => 'Francois',
		'nom' => 'Dupont',
		'adresse' => '3 rue du paradis',
		'ville' => 'Marseille',);

	$compteur = 0;

	foreach ($tableau as $key => $value) 
	{

		if ($value) {

			$compteur++;
			# code...
		}
	}
	
	echo "Dans le tableau, il y a ".$compteur." valeurs différentes.";
?>