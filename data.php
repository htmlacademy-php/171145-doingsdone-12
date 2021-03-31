<?php

//variables
$user_name = 'Марти';
$page_title = 'Дела в порядке';

$current_user_id = 1;

//подготовленные запросы с плейсхолдерами
$sql_projects = "SELECT * FROM projects WHERE user_id = ?;";
$sql_tasks =  "SELECT * FROM tasks where user_id = ?;";
