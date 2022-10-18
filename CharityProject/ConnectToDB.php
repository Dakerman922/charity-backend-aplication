<?php
$host="127.0.0.2";
$port=3307;
$socket="";
$user="root";
$password="";
$dbname="";

$con = new mysqli($host, $user, $password, $dbname, $port, $socket)
	or die ('Could not connect to the database server' . mysqli_connect_error());
    if($con->connect_error){
        $error = $con->connect_error;
    }

$con->close();

?>