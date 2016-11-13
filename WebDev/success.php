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

$name = $_SESSION['user_id'];
?>
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

<h2>Add attributes to user</h2>

</body>
</html>
