<?php

function getVolounteers($conn){
    $volounteers = mysqli_query($conn,"SELECT * FROM heroku_00fb7a2965fdb12.volonteer_info");
    $volounteers_list = [];

    while($volounteer = mysqli_fetch_assoc($volounteers)){
        $volounteers_list[] = $volounteer;
    }

    echo json_encode($volounteers_list, JSON_UNESCAPED_UNICODE);
}

function getVolounteer($conn,$id){
    $volounteer = mysqli_query($conn, "SELECT * FROM heroku_00fb7a2965fdb12.volonteer_info WHERE VolounteerID = '$id'");

    if(mysqli_num_rows($volounteer) === 0){
        http_response_code(404);
        $res = [
            "status" => false,
            "message" => "Volounteer not found" 
        ];
        echo json_encode($res);
    }else{
        $volounteer = mysqli_fetch_assoc($volounteer);
        echo json_encode($volounteer, JSON_UNESCAPED_UNICODE);
    }
}

function addVolounteer($conn,$data){
    $id = $data['VolounteerID'];
    $fio = $data['FIO'];
    $phoneNumber = $data['TelephoneNumber'];
    $arrivalLocation = $data['ArrivalLocation'];
    $targetDestination = $data['TargetDestination'];
    $carDescription = $data['CarDescription'];
    $capacity = $data['Capacity'];
    $booked = $data['Booked'];
    $dateAndTime = $data['DateAndTimeOfDeparture'];
    mysqli_query($conn,"INSERT INTO heroku_00fb7a2965fdb12.volonteer_info VALUES (NULL,'$fio','$phoneNumber',' $arrivalLocation','$targetDestination','$carDescription','$capacity','$booked','$dateAndTime')");
    
    http_response_code(201);
    
    $res = [
        "status" => true,
        "volounteer_id" => mysqli_insert_id($conn) 
    ];

    echo json_encode($res, JSON_UNESCAPED_UNICODE);

}

function addEscaper($conn,$data){
    $id = $data['ID'];
    $fio = $data['FIO'];
    $phoneNumber = $data['TelephoneNumber'];
    $booked = $data['BookedPlaces'];
    mysqli_query($conn, "INSERT INTO heroku_00fb7a2965fdb12.escaper_info VALUES (NULL, '$fio','$phoneNumber','$booked')");

    http_response_code(201);

    $res = [
        "status" => true,
        "escaper_id" => mysqli_insert_id($conn)
    ];

    echo json_encode($res, JSON_UNESCAPED_UNICODE);
}

function deleteVolounteer($conn,$id){
    $volounteer = mysqli_query($conn, "DELETE FROM heroku_00fb7a2965fdb12.volonteer_info WHERE VolounteerID = '$id'");
    
    http_response_code(200);
    
    $res = [
        "status" => true,
        "message" => "volounteer is deleted" 
    ];
    echo json_encode($res, JSON_UNESCAPED_UNICODE);
}

function getGoogleAddressCoordinates()
    {
        //using the google maps api to get the long and lat coordinates of addresss
        //using form post variables
        $address =trim($_POST['address']);
        $city = trim($_POST['city']);
        $state = trim($_POST['state']);

        //formats the address add '+' into space
        $address = str_replace( ' ', '+' ,$address);
        $city = str_replace( ' ', '+', $city);
        $address = preg_replace("[^A-Za-z0-9]", '+', $address ); //remove non alpha numeric chars such as extra spaces.
        $address_str = $address.',+'. $city.',+'.$state;
        $geo_url = "http://maps.google.com/maps/api/geocode/json?address=$address_str&sensor=false";
        //echo $geo_url;
        //echo file_get_contents($geo_url);
        $json_result = json_decode(file_get_contents($geo_url));

        $geo_result =  $json_result->results[0];
        $coordinates = $geo_result->geometry->location;

        //see if the it is locating the real address or just apox location, or in most cases a bad address
        if($geo_result->types[0] == 'street_address')
            $coordinates->valid_address  = TRUE;
        else
            $coordinates->valid_address  = FALSE;
        echo json_encode($coordinates, JSON_UNESCAPED_UNICODE);
    }
