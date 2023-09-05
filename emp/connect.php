<?php
include_once "class.php";

$hostname = 'localhost';
$username = 'root';
$password = '';
$database = 'employee';

// db connection
$myCon = mysqli_connect($hostname, $username, $password, $database) or die("Error " . mysqli_error($myCon));

if ($myCon) {
    // echo "Success";
}

$emp = new db_class;
