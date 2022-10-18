<?php
require 'ConnectToDB.php';

$volounteers = mysqli_query($conn,"SELECT * FROM heroku_00fb7a2965fdb12.volonteer_info");

$volounteers_list = [];

while($volounteer = mysqli_fetch_assoc($volounteers)){
    $volounteers_list[] = $volounteer;
}
print_r($volounteers_list);

?>