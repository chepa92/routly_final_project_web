<?php
include 'db.php';

$passID = $_GET['passID'];
$fromID = $_GET['fromID'];
$destID = $_GET['destID'];

$sql = "INSERT INTO trips (fromstationID, toStationID, userid) 
VALUES ('$fromID', '$destID', '$passID')";

if (mysqli_query($connection, $sql)) {
    echo "<h4>New order complete!<br>Driver already coming to you.</h4>";
} else {
    echo "<h3>Please enter right stations</h3>";
}

mysqli_close($connection);
?>