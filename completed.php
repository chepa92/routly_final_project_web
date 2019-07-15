<?php
include 'db.php';

$passID = $_GET['passID'];
$tripID = $_GET['tridID'];
$price = $_GET['price'];

$sql = "UPDATE tb_trips_201 SET driverid = '$passID', price  = '$price', donedate = now() WHERE tripid = '$tripID'";

if (mysqli_query($connection, $sql)) {
    echo "<h4>Trip ended</h4>";
} else {
    echo "<h3>DB Error</h3>";
}

mysqli_close($connection);
?>