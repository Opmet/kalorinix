<?php

/**
 * 
 *
 * @author Joakim Andersson <joakim@itandersson.se>
 * @copyright Joakim Andersson 2014-05-30
*/
class Security {
	

	public function __construct() {
	}

	/*
	 * För att hindra felaktig data.
	 * @param $p_data som ska kontrolleras.
	 * @return Validated data
	 */
	public function validateFormData($p_data) {
		$p_data = trim($p_data);
		$p_data = stripslashes($p_data);
		$p_data = htmlspecialchars($p_data);
		return $p_data;
	}
}
?>