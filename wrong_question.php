<!DOCTYPE html>
<html class="test">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WrongQuestion</title>
    <link rel = 'stylesheet' href = 'style.css'>
</head>
<body>
    <h1>Întrebări greșite</h1>
    <?php
    session_start();
    include('connection.php');
    include('php.php');
    echo return_wrong_question(get_wrong_question($_SESSION['user_id']));
    ?>
    <br><br><br>
    <div class="legend">
        <h5>Legenda</h5>
        <ul type='none'>
            <li class="Cluj">Cluj</li>
            <li class="B">București</li>
        </ul>
    </div>
</body>
</html>