<?php
ini_set('display_errors', 'On');
$host = "localhost";
$dbname = "assign8";
$username = "root";
$password = "";
 
$mysqli = new mysqli(hostname : $host,
                    username : $username,
                    password : $password,
                    database : $dbname);

if ($mysqli->connect_errno) {
	die("Connection failed: " . $mysqli->connect_errno);
}
return $mysqli; 