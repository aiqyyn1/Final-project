<?php
session_start();
include "db/conn.php";
include "login/login.html";

if (isset($_POST['submit'])) {
    if (isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'] == true) {
        $name = mysqli_real_escape_string($con, $_POST['name']);
        $email = mysqli_real_escape_string($con, $_POST['email']);
        $phone = mysqli_real_escape_string($con, $_POST['phone']);
        $message = $_POST['message'];

        $insert = "insert into contact (name, email, phone, message) values ('$name', '$email', '$phone', '$message')";

        if (mysqli_query($con, $insert)) {
            echo "<script>alert('Your message is sent successfully!')</script>";
            echo "<script>window.location = '../index.html';</script>";
        } else {
            echo "<script>alert('Error while sending your message. Please, try again.')</script>";
            echo "<script>window.location = 'contact.html';</script>";
        }
    } else {
        echo '<script type="text/javaScript">alert("You must be logged in to contact us!");</script>';
        echo '<script type="text/javaScript">window.location = "login/login.html";</script>';
    }
    mysqli_close($con);
}




