<?php
require_once 'Database.php';

//Needed Information for connection
$server_name = "WIN-6I7SLMJ1GDI\SQLSERVER";
$db_infos = array( "Database"=>"QUIZMASTERS");

//checks if connection is set otherwise it creates a new connection
if(Database::getInstance()->getServerName()==null) {
 	Database::getInstance()->setConnectionInfo($server_name, $db_infos);
}

?>