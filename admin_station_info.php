<?php
include 'db.php';

session_start();

if (!isset($_SESSION["userid"]) || $_SESSION["role"] != 'Admin') {
    header("location: index.php");
}

$query = "SELECT * FROM tb_stations_201 WHERE id=" . $_GET["stationID"];
$result = mysqli_query($connection, $query);
$row = $result->fetch_assoc();
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
    <link rel="stylesheet" href="./includes/style.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link href="https://fonts.googleapis.com/css?family=ABeeZee&display=swap" rel="stylesheet">
    <script src="./includes/scripts.js"></script>
    <script src="./includes/logo.js"></script>
</head>

<body>

    <header>
        <nav class="navbar navbar-light navbar-top d-flex justify-content-end">
            <a class="navbar-brand mr-auto p-2 hide-and-seek-animals" id="top-logo" data-image="./images/doge<?php echo mt_rand(1, 2) ?>.png" href="admin_stations.php">
                <div style="float: left;" class="logo">
                    <img src="./images/logo.png" alt="logo" class="logo__img hide-and-seek-animals__logo">
                </div>
            </a>
            <a class="material-icons navbar-brand p-2 icon" href="#">settings</a>
            <img id="user-logo" class="d-flex" src="images/PAmit.png" width="60" alt="">
        </nav>

        <nav class="navbar navbar-expand-lg navbar-light navbar-second navhover">
            <span class="navbar-toggler navbar-text-current">Station Info</span>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <ul class="nav collapse navbar-collapse nav-justified" id="navbarNav">
                <li class="nav-item nav-link">
                    <a class="nav-link  font-weight-bold" href="#">My Dashboard</a>
                </li>
                <li class="nav-item nav-link selected current font-weight-bold">
                    <a class="nav-link active" href="admin_stations.php">Station<span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item nav-link">
                    <a class="nav-link  font-weight-bold" href="#">Drivers</a>
                </li>
                <li class="nav-item nav-link">
                    <a class="nav-link  font-weight-bold" href="#">Schedule</a>
                </li>
                <li class="nav-item nav-link">
                    <a class="nav-link font-weight-bold" href="#">Billing</a>
                </li>
            </ul>
        </nav>

        <nav class="navbar navbar-expand-lg navbar-light py-0 navbar-third">
            <ul class="nav collapse navbar-collapse nav-justified d-none d-sm-block d-sm-none" id="navbarNav2">
                <li class="nav-item nav-link disabled">
                    <a class="nav-link" href="#"></a>
                </li>
                <li class="nav-item nav-link crumb disabled">
                    <a class="nav-link active font-weight-bold text-secondary" href="admin_stations.php">Info<span class="sr-only">(current)</span></a>
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

    <main id="main_station_info">
        <form id="edit_station">
            <div class="form-row">
                <div class="col mr-5">
                    <div class="form-group">
                        <label for="StationID">Station ID</label>
                        <input type="text" id="StationID" class="form-control form-control-lg" name="StationId" value='<?php echo $row["id"]; ?>' autofocus pattern="[0-9]+" disabled>
                    </div>

                    <div class="form-group">
                        <label for="StationName">Station Name</label>
                        <input type="text" id="StationName" class="form-control form-control-lg" name="StationName" value='<?php echo $row["name"]; ?>' disabled>
                    </div>

                    <div class="form-group">
                        <label for="District">District</label>
                        <input type="text" id="District" class="form-control form-control-lg" name="District" value='<?php echo $row["district"]; ?>' disabled>
                    </div>

                    <div class="form-group">
                        <label for="City">City</label>
                        <input type="text" id="City" class="form-control form-control-lg" name="City" value='<?php echo $row["city"]; ?>' disabled>
                    </div>

                    <div class="form-group">
                        <label for="Street">Street</label>
                        <input type="text" id="Street" class="form-control form-control-lg" name="Street" value='<?php echo $row["street"]; ?>' disabled>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="Latitude">Latitude</label>
                        <input type="text" id="Latitude" class="form-control form-control-lg" name="Latitude" value='<?php echo $row["latitude"]; ?>' disabled>
                    </div>
                    <div class="form-group">
                        <label for="Longitude">Longitude</label>
                        <input type="text" id="Longitude" class="form-control form-control-lg" name="Longitude" value='<?php echo $row["longtitude"]; ?>' disabled>
                    </div>
                    <div class="form-group">
                        <label for="Comment">Comment</label>
                        <input type="text" id="Comment" class="form-control form-control-lg" name="Comment" value='<?php echo $row["comment"]; ?>' disabled>
                    </div>
                    <div class="form-group">
                        <label for="Longitude">Smart Features</label>
                        <div class="card">
                            <div class="card-body locked-card">
                                <div class="form-row">
                                    <div class="col">
                                        <div class="custom-control custom-checkbox">
                                            <input class="custom-control-input" name="Screen" type="checkbox" id="customCheck1" disabled <?php echo $row["map"] ? "checked" : "" ?>>
                                            <label class="custom-control-label" for="customCheck1">Interative map</label>
                                        </div>
                                        <div class="custom-control custom-checkbox">
                                            <input class="custom-control-input" name="Conditioner" type="checkbox" id="customCheck2" disabled <?php echo $row["conditioner"] ? "checked" : "" ?>>
                                            <label class="custom-control-label" for="customCheck2">Conditioner</label>
                                        </div>
                                        <div class="custom-control custom-checkbox">
                                            <input class="custom-control-input" name="Light" type="checkbox" id="customCheck3" disabled <?php echo $row["light"] ? "checked" : "" ?>>
                                            <label class="custom-control-label" for="customCheck3">Light </label>
                                        </div>
                                        <div class="custom-control custom-checkbox">
                                            <input class="custom-control-input" name="Wifi" type="checkbox" id="customCheck4" disabled <?php echo $row["wifi"] ? "checked" : "" ?>>
                                            <label class="custom-control-label" for="customCheck4">Wi-fi</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-row mt-3">
                <div class="col mr-5 mb-4">
                    <button type="button" class="btn btn-danger btn-lg btn-block" data-toggle="modal" data-target="#deleteModal">Delete Station</button>
                </div>
                <div class="col col_of_button">
                    <input type="hidden" id="oldID" name="oldID" value=<?php echo $_GET["stationID"] ?>>
                    <button type="button" name="stationID" class="btn btn-warning btn-block btn-lg editStation">Edit Station</button>
                </div>
            </div>
        </form>
    </main>
    <footer></footer>

    <!--delete station modal -->
    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModal" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Warning!</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="response">
                    <h6>Are you sure you want to delete this station?</h6>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">No, thanks</button>
                    <button type="button" class="btn btn-danger" onclick="deleteStation('<?php echo $_GET["stationID"] ?>')">Yes, Delete Station</button>
                </div>
            </div>
        </div>
    </div>
    <!-- delete station modal -->
    <?php include 'modal.php'; ?>

    <?php $connection->close(); ?>
</body>

</html>