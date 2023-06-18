<?php
    // database connection parameters
    
    use LDAP\Result;

    $servername = "localhost";
    $CityID = "root";
    $Cityname = "";
    $dbname = "temp_master";

    // create connection
    
    $conn = new mysqli($servername, $CityID, $Cityname, $dbname);

    // check connection

    if ($conn -> connect_error) {
        die("connection failed: " . $conn->connect_error);
    } 
   
    // SQL query to select records from temp_master 

    $sql="SELECT `CityID`, `Cityname`, `CityTemp` FROM `city_temp`";
    $result=$conn->query($sql);

    if ($result->num_rows>0) {
        // Output data
        echo "<table border='1'>";
        echo "<tr><th>CityID</th><th>Cityname</th><th>CityTemp</th></tr>";
        while ($row=$result->fetch_assoc()) {
            echo "<tr><td>" . $row["CityID"] . "</td><td>" . $row['Cityname'] . "</td><td>" . $row["CityTemp"] . "</td></tr>";
        }
        echo"</table>";
    }
    else {
        echo "0 Result";
    }

    // close connection
    $conn->close();
?>