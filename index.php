<?php

require_once './helpers.php';
require_once './date.php';
require_once './functions.php';
require_once './db.php';
require_once './data.php';

// показывать или нет выполненные задачи
$show_complete_tasks = rand(0, 1);

$projects = get_projects($connect, $current_user_id);

$current_project_id = get_current_project_id($projects);

$tasks = get_tasks($connect, $current_user_id, $current_project_id);


$page_content = include_template('main.php', [
    'projects' => $projects,
    'current_project_id' => $current_project_id,
    'tasks' => $tasks,
    'show_complete_tasks' => $show_complete_tasks,
]);

$layout = include_template('layout.php', [
    'page_content' => $page_content,
    'user_name' => $user_name,
    'page_title' => $page_title,
]);

print $layout;
