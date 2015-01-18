<?php
define('__ROOTdatacontroller__', dirname(dirname(__FILE__)));
define('__MODELdatacontroller__', dirname(dirname(dirname(__FILE__))));
define('__CONFIGdatacontroller__', dirname(dirname(dirname(dirname(dirname(dirname(__FILE__)))))));

require_once(__ROOTdatacontroller__.'/interface/DataAJAX.php');
require_once(__MODELdatacontroller__.'/model/Session.php');
require_once(__MODELdatacontroller__.'/model/DataConnection.php');
require_once(__CONFIGdatacontroller__.'/wp-config.php');


/*
 * 
 * @author Joakim Andersson <joakim@itandersson.se>
 * @copyright Joakim Andersson 2014-05-23
 */
class DataController implements DataAJAX{
	private $m_session;

	/*
	 *
	*/
	public function __construct() {
		$this->m_session = new Session();
	}
	
	/*
	 * Spara sessions variabler för sidan två.
	*/
	public function saveSessionData() {
	
		try {
			$this->m_session->savePageTwoSessions();
		} catch (Exception $e) {
			throw $e;
		}
	}
	
	/*
	 * Nollställ sessionsvariablerna till sida ett och två.
	 */
	public function zeroSessionData() {
		$this->m_session->zeroPageSessions();
	}
	
	/*
	 * Includera sida ett.
	 * @return WizardPageOne
	 */
	public function requirePage() {
		require_once(__ROOTdatacontroller__.'/view/wizard/PageOneView.php');
	}

	/*
	 * Spara sessions data till databas.
	 * @throws Exception Om databasen inte kunde uppdateras.
	*/
	public function insertSessionData() {

		try {
			$data = new DataConnection(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME, 3306);
			
			$sql="INSERT INTO min_vara (producent, produkt, kcal, protein, kolhydrat, fett)
			VALUES ('{$this->m_session->getpront()}', '{$this->m_session->getprokt()}', '{$this->m_session->getkcal()}', '{$this->m_session->getproin()}', '{$this->m_session->getkolat()}', '{$this->m_session->getfett()}')";
			
			$data->insertData($sql);
			
		} catch (Exception $e) {
			throw $e;
		}
	}
}
?>