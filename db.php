<?php
$db = [
    'host' => 'localhost',
    'user' => 'root',
    'password' => 'root',
    'name' => 'doingsdone'
];

/**
* подключение БД
* @param array данные дял соединения с БД
* @return mysqli_connect соединение с БД
*/
function set_db_connect(array $db_settings) {
    return mysqli_connect($db_settings['host'], $db_settings['user'], $db_settings['password'], $db_settings['name']);
}


$connect = set_db_connect($db);
mysqli_set_charset($connect, "utf8");

if (!$connect) {
    die('Ошибка подключения: ' . mysqli_connect_error() . mysqli_errno());
}
