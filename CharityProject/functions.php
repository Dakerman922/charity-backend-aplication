<?php

function getVolounteers($conn){
    $volounteers = mysqli_query($conn,"SELECT * FROM heroku_00fb7a2965fdb12.volonteer_info");
    $volounteers_list = [];

    while($volounteer = mysqli_fetch_assoc($volounteers)){
        $volounteers_list[] = $volounteer;
    }

    echo json_encode($volounteers_list);
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
        echo json_encode($volounteer);
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
    mysqli_query($conn,"INSERT INTO heroku_00fb7a2965fdb12.volonteer_info VALUES ('$id','$fio','$phoneNumber',' $arrivalLocation','$targetDestination','$carDescription','$capacity','$booked','$dateAndTime')");
    
    http_response_code(201);
    
    $res = [
        "status" => true,
        "volounteer_id" => mysqli_insert_id($conn) 
    ];

    echo json_encode($res);

}


?>