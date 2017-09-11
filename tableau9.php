<?php

	$tableau = array (
		'prenom' => 'Francois',
		'nom' => 'Dupont',
		'adresse' => '3 rue du paradis',
		'ville' => 'Marseille',);

	$tableau_i = array();
/*
	foreach ($tableau as $key => $value) 
	{

		$tmp = $key;
		$key = $value;
		echo $key."<br>\n";
		$value = $tmp;
		echo $value."<br>\n";

	}
	*/

	foreach ($tableau as $key => $value) {
		
		if($value)
		{
			$tableau_i[$value] = $key;
		}
		# code...
	}

	echo "<pre>";
	print_r($tableau_i);
	echo "<pre>";
?>