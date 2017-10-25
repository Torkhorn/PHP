<?php
ini_set("display_errors", 1);
error_reporting(E_ALL);

include("class.form.php");
class form2 extends form
{
     protected $coderadio;
     protected $codecase;

	 public function __construct($action,$titre,$methode="post")
	 {
	 	parent::__construct($action, $titre, $methode="post");
	 }

	 //********************************************
	 public function setradio($name,$libelle, $value)
	 {
	  	$this->coderadio .= '<b>' . $libelle . '</b><input type="radio" name="' . $name . ' value="'. $value.'" /><br /><br />';
	 }

	 //************************************************
	 public function setcase($name="envoi",$value="Envoyer")
	 {
        $this->codecase .= '<b>' . $libelle . '</b><input type="checkbox" name="' . $name . ' value="'. $value.'" /><br /><br />';
     }
     
	 public function getform()
	 {
		$this->code = "";
		$this->code .= $this->codeinit;
		$this->code .= $this->codetext;
		$this->code .= $this->codesubmit;
		$this->code .= $this->coderadio;
		$this->code .= $this->codecase;
		$this->code .= '</fieldset></form>';
		 	
		echo $this->code;
	 }
}

$myform = new form2("traitement.php", "donnez vos informations", "post");

$myform->settext("nom", "Votre nom : &nbsp;");
$myform->settext("code", "Votre code : &nbsp;");

$myform->setsubmit();


?>