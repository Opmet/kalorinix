<?php
define('__ROOTowncontroller__', dirname(dirname(__FILE__)));
define('__MODELowncontroller__', dirname(dirname(dirname(__FILE__))));
define('__CONFIGowndatacontroller__', dirname(dirname(dirname(dirname(dirname(dirname(__FILE__)))))));

require_once(__MODELowncontroller__.'/model/DataConnection.php');
require_once(__CONFIGowndatacontroller__.'/wp-config.php');

/*
 * 
 * @author Joakim Andersson <joakim@itandersson.se>
 * @copyright Joakim Andersson 2014-05-23
 */
class OwnController {

    /*
	 *
	 */
	public function __construct() {
	}

	/*
	 * Hämta alla poster i databasen.
	 */
	public function execute() {
		
		$rows = array();
		
		try {
			$con = new DataConnection(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME, 3306);
		
			$sql="SELECT produkt FROM min_vara WHERE active_state = 1";
			
			$rows = $con->selectData($sql);
			
		
		} catch (Exception $e) {
		throw $e; //TODO: Fånga denna istället och skicka till log.
		}
		
		return $rows;
	}
	
	/*
	 * Inaktivera poster i databasen
	*/
	public function remove( $data ) {
		
		date_default_timezone_set('Europe/Stockholm');
	
		try {
			$con = new DataConnection(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME, 3306);
	
			foreach($data as $value){
				$sql="UPDATE min_vara
				SET active_state='0', inactive_time='" . date('Y-m-d H-i-s') . "' WHERE produkt='$value'";

				$con->updateData($sql);
			}
				
	
		} catch (Exception $e) {
			throw $e; //TODO: Fånga denna istället och skicka till log.
		}
	}
	
	/*
	 * Include view.
	* @return view
	*/
	public function requirePage() {
		require_once(__ROOTowncontroller__.'/view/OwnView.php');
	}
	
}
?>