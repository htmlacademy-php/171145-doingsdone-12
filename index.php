<?php

require_once './data.php';
require_once './helpers.php';
require_once './date.php';
require_once './functions.php';

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
]);

print $layout;
