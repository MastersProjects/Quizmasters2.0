<?php
include_once 'database/database_infos.php';
include_once 'database/Database.php';

$database = Database::getInstance();

$result = $database->login('zperee', '1234');

