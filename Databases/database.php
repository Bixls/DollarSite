<?php
require_once ("../Classes/DatabaseConnect.php");

$connect = new DatabaseConnect();

$sql = "CREATE TABLE Countries (code VARCHAR(30) NOT NULL PRIMARY KEY,name VARCHAR(50) NOT NULL,value VARCHAR(30),
curr_full VARCHAR(50) NOT NULL ,curr_short VARCHAR(30) NOT NULL,flag VARCHAR(100) NOT NULL)";
$query=mysql_query($sql);
if ($query) {
    echo "Countries created successfully";
} else {
    echo "Error creating table";
}

?>
