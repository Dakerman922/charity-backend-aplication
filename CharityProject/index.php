<?php
require 'ConnectToDB.php';

$volounteers = mysqli_query($conn,"SELECT * FROM heroku_00fb7a2965fdb12.volonteer_info");

print_r($volounteers);

?>