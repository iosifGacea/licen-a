
<!DOCTYPE html>
<html>
<head>
    <title>CreateAQuestion</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">
</head>
<body>
    
    <form method="post" action="send_question.php">
        <label for="statement">Enunț</label>
        <textarea type="text" name="statement" id="statement" required cols=90%></textarea>
        
        <label for="a">A</label>
        <textarea type="text" name="a" id="a"  required  cols=90% rows=1></textarea>

        <label for="b">B</label>
        <textarea type="text" name="b" id="b"  required  cols=90% rows=1></textarea>

        <label for="c">C</label>
        <textarea type="text" name="c" id="c"  required  cols=90% rows=1></textarea>

        <label for="d">D</label>
        <textarea type="text" name="d" id="d"  required  cols=90% rows=1></textarea>

        <label for="e">E</label>
        <textarea type="text" name="e" id="e"  required   cols=90% rows=1></textarea>

        <label for="university">Universitatea</label>
        <select name="university" id="university" name="university" cols=90% rows=1>
        <option value="bucuresti">'Carol Davila'</option>
        <option value="cluj">'Iuliu Hațieganu'</option>
        </select>

        <br>
        
        <button>Send</button>
    </form>
    
</body>
</html>