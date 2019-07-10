<?php
include 'db.php';
?>

<!DOCTYPE html>
<html>

<head>
    <title>Home</title>
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
</head>

<body>
    <header>
        <nav class="navbar navbar-light navbar-top d-flex justify-content-end">
            <a class="navbar-brand mr-auto p-2" href="index.html">
                <img src="images/logo.png" width="160" alt="">
            </a>
            <a class="material-icons navbar-brand p-2" href="#">notifications</a>
            <a class="material-icons navbar-brand p-2" href="#">settings</a>
            <img src="images/PAmit.png" width="60" alt="">
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
                    <a class="nav-link active font-weight-bold" href="index.html">Station<span class="sr-only">(current)</span></a>
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

        <nav class="navbar navbar-expand-lg navbar-light py-0 d-none d-sm-block d-sm-none">
            <ul class="nav collapse navbar-collapse nav-justified" id="navbarNav2">
                <li class="nav-item nav-link disabled">
                    <a class="nav-link" href="#"></a>
                </li>
                <li class="nav-item nav-link crumb disabled">
                    <a class="nav-link active font-weight-bold text-secondary" href="index.html">List<span class="sr-only">(current)</span></a>
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
            <div class="col-4">
                <input type="text" id="table-search" class="form-control form-control-lg d-none d-sm-block d-sm-none" placeholder="Search">
            </div>
            <div class="col-2">
                <select class="form-control form-control-lg" name="District" id="District">
                    <option value="all">All Districts</option>
                </select>
            </div>
            <div class="col-2">
                <select class="form-control form-control-lg" name="City" id="City">
                    <option value="all">All Cities</option>
                </select>
            </div>
            <div class="col-2">
                <select class="form-control form-control-lg" name="Smart" id="Smart">
                    <option value="all">All Options</option>
                </select>
            </div>
            <div class="col-2">
                <a class="btn btn-success btn-block btn-lg" href="add_station.html" role="button">Add New Station</a>
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
                    $query = "SELECT * FROM stations";
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
                                      <td><a href='/station_info.php?stationID=" . $row["id"] . "'>ChangeThis</a></td>

                                  </tr>";
                        }
                        echo "</table>";
                    } else {
                        echo "0 results";
                    }
                    $connection->close();
                    ?>
                </tbody>
            </table>
        </form>
    </main>

    <footer></footer>
    <script src="./includes/scripts.js"></script>
</body>