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

iconv_set_encoding('internal_encoding', 'UTF-8');
mb_internal_encoding('UTF-8');

try{
    $connection = new PDO("mysql:charset=utf8;host={$dbhost};dbname={$dbname};",$dbuser,$dbpass,array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch (PDOException $e){
    echo $e->getMessage();
}


include_once "user.php";
$user = new User($connection);