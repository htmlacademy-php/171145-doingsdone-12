<main class="content__main">
    <h2 class="content__main-heading">Список задач</h2>

    <form class="search-form" action="index.php" method="post" autocomplete="off">
        <input class="search-form__input" type="text" name="" value="" placeholder="Поиск по задачам">

        <input class="search-form__submit" type="submit" name="" value="Искать">
    </form>

    <div class="tasks-controls">
        <nav class="tasks-switch">
            <a href="/" class="tasks-switch__item tasks-switch__item--active">Все задачи</a>
            <a href="/" class="tasks-switch__item">Повестка дня</a>
            <a href="/" class="tasks-switch__item">Завтра</a>
            <a href="/" class="tasks-switch__item">Просроченные</a>
        </nav>

        <label class="checkbox">
            <input class="checkbox__input visually-hidden show_completed" type="checkbox" <?php if ($show_complete_tasks): ?> checked <?php endif;?>>
            <span class="checkbox__text">Показывать выполненные</span>
        </label>
    </div>

    <?php
        if (!$tasks) {
            $message = 'Добавьте задачу ';
            print($message);
        }
    ?>

    <table class="tasks">
        <?php
        foreach ($tasks as $task):
            if ($task['status'] && $show_complete_tasks === 0) {
                continue;
            }
        ?>
        <tr class="tasks__item task
            <?php if ($task['status']): ?>task--completed<?php endif;?>
            <?php if (isset($task['deadline_date']) && countHoursBetweenDates($task['deadline_date']) <= 24 && !$task['status']): ?>task--important<?php endif;?>
        ">
            <td class="task__select">
                <label class="checkbox task__checkbox">
                    <input class="checkbox__input visually-hidden" type="checkbox" checked>
                    <span class="checkbox__text"><?= htmlspecialchars($task['name']); ?></span>
                </label>
            </td>
            <td class="task__date"><?= date_format(date_create($task['deadline_date']), 'd.m.Y'); ?></td>
            <td class="task__controls"></td>
        </tr>
        <?php endforeach; ?>
    </table>
</main>

