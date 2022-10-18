<?php
$host="us-cdbr-east-06.cleardb.net";
$port=3306;
$socket="";
$user="b2646ca55e38e5";
$password="";
$dbname="";

$conn = new mysqli($host, $user, $password, $dbname, $port, $socket)
	or die ('Could not connect to the database server' . mysqli_connect_error());
?>
