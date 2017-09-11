<?php

	if (isset($_POST['prenom']) AND isset($_POST['nom']) AND isset($_POST['age']) AND isset($_POST['sexe']))
	{
		$_POST['age'] = (int) $_POST['age'];

		if(is_string($_POST['prenom']) AND is_string($_POST['nom']) AND is_int($_POST['age']))
		{
			if ($_POST['sexe'] == "Féminin")
			{
				echo "Bonjour Madame ". $_POST['nom'] . " " . $_POST['prenom'] . ", vous avez " . $_POST['age'] . " ans.";
			}
			else
			{
				echo "Bonjour Monsieur ". $_POST['nom'] . " " . $_POST['prenom'] . ", vous avez " . $_POST['age'] . " ans.";
			}
		}
		else
		{
			echo "Une valeur à été mal saisie ! Veuillez recommencer !";
		}

?>