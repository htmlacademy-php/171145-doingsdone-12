<?php
// показывать или нет выполненные задачи
$show_complete_tasks = rand(0, 1);

$categories = [
    'Входящие',
    'Учёба',
    'Работа',
    'Домашние дела',
    'Авто'
];

$tasks = [
    [
        'title' => 'Собеседование в IT компании',
        'date' => '01.12.2019',
        'category' => 'Работа',
        'status' => false
    ],
    [
        'title' => 'Выполнить тестовое задание',
        'date' => '25.12.2019',
        'category' => 'Работа',
        'status' => false
    ],
    [
        'title' => 'Сделать задание первого раздела',
        'date' => '21.12.2019',
        'category' => 'Учёба',
        'status' => true
    ],
    [
        'title' => 'Встреча с другом',
        'date' => '22.12.2019',
        'category' => 'Входящие',
        'status' => false
    ],
    [
        'title' => 'Купить корм для кота',
        'date' => null,
        'category' => 'Домашние дела',
        'status' => false
    ],
    [
        'title' => 'Заказать пиццу',
        'date' => null,
        'category' => 'Домашние дела',
        'status' => false
    ],

];

$user_name = 'Марти Макфлай';
$page_title = 'Дела в порядке';

/**
 * Подсчёт количества задач в каждом из проектов
 * @param array $tasks список задач в виде массива
 * @param string $project_name название проекта
 * @return int $task_quantity число задач для переданного проекта
 */
function counting_tasks(array $tasks, string $project_name) {
    $task_quantity = 0;

    foreach ($tasks as $task) {
        if ($task['category'] === $project_name) {
            ++$task_quantity;
        }
    }

    return $task_quantity;
}


require_once './helpers.php';

$page_content = include_template('main.php', [
    'categories' => $categories,
    'tasks' => $tasks,
    'show_complete_tasks' => $show_complete_tasks,
]);

$layout = include_template('layout.php', [
    'page_content' => $page_content,
    'user_name' => $user_name,
    'page_title' => $page_title,
]);

print $layout;
?>
