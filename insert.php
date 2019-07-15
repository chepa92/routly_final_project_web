<?php
include 'db.php';
?>

<?php
$id = $_GET['StationId'];
$StationName = $_GET['StationName'];
$District = $_GET['District'];
$City = $_GET['City'];
$Street = $_GET['Street'];
$Latitude = $_GET['Latitude'];
$Longitude = $_GET['Longitude'];
$Comment = $_GET['Comment'];
$Screen = $_GET['Screen'] == 'on' ? '1' : '0';
$Conditioner = $_GET['Conditioner'] == 'on' ? '1' : '0';
$Light = $_GET['Light'] == 'on' ? '1' : '0';
$Wifi = $_GET['Wifi'] == 'on' ? '1' : '0';

$sql = "INSERT INTO tb_stations_201 (id, name, district, city, street, latitude, longtitude, comment, map, light, conditioner, wifi) 
VALUES ('$id', '$StationName', '$District', '$City', '$Street', '$Latitude', '$Longitude', '$Comment', '$Screen', '$Light', '$Conditioner', '$Wifi')";

if (mysqli_query($connection, $sql)) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($connection);
}

mysqli_close($connection);


?>