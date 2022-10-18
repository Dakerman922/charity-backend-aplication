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
        <form method = "post">
            <input type="hidden" name = "ShowTable">
            <button type="submit" onclick="ShowData()">Show Table</button>
        </form>
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
            $sql = "SELECT * FROM heroku_00fb7a2965fdb12.volonteer_info";
            $result = mysqli_query($con,$sql);
            mysqli_close($con);
            ?>
        </table>
    </body>
</html>