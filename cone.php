<?php

	const pi=3.14;

	//Fonction permmettant le calcul du volume d'un cône
	function VolumeCone($rayon, $hauteur)
	{
		//define('pi', 3.14);

		if(is_numeric($rayon) && is_numeric($hauteur))
		{
			if($rayon == 0)
			{
				echo "Le rayon ne peut pas être égal à 0 !";
			}
			elseif($hauteur == 0)
			{
				echo "La hauteur ne peut pas être égale à 0 !";
			}
			elseif(($rayon != 0) && ($hauteur != 0))
			{
				$volume = pow($rayon, 2)*pi*$hauteur*(1/3);
				return $volume;
			}
		}
	}

	$volume = VolumeCone(7,1);

	//Vérification de la valeur retournée par la fonction
	if ($volume != NULL)
	{
		echo "Le volume du cone est de : ".$volume;
	}

?>