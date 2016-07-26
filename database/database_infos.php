<?php
require_once 'Database.php';

//Needed Information for connection
$hostname = "localhost";
$user = "root";
$password = "";
$database = "quizmasters";
$port = 3307;

//checks if connection is set otherwise it creates a new connection
if(Database::getInstance()->getConnection()==null) {
 	Database::getInstance()->setConnectionInfo($hostname, $user, $password, $database, $port);
}

?>