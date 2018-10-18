<?php
    //connect to the database
    $db = mysqli_connect('localhost', 'root', '', 'registration');
    //if register button is pressed
    if(isset($_POST['register']))
    {
        $username = mysql_real_escape_string($_POST['username'])
    }
?>