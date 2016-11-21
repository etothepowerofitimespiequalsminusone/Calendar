<?php
if(isset($_POST['next']))
{
    echo "month was " . $month;
    if($month == 12)
    {
        $month = 0;
        $year++;
    }
    $month++;


    echo $month;
}
if(isset($_POST['previous']))
{
    $month--;
}

include_once "cal.php";
