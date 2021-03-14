<?php

require_once './data.php';
require_once './helpers.php';
require_once './date.php';
require_once './functions.php';
$db = require_once './db.php';

//$connect = mysqli_connect($db['host'], $db['user'], $db['password'], $db['database']);
$connect = mysqli_connect('localhost', 'root', 'root', 'doingsdone');
mysqli_set_charset($connect, "utf8");

    if (!$connect) {
        die('Ошибка подключения: ' . mysqli_connect_error() . mysqli_errno());
    }
    else {
        $sql_projects = "SELECT * FROM projects WHERE user_id = 1";
        $sql_tasks = "SELECT * FROM tasks where user_id = 1";
        $result_projects = mysqli_query($connect, $sql_projects);
        $result_tasks= mysqli_query($connect, $sql_tasks);

        if ($result_projects) {
            $projects = mysqli_fetch_all($result_projects, MYSQLI_ASSOC);
        }

        if ($result_tasks) {
            $tasks = mysqli_fetch_all($result_tasks, MYSQLI_ASSOC);
        }
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
