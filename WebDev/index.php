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
        echo "we here";
        echo "email ". $email . " and "  . $password;
    }
    if($user->login($email,$password))
    {
        header("Location: success.php");
    }
    else{
        echo "we bad";
    }

}







require "view.php";

