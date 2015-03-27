<?php

$hostname = "null"; 
$username = "null";
$password = "null";
//connect to the database
//requires host, user and pass

$mysqlconnect = mysql_connect($hostname, $username, $password) 
  or die("Unable to connect to MySQL");
echo "Connected to MySQL";
?>