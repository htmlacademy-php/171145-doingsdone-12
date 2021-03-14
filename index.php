<?php

require_once './data.php';
require_once './helpers.php';
require_once './date.php';
require_once './functions.php';
require_once './db.php';

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
    else {
        echo 'it`s working';
       /*  $sql_projects = "SELECT * FROM projects WHERE user_id = 1";
        $sql_tasks = "SELECT * FROM tasks where user_id = 1";
        $result_projects = mysqli_query($connect, $sql_projects);
        $result_tasks= mysqli_query($connect, $sql_tasks);

        if ($result_projects) {
            $projects = mysqli_fetch_all($result_projects, MYSQLI_ASSOC);
        }

        if ($result_tasks) {
            $tasks = mysqli_fetch_all($result_tasks, MYSQLI_ASSOC);
        } */
    }
        /* else {
            $error = mysqli_error($connect);
            print('ошибка' . $error);
        }
    }*/

//variables
$user_name = 'Марти';
$page_title = 'Дела в порядке';

// показывать или нет выполненные задачи
$show_complete_tasks = rand(0, 1);

$page_content = include_template('main.php', [
    'projects' => $projects,
    'tasks' => $tasks,
    'show_complete_tasks' => $show_complete_tasks,
]);

$layout = include_template('layout.php', [
    'page_content' => $page_content,
    'user_name' => $user_name,
    'page_title' => $page_title,
    'error' => $error
]);

print $layout;
