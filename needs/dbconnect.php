<?php


function DbConnect($host, $user, $password, $dbname)
{
    $connection = new PDO("mysql:host=" . $host . ";port=3306;dbname=" . $dbname, $user, $password);
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $connection;
}

$host = 'localhost';
$user = 'root';
$password = '';
$db_one = 'company';
$db_two = 'cart';


$pdo = DbConnect($host, $user, $password, $db_one);

$pdo1 = DbConnect($host, $user, $password, $db_two);


// $host = 'sql100.unaux.com';
// $user = 'unaux_29741797';
// $password = '111045006nde4LIFE@';
// $db_one = 'unaux_29741797_company';
// $db_two = 'unaux_29741797_cart';
