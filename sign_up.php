<?php include('connection.php');?>
<!DOCTYPE HTML>  
<html>
<head>
  <meta name = "viewport", content = "width=device-width, initial-scale=1.0">
  <link rel='stylesheet' href='style.css'>
  <title>SignUp</title>
</head>
<body>  

<?php
$emailErr = "";
?>

<h2>Sign Up Form</h2>
<form method="post" action="_sign_up.php">  
  First Name: <input type="text" name="fname">
    <br><br>
  Second Name: <input type="text" name="sname">
    <br><br>
  E-mail: <input type="email" name="email">
    <br><br>
  Password: <input type="password" name="pass">
    <br><br>
  <input class="form-submit-button" type="submit" value="Submit">  
</form>
</body>
</html>