<?php

$servername = "localhost";
$user = "root";
$database = "basic";
$password = "password";

$connect = mysqli_connect($servername, $user, $password, $database);
if ($connect == false) {
    die("Connection error: " . mysqli_connect_error());
}

?>