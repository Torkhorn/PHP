<?php

	function DireBonjour($nom)
	{
	    echo 'Bonjour ' . $nom . ' !<br />';
	}

	$prenom = array('Batman','Patrick','Cunégonde','Gertroude','DJ Oscar Tofel','Jean Bobine','Gandalf');
	
	foreach ($prenom as $key) {
		DireBonjour($key);# code...
	}

	?>