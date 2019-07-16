<?php
include 'db.php';


if(isset($_REQUEST['term'])) {

    $query = "SELECT * FROM tb_stations_201 WHERE name LIKE ?";
    $statement = $connection->prepare($query);
    $term = "%".$_REQUEST['term']."%";
    $statement->bind_param("s", $term);
    $statement->execute();
    $statement->store_result();
    if($statement->num_rows() == 0) {
        echo "<p>Nothing found by search ".$_REQUEST['term']."</p>";
        $statement->close();
        $connection->close();
    } else {
        $statement->bind_result($id,$name,$district,$city,$street,$latitude,$longitude,$comment,$map,$light,$conditioner,$wifi);
        while ($statement->fetch()) {
            echo "<p>" . $name . " ". $id . "</p>";
        };
        $statement->close();
        $connection->close();
    };};
?>