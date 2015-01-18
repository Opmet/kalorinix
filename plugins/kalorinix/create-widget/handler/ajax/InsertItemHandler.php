<?php
/**
 * 
 *
 * @author Joakim Andersson <joakim@itandersson.se>
 * @copyright Joakim Andersson 2014-06-10
 */
define('__ROOTinsertitemhandler__', dirname(dirname(dirname(__FILE__))));
define('__MODELinsertitemhandler__', dirname(dirname(dirname(dirname(__FILE__)))));

require_once(__MODELinsertitemhandler__.'/model/Security.php');
require_once(__MODELinsertitemhandler__.'/model/Log.php');

if (!isset($_GET['Controller'])) {
	header($_SERVER["SERVER_PROTOCOL"]." 400 Bad Request");
	exit;
}

try {
	$testInput = new Security();
	$controllerStub = $testInput->validateFormData( $_GET['Controller'] ); //Kontrollerar AJAX input
	$className = $controllerStub . 'Controller';
	$fileName  = __ROOTinsertitemhandler__ . '/controller/' . $className . '.php';
	require_once( $fileName ); //inkludera kontrollern

	$controller = new $className;
	$controller->saveSessionData();
	$controller->insertSessionData();
	$controller->zeroSessionData();
	$controller->requirePage();

} catch(Exception $e) {
	$msg = "Nummer: " . $e->getCode() . "Medelande: " . $e->getMessage() . "\n";
	$msg .=  nl2br($e->getTraceAsString());
	$error = new Log();
	$error->general($msg); //Skicka till logg fil.

	//TODO: Se till att felmedelandet inte skickas till webbsidan! Och kanske det borde vara ett user exeption istället med session?

	header($_SERVER["SERVER_PROTOCOL"]." 404 Not Found");
	exit;
}
?>