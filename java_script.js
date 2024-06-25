function fun(){

    var x = document.getElementById("my_frame");
    if (document.getElementById("my_frame").style.display === "none") {
        document.getElementById("my_frame").style.display = "block";
    } else {
        document.getElementById("my_frame").style.display = "none";
    }
}

function save_this_test(){
    const test = this.document.getElementById("test");
    var opt = {
        filename: 'test.pdf' 
    };
    html2pdf().from(test).set(opt).save();
}

function open_raport_window(){
    window.open("raport.php");
}
    
function open_create_window(){
    window.open("create.php");
}
    
function open_save_window(){
    window.open('save.php');
}
    
function view_saved_question(){
    window.open('saved_question.php');
}
    
function view_wrong_question(){
    window.open('wrong_question.php');
}

function open_history_window(){
    window.open("history.php");
}

function f(){
    return '';
}