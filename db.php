<?php
        $dbhost = "routly.chepa.net";
        $dbuser = "routly";
        $dbpass = "12211221";
        $dbname = "routly";

        // Create connection
        $connection = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

        // Check connection
        if (mysqli_connect_errno()) {
            die("DB Connection failed: " . mysqli_connect_error() . " (" . mysqli_connect_errno() . ")");
        }
