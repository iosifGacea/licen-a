<!DOCTYPE HTML>
<html>
    <head>
        <meta name = "viewport", content = "width=device-width, initial-scale=1.0">
        <link rel = "stylesheet", href = "style.css">
        <title>TestB</title>
    </head>
    <body class="test" id="test">
        <?php
        session_start();
        include("php.php");
        $_SESSION['where'] = 'bucuresti';

        $o = '<form method ="POST" action ="test_result.php">';
        $o .= create_quizz($_SESSION['ids1'], 'simple_question_biology', $_SESSION['ids2'], 'compound_question_biology', 1, 1);
        $o .= create_quizz($_SESSION['ids3'], 'simple_question_chemistry', $_SESSION['ids4'], 'compound_question_chemistry', 61, 3);
        $o .= '<input class="form-submit-button" type="submit" value="SUBMIT"/></form>';

        echo $o;
        echo $container;
        ?>
    <script src="java_script.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.js"></script>
    </body>
</html>