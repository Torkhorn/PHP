<?php

	$tableau = array (
		'prenom' => 'Francois',
		'nom' => 'Dupont',
		'adresse' => '3 rue du paradis',
		'ville' => 'Marseille',);

	foreach ($tableau as $key => $value) 
	{

		if( $key == 'prenom' && $value == 'Albert')
		{
			echo "'Albert' existe dans le tableau !\n";
		}
		else
		{
			echo "'Albert' n'existe pas dans le tableau !\n";
		}

		if( $key == 'prenom' && $value == 'Francois')
		{
			echo "'Francois' existe dans le tableau !\n";
			break;
		}
		else
		{
			echo "'Francois' n'existe pas dans le tableau ! \n";
		}
	}
	

?>
