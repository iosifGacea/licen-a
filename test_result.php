<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>TestBResult</title>
</head>
<body class="test">
    <?php
    session_start();
    include('php.php');

    $solution1 = get_solution($_SESSION['ids1'], 'simple_question_biology');
    $solution2 = get_solution($_SESSION['ids2'], 'compound_question_biology');
    $solution3 = get_solution($_SESSION['ids3'], 'simple_question_chemistry');
    $solution4 = get_solution($_SESSION['ids4'], 'compound_question_chemistry');

    $answers1 = get_simple_answers($_SESSION['ids1'], 1);
    $answers2 = get_compound_answers($_SESSION['ids2'], 2);
    $answers3 = get_simple_answers($_SESSION['ids3'], 3);
    $answers4 = get_compound_answers($_SESSION['ids4'], 4);

    $grade = 0;

    foreach (array_keys($solution1) as $i){

        if($answers1["$i"] == $solution1["$i"]){
            $grade = $grade + 1;
        }
        else{
            echo show_wrong_simple_answer($i, 'simple_question_biology', $solution1).'<br><br>';
        }
    }

    foreach (array_keys($solution2) as $i){

        if($answers2["$i"] == $solution2["$i"]){
            $grade = $grade + 1;
        }
        else{
            echo show_wrong_compound_answer($i, 'compound_question_biology', $solution2).'<br><br>';
        }
    }

    foreach (array_keys($solution3) as $i){

        if($answers3["$i"] == $solution3["$i"]){
            $grade = $grade + 1;
        }
        else{
            echo show_wrong_simple_answer($i, 'simple_question_biology', $solution3).'<br><br>';
        }
    }

    foreach (array_keys($solution4) as $i){

        if($answers4["$i"] == $solution4["$i"]){
            $grade = $grade + 1;
        }
        else{
            echo show_wrong_compound_answer($i, 'compound_question_biology', $solution4).'<br><br>';
        }
    }

    $grade = $grade / (count($solution1) + count($solution2) + count($solution3) + count($solution4)) * 10;
    echo "<br><br><h3>Nota obținută: $grade </h3>";

    echo insert_into_history('UNITBV', 9.99);
    ?>
</body>
</html>