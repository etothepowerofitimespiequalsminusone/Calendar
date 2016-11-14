<?php

include_once "database_config.php";
$message = "";
if(isset($_POST['logout']))
{
    $user->logout();
}
if($user->isloggedin() == false)
{
    header("Location: index.php");
}
$attribute = new Attribute($connection);
if(isset($_POST['add'])) {
    if (isset($_POST['attribute_name']))
    {
        $name = $_POST['attribute_name'];
        if($attribute->validate_name($name))
        {
            if($attribute->createAttribute($name))
            {
                $message = "Attribute created successfully!";
            }
            else{
                $message = "Something went wrong";
            }
        }else{
            $message = "Attribute already exists";
        }
    }
}
if(isset($_POST['user_attribute']))
{
    if(isset($_POST['attribute']) && isset($_POST['value']))
    {
        $value = $_POST['value'];
        $user_id = $_SESSION['user_id'];
        $attribute_id = $_POST['attribute'];
        if($attribute->addAttributeToUser($value,$attribute_id,$user_id))
        {
            $message = "Attribute added";
        }
    }
}

$attributes = $attribute->getAttributes();
$name = $user->getName($_SESSION['user_id']);

include_once "view.home.php";


