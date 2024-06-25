<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel='stylesheet' href="style.css">
    <title>TestCj</title>
</head>
<body class="test">
    <?php
    session_start();
    include('php.php');
    $_SESSION['where'] = 'cluj';

    $o = '<form name = "my_form" method = "POST" action = "test_cluj_result.php">';
    $o .= create_compound_quizz_Cj($_SESSION['ids5'], 'question_biology_cluj', 1, 1);
    $o .= create_compound_quizz_Cj($_SESSION['ids6'], 'question_chemistry_cluj', 26, 2);
    $o .= '<input type="submit" class="form-submit-button" value="SUBMIT"/></form>';

    echo $o;

    echo $container;
    ?>
    <script src="java_script.js"></script>
</body>
</html>