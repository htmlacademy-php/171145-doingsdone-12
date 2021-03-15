<?php

/**
 * Подсчёт количества задач в каждом из проектов
 * @param array $tasks список задач в виде массива
 * @param string $project_id id проекта
 * @return int $task_quantity число задач для переданного проекта
 */
function count_tasks(array $tasks, string $project_id) : int {
    $task_quantity = 0;

    foreach ( $tasks as $task ) {
        if (strval($task['project_id'] === $project_id)) {
            ++$task_quantity;
        }
    }

    return $task_quantity;
}


/**
 * возвращает результат запроса в виде ассоциативного массива
 * @param mysqli $connect параметры соединения
 * @param string $sql_query sql-запрос
 */
function get_fetch_all($connect, string $sql_query) {
    $result = mysqli_query($connect, $sql_query);

    if(!$result) {
        $error = mysqli_error($connect);
        die('Ошибка MySQL: ' . $error);
    }

    return mysqli_fetch_all($result, MYSQLI_ASSOC);
}
