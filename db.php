<?php
        $dbhost = "182.50.133.168";
        $dbuser = "studDB19a";
        $dbpass = "stud19DB1!";
        $dbname = "studDB19a";

        // Create connection
        $connection = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

        // Check connection
        if (mysqli_connect_errno()) {
            die("DB Connection failed: " . mysqli_connect_error() . " (" . mysqli_connect_errno() . ")");
        }
