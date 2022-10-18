<?php

header("Content-type: json/application");

require 'ConnectToDB.php';
require 'functions.php';

$q = $_GET['q'];
$params = explode('/',$q);

$type = $params[0];
$id = $params[1];

if($type){
    if(isset($id)){
        getVolounteer($conn,$id);
    }
    else{
        getVolounteers($conn);
    }
    
}

?>