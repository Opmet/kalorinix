<?php
/**
 * Klassen hanterar sessioner.
 *
 * @author Joakim Andersson <joakim@itandersson.se>
 * @copyright Joakim Andersson 2014-05-23
 */

if(!isset($_SESSION))
{
	session_start();
}

define('__MODELsession__', dirname(dirname(__FILE__)));

require_once(__MODELsession__.'/model/Security.php');


class Session {
	private $m_validateInput;
	private $m_validateoutput;

	public function __construct() {
		$this->m_validateInput = new Security();
		$this->m_validateoutput = new Security();
	}
	
	/*
	 * Kontrollerar och sparar post variablerna till wizards sida ett.
	 */
	public function savePageOneSessions() {
		
		//Om post finns sätt session.
		//AnnarsOm session redan finns, gör inget.
		//Annars om varken post eller session finns så är något fel.
		if( isset($_POST['producent']) ):
		   $_SESSION['producent'] = $this->m_validateInput->validateFormData($_POST["producent"]);
		elseif( isset($_SESSION['producent']) ):
		   //Gör inget.
		else:
		   throw new Exception("Variablen finns inte!", "01");
		endif;
		
		//Om post finns sätt session.
		//AnnarsOm session redan finns, gör inget.
		//Annars om varken post eller session finns så är något fel.
		if( isset($_POST['produkt']) ):
		$_SESSION['produkt'] = $this->m_validateInput->validateFormData($_POST["produkt"]);
		elseif( isset($_SESSION['produkt']) ):
		//Gör inget.
		else:
		throw new Exception("Variablen finns inte!", "02");
		endif;
	}
	
	/*
	 * Kontrollerar och sparar post variablerna till wizards sida två.
	 */
	public function savePageTwoSessions() {
		
		//Om post finns sätt session.
		//AnnarsOm session redan finns, gör inget.
		//Annars om varken post eller session finns så är något fel.
		if( isset($_POST['kcal']) ):
		$_SESSION['kcal'] = $this->m_validateInput->validateFormData($_POST["kcal"]);
		elseif( isset($_SESSION['kcal']) ):
		//Gör inget.
		else:
		throw new Exception("Variablen finns inte!", "01");
		endif;
		
		//Om post finns sätt session.
		//AnnarsOm session redan finns, gör inget.
		//Annars om varken post eller session finns så är något fel.
		if( isset($_POST['protein']) ):
		$_SESSION['protein'] = $this->m_validateInput->validateFormData($_POST["protein"]);
		elseif( isset($_SESSION['protein']) ):
		//Gör inget.
		else:
		throw new Exception("Variablen finns inte!", "01");
		endif;
		
		//Om post finns sätt session.
		//AnnarsOm session redan finns, gör inget.
		//Annars om varken post eller session finns så är något fel.
		if( isset($_POST['kolhydrat']) ):
		$_SESSION['kolhydrat'] = $this->m_validateInput->validateFormData($_POST["kolhydrat"]);
		elseif( isset($_SESSION['kolhydrat']) ):
		//Gör inget.
		else:
		throw new Exception("Variablen finns inte!", "01");
		endif;
		
		//Om post finns sätt session.
		//AnnarsOm session redan finns, gör inget.
		//Annars om varken post eller session finns så är något fel.
		if( isset($_POST['fett']) ):
		$_SESSION['fett'] = $this->m_validateInput->validateFormData($_POST["fett"]);
		elseif( isset($_SESSION['fett']) ):
		//Gör inget.
		else:
		throw new Exception("Variablen finns inte!", "01");
		endif;
	}
	
	/*
	 * .Nollställ alla sessionsvariablerna till sida ett och två.
	 */
	public function zeroPageSessions() {
		$_SESSION['producent'] = "";
		$_SESSION['produkt'] = "";
		$_SESSION['kcal'] = "";
		$_SESSION['protein'] = "";
		$_SESSION['kolhydrat'] = "";
		$_SESSION['fett'] = "";
	}
	
	/*
	 * Kontrollerar variablens data och retunerar.
	 * @throw Om Session inte finns.
	 * @return $producent Session data.
	 */
	public function getpront() {
		$producent = null;
		
		if( isset( $_SESSION['producent'] ) ){
			$producent = $this->m_validateoutput->validateFormData( $_SESSION['producent'] );
		}
		else{ throw new Exception("Session finns inte!", "1"); }
		
		return $producent;
	}
	
	/*
	 * Kontrollerar variablens data och retunerar.
	 * @throw Om Session inte finns.
	 * @return $produkt Session data.
	 */
	public function getprokt() {
		$produkt = null;
		
		if( isset( $_SESSION['produkt'] ) ){
			$produkt = $this->m_validateoutput->validateFormData( $_SESSION['produkt'] );
		}
		else{ throw new Exception("Session finns inte!", "2"); }
		
		return $produkt;
	}
	
	/*
	 * Kontrollerar variablens data och retunerar.
	 * @throw Om Session inte finns.
	 * @return $kcal Session data.
	 */
	public function getkcal() {
		$kcal = null;
		
		if( isset( $_SESSION['kcal'] ) ){
			$kcal = $this->m_validateoutput->validateFormData( $_SESSION['kcal'] );
		}
		else{ throw new Exception("Session finns inte!", "3"); }
		
		return $kcal;
	}
	
	/*
	 * Kontrollerar variablens data och retunerar.
	 * @throw Om Session inte finns.
	 * @return $protein Session data.
	 */
	public function getproin() {
		$protein = null;
		
		if( isset( $_SESSION['protein'] ) ){
			$protein = $this->m_validateoutput->validateFormData( $_SESSION['protein'] );
		}
		else{ throw new Exception("Session finns inte!", "4"); }
		
		return $protein;
	}
	
	/*
	 * Kontrollerar variablens data och retunerar.
	 * @throw Om Session inte finns.
	 * @return $kolhydrat Session data.
	 */
	public function getkolat() {
		$kolhydrat = null;
		
		if( isset( $_SESSION['kolhydrat'] ) ){
			$kolhydrat = $this->m_validateoutput->validateFormData( $_SESSION['kolhydrat'] );
		}
		else{ throw new Exception("Session finns inte!", "5"); }
		
		return $kolhydrat;
	}
	
	/*
	 * Kontrollerar variablens data och retunerar.
	 * @throw Om Session inte finns.
	 * @return $fett Session data.
	 */
	public function getfett() {
		$fett = null;
		
		if( isset( $_SESSION['fett'] ) ){
			$fett = $this->m_validateoutput->validateFormData( $_SESSION['fett'] );
		}
		else{ throw new Exception("Session finns inte!", "6"); }
		
		return $fett;
	}
}
?>