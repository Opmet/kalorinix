<?php
//define('__ROOTsearchcontroller__', dirname(dirname(__FILE__)));
define('__MODELsearchcontroller__', dirname(dirname(dirname(__FILE__))));
define('__CONFIGdatacontroller__', dirname(dirname(dirname(dirname(dirname(dirname(__FILE__)))))));

//require_once(__ROOTsearchcontroller__.'/interface/CreateAJAX.php');
require_once(__MODELsearchcontroller__.'/model/DataConnection.php');
require_once(__CONFIGdatacontroller__.'/wp-config.php');

/*
 * 
 * @author Joakim Andersson <joakim@itandersson.se>
 * @copyright Joakim Andersson 2014-05-23
 */
class SearchController {

    /*
	 *
	 */
	public function __construct() {
	}

	/*
	 * Spara anropande sidas sessions variabler.
	 */
	public function execute($p_search) {
		
		$rows = array();
		
		try {
			$data = new DataConnection(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME, 3306);
		
			$sql="SELECT produkt FROM min_vara";
			
			$rows = $data->selectData($sql);
			
		
		} catch (Exception $e) {
		throw $e;
		}
		
		return $rows;
	}
}
?>