<?php

header("Content-type: json/application");

require 'ConnectToDB.php';
require 'functions.php';

$method = $_SERVER['REQUEST_METHOD'];

$q = $_GET['q'];
$params = explode('/',$q);

$type = $params[0];
$id = $params[1];

switch($method){
    case 'GET':{
        if($type === 'volounteers'){
            if(isset($id)){
                getVolounteer($conn,$id);
            }
            else{
                getVolounteers($conn);
            }
        }
        break;
    }
    case 'POST':{
        addVolounteer($conn,$_POST);
    }
}


?>