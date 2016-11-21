<?php
/**
 * Created by PhpStorm.
 * User: Laganovskis
 * Date: 11/21/2016
 * Time: 8:16 AM
 */

session_start();
//7*6 cubes, each representing a single day

//in each cube there is a day number and couple main events

//you can click on any given date and see a bigger list of events
$month = date('n');
$year = date('Y');
function calendar($month,$year)
{
    $days_in_month = date('t',mktime(0,0,0,$month,1,$year));
    $day_of_week = date('w',mktime(0,0,0,$month,1,$year));
    echo "<br>";
    $days = ['Sunday','Monday','Tuesday','Wednesday','Thursday','Friday','Saturday'];
    foreach ($days as $day)
    {
        echo "<div class='day heading'>".$day."</div>";
    }

    echo "<br>";


    //now print out all days in the month
//    echo "<div class='col-md-7'>";
    $empty_days = 0;
    for($x = 0;$x<$day_of_week;$x++)
    {
        echo "<div class='day'>"."-"."</div>";
        $empty_days++;
    }
    for($x = 1;$x<= $days_in_month; $x++)
    {
        echo "<div class='day'>".$x."</div>";
        if(($x+$empty_days)%7==0) echo "<br>";
    }
    $filltable = 42- $days_in_month - $empty_days;
    for($x = 0;$x<$filltable;$x++)
    {
        echo "<div class='day'>"."-"."</div>";
        if(($days_in_month+$empty_days+($x+1))%7==0) echo "<br>";
    }
//    echo "</div>";
    //loop through seven days and create a div for each day

    // all 6 line of 7 days

    //loop through each day of the month and create a div





}

$counter = isset($_POST['counter']) ? $_POST['counter'] : 0;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if(isset($_POST["button"])){
        $counter++;
        echo $counter;
    }
}
$currentmonth = date('n');
//$month = isset($_POST['next']) ? $_POST['next'] : $currentmonth;
$year = isset($_SESSION['year']) ? $_SESSION['year']  : date('Y');
$month = isset($_SESSION['month']) ? $_SESSION['month']  : date('n');
if(isset($_POST['next']))
{

    if($month == 12)
    {
        $month = 0;
        $year++;
    }
    $month++;
    $_SESSION['year'] = $year;
    $_SESSION['month'] = $month;
}

if(isset($_POST['previous']))
{
    if($month == 1)
    {
        $month = 13;
        $year--;
    }
    $month--;

    $_SESSION['year'] = $year;
    $_SESSION['month'] = $month;
}
if(isset($_POST['reset']))
{
    $_SESSION = array();
    session_unset();
}
echo "month = ".$month."<br>";
echo "year = ".$year;


if(isset($_POST['action']) == 'next')
{
    alert("action is next!");
}

//if(isset($_POST['action']) && !empty($_POST['action'])) {
//    $action = $_POST['action'];
//    switch($action) {
//        case : next
//        break;
//
//        default:
//
//    }
//}


include_once 'views/index.php';



