<?php

header("Content-type: json/application");

require 'ConnectToDB.php';
require 'functions.php';

$type = $_GET['q'];

if($type === 'volounteers'){
    getVolounteers($conn);
}



?>