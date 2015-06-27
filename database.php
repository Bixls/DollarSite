<?php

$servername = "localhost";
$username = "username";
$password = "password";

$connection = new mysqli($servername, $username, $password);

if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

$sql = "CREATE DATABASE Dollar_Prices";
if ($connection->query($sql) === TRUE) {
    echo "Database created successfully";
} else {
    echo "Error creating database: " . $connection->error;
}

$sql = "CREATE TABLE Countries (id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, code VARCHAR(30) NOT NULL,name VARCHAR(50) NOT NULL,value VARCHAR(30),
curr_full VARCHAR(50) NOT NULL ,curr_short VARCHAR(30) NOT NULL,flag longblob NOT NULL)";
if ($connection->query($sql) === TRUE) {
    echo "Countries created successfully";
} else {
    echo "Error creating table: " . $connection->error;
}

$connection->close();
?>
