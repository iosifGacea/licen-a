<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel='stylesheet' href='style.css'>
    <title>TestCjResult</title>
</head>
<body class="test">
<?php
    session_start();
    include('php.php');

    $solution1 = get_solution($_SESSION['ids5'], 'question_biology_cluj');
    $solution2 = get_solution($_SESSION['ids6'], 'question_chemistry_cluj');

    $answers1 = get_answers_Cj($_SESSION['ids5'], 1);
    $answers2 = get_answers_Cj($_SESSION['ids6'], 2);

    $grade = 0;

    foreach (array_keys($solution1) as $i){

        if($answers1[$i] == $solution1[$i]){
            $grade = $grade + 1;
        }
        else{
            echo show_wrong_answer_Cj($i, 'question_biology_cluj', $solution1).'<br><br>';
            save_wrong_question($i, 'question_biology_cluj');
        }
    }

    foreach (array_keys($solution2) as $i){

        if($answers2[$i] == $solution2[$i]){
            $grade = $grade + 1;
        }
        else{
            echo show_wrong_answer_Cj($i, 'question_chemistry_cluj', $solution2).'<br><br>';
            save_wrong_question($i, 'question_chemistry_cluj');
        }
    }

    $grade = $grade / (count($solution1) + count($solution2)) * 10;
    echo "<br><br><h3>Nota obținută: $grade </h3>";
    ?>
</body>
</html>