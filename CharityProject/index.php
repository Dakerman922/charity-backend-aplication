<?php

header("Content-type: json/application");

header('Access-Control-Allow-Origin');
/*header('Access-Control-Allow-Headers');
header('Access-Control-Allow-Methods');
header('Access-Control-Allow-Credentials: true');*/

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
        if($id === 'Create' && $type === 'volounteers'){
            addVolounteer($conn,$_POST);
        }
        break;
    }
    case 'DELETE':{
        if($type === 'volounteers'){
            if($id){
                deleteVolounteer($conn,$id);
            }
        }
        break;
    }
    default:{
        echo json_encode("Something went wrong :0");
    }
}


?>