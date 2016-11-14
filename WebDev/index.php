<?php
/**
 * Created by PhpStorm.
 * User: Laganovskis
 * Date: 11/9/2016
 * Time: 6:25 PM
 */
error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once "database_config.php";

if($user->isloggedin())
{
    header("Location: home.php");
}
if(isset($_POST['login']))
{
    if(isset($_POST['email']) && isset($_POST['password']))
    {
        $email = ($_POST['email']);
        $password = ($_POST['password']);
    }
    if($user->login($email,$password))
    {
        header("Location: home.php");
    }
    else{
        $error = "Email and/or password not correct";
    }
}
if(isset($_POST['register']))
{
    if(isset($_POST['fullname']) && isset($_POST['email']) && isset($_POST['password']))
    {

        $fullname = $_POST['fullname'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        if($user->validate_email($email))
        {
            if($user->register($fullname,$email,$password))
            {
                header("Location: index.php#login");
            }
            else{
                $message = "Something went wrong!";
            }
        }
        else{
            $message = "This email is already taken";
        }
    }
}
require "view.index.php";

