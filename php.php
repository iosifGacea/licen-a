<?php

function get_question($table, $id)
{
    include('connection.php');

    $query = "SELECT * FROM $table WHERE id_question = $id";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_array($result);
    return $row;
}

function insert_into_saved_question($question, $city, $new_id)
{
    include('connection.php');

    $question_e = $question['e'] ?? '';

    $query = "INSERT INTO `saved_question`(`id_question`, `statement`, `a`, `b`, `c`, `d`, `e`, `right_answer`, `city`)
    VALUES($new_id, "."'"."$question[statement]"."'".", "."'"."$question[a]"."'".", "."'"."$question[b]"."'".", "."'"."$question[c]"."'".", ".
    "'"."$question[d]"."'".", "."'"."$question_e"."'".", "."'"."$question[right_answer]"."'".", "."'"."$city"."'".")";

    $mysqli = new mysqli($servername, $username, $password, $db_name);
    $stmt = $mysqli->prepare($query);
    $stmt->execute();
}

function insert_into_user_save_question($id_user, $id_question)
{
    include('connection.php');

    $query = "INSERT INTO `user_save_question` (`id_user`, `id_question`) VALUES ($id_user, $id_question)";
    $mysqli = new mysqli($servername, $username, $password, $db_name);
    $stmt = $mysqli->prepare($query);
    $stmt->execute();
}

function create_quizz($simple_ids = array(), $table1, $compound_ids = array(), $table2, $no, $part) 
{
    include('connection.php');

    $ids = implode(', ', $simple_ids);
    $query = "SELECT * FROM $table1 WHERE id_question IN ($ids)";
    $result = mysqli_query($conn, $query); 

    $o = '';
    while($row = mysqli_fetch_array($result))
    {

        $o .= "<div id=$no><div>"."<b>$no</b>"."<h4>".'.'."$row[statement]"."</h4></div><br><ol type = 'A'>";

        $o .= '<li><input type = "radio" name = "'."$part".'_'."$row[id_question]".'" value = "'."a".'">'."$row[a]".'</input></li>';
        $o .= '<li><input type = "radio" name = "'."$part".'_'."$row[id_question]".'" value = "'."b".'">'."$row[b]".'</input></li>';
        $o .= '<li><input type = "radio" name = "'."$part".'_'."$row[id_question]".'" value = "'."c".'">'."$row[c]".'</input></li>';
        $o .= '<li><input type = "radio" name = "'."$part".'_'."$row[id_question]".'" value = "'."d".'">'."$row[d]".'</input></li>';
        $o .= '<li><input type = "radio" name = "'."$part".'_'."$row[id_question]".'" value = "'."e".'">'."$row[e]".'</input></li></ol></div>';

        $no = $no + 1;
    }

    $part = $part + 1;
    
    
    $ids = implode(', ', $compound_ids);
    $query = "SELECT * FROM $table2 WHERE id_question IN ($ids)";
    $result = mysqli_query($conn, $query);
    
    while($row = mysqli_fetch_array($result))
    {
        $o .= "<div id=$no><div><b>$no</b>"."<h4>".'.'."$row[statement]"."</h4></div><br><ol type = '1'>";

        $o .= '<li><input type = "checkbox" name = "'."$part".'_'."$row[id_question]".'_1'.'" value = "'."1".'">'."$row[a]".'</input></li>';
        $o .= '<li><input type = "checkbox" name = "'."$part".'_'."$row[id_question]".'_2'.'" value = "'."2".'">'."$row[b]".'</input></li>';
        $o .= '<li><input type = "checkbox" name = "'."$part".'_'."$row[id_question]".'_3'.'" value = "'."3".'">'."$row[c]".'</input></li>';
        $o .= '<li><input type = "checkbox" name = "'."$part".'_'."$row[id_question]".'_4'.'" value = "'."4".'">'."$row[d]".'</input></li></ol></div>';

        $no = $no + 1;
    }

    return $o;
}                     


function create_compound_quizz_Cj($compound_ids = array(), $table2, $no, $part) 
{      
    include('connection.php');

    $ids = implode(', ', $compound_ids);
    $query = "SELECT * FROM $table2 WHERE id_question IN ($ids)";
    $result = mysqli_query($conn, $query);
    
    $o = '';

    $q = array();
    while($row = mysqli_fetch_array($result))
    {
        $q[$no] = $row;
        $o .= "<div><b>$no</b>"."<h4>".'.'."$row[statement]"."</h4></div><br><ol type = '1'>";

        $o .= '<li><input type = "checkbox" name = "'."$part".'_'."$row[id_question]".'_1'.'" value = "'."a".'">'."$row[a]".'</input></li>';
        $o .= '<li><input type = "checkbox" name = "'."$part".'_'."$row[id_question]".'_2'.'" value = "'."b".'">'."$row[b]".'</input></li>';
        $o .= '<li><input type = "checkbox" name = "'."$part".'_'."$row[id_question]".'_3'.'" value = "'."c".'">'."$row[c]".'</input></li>';
        $o .= '<li><input type = "checkbox" name = "'."$part".'_'."$row[id_question]".'_4'.'" value = "'."d".'">'."$row[d]".'</input></li>';
        $o .= '<li><input type = "checkbox" name = "'."$part".'_'."$row[id_question]".'_5'.'" value = "'."e".'">'."$row[e]".'</input></li></ol>';

        $no = $no + 1;
    }
    $_SESSION['part'.$part] = $q;

    return $o;
}

function get_solution($ids = array(), $table)
{
    include('connection.php');

    $ids = implode(', ', $ids);
    $query = "SELECT id_question, right_answer FROM $table WHERE id_question IN ($ids)";
    $result = mysqli_query($conn, $query);

    $solution = array();
    while($row = mysqli_fetch_array($result))
    {
        $solution["$row[id_question]"] = "$row[right_answer]";
    }

    return $solution;
}


function get_simple_answers($ids, $part)
{
    $answers = array();
    foreach (array_values($ids) as $i)
    {
        $index  = "$part".'_'."$i";
        $answers[$i] = $_POST["$index"] ?? 'z';
    }
    return $answers;
}

function get_compound_answers($ids, $part)
{
    $answers = array();
    foreach (array_values($ids) as $i)
    {
        $a = $_POST["$part".'_'."$i"."_1"] ?? 0;
        $b = $_POST["$part".'_'."$i"."_2"] ?? 0;
        $c = $_POST["$part".'_'."$i"."_3"] ?? 0;
        $d = $_POST["$part".'_'."$i"."_4"] ?? 0;
        if ($a == '1' && $b == '2' && $c == '3' && $d == '0'){
            $answers[$i] = 'a';}
        
        elseif($a == '1' && $b == '0' && $c == '3' && $d == '0'){
                $answers[$i] = 'b';}
    
                elseif($a == '0' && $b == '2' && $c == '0' && $d == '4'){
                    $answers[$i] = 'c';}
    
                    elseif($a == '0' && $b == '0' && $c == '0' && $d == '4'){
                        $answers[$i] = 'd';}
    
                        elseif($a == '1' && $b == '2' && $c == '3' && $d == '4'){
                            $answers[$i] = 'e';}
    
                            elseif($a == '0' && $b == '0' && $c == '0' && $d == '0'){
                                $answers[$i] = 'e';}
                                else{
                                    $answers[$i] = 'z';
                                }
    }
    return $answers;
}

function get_answers_Cj($ids, $part)
{
    $answers = array();
    foreach (array_values($ids) as $i)
    {
        $aux = "";
        $aux = $aux.($_POST["$part".'_'."$i"."_1"] ?? "");
        $aux = $aux.($_POST["$part".'_'."$i"."_2"] ?? "");
        $aux = $aux.($_POST["$part".'_'."$i"."_3"] ?? "");
        $aux = $aux.($_POST["$part".'_'."$i"."_4"] ?? "");
        $aux = $aux.($_POST["$part".'_'."$i"."_5"] ?? "");
        $answers[$i] = $aux;
    }
    return $answers;
}


function show_wrong_compound_answer($id, $table, $solution)
{
    include('connection.php');
    $query = "SELECT * FROM $table WHERE id_question = $id";
    $result = mysqli_query($conn, $query);
    $o = "";
        while($row = mysqli_fetch_array($result)){
            
        $o .= "<h4>$row[statement]</h4>";
        $o .= "<ol type = '1'>";
        $o .= "<li>$row[a]</li><li>$row[b]</li><li>$row[c]</li><li>$row[d]</li>";
        $o .= '</ol>';
        }
        
        $o .= '<p class="wrong_answer">răspuns corect: '.strtoupper($solution["$id"]).'</p>';
        return $o;
}


function show_wrong_simple_answer($id, $table, $solution)
{
    include('connection.php');
    $query = "SELECT * FROM $table WHERE id_question = $id";
    $result = mysqli_query($conn, $query);
    $o = "";
    while($row = mysqli_fetch_array($result)){
            
        $o .= "<h4>$row[statement]</h4>";
        $o .= '<ol type="A">';
        $o .= "<li>$row[a]</li><li>$row[b]</li><li>$row[c]</li><li>$row[d]</li><li>$row[e]</li>";
        $o .= '</ol>';
        }
    
        $o .= '<p class="wrong_answer">răspuns corect: '.strtoupper($solution["$id"]).'</p>';
        return $o;
}

function show_wrong_answer_Cj($id, $table, $solution)
{
    include('connection.php');
    $query = "SELECT * FROM $table WHERE id_question = $id";
    $result = mysqli_query($conn, $query);
    $o = "";
    while($row = mysqli_fetch_array($result))
    {       
        $o .= "<h4>$row[statement]</h4>";
        $o .= '<ol type="a">';
        $o .= "<li>$row[a]</li><li>$row[b]</li><li>$row[c]</li><li>$row[d]</li><li>$row[e]</li>";
        $o .= '</ol>';
    }
        $o .= '<p class="wrong_answer">răspuns corect: '.strtoupper($solution["$id"]).'</p>';
        return $o;
}


function make_home_menu($query, $atributes = array())
{   
    include('connection.php');
   
    $result = mysqli_query($conn, $query);  
    $o = "<ul>";

    while ($row = mysqli_fetch_array($result)) 
    {
        $o .= '<li><a href = "'.$row['link'].'" >';
        foreach ($atributes as $a)
        {
            $o .= "$row[$a]"." - ";
        }
        $o .= '</a></li>';
    }
    $o .= '</ul>';
    
    return $o;
}

function UniqueRandomNumbers($min, $max, $quantity) 
{
    $numbers = range($min, $max);
    shuffle($numbers);
    $out = array_slice($numbers, 0, $quantity);
    sort($out);
    return $out;
}

function get_ids_saved_question($id_user)
{
    include('connection.php');

    $query = "SELECT `id_question` FROM `user_save_question` WHERE `id_user` = $_SESSION[user_id]";
    $result = mysqli_query($conn, $query);
    
    $ids = array();
    $index = 0;
    while($row = mysqli_fetch_array($result))
    {
        $ids[$index] = $row['id_question'];
        $index = $index + 1;
    }
    return $ids;
}

function get_saved_question($ids)
{
    include('connection.php');

    $ids = implode(', ', $ids);
    $query = "SELECT * FROM saved_question WHERE id_question IN ($ids)";
    $result = mysqli_query($conn, $query); 

    $o = '';
    $no = 1;
    while($row = mysqli_fetch_array($result))
    {
        $o .= "<div class='$row[city]'><div><b>$no</b><h4>".'.'."$row[statement]"."</h4></div><br>";
        if (isset ($row['e']))
        {
            $o .= "<ol type = 'A'>";
        }else
        {
            $o .= "<ol type = '1'>";
        }
        $o .= '<li><value = "'."a".'">'."$row[a]".'</input></li>';
        $o .= '<li><value = "'."b".'">'."$row[b]".'</input></li>';
        $o .= '<li><value = "'."c".'">'."$row[c]".'</input></li>';
        $o .= '<li><value = "'."d".'">'."$row[d]".'</input></li>';
        if (isset ($row['e']))
        {
            $o .= '<li><value = "'."e".'">'."$row[e]".'</input></li></ol>';
        }
        $right_answer = strtoupper($row['right_answer']);
        $o .= "răspuns corect: $right_answer</div>";
        $no = $no +1;
    }
    return $o;
}


function save_wrong_question($id, $table)
{
    include('connection.php');

    $querry = "SELECT COUNT(id ) FROM wrong_question";  
    $result = mysqli_query($conn, $querry);  
    $row = mysqli_fetch_array($result);  
    $new_id = $row['COUNT(id )'] + 1;

    $querry = "SELECT * FROM `wrong_question` WHERE `id_user`=$_SESSION[user_id] AND `relativ_id`=$id AND `table_name`='$table'";
    $result = mysqli_query($conn, $querry);
    $count = mysqli_num_rows($result); 

    if($count == 0){

        $querry = "INSERT INTO wrong_question(`id`, `id_user`, `relativ_id`, `table_name`) VALUES($new_id, $_SESSION[user_id], $id, '$table')";
        $mysqli = new mysqli($servername, $username, $password, $db_name);
        $stmt = $mysqli->prepare($querry);
        $stmt->execute();
    }
    
}


function get_wrong_question($id_user)
{
    include('connection.php');

    $query = "SELECT * FROM `wrong_question` WHERE `id_user` = $_SESSION[user_id]";
    $result = mysqli_query($conn, $query);

    $wrong_questions = array();
    $index = 0;
    while($row = mysqli_fetch_array($result))
    {
        $item = array();
        $item['id'] = $row['relativ_id'];
        $item['table'] = $row['table_name'];
        $item['city'] = $row['city'];

        $wrong_questions[$index] = $item;
        $index = $index + 1;
    }
    return $wrong_questions;   
}


function return_wrong_question($wrong_question)
{
    include('connection.php');

    $o = '';
    $no = 1;
    foreach ($wrong_question as $w)
    {
        $querry = "SELECT * from $w[table] where `id_question`=$w[id]";
        $result = mysqli_query($conn, $querry);
        while($row = mysqli_fetch_array($result))
        {
            $o .= "<div class='$w[city]'><div><b>".$no."</b><h4>".'.'."$row[statement]"."</h4></div><br>";
            $o .= "<ol type = 'A'>";
            $o .= "<li>$row[a]</li><li>$row[b]</li><li>$row[c]</li><li>$row[d]</li>";
                $aux = $row['e'] ?? '';
                $o .= "<li>$aux</li>";
            $o .= '</ol></div><br><br>';
        }
        $no = $no + 1;
    }
    return $o;
}

function insert_into_history($university, $grade)
{
    include('connection.php');

    $query = "SELECT MAX(id) FROM history";
    $result = mysqli_query($conn, $query);  
    $row = mysqli_fetch_array($result);  
    $max_id = $row['MAX(id)'] + 1;

    $query = "INSERT INTO `history`(`id`, `university`, `grade`, `id_user`) VALUES ($max_id, "."'"."$university"."'".", $grade, $_SESSION[user_id]);";
    return $query;
}

$container = '
<div class="container">
<div class="three_dots" onclick="fun()">
    <div class="dot"></div>
    <div class="dot"></div>
    <div class="dot"></div>
</div>
<div class="my_frame style" id="my_frame">
    <div class="info" onclick="open_raport_window()"><span>raportează</span></div>
    <div class="info" onclick="open_save_window()"><span>salvează</span></div>
</div>
</div>
';

$home_container='
<div class="container">
    <div class="three_dots" onclick="fun()">
        <div class="dot"></div>
        <div class="dot"></div>
        <div class="dot"></div>
    </div>
    <div class="my_frame style" id="my_frame">
        <div class="info" onclick="open_create_window()"><span>creează</span></div>
        <div class="info" onclick="view_saved_question()"><span>întrebări salvate</span></div>
        <div class="info" onclick="view_wrong_question()"><span>întrebări greșite</span></div>
        <div class="info" onclick="open_history_window()"><span>Istoric</span></div>
    </div>
</div>
';

