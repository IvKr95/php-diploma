<?php

$host = 'localhost';
$user = 'root';
$pwd = '';
$db = 'test';

$connect = mysqli_connect($host, $user, $pwd, $db);

if (!$connect) {
    die('Failed ' . mysqli_connect_error());
};