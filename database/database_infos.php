<?php
require_once 'Database.php';

//Needed Information for connection
$server_name = "localhost";
$db_name = "";
$db_user = "";
$db_password = "";

//checks if connection is set otherwise it creates a new connection
if(Database::getInstance()->getConnection()==null) {
	$connectionInfo = array( "Database"=>$db_name);
 	Database::getInstance()->setConnectionInfo($server_name, $connectionInfo);
}

?>