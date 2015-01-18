<?php
define('__ROOTpagetwocontroller__', dirname(dirname(dirname(__FILE__))));
define('__MODELpagetwocontroller__', dirname(dirname(dirname(dirname(__FILE__)))));

require_once(__ROOTpagetwocontroller__.'/interface/CreateAJAX.php');
require_once(__MODELpagetwocontroller__.'/model/Session.php');

/**
 * This class handles the wizard.
 *
 * @author Joakim Andersson <joakim@itandersson.se>
 * @copyright Joakim Andersson 2014-05-23
*/
class PageTwoController implements CreateAJAX{

	/*
	 *
	 */
	public function __construct() {
	}
	
	/*
	 * Spara anropande sidas sessions variabler.
	 */
	public function saveSessionData() {
		$session = new Session();
		
		try {
			$session->savePageOneSessions();
		} catch (Exception $e) {
			throw $e;
		}
	}

	/*
	 * Include and run WizardPageOne.
	 * @return WizardPageOne
	 */
	public function requirePage() {
		require_once(__ROOTpagetwocontroller__.'/view/wizard/PageTwoView.php');
	}
}
?>