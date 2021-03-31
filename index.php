<?php

require_once './helpers.php';
require_once './date.php';
require_once './functions.php';
require_once './db.php';
require_once './data.php';


//получить список проектов и задач
$projects = get_sql_result($connect, $sql_projects, [$current_user_id]);

// существование списка задач
$tasks_existence = true;

// показывать или нет выполненные задачи
$show_complete_tasks = rand(0, 1);


if (isset($_GET['project_id'])) {
    $project_id = filter_input(INPUT_GET, 'project_id');

    if (sub_array_key_exists($projects, 'id', (int) $project_id)) {
        $sql_current_tasks =  "SELECT * FROM tasks WHERE user_id = ? AND project_id = ?;";

        $tasks = get_sql_task_result($connect, $sql_current_tasks, [$current_user_id, $project_id]);

        if (empty($tasks)) {
            $tasks_existence = false;
        }

    } else {
        http_response_code(404);
        exit();
    }

} else {
    $tasks = get_sql_result($connect, $sql_tasks, [$current_user_id]);
}


$page_content = include_template('main.php', [
    'projects' => $projects,
    'tasks' => $tasks,
    'tasks_existence' => $tasks_existence,
    'show_complete_tasks' => $show_complete_tasks,
]);

$layout = include_template('layout.php', [
    'page_content' => $page_content,
    'user_name' => $user_name,
    'page_title' => $page_title,
]);

print $layout;
