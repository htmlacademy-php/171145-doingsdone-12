<?php

require_once './helpers.php';
require_once './date.php';
require_once './functions.php';
require_once './db.php';

//variables
$user_name = 'Марти';
$user_id = '1';
$page_title = 'Дела в порядке';

//получить список проектов и задач
$projects = get_fetch_all($connect, "SELECT * FROM projects where user_id = '$user_id'");
$tasks = get_fetch_all($connect, "SELECT * FROM tasks where user_id = '$user_id'");

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
]);

print $layout;
