<?php
require_once ("DatabaseConnect.php");

$connect = new DatabaseConnect();

$sql = "CREATE DATABASE Dollar_Prices";
if ($connection->query($sql) === TRUE) {
    echo "Database created successfully";
} else {
    echo "Error creating database: " . $connection->error;
}

$sql = "CREATE TABLE Countries (code VARCHAR(30) NOT NULL PRIMARY KEY,name VARCHAR(50) NOT NULL,value VARCHAR(30),
curr_full VARCHAR(50) NOT NULL ,curr_short VARCHAR(30) NOT NULL,flag longblob NOT NULL)";
if ($connection->query($sql) === TRUE) {
    echo "Countries created successfully";
} else {
    echo "Error creating table: " . $connection->error;
}

$connection->close();
?>
