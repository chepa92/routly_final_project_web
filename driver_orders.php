<?php
include 'db.php';

session_start();

if (!isset($_SESSION["userid"]) || $_SESSION["role"] != 'Driver')
    header("location: index.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Routly</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link href="https://fonts.googleapis.com/css?family=ABeeZee&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./includes/style.css">
    <script src="./includes/logo.js"></script>
</head>

<body>
    <header>
        <nav class="navbar navbar-light navbar-top d-flex justify-content-end">
            <a class="navbar-brand mr-auto p-2 hide-and-seek-animals" id="top-logo" data-image="./images/doge<?php echo mt_rand(1, 2) ?>.png" href="passenger_trips.php">
                <div style="float: left;" class="logo">
                    <img src="./images/logo.png" alt="logo" class="logo__img hide-and-seek-animals__logo">
                </div>
            </a>
            <a class="material-icons navbar-brand p-2" href="#">settings</a>
            <img id="user-logo" src="images/driver1.png" width="60" alt="">
        </nav>
        <nav class="navbar navbar-expand-lg navbar-light navbar-second navhover">
            <span class="navbar-toggler navbar-text-current">Trip Orders</span>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <ul class="nav collapse navbar-collapse nav-justified" id="navbarNav">
                <li class="nav-item nav-link">
                    <a class="nav-link font-weight-bold" href="#">My Dashboard</a>
                </li>
                <li class="nav-item nav-link selected current">
                    <a class="nav-link active font-weight-bold" href="passenger_trips.php">Trips<span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item nav-link">
                    <a class="nav-link font-weight-bold" href="#">Feedback</a>
                </li>
                <li class="nav-item nav-link">
                    <a class="nav-link font-weight-bold" href="#">Schedule</a>
                </li>
                <li class="nav-item nav-link">
                    <a class="nav-link font-weight-bold" href="#">Payouts</a>
                </li>
            </ul>
        </nav>

        <nav class="navbar navbar-expand-lg navbar-light py-0 d-none d-sm-block d-sm-none navbar-third">
            <ul class="nav collapse navbar-collapse nav-justified" id="navbarNav2">
                <li class="nav-item nav-link disabled">
                    <a class="nav-link" href="#"></a>
                </li>
                <li class="nav-item nav-link crumb disabled">
                    <a class="nav-link active font-weight-bold text-secondary" href="passenger_trips.php">Orders<span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item nav-link disabled">
                    <a class="nav-link" href="#"></a>
                </li>
                <li class="nav-item nav-link disabled">
                    <a class="nav-link" href="#"></a>
                </li>
                <li class="nav-item nav-link disabled">
                    <a class="nav-link" href="#"></a>
                </li>
            </ul>
        </nav>
    </header>

    <main>
        <form action="station_info.php" method="get">
            <table id="table" class="table table-striped table-bordered mt-4 table-hover">
                <thead class="table-success">
                    <tr>

                        <th scope="col">From</th>
                        <th id="stationName" scope="col">To</th>
                        <th scope="col">Order Date</th>
                        <th scope="col">Distance</th>
                        <th scope="col">First Name</th>
                        <th scope="col">Last Name</th>
                        <th scope="col">Order</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $query = "SELECT
                    stations.name fromStat,
                    stations_dest.name destStat,
                    trips.orderdate date,
                    stations.latitude x1, 
                    stations.longtitude y1,
                    stations_dest.latitude x2, 
                    stations_dest.longtitude y2,
                    users.firstname firstname,
                    users.lastname lastname,
                    trips.tripid
                  FROM tb_trips_201 trips
                    INNER JOIN tb_stations_201 stations
                      ON trips.fromstationID = stations.id
                    INNER JOIN tb_stations_201 stations_dest
                      ON trips.toStationID = stations_dest.id
                    INNER JOIN tb_users_201 users
                      ON trips.userid = users.userid
                  WHERE trips.driverid IS NULL
                  ORDER BY trips.orderdate DESC";

                    $result = mysqli_query($connection, $query);

                    function distance($lat1, $lon1, $lat2, $lon2, $unit)
                    {

                        $theta = $lon1 - $lon2;
                        $dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) +  cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
                        $dist = acos($dist);
                        $dist = rad2deg($dist);
                        $miles = $dist * 60 * 1.1515;
                        $unit = strtoupper($unit);

                        if ($unit == "K") {
                            return ($miles * 1.609344);
                        } else if ($unit == "N") {
                            return ($miles * 0.8684);
                        } else {
                            return $miles;
                        }
                    }

                    if ($result->num_rows > 0) {
                        // output data of each row
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr><td>" . $row["fromStat"] . "</td>
                                      <td>" . $row["destStat"] . "</td>
                                      <td>" . $row["date"] . "</td>
                                      <td>" . number_format((float) distance($row["x1"], $row["y1"], $row["x2"], $row["y2"], "K"), 2, '.', '') . " km" . "</td>
                                      <td>" . $row["firstname"] . "</td><td>" . $row["lastname"]  . "</td>
                                      <td><a href='#' class='accept_trip' value='" . $row["tripid"] . "'>Accept</a></td>
                                  </tr>";
                        }
                    }
                    $connection->close();


                    ?>
                </tbody>
            </table>
        </form>
    </main>

    <footer></footer>

    <!-- accept order modal -->
    <div class="modal fade" id="acceptOrder" tabindex="-1" role="dialog" aria-labelledby="acceptOrder" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <form id="finish_order">
                    <div class="modal-header">
                        <h5 class="modal-title">Are you finished the ride?</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body" id="response">
                        <div class="form-group mx-sm-3 mb-2">
                            <input type="text" class="form-control" id="price" name="price" placeholder="Final Price">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" id="passId" name="passID" value='<?php echo $_SESSION["userid"]; ?>'>
                        <input type="hidden" id="tripID" name="tridID" value="0">
                        <button type="button" class="btn btn-primary" data-dismiss="modal">No, thanks</button>
                        <input type="submit" value="Finish Ride" class="btn btn-danger">
                    </div>
                </form>
            </div>
        </div>
    </div>

    <?php include 'modal.php'; ?>
    <script src="./includes/scripts.js"></script>
</body>

</html>