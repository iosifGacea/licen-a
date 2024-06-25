<!DOCTYPE html>
<html class="test">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel = 'stylesheet' href = 'style.css'>
    <title>SavedQuestion</title>
</head>
<body>
    <h1>Întrebări salvate</h1>
    <?php
    session_start();
    include('php.php');
    $ids = get_ids_saved_question($_SESSION['user_id']);

    echo get_saved_question($ids);
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