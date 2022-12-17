<?php
session_start();
include "db/conn.php";
include "login/login.html";

if (isset($_REQUEST['logSubmit'])) {
    $email = mysqli_real_escape_string($con, $_POST['logEmail']);
    $password = mysqli_real_escape_string($con, $_POST['logPassword']);

    if ($con->connect_error) {
        die("Error while connecting to database: " . $con->connect_error);
    }

    $checkAcc = "select * from users where email = '$email' and password = '$password' limit 1";
    $checkAccRes = mysqli_query($con, $checkAcc);
    if (mysqli_num_rows($checkAccRes) > 0) {
        $_SESSION['email'] = $_POST['email'];
        $_SESSION['password'] = $_POST['password'];
        $_SESSION['loggedIn'] = true;
        header('location: profile.php');
    } else {
        echo '<script type="text/javaScript">alert("No such data! You will be headed to registration form.");</script>';
        echo '<script type="text/javaScript">window.location = "reg/reg.html";</script>';
    }

    mysqli_close($con);
}

