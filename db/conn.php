<?php

const dbServer = 'localhost';
const dbUsername = 'root';
const dbPassword = 'root';
const dbName = 'web';

$con = mysqli_connect(dbServer, dbUsername, dbPassword, dbName);

if ($con === false) {
    die("Error: could not connect" . mysqli_connect_error());
}

