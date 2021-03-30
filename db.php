<?php
$db = [
    'host' => 'localhost',
    'user' => 'root',
    'password' => 'root',
    'name' => 'doingsdone'
];


$connect = mysqli_connect($db['host'], $db['user'], $db['password'], $db['name']);

if (!$connect) {
    die('Ошибка подключения: ' . mysqli_connect_error() . mysqli_errno());
}

mysqli_set_charset($connect, "utf8");
