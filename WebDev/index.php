<?php
/**
 * Created by PhpStorm.
 * User: Laganovskis
 * Date: 11/9/2016
 * Time: 6:25 PM
 */

require_once "database_config.php";

error_reporting(E_ALL);
ini_set('display_errors', 1);
//

if($user->isloggedin())
{
    header("Location: success.php");
}

if(isset($_GET['login']))
{
    if(isset($_GET['email']) && isset($_GET['password']))
    {
        $email = ($_GET['email']);
        $password = ($_GET['password']);
    }
    if($user->login($email,$password))
    {
        header("Location: success.php");
    }
    else{
        $error = "Email and/or password not correct";
    }
}
if(isset($_GET['register']))
{
    if(isset($_GET['fullname']) && isset($_GET['email']) && isset($_GET['password']))
    {

        $fullname = htmlspecialchars($_GET['fullname']);
        $email = htmlspecialchars($_GET['email']);
        $password = htmlspecialchars($_GET['password']);
        if($user->validate_email($email))
        {
            if($user->register($fullname,$email,$password))
            {
                $message = "You are registered, please login!";
            }
            else{
                $message = "This email is good";
            }
        }
        else{
            $message = "This email is already taken";
        }
    }
}


require "view_upgraded.php";

