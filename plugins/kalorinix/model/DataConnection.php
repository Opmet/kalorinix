<?php
define('__MODELdataconnection__', dirname(__FILE__));

require_once(__MODELdataconnection__.'/Log.php');

/**
 * The class handles the mysql database.
 *
 * @author Joakim Andersson <joakim@itandersson.se>
 * @copyright Joakim Andersson 2014-04-29
 */
class DataConnection {
	private $m_host;
	private $m_username;
	private $m_password;
	private $m_dbname;
	private $m_port;
	
	public function __construct($p_host, $p_username, $p_password, $p_dbname, $p_port) {
	    $this->m_host = $p_host;
	    $this->m_username = $p_username;
	    $this->m_password = $p_password;
	    $this->m_dbname = $p_dbname;
	    $this->m_port = $p_port;
	}
	
	/**
	 * Run insert on mysql database.
	 * @param $p_sql sql to run.
	 * @throws Exception A exception is thrown if the database could not perform the query.
	*/
	public function insertData($p_sql) {
		
		try {
			$success = $this->mysqlInsert($p_sql);
		} catch (Exception $e) {
		throw $e;
		}
		
	}
	
	/**
	 * Connect to mysql database and perform a insert query.
	 * @param $p_query sql query.
	 * @throws Exception A exception is thrown if the database could not perform the query.
	 * @return TRUE if the query was successful, FALSE if the query failed.
	*/
	private function mysqlInsert($p_query) {
		$success = FALSE;
		
		$mysqli = new mysqli($this->m_host, $this->m_username, $this->m_password, $this->m_dbname, $this->m_port);
		
		$mysqli->query($p_query);
		
		if ($mysqli->error) {
			throw new Exception("MySQL error - kunde inte uppdatera MySQL: $mysqli->error \n Query:  $p_query", $mysqli->errno);
		}
		else {
			$success = TRUE;
		}
		
		$mysqli->close();
		 
		return $success;
	}
	
	/**
	 * 
	 * @param $p_sql sql to run.
	 * @throws Exception A exception is thrown if the database could not perform the query.
	 */
	public function selectData($p_sql) {
		
		$rows = array();
	
		try {
			$rows = $this->mysqlSelect($p_sql);
		} catch (Exception $e) {
			throw $e;
		}
		
		return $rows;
	
	}
	
	/**
	 * Connect to mysql database and perform a select query.
	 * @param $p_query sql query.
	 * @throws Exception A exception is thrown if the database could not perform the query.
	 * @return An array off resultset if the query was successful.
	 */
	private function mysqlSelect($p_query) {
	
		$mysqli = new mysqli($this->m_host, $this->m_username, $this->m_password, $this->m_dbname, $this->m_port);
	
		$result = $mysqli->query($p_query);
		
		$rows = array();
		while( $row = $result->fetch_array(MYSQLI_ASSOC) ) {
			$rows[] = $row;
		}
	
		if ($mysqli->error) {
			throw new Exception("MySQL error - $mysqli->error \n Query:  $p_query", $mysqli->errno);
		}
	
		/* free result set */
		$result->close();
		
		/* close connection */
		$mysqli->close();
			
		return $rows;
	}
	
	/**
	 *
	 * @param $p_sql sql to run.
	 * @throws Exception A exception is thrown if the database could not perform the query.
	 */
	public function updateData($p_sql) {
		
		try {
			$mysqli = new mysqli($this->m_host, $this->m_username, $this->m_password, $this->m_dbname, $this->m_port);
			
			$mysqli->query($p_sql);
			
			if ($mysqli->error) {
				throw new Exception("MySQL error - $mysqli->error \n Query:  $p_query", $mysqli->errno);
			}
			
			/* close connection */
			$mysqli->close();
			
		} catch (Exception $e) {
			throw $e;
		}
	}
	
		
}
?>