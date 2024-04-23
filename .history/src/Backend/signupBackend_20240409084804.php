<?php

include_once "Connection.php";

$fname = mysqli_real_escape_string($conn, $_POST['fname']);
$lname = mysqli_real_escape_string($conn, $_POST['lname']);
$ContantNum = mysqli_real_escape_string($conn, $_POST['ContantNum']);
$gender = mysqli_real_escape_string($conn, $_POST['gender']);



$email = mysqli_real_escape_string($conn, $_POST['email']);
$password = mysqli_real_escape_string($conn, $_POST['password']);








?>