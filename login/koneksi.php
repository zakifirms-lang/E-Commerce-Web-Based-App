<?php
error_reporting(0);
session_start;
$host = "localhost";
$username = "root";
$password = "";
$database = "db";
$connection = mysql_connect($host, $username, $password, $database) or die (mysql_error());
mysql_select_db($database, $connection) or die (mysql_error());
?>