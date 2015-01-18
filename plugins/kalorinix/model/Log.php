<?php
define('__LOGlog__', dirname(dirname(__FILE__)));

/**
 * The class model off user, and more general logging.
 * 
 * @author Joakim Andersson <joakim@itandersson.se>
 * @copyright Joakim Andersson 2014-06-08
 */
class Log {
	
	private $m_path;
	private $m_user;
	private $m_general;
	
	/*
	 * Creates default file path and name to user and general exeption.
	 * Also creates a second constructor that can be used to change the defalt values.
	 * 
	 * @link http://www.php.net/manual/en/language.oop5.decon.php#99903
	 */
	function __construct()
	{
		$this->m_path = __LOGlog__ . "/log";                  //Default path.
		$this->m_user = "/kalorinix-user-errors.log";         //Default user file name.
		$this->m_general = "/kalorinix-general-errors.log";   //Default general file name.
		
		$a = func_get_args();
		$i = func_num_args();
		if (method_exists($this,$f='__construct'.$i)) {
			call_user_func_array(array($this,$f),$a);
		}
	}
	
	/*
	 * Can be used to change the defalt values.
	 * Parameter that is not used must be assigned to null.
	 * 
	 * EX:  Create a general exeption by define paht and name. 
	 * ----------------------------------------------------------------
	 * $path = "/mypathto/log";
	 * $user = NULL;
	 * $general = "my.log";
	 * $ex = new Log($path,$user,$general);
	 * ----------------------------------------------------------------
	 * 
	 * @param $p_path Path defined by calling object.
	 * @param $p_user File name defined by calling object.
	 * @param $p_general File name defined by calling object.
	 */
	function __construct3($p_path, $p_user, $p_general)
	{
		if(isset($p_path)) {$this->m_path = $p_path;}
		if(isset($p_user)) {$this->m_user = "/" . $p_user;}
		if(isset($p_general)) {$this->m_general = "/" . $p_general;}
	}
	
	/*
	 * Handles user errors.
	 * 
	 * @param $p_msg Message and trace from a thrown exeption to log.
	 * @param $p_user User text.
	 */
	public function user($p_msg,$p_user)
	{		
		$date = date('d.m.Y h:i:s');
		$log = $p_msg."   |  Date:  ".$date."  |  User:  ".$p_user."\n";
		error_log($log, 3, $this->m_path . $this->m_user);
	}
	
	/*
	 * Handles general exeption.
	 * 
	 * @param $p_msg Message to log.
	 */
	 public function general($p_msg)
	 {
	 	$date = date('d.m.Y h:i:s');
	 	$log = $p_msg."   |  Date:  ".$date."\n";
	 	error_log($log, 3, $this->m_path . $this->m_general);
	 }
}
?>