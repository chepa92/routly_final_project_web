<?php
include 'db.php';

session_start();
if (!empty($_POST["loginMail"])) {
    $query = "SELECT * FROM tb_users_201 WHERE email='" . $_POST["loginMail"]
        . "' and password = '"
        . $_POST["loginPass"]
        . "'";
    $result = mysqli_query($connection, $query);
    $row = mysqli_fetch_array($result);

    if (is_array($row)) {
        $_SESSION["userid"] = $row['userid'];
        $_SESSION["role"] = $row['role'];

        switch ($_SESSION["role"]) {
            case 'Admin':
                header("location: admin_stations.php");
                break;
            case 'Driver':
                header("location: driver_orders.php");
                break;
            case 'Passenger':
                header("location: passenger_trips.php");
                break;
            default:
                $message = 'Who the fuck are you?';
        }
    } else {
        $message = "Invalid Username or Password";
    }
}
?>

<!DOCTYPE html>

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
    <link href="https://fonts.googleapis.com/css?family=ABeeZee&display=swap" rel="stylesheet">
    <script src="./includes/scripts.js"></script>
</head>

<body id="log_body">

    <main>
        <div class="login-page">
            <div class="log-form">
                <img src="images/logo.png" class="login_logo" width="200" alt="logo">
                <form class="register-form" method="post" id="frm1">
                    <span>admin@admin.com;admin</span>
                    <span>driver1@driver.com;driver1</span>
                    <span>pass1@pass.com;pass1</span>
                    <p class="message">Already know password? <a href="#">Sign In</a></p>
                </form>
                <form class="login-form" action="#" method="post" id="frm">
                    <input type="email" name="loginMail" id="loginMail" placeholder="email">
                    <input type="password" name="loginPass" id="loginPass" placeholder="password">
                    <button type="submit" class="btn btn-primary logmein">Log Me In</button>
                    <div class="error-message">
                        <?php if (isset($message)) {
                            echo $message;
                        } ?>
                    </div>
                    <p class="message">Dont know password? <a href="#">Press Here</a></p>
                </form>
            </div>
        </div>
    </main>

</body>