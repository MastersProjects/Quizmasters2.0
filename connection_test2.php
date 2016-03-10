<?php
$conn = odbc_connect('QM','',''); 

if ($conn) {
    echo "Connection established.";
} else{
    die("Connection could not be established.");
}
?>