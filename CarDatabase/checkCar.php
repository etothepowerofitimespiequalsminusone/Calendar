<?php

require_once 'functions.php';

if(isset($_POST['regnum']))
{
    $regnum = sanitizeStrings($_POST['regnum']);
    $result = queryMysql("select * from cars where regnum ='$regnum'");
    
    if($result->num_rows)
    {
        echo "this regnum has already been added to the database";
    }
    else{
        echo "this regnum is new to this database";
    }
}

?>

