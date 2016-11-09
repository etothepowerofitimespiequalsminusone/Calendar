/**
* Created by PhpStorm.
* User: Laganovskis
* Date: 11/9/2016
* Time: 10:47 PM
*/
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Success</title>
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="static/css/style.css"/>
</head>
<body>
<h1>You are logged in!</h1>
<form method="post">
    <button type="submit" name="logout">Logout</button>
</form>
</body>
</html>
<?php

include_once "database_config.php";
if(isset($_POST['logout']))
{
    $user->logout();
}
if($user->isloggedin() == false)
{
    header("Location: index.php");
}