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
            <span class="navbar-toggler navbar-text-current">Add New Station</span>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <ul class="nav collapse navbar-collapse nav-justified" id="navbarNav">
                <li class="nav-item nav-link">
                    <a class="nav-link font-weight-bold" href="#">My Dashboard</a>
                </li>
                <li class="nav-item nav-link selected current font-weight-bold">
                    <a class="nav-link active" href="admin_stations.php">Station<span class="sr-only">(current)</span></a>
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

        <nav class="navbar navbar-expand-lg navbar-light py-0 navbar-third">
            <ul class="nav collapse navbar-collapse nav-justified d-none d-sm-block d-sm-none" id="navbarNav2">
                <li class="nav-item nav-link disabled">
                    <a class="nav-link" href="#"></a>
                </li>
                <li class="nav-item nav-link crumb disabled">
                    <a class="nav-link active font-weight-bold text-secondary" href="admin_stations.php">Add Station<span class="sr-only">(current)</span></a>
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
        <form id="insert_station">
            <div class="form-row pt-5">
                <div class="col mr-5">
                    <div class="form-group">
                        <input type="text" class="form-control form-control-lg y-3" placeholder="Station ID" name="StationId" value="" autofocus pattern="[0-9]+">
                    </div>
                    <div class="form-group pt-3">
                        <input type="text" class="form-control form-control-lg" placeholder="Station Name" name="StationName" value="">
                    </div>
                    <div class="form-group pt-3">
                        <select class="form-control form-control-lg" name="District" id="District">
                            <option disabled selected value="all">All Districts</option>
                        </select>
                    </div>
                    <div class="form-group pt-3">
                        <select class="form-control form-control-lg" name="City" id="City">
                            <option disabled selected value="all">All Cities</option>
                        </select>
                    </div>
                    <div class="form-group pt-3">
                        <input type="text" class="form-control form-control-lg" placeholder="Street" name="Street" value="">
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <input type="text" class="form-control form-control-lg" placeholder="Latitude" name="Latitude" value="" pattern="-?\d{1,3}\.\d+">
                    </div>
                    <div class="form-group pt-3">
                        <input type="text" class="form-control form-control-lg" placeholder="Longtitude" name="Longitude" value="" pattern="-?\d{1,3}\.\d+">
                    </div>
                    <div class="form-group pt-3">
                        <input type="text" class="form-control form-control-lg" placeholder="Comment" name="Comment" value="">
                    </div>
                    <div class="form-group">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title text-muted">Smart Features</h5>
                                <div class="form-row">
                                    <div class="col">
                                        <div class="custom-control custom-checkbox">
                                            <input class="custom-control-input" name="Screen" type="checkbox" id="customCheck1">
                                            <label class="custom-control-label" for="customCheck1">
                                                Interative map
                                            </label>
                                        </div>
                                        <div class="custom-control custom-checkbox">
                                            <input class="custom-control-input" name="Conditioner" type="checkbox" id="customCheck2">
                                            <label class="custom-control-label" for="customCheck2">
                                                Conditioner
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="custom-control custom-checkbox">
                                            <input class="custom-control-input" name="Light" type="checkbox" id="customCheck3">
                                            <label class="custom-control-label" for="customCheck3">
                                                Light </label>
                                        </div>
                                        <div class="custom-control custom-checkbox">
                                            <input class="custom-control-input" name="Wifi" type="checkbox" id="customCheck4">
                                            <label class="custom-control-label" for="customCheck4">
                                                Wi-fi
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="form-row pt-3">
                <div class="col mr-5">
                    <a class="btn btn-warning btn-lg btn-block" href="admin_stations.php" role="button">Cancel</a>
                </div>
                <div class="col">
                    <button type="submit" class="btn btn-primary btn-block btn-lg">Save Station</button>
                </div>
            </div>
        </form>
    </main>

    <footer></footer>
    <?php include 'modal.php'; ?>
</body>