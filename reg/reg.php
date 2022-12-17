<?php
session_start();
include "db/conn.php";
include "reg.html";

if (isset($_REQUEST['regSubmit'])) {
    $fname = mysqli_real_escape_string($con, $_POST['fname']);
    $lname = mysqli_real_escape_string($con, $_POST['lname']);
    $email = mysqli_real_escape_string($con, $_POST['regEmail']);
    $password = mysqli_real_escape_string($con, $_POST['regPassword']);
    $password2 = mysqli_real_escape_string($con, $_POST['regPassword2']);

    $checkAcc = "select * from users where email = '$email' and password = '$password' limit 1";
    $checkAccRes = mysqli_query($con, $checkAcc);

    if (mysqli_num_rows($checkAccRes) > 0) {
        echo "<script>alert('Data already exists. You will be headed to log in form.')</script>";
        echo "<script>window.location = 'login/login.html';</script>";
    } else {
        if (strlen($password) >= 6) {
            if ($password == $password2) {
                $insert = "insert into users (fname, lname, email, password) values ('$fname', '$lname', '$email', '$password')";
                if (mysqli_query($con, $insert)) {
                    echo "<script>alert('Success registration! You will be headed to log in form.')</script>";
                    echo "<script>window.location = 'login/login.html';</script>";
                } else {
                    echo "<script>alert('Registration error. Please, try again.')</script>";
                    echo "<script>window.location = 'reg.html';</script>";
                }
            } else {
                echo "<script>alert('Passwords do not match! Please, try again.')</script>";
                echo "<script>window.location = 'reg.html';</script>";
            }
        } else {
            echo "<script>alert('Password must contain 6 or more than 6 characters! Please, try again.')</script>";
            echo "<script>window.location = 'reg.html';</script>";
        }
    }
}
