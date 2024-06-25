<?php
session_start();
include('connection.php');
include('php.php');

$querry = "SELECT COUNT(id_question) FROM saved_question";  
$result = mysqli_query($conn, $querry);  
$row = mysqli_fetch_array($result);  
$new_id = $row['COUNT(id_question)'] + 1;

$id = $_POST['id'];
$real_id = 0;
$question = array();

if ($_SESSION['where'] == 'cluj'){

    if ($id <= 25){

        $real_id = $_SESSION['ids5'][$id - 1];
        $question = get_question('question_biology_cluj', $real_id);

    }else{

        $real_id = $_SESSION['ids6'][$id - 26];
        $question = get_question('question_chemistry_cluj', $real_id);
    }
    insert_into_saved_question($question, 'Cluj', $new_id);
    insert_into_user_save_question($_SESSION['user_id'], $new_id);
}
else{

    if ($id <= 18){

        $real_id = $_SESSION['ids1'][$id - 1];
        $question = get_question('simple_question_biology', $real_id);

    }elseif ($id <= 60){

        $real_id = $_SESSION['ids2'][$id - 19];
        $question = get_question('compound_question_biology', $real_id);

    }elseif ($id <= 72){

        $real_id = $_SESSION['ids3'][$id - 61];
        $question = get_question('simple_question_chemistry', $real_id);

    }else{

        $real_id = $_SESSION['ids4'][$id - 73];
        $question = get_question('compound_question_chemistry', $real_id);

    }
    insert_into_saved_question($question, 'B', $new_id);
    insert_into_user_save_question($_SESSION['user_id'], $new_id);
}
?>