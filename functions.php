<?php

/**
 * Подсчёт количества задач в каждом из проектов
 * @param array $tasks список задач
 * @param int $project_id id проекта
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
 * @param  array data
 * @return array готовые данные
 */
function get_sql_result($connect, $sql_query, $data = []) : array {
    $stmt = mysqli_stmt_init($connect);

    if(!mysqli_stmt_prepare($stmt, $sql_query)) {
        $errorMsg = 'Не удалось инициализировать подготовленное выражение: ' . mysqli_error($connect);
        die($errorMsg);

    }

    if ($data) {
			mysqli_stmt_bind_param($stmt, str_repeat('s', count($data)), ...$data);
		}

    mysqli_stmt_execute($stmt);

    $result =  mysqli_stmt_get_result($stmt);

    return mysqli_fetch_all($result, MYSQLI_ASSOC);
}


/**
 * Получить список проектов по текущему запросу, если запись существует
 * @param array $projects список всех проектов
 * @return integer|null $result;
 */

function get_current_project_id(array $projects): ?int {

    $result = null;

    if (isset($_GET['project_id'])) {
        $value = filter_input(INPUT_GET, 'project_id');

        foreach ($projects as $project) {
            if ((int)$project['id'] === (int) $value) {
                $result = $value;
            }
        }

        if(is_null($result)) {
            http_response_code(404);
            exit();
        }
    }


    return $result;
}

/**
 * Получить список проектов по юзеру
 * @param mysqli $connect параметры соединения
 * @param int $curren_user_id текущий пользователь
 * @return array массив проектов
 */
function get_projects($connect, int $current_user_id) {
    $sql = "SELECT * FROM projects WHERE user_id = ?;";

    return get_sql_result($connect, $sql, [$current_user_id]);
}


/**
 * Получить список всех задач по юзеру
 * @param mysqli $connect параметры соединения
 * @param int $curren_user_id текущий пользователь
 * @return array массив задач
 */
function get_tasks($connect, int $current_user_id): array {
    $sql =  "SELECT * FROM tasks where user_id = ?;";

    return get_sql_result($connect, $sql, [$current_user_id]);
}


/**
 * Получить список задач по юзеру и проекту
 * @param mysqli $connect параметры соединения
 * @param int $curren_user_id текущий пользователь
 * @param int $curren_project_id текущий проект
 * @return array массив задач
 */
function get_tasks_on_project($connect, int $current_user_id, int $current_project_id): array {
    $sql =  "SELECT * FROM tasks where user_id = ? and project_id = ?;";

    return get_sql_result($connect, $sql, [$current_user_id, $current_project_id]);
}


/**
 * Показать список задач в зависимости от полученных условий
 * @param mysqli $connect параметры соединения
 * @param int $current_user_id текущий пользователь
 * @param int|null $current_project_id текущий проект
 * @return array массив задач
 */
function show_tasks($connect, int $current_user_id, ?int $current_project_id): array {
    if ( is_null($current_project_id) ) {
        return get_tasks($connect, $current_user_id);
    }

    return get_tasks_on_project($connect, $current_user_id, $current_project_id);
}
