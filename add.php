<?php

require_once './helpers.php';
require_once './functions.php';
require_once './db.php';
require_once './data.php';

$page_title = 'Добавление задачи';
$projects = get_projects($connect, $current_user_id);
$current_project_id = get_current_project_id($projects);
$tasks = show_tasks($connect, $current_user_id, $current_project_id);


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $add_task = htmlspecialchars($_POST['name']);
    $add_project = $_POST['project'];
    $add_deadline = $_POST['date'];

    if(isset($_FILES) && $_FILES['file']['error'] === 0) {
        //конечная директория - корень проекта
        $destiation_dir = dirname(__FILE__) .'/'.$_FILES['file']['name'];
        move_uploaded_file($_FILES['file']['tmp_name'], $destiation_dir );
        $add_file = ($_FILES['file']['name']);
    } else{
        $add_file = "";
    }

    insert_task($connect, $current_user_id, [$add_task, $add_file, $add_deadline, $current_user_id, $add_project]);
}



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
