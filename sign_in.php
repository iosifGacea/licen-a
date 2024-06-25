<?php
session_start();
include('connection.php');
include('php.php');

$username = $_POST['email'];
$password = $_POST['pass'];

$query = "select * from `users` where `email` = '$username' and `password` = '$password'";  
$result = mysqli_query($conn, $query);  
$row = mysqli_fetch_array($result);  
$count = mysqli_num_rows($result); 


if($count == 1){  
    $_SESSION['user_id'] = $row['id'];
    $_SESSION['email'] = $row['email'];

    $_SESSION["ids1"] = UniqueRandomNumbers(1, 50, 18);
    $_SESSION['ids2'] = UniqueRandomNumbers(1, 100, 42);
    $_SESSION['ids3'] = UniqueRandomNumbers(1, 27, 12);
    $_SESSION['ids4'] = UniqueRandomNumbers(1, 42, 28);

    $_SESSION['ids5'] = UniqueRandomNumbers(1, 40, 25);
    $_SESSION['ids6'] = UniqueRandomNumbers(1, 40, 25);
    header("Location: home.php");
 }
 else{
    echo  '<script>
                window.location.href = "index.php";
                alert("Login failed. Invalid account!!!")
            </script>';
 }
?>