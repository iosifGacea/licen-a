<!DOCTYPE HTML>
<html class='test'>
    <head>
        <meta name = "viewport", content = "width=device-width, initial-scale=1.0">
        <link rel = "stylesheet", href = "style.css">
        <title>Home</title>
    </head>
    <body>
        <?php
        include('php.php');

        $query = 'SELECT universities.name as universities_name, colleges.name as colleges_namen, link
                FROM universities INNER JOIN colleges on universities.id_university = colleges.id_university';
        
        echo make_home_menu($query, ['universities_name', 'colleges_namen']);
        echo $home_container;
        ?>
    <script src="java_script.js"></script>
    </body>
</html>