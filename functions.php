<?php

/**
 * Подсчёт количества задач в каждом из проектов
 * @param array $tasks список задач
 * @param string $project_id id проекта
 * @return int $task_quantity число задач для переданного проекта
 */
function count_tasks(array $tasks, int $project_id) : int {
    $task_quantity = 0;

    foreach ( $tasks as $task ) {
        if ((int) $task['project_id'] === $project_id) {
            ++$task_quantity;
        }
    }

    return $task_quantity;
}


/**
 * возвращает результат запроса c плейсхолдерами
 * @param mysqli $connect параметры соединения
 * @param string $sql_query sql-запрос
 * @param  data //
 */
function get_sql_result($connect, $sql_query, $data) {
    $stmt = mysqli_stmt_init($connect);

    if(!mysqli_stmt_prepare($stmt, $sql_query)) {
        $errorMsg = 'Не удалось инициализировать подготовленное выражение: ' . mysqli_error($connect);
        die($errorMsg);

    } else {
        mysqli_stmt_bind_param($stmt, "i", $data);
        mysqli_stmt_execute($stmt);

        $result =  mysqli_stmt_get_result($stmt);

        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }
}
