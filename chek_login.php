<?php

error_reporting(0);
session_start();

include 'backend/class/class.php';

$db = new database();
$user = new user();


$super = $user->chek_login_super(addslashes($_POST['username']), $_POST['password']);
if ($super > 0) {
    $login = $user->chek_login_super(addslashes($_POST['username']), $_POST['password']);
    if ($login) {
        echo "<script>   
            alert('Login ho sucessu..!!');
            document.location='backend/';</script>";
    } else {
        echo "<script>   
            alert('Sorry, Username ou password Lalos!!');
            document.location='login.html';</script>";

    }

} else {

    $username = substr($_POST['username'], 0, 2);
    if ($username <> 20) {
        // addslashes --> nia funsaun atu fo seguransa atu nune'e atu nune'e ema labele login tama arbiru ba sistema
        $login = $user->chek_login(addslashes($_POST['username']), $_POST['password']);

        if ($login) {
            echo "<script>   
            alert('Login ho sucessu..!!');
            document.location='backend/';</script>";
        } else {
            echo "<script>   
            alert('Sorry, Username ou password Lalos!!');
            document.location='login.html';</script>";

        }
    }
}