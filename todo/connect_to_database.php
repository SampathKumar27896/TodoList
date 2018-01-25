<?php
$password="";
$server_name = "localhost";
$user_name="root";
$database_name = "sample_database";

$connection = new mysqli($server_name,$user_name,$password,$database_name);



if($connection->connect_error)
	die("Connection Failed:".$connection->connect_error);
?>