<?php
interface CreateAJAX
{
	/*
	 * Sparar sessions data.
	 */
	public function saveSessionData();
	
	/*
	 * Retunerar en php sida.
	 */
	public function requirePage();
}
?>