<?php

function getVolounteers($conn){
    mysqli_set_charset($conn, 'utf8');
    $volounteers = mysqli_query($conn,"SELECT * FROM heroku_00fb7a2965fdb12.volonteer_info");
    $volounteers_list = [];

    while($volounteer = mysqli_fetch_assoc($volounteers)){
        $volounteers_list[] = $volounteer;
    }

    echo json_encode($volounteers_list, JSON_UNESCAPED_UNICODE);
}

function getVolounteer($conn,$id){
    mysqli_set_charset($conn, 'utf8');
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
    mysqli_set_charset($conn, 'utf8');
    $id = $data['VolounteerID'];
    $fio = $data['FIO'];
    $phoneNumber = $data['TelephoneNumber'];
    $arrivalLocation = $data['ArrivalLocation'];
    $targetDestination = $data['TargetDestination'];
    $carDescription = $data['CarDescription'];
    $capacity = $data['Capacity'];
    $booked = $data['Booked'];
    $dateAndTime = $data['DateAndTimeOfDeparture'];
    mysqli_query($conn,"INSERT INTO heroku_00fb7a2965fdb12.volonteer_info VALUES (NULL,'$fio','$phoneNumber',' $arrivalLocation','$targetDestination','$carDescription','$capacity','0','$dateAndTime')");
    
    http_response_code(201);
    
    $res = [
        "status" => true,
        "volounteer_id" => mysqli_insert_id($conn) 
    ];

    echo json_encode($res, JSON_UNESCAPED_UNICODE);

}

function addEscaper($conn,$data){
    mysqli_set_charset($conn, 'utf8');
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
    mysqli_set_charset($conn, 'utf8');
    $volounteer = mysqli_query($conn, "DELETE FROM heroku_00fb7a2965fdb12.volonteer_info WHERE VolounteerID = '$id'");
    
    http_response_code(200);
    
    $res = [
        "status" => true,
        "message" => "volounteer is deleted" 
    ];
    echo json_encode($res, JSON_UNESCAPED_UNICODE);
}

