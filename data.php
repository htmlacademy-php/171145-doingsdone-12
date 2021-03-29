<?php

//variables
$user_name = 'Марти';
$page_title = 'Дела в порядке';

$current_user_id = 1;

//подготовленные запросы с плейсхолдерами
$sql_tasks =  "SELECT * FROM tasks where user_id = ?;";
$sql_projects = "SELECT * FROM projects WHERE user_id = ?;";

//получить список проектов и задач
$projects = get_sql_result($connect, $sql_projects, [$current_user_id]);
$tasks = get_sql_result($connect, $sql_tasks, [$current_user_id]);
