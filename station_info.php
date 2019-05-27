<!DOCTYPE html>

<head>
    <title>json</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
    <link rel="stylesheet" href="./includes/style.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link href="https://fonts.googleapis.com/css?family=ABeeZee&display=swap" rel="stylesheet">
</head>
<?php $StationId  =$_GET{"stationID"};?> 
<body>
    <header>
        <nav class="navbar navbar-light navbar-top d-flex justify-content-end">
            <a class="navbar-brand mr-auto p-2" href="index.html">
                <img src="/images/logo.png" width="160" alt="">
            </a>
            <a class="material-icons navbar-brand p-2 icon" href="#">notifications</a>
            <a class="material-icons navbar-brand p-2 icon" href="#">settings</a>
            <img class="d-flex p-2" src="/images/PAmit.png" width="60" alt="">
        </nav>

        <nav class="navbar navbar-expand-lg navbar-light navbar-second">
            <span class="navbar-toggler navbar-text-current">Station Info</span>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <ul class="nav collapse navbar-collapse nav-justified" id="navbarNav">
                <li class="nav-item nav-link">
                    <a class="nav-link" href="#">My Dashboard</a>
                </li>
                <li class="nav-item nav-link selected current">
                    <a class="nav-link active" href="index.html">Station<span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item nav-link">
                    <a class="nav-link" href="#">Drivers</a>
                </li>
                <li class="nav-item nav-link">
                    <a class="nav-link" href="#">Schedule</a>
                </li>
                <li class="nav-item nav-link">
                    <a class="nav-link" href="#">Billing</a>
                </li>
            </ul>
        </nav>

        <nav class="navbar navbar-expand-lg navbar-light navbar-therd">
            <ul class="nav collapse navbar-collapse nav-justified" id="navbarNav">
                <li class="nav-item nav-link disabled">
                    <a class="nav-link" href="#"></a>
                </li>
                <li class="nav-item nav-link crumb disabled">
                    <a class="nav-link active" href="index.html">Add Station<span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item nav-link disabled">
                    <a class="nav-link" href="#">Info</a>
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
            <div class="col">
                    <form action="add_station.php" method="GET">
                    <label class="col-form-label  form_label firstlabel">Station ID
                <input type="text" id="table-search" class="form-control form-control-lg" placeholder="Station ID"  name="StationId" value="<?php echo $StationId; ?>" disabled autofocus>
            </label>
            <label class="form_label">Station Name
                <input type="text" id="table-search" class="form-control form-control-lg" placeholder="Station Name" name="StationName" value="Dizengoff 16" disabled>  
            </label>
                <label class="form_label">District
                <select class="form-control form-control-lg" name="District" id="District" value="Tel Aviv" disabled>
                    <option value="all">All Districts</option>
                </select>
            </label>
            <label class="form_label">City
                <select class="form-control form-control-lg" name="City" id="City" value="Tel Aviv" disabled>
                    <option value="all">All Cities</option>
                </select>
            </label>
            <label class="form_label">Street
                <input type="text" id="table-search" class="form-control form-control-lg" placeholder="Street" name="Street" value="Dizengoff" disabled>
            </label>
            </div>
            <div class="col">
                    <label class="col-form-label form_label firstlabel">Latitude
                <input type="text" id="table-search" class="form-control form-control-lg" placeholder="Latitude" name="Latitude" value="32.2865132" disabled>
            </label>
                <label class="col-form-label  form_label">Longtitude
                <input type="text" id="table-search" class="form-control form-control-lg" placeholder="Longtitude" name="Longtitude" value="34.8549239" disabled>
            </label>

                <div class="form-row">
                    <div class="col">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="defaultCheck1" disabled checked>
                            <label class="form-check-label" for="defaultCheck1">
                                Interative map
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="defaultCheck2" disabled>
                            <label class="form-check-label" for="defaultCheck2">
                                Conditioner
                            </label>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="defaultCheck3" disabled checked>
                            <label class="form-check-label" for="defaultCheck3">
                                Light
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="defaultCheck4" disabled>
                            <label class="form-check-label" for="defaultCheck4">
                                Wi-fi
                            </label>
                        </div>
                    </div>
                </div>
                <label class="col-form-label  form_label input_row_after_checkbox">Comment
                <input type="text" id="table-search" class="form-control form-control-lg" placeholder="Comment" name="Comment" value="Hello World Station" disabled>
            </label>
            </div>
        </div>
        <div class="form-row">
            <div class="col">
            <button type="submmit" class="btn btn-primary btn-block btn-lg button_row">Add Station</button>
            </div>
            <div class="col">
            <button type="button" class="btn btn-danger btn-primary btn-lg btn-block button_row">Delete</button>
            </div>

        </div>

    </main>
    
    <footer></footer>
    <script src="./includes/scripts.js"></script>
</body>