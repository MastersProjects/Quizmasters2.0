<?php
require_once 'Database.php';

/**
 * Class for the Table GAMEMODE
 * @author Chiramed Phong Penglerd, Luca Marti, Elia Perenzin
 * @version 1.0
 * Quizmasters 2.0 2016
 */
class Table_GAMEMODE {

	public function fuctionName() {
		$query = "";
		$connection = Database::getInstance ()->getConnection ();
		$connection->query ( $query );
	}
}