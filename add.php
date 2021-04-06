<?php

require_once './helpers.php';
require_once './date.php';
require_once './functions.php';
require_once './db.php';
require_once './data.php';

$page_title = 'Добавление задачи';
$projects = get_projects($connect, $current_user_id);
$current_project_id = get_current_project_id($projects);
$tasks = show_tasks($connect, $current_user_id, $current_project_id);

$sidebar_content = include_template('sidebar-projects.php', [
    'projects' => $projects,
    'current_project_id' => $current_project_id,
    'tasks' => $tasks,
]);

$page_content = include_template('form-task.php', [
    'projects' => $projects,
]);

$layout = include_template('layout.php', [
    'sidebar_content' => $sidebar_content,
    'page_content' => $page_content,
    'user_name' => $user_name,
    'page_title' => $page_title,
]);

print $layout;
