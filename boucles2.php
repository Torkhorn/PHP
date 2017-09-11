<?php

	for ($i=0; $i<=10; $i++)
	{
		//On n'affiche pas les 5 premiers nombres
		if($i<=5)
		{
			continue;
		}

		//Affichage des nombres de 6 à 10;
		echo $i.'<br>';
	}
?>