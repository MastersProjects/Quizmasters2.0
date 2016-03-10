<?php
require_once 'Database.php';

/**
 * Class for the Table ANSWER
 * @author Chiramed Phong Penglerd, Luca Marti, Elia Perenzin
 * @version 1.0
 * Quizmasters 2.0 2016
 */
class Table_ANSWER {

	public function fuctionName() {
		$query = "";
		$connection = Database::getInstance ()->getConnection ();
		$connection->query ( $query );
	}
}