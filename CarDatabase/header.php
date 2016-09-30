<?php
session_start();
echo "<!DOCTYPE html>\n<html><head>";
require_once 'functions.php';

$userstr = ' (Guest)';
if(isset($_SESSION['user']))
{
    $user = $_SESSION['user'];
    $loggedin = true;
    $userstr = " ($user)";
}
else{
    $loggedin = false;
}

echo "<title>$appname$userstr</title><link rel='stylesheet' ".
        "href='styles.css' type='text/css'>" .
        "<div class='appname'>$appname $userstr</div>".
        "<script src='javascript.js'></script>";

if ($loggedin)    
    echo "<ul class='menu'>" .      
        "<li><a href='index.php?view=$user'>Home</a></li>" .
        "<li><a href='browse.php?view=$user'>Browse Database</a></li>" .  
        "<li><a href='edit.php?view=$user'>Edit Database</a></li>" .
        "<li><a href='logout.php'>Log out</a></li></ul>";  
else    
    echo "<ul class='menu'>" .          
        "<li><a href='index.php'>Home</a></li>"                .              
        "<li><a href='login.php'>Log in</a></li>"     . 
        "<li><a href='browse.php'>Browse Database</a></li></ul>";
?>




