<?php
date_default_timezone_set('Europe/Moscow');
setlocale(LC_ALL, 'ru_RU');
const SECONDS_PER_HOUR = 3600;

/**
 * Вычисляет количество часов между назначенной датой и текущей датой
 * @param string $date назначенная дата
 * @return int $hours_diff разница между датами в часах
 */
 function countHoursBetweenDates(string $date) : int {

    $task_date = strtotime($date);
    $now_date = strtotime('now');
    $hours_diff = ($task_date - $now_date) / SECONDS_PER_HOUR;

    return $hours_diff;
 }
