<?php
$host = 'localhost:8889';
$username = '***';
$password = '***';
$database = 'supermarkets_prices_comparison';

$db = mysqli_connect($host, $username, $password, $database);
mysqli_query($db, 'set character set UTF8');
mysqli_query($db, "SET NAMES 'utf8'");
mb_internal_encoding("UTF-8"); 

if(mysqli_connect_errno()){
    echo 'Database connection failed with following errors: '.mysqli_connect_error();
    die();
}
?>
