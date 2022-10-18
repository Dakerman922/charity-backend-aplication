<!DOCTYPE html>

<html>
    <head>
        <?php
        try{
            require_once 'ConnectToDB.php';
        }
        catch(Exception $ex){
            $error = $ex->getMessage();
        }
        ?>
        <meta charset="UTF-8">
        <title>Testing</title>
    </head>
    <body>
        <h1>Testing Mysql Connection</h1>
        <?php
        if(isset($error)){
            echo "<p>$error</p>";
        }
        else{
            echo "<p>Connected</p>";
        }      
        ?>
        <h2>Table from Mysql</h2>
        <table>
            <tr>
                <th>ID</th>
                <th>FIO</th>
                <th>Teleplhone Number</th>
                <th>Arrival location</th>
                <th>Target Destination</th>
                <th>Car Description</th>
                <th>Capacity</th>
                <th>Booked</th>
                <th>Date and time of departure</th>    
            </tr>
            <?php
            $connection = mysqli_connect('us-cdbr-east-06.cleardb.net', 'b2646ca55e38e5', '96f9b044'); //The Blank string is the password
            $sql = "SELECT * FROM volonteer_info";
            $result = mysqli_query($connection,$sql);
            if($result){
                while($row = mysqli_fetch_array($result)){
                    echo "<tr>";
                    echo "<td>".$row["Volounteer ID"]."</td><td>".$row["FIO"]."</td><td>".$row["Telephone number"]."</td>";
                    echo "<td>".$row["Arrival location"]."</td><td>".$row["Target destination"]."</td><td>".$row["Car description"]."</td>";
                    echo "<td>".$row["Capacity"]."</td><td>".$row["Booked"]."</td><td>".$row["Date and time of departure"]."</td>";
                    echo "</tr>";
                }
                echo "</table>";
            }
            else{
                echo "0 result";
            }
            mysqli_close($conn);
            ?>
    </body>
</html>