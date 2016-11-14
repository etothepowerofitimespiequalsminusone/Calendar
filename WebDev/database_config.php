<?php
/**
 * Created by PhpStorm.
 * User: Laganovskis
 * Date: 11/9/2016
 * Time: 8:47 PM
 */

session_start();

include_once "class.user.php";
include_once "class.attribute.php";

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "web";
$dbname = "webdev";

header('Content-Type: text/html; charset=UTF-8', true);
//iconv_set_encoding('internal_encoding', 'UTF-8');
//mb_internal_encoding('UTF-8');

try{
    $connection = new PDO("mysql:host={$dbhost};dbname={$dbname};charset=utf8;",$dbuser,$dbpass,array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch (PDOException $e){
    echo $e->getMessage();
}

//$connection= new Database($dbhost,$dbuser,$dbpass,$dbname);
$user = new User($connection);