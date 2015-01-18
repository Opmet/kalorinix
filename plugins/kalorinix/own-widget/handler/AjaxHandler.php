<?php
/**
 * Hanterar inkommande AJAX trafik.
 *
 * @author Joakim Andersson <joakim@itandersson.se>
 * @copyright Joakim Andersson 2014-10-07
 */
define('__ROOTAjaxhandler__', dirname(dirname(__FILE__)));
define('__MODELAjaxhandler__', dirname(dirname(dirname(__FILE__))));

require_once(__MODELAjaxhandler__.'/model/Security.php');
require_once(__MODELAjaxhandler__.'/model/Log.php');


if (!isset($_GET['Controller'])) {
	header($_SERVER["SERVER_PROTOCOL"]." 400 Bad Request");
	exit;
}

/*
 * Controller bestämmer vilken kontroller som ska köras.
 */
try {
	$testInput = new Security();
	$controllerStub = $testInput->validateFormData( $_GET['Controller'] ); //Kontrollerar AJAX input
	$className = $controllerStub . 'Controller';
	$fileName  = __ROOTAjaxhandler__ . '/controller/' . $className . '.php';
	require_once( $fileName ); //inkludera kontrollern

	$controller = new $className;
	
	$data = array();
	
	$jsonArray = json_decode(stripslashes( $_POST['data'] ));
	
	//Validera 
	foreach($jsonArray as $key=>$value){
		$data[$key] = $testInput->validateFormData( $value );
	}
	
	//Inaktivera poster i databasen
	$controller->remove( $data );
	
	//Inkludera vy
	$controller->requirePage();
	

} catch(Exception $e) {
	$msg = $e->getMessage() . "\n";
	$msg .=  nl2br($e->getTraceAsString());
	$error = new Log();
	$error->general($msg); //Skicka till logg fil.

	//TODO: Se till att felmedelandet inte skickas till webbsidan! Och kanske det borde vara ett user exeption istället med session?

	header($_SERVER["SERVER_PROTOCOL"]." 404 Not Found");
	exit;
}
?>