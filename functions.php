<?php

/**
 * Подсчёт количества задач в каждом из проектов
 * @param array $tasks список задач в виде массива
 * @param string $project_name название проекта
 * @return int $task_quantity число задач для переданного проекта
 */
function count_tasks(array $tasks, string $project_name) : int {
    $task_quantity = 0;

    foreach ($tasks as $task) {
        if (isset($task['category']) && $task['category'] === $project_name) {
            ++$task_quantity;
        }
    }

    return $task_quantity;
}
