<?php

require_once "database_config";

if($isset($_GET['email'])) {
    $email = $_GET['email'];
    $message = $user->validate_email($email) ? "this is good" : "this email is taken";
}
//    if($user->validate_email($email))
//    {
//        $message = "this is good";
//    }
//    else{
//        $message = "this is taken";
//    }

