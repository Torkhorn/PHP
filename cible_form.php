<?php

//		################################################
//		##											  ##
//		##		- Amélie WIDLOECHER					  ##
//		##		- Virginie MOURIES					  ##
//		##		- Mathieu LAUER						  ##
//		##											  ##
//		################################################


	include('fonction_form.php');


	//Vérifications sur la partie "ETAT CIVIL"
	VerifDate($_POST['date']);
	VerifString($_POST['firstname']);
	VerifString($_POST['lastname']);
	VerifInt($_POST['age']);
	VerifAge($_POST['birthday']);
	VerifNationalite($_POST['nationality'], $_POST['firstname'], $_POST['lastname']);
	VerifString($_POST['residence']);
	VerifInt($_POST['postal_code']);
	VerifString($_POST['email']);
	VerifString($_POST['city']);
	VerifString($_POST['phone']);
	VerifString($_POST['cellphone']);
	VerifString($_POST['job']);
	VerifInt($_POST['income']);
	VerifString($_POST['family']);
	// Conjoint
	VerifString($_POST['lastname_conjoint']);
	VerifString($_POST['firstname_conjoint']);
	VerifInt($_POST['age_conjoint']);
	VerifDate($_POST['birthday_conjoint']);
	VerifString($_POST['job_conjoint']);
	VerifInt($_POST['income_conjoint']);
	// Enfants
	VerifString($_POST['lastname_children1']);
	VerifString($_POST['firstname_children1']);
	VerifString($_POST['birthday_children1']);
	VerifString($_POST['lastname_children2']);
	VerifString($_POST['firstname_children2']);
	VerifString($_POST['birthday_children2']);
	VerifString($_POST['lastname_children3']);
	VerifString($_POST['firstname_children3']);
	VerifString($_POST['birthday_children3']);
	

	//Vérifications sur la partie "FISCALE"
	VerifInt($_POST['tax_paid']);
	// VOUS
	// Déduction
	if(isset($_POST['el']))
	{
		VerifCheckbox($_POST['el']);
	}
	echo $_POST['el'];

	
	VerifCheckbox($_POST['a110']);
	VerifCheckbox($_POST['a111']);
	VerifCheckbox($_POST['111b']);
	VerifCheckbox($_POST['srd']);
	// Pas de déclaration
	VerifRadio($_POST['interest']);
	// CONJOINT
	VerifInt($_POST['tax_conjoint']);
	// Déduction
	VerifCheckbox($_POST['el_conjoint']);
	VerifCheckbox($_POST['a110_conjoint']);
	VerifCheckbox($_POST['a111_conjoint']);
	VerifCheckbox($_POST['111b_conjoint']);
	VerifCheckbox($_POST['srd_conjoint']);
	// Pas de déclaration
	VerifRadio($_POST['interest2']);


	//Vérifications sur la partie "CREDITS"
	// CREDIT 1
	VerifString($_POST['nature_loaning']);
	VerifInt($_POST['monthly']);
	VerifDate($_POST['end_repayment']);
	/* 

		Ajouter une fonction : CheckRate ? 

		Vérifie qu'on a un float avec 2 chiffres après la virgule ?


	*/
	CheckRate($_POST['credit_rate']);
	VerifInt($_POST['remaining_capital']);
	VerifInt($_POST['borrowed_capital']);
	
	// CREDIT 2
	VerifString($_POST['nature_loaning2']);
	VerifInt($_POST['monthly2']);
	VerifDate($_POST['end_repayment2']);
	CheckRate($_POST['credit_rate2']);
	VerifInt($_POST['remaining_capital2']);
	VerifInt($_POST['borrowed_capital2']);


	// CREDIT 3
	VerifString($_POST['nature_loaning3']);
	VerifInt($_POST['monthly3']);
	VerifDate($_POST['end_repayment3']);
	CheckRate($_POST['credit_rate3']);
	VerifInt($_POST['remaining_capital3']);
	VerifInt($_POST['borrowed_capital3']);


	// CREDIT 4
	VerifString($_POST['nature_loaning4']);
	VerifInt($_POST['monthly4']);
	VerifDate($_POST['end_repayment4']);
	CheckRate($_POST['credit_rate4']);
	VerifInt($_POST['remaining_capital4']);
	VerifInt($_POST['borrowed_capital4']);


	// CREDIT 5
	VerifString($_POST['nature_loaning5']);
	VerifInt($_POST['monthly5']);
	VerifDate($_POST['end_repayment5']);
	CheckRate($_POST['credit_rate5']);
	VerifInt($_POST['remaining_capital5']);
	VerifInt($_POST['borrowed_capital5']);
	
?>