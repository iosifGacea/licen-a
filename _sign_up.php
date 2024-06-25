<?php
include('connection.php');

$mysqli = new mysqli($servername, $username, $password, $db_name);

$fname = $_POST["fname"];
$sname = $_POST["sname"];
$email = $_POST["email"];
$pass = $_POST["pass"];
$insertQuery = "INSERT INTO users(first_name, second_name, email, password) 
VALUES ('$fname', '$sname', '$email', '$pass')";
$stmt = $mysqli->prepare($insertQuery);
$stmt->execute();

header("Location: index.php");