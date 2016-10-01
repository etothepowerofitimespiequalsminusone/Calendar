<?php
require 'base.html';
    if($loggedin)
    {
        echo 'welcome ',$user;
    }
    else{
        include 'login.php';
    }


?>
