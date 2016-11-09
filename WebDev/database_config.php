<?php
/**
 * Created by PhpStorm.
 * User: Laganovskis
 * Date: 11/9/2016
 * Time: 8:47 PM
 */

session_start();

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "web";
$dbname = "webdevtest";

try{
    $connection = new PDO("mysql:host={$dbhost};dbname={$dbname}",$dbuser,$dbpass);
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch (PDOException $e){
    echo $e->getMessage();
}


include_once "user.php";
$user = new User($connection);