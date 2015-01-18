<?php
define('__ROOTpageonecontroller__', dirname(dirname(dirname(__FILE__))));
define('__MODELpageonecontroller__', dirname(dirname(dirname(dirname(__FILE__)))));

require_once(__ROOTpageonecontroller__.'/interface/CreateAJAX.php');
require_once(__MODELpageonecontroller__.'/model/Session.php');

/*
 * This class handles the wizard.
 *
 * @author Joakim Andersson <joakim@itandersson.se>
 * @copyright Joakim Andersson 2014-05-23
*/
class PageOneController implements CreateAJAX{

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
			$session->savePageTwoSessions();
		} catch (Exception $e) {
			throw $e;
		}
	}
	
	/*
	 * Include and run WizardPageOne.
	 * @return WizardPageOne
	 */
	public function requirePage() {
		require_once(__ROOTpageonecontroller__.'/view/wizard/PageOneView.php');
	}
}
?>