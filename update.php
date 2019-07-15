<?php
include 'db.php';
?>

<?php
$id = $_GET['StationId'];
$oldId = $_GET['oldID'];
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


$sql = "UPDATE tb_stations_201 SET `id` = '$id', 
                            `name` = '$StationName', 
                            `district` = '$District', 
                            `city` = '$City', 
                            `street` = '$Street', 
                            `latitude` = '$Latitude', 
                            `longtitude` = '$Longitude', 
                            `comment` = '$Comment', 
                            `map` = '$Screen', 
                            `light` = '$Light', 
                            `conditioner` = '$Conditioner', 
                            `wifi` = '$Wifi' 
        WHERE (`id` = '$oldId')";



if (mysqli_query($connection, $sql)) {
    echo "Station updated successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($connection);
}

mysqli_close($connection);


?>