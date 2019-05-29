<!DOCTYPE html>

<head>
    <title>Station info</title>
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
</head>

<body>

    <header>
        <nav class="navbar navbar-light navbar-top d-flex justify-content-end">
            <a class="navbar-brand mr-auto p-2" href="index.html">
                <img src="images/logo.png" width="160" alt="">
            </a>
            <a class="material-icons navbar-brand p-2 icon" href="#">notifications</a>
            <a class="material-icons navbar-brand p-2 icon" href="#">settings</a>
            <img class="d-flex" src="images/PAmit.png" width="60" alt="">
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
                    <a class="nav-link active" href="index.html">Station<span class="sr-only">(current)</span></a>
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

        <nav class="navbar navbar-expand-lg navbar-light py-0">
            <ul class="nav collapse navbar-collapse nav-justified d-none d-sm-block d-sm-none" id="navbarNav2">
                <li class="nav-item nav-link disabled">
                    <a class="nav-link" href="#"></a>
                </li>
                <li class="nav-item nav-link crumb disabled">
                    <a class="nav-link active font-weight-bold text-secondary" href="index.html">Info<span class="sr-only">(current)</span></a>
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

        <div class="form-row">
            <div class="col mr-5">
                <div class="form-group">
                    <label for="StationID">Station ID</label>
                    <input type="text" id="StationID" class="form-control form-control-lg" placeholder="Station ID" disabled>
                </div>

                <div class="form-group">
                    <label for="StationName">Station Name</label>
                    <input type="text" id="StationName" class="form-control form-control-lg" placeholder="Station Name" disabled>
                </div>

                <div class="form-group">
                    <label for="District">District</label>
                    <input type="text" id="District" class="form-control form-control-lg" placeholder="District" disabled>
                </div>

                <div class="form-group">
                    <label for="City">City</label>
                    <input type="text" id="City" class="form-control form-control-lg" placeholder="City" disabled>
                </div>

                <div class="form-group">
                    <label for="Street">Street</label>
                    <input type="text" id="Street" class="form-control form-control-lg" placeholder="Street" disabled>
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label for="Latitude">Latitude</label>
                    <input type="text" id="Latitude" class="form-control form-control-lg" placeholder="Latitude" disabled>
                </div>
                <div class="form-group">
                    <label for="Longitude">Longitude</label>
                    <input type="text" id="Longitude" class="form-control form-control-lg" placeholder="Longitude" disabled>
                </div>
                <div class="form-group">
                    <label for="Comment">Comment</label>
                    <input type="text" id="Comment" class="form-control form-control-lg" placeholder="Comment" disabled>
                </div>
                <div class="form-group">
                    <label for="Longitude">Smart Features</label>
                    <div class="card">
                        <div class="card-body">
                            <div class="form-row">
                                <div class="col">
                                    <div class="custom-control custom-checkbox">
                                        <input class="custom-control-input" name="Smart1" type="checkbox" value="SmartScreen" id="customCheck1" disabled>
                                        <label class="custom-control-label" for="customCheck1">Interative map</label>
                                    </div>
                                    <div class="custom-control custom-checkbox">
                                        <input class="custom-control-input" name="Smart2" type="checkbox" value="Conditioner" id="customCheck2" disabled>
                                        <label class="custom-control-label" for="customCheck2">Conditioner</label>
                                    </div>
                                    <div class="custom-control custom-checkbox">
                                        <input class="custom-control-input" name="Smart3" type="checkbox" value="Light" id="customCheck3" disabled>
                                        <label class="custom-control-label" for="customCheck3">Light </label>
                                    </div>
                                    <div class="custom-control custom-checkbox">
                                        <input class="custom-control-input" name="Smart4" type="checkbox" value="Wifi" id="customCheck4" disabled>
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
                <a class="btn btn-danger btn-lg btn-block" href="#" role="button">Delete Station</a>
            </div>
            <div class="col">
                <button type="button" name="stationID" class="btn btn-primary btn-block btn-lg">Edit Station</button>
            </div>
        </div>
    </main>
    <footer></footer>
    <script src="./includes/scripts.js"></script>
</body>