<?php
/**
 * Hanterar inkommande AJAX trafik till kravet create vara.
 *
 * @author Joakim Andersson <joakim@itandersson.se>
 * @copyright Joakim Andersson 2014-05-30
 */
define('__ROOTOwnitemhandler__', dirname(dirname(__FILE__)));
define('__MODELOwnitemhandler__', dirname(dirname(dirname(__FILE__))));

require_once(__MODELOwnitemhandler__.'/model/Security.php');
require_once(__MODELOwnitemhandler__.'/model/Log.php');


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
	$fileName  = __ROOTOwnitemhandler__ . '/controller/' . $className . '.php';
	require_once( $fileName ); //inkludera kontrollern

	$controller = new $className;
	$rows = $controller->execute( $testInput->validateFormData($_POST['search']) );
	
	echo json_encode( $rows );
	

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