<?php
include 'db.php';

session_start();

if (!isset($_SESSION["userid"]) || $_SESSION["role"] != 'Admin')
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
            <a class="navbar-brand mr-auto p-2 hide-and-seek-animals" id="top-logo" data-image="./images/doge<?php echo mt_rand(1, 2) ?>.png" href="admin_stations.php">
                <div style="float: left;" class="logo">
                    <img src="images/logo.png" alt="logo" class="logo__img hide-and-seek-animals__logo">
                </div>
            </a>
            <a class="material-icons navbar-brand p-2" href="#">settings</a>
            <img id="user-logo" src="images/PAmit.png" width="60" alt="">
        </nav>
        <nav class="navbar navbar-expand-lg navbar-light navbar-second navhover">
            <span class="navbar-toggler navbar-text-current">Station List</span>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <ul class="nav collapse navbar-collapse nav-justified" id="navbarNav">
                <li class="nav-item nav-link">
                    <a class="nav-link font-weight-bold" href="#">My Dashboard</a>
                </li>
                <li class="nav-item nav-link selected current">
                    <a class="nav-link active font-weight-bold" href="admin_stations.php">Station<span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item nav-link">
                    <a class="nav-link font-weight-bold" href="#">Drivers</a>
                </li>
                <li class="nav-item nav-link">
                    <a class="nav-link font-weight-bold" href="#">Schedule</a>
                </li>
                <li class="nav-item nav-link">
                    <a class="nav-link font-weight-bold" href="#">Billing</a>
                </li>
            </ul>
        </nav>

        <nav class="navbar navbar-expand-lg navbar-light py-0 d-none d-sm-block d-sm-none navbar-third">
            <ul class="nav collapse navbar-collapse nav-justified" id="navbarNav2">
                <li class="nav-item nav-link disabled">
                    <a class="nav-link" href="#"></a>
                </li>
                <li class="nav-item nav-link crumb disabled">
                    <a class="nav-link active font-weight-bold text-secondary" href="admin_stations.php">List<span class="sr-only">(current)</span></a>
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
        <div class="form-row">
            <div class="col-6">
                <input type="text" id="table-search" class="form-control form-control-lg d-none d-sm-block d-sm-none" placeholder="Search">
            </div>
            <div class="col-2">
                <select class="form-control form-control-lg" name="District" id="District">
                    <option value="">All Districts</option>
                </select>
            </div>
            <div class="col-2">
                <select class="form-control form-control-lg" name="City" id="City">
                    <option value="">All Cities</option>
                </select>
            </div>
            <div class="col-2">
                <a class="btn btn-success btn-block btn-lg" href="admin_add_station.php" role="button">New Station</a>
            </div>
        </div>

        <form action="station_info.php" method="get">
            <table id="table" class="table table-striped table-bordered mt-4 table-hover">
                <thead class="table-success">
                    <tr>
                        <th scope="col">ID</th>
                        <th id="stationName" scope="col">Station Name</th>
                        <th scope="col">District</th>
                        <th id="cityName" scope="col">City</th>
                        <th scope="col">Street</th>
                        <th scope="col">Comment</th>
                        <th scope="col">Info</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $query = "SELECT * FROM tb_stations_201";
                    $result = mysqli_query($connection, $query);

                    if ($result->num_rows > 0) {
                        // output data of each row
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr><td>" . $row["id"] . "</td>
                                      <td>" . $row["name"] . "</td>
                                      <td>" . $row["district"] . "</td>
                                      <td>" . $row["city"] . "</td>
                                      <td>" . $row["street"] . "</td>
                                      <td>" . $row["comment"] . "</td>
                                      <td><a href='./admin_station_info.php?stationID=" . $row["id"] . "'>Info</a></td>
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
    <?php include 'modal.php'; ?>
    <script src="./includes/scripts.js"></script>
</body>

</html>