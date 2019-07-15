<?php
include 'db.php';
?>

<?php
$id = $_GET['id'];

$sql = "DELETE FROM tb_stations_201 WHERE (id = '$id')";

if (mysqli_query($connection, $sql)) {
    echo "<h2>Station deleted successfully</h2>";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($connection);
}

mysqli_close($connection);

?>