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
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    </head>
    <body style="margin: 50px;">
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
        <table class="table">
            <thead>
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
            </thead>
            <tbody>
                <?php
                $sql = "SELECT * FROM volonteer_info";
                $result = mysqli_query($conn,$sql);
                if($result){
                    while($row = mysqli_fetch_assoc($result)){
                        echo "<tr>";
                        echo "<td>".$row["Volounteer ID"]."</td><td>".$row["FIO"]."</td><td>".$row["Telephone number"]."</td>";
                        echo "<td>".$row["Arrival location"]."</td><td>".$row["Target destination"]."</td><td>".$row["Car description"]."</td>";
                        echo "<td>".$row["Capacity"]."</td><td>".$row["Booked"]."</td><td>".$row["Date and time of departure"]."</td>";
                        echo "<td> <a class='btn btn-primary btn-sm' href='update'>Update</a> </td>";
                        echo "<td> <a class='btn btn-danger btn-sm' href='delete'>Delete</a> </td>";
                        echo "</tr>";
                    }
                    echo "</table>";
                }
                else{
                    echo "0 result";
                }
                mysqli_close($conn);
                ?>
            </tbody>
    </body>
</html>