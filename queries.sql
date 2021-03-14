USE 'doingsdone';

/*Добавить пользователей*/
INSERT INTO users (date_reg, email, password, name)
VALUES ('01.12.2020', 'macfly@mail.com', 'paSS123', 'Марти'),
('12.12.2020', 'beckett@mail.com', 'Pass321', 'Сэм');

/*Добавить список проектов для одного пользователя*/
INSERT INTO projects (name, user_id)
VALUES  ('Входящие', 1),
('Учёба', 1),
('Работа', 1),
('Домашние дела', 1),
('Авто', 1);
('Рабочие', 2);
('Здоровье', 2);
('Дом', 2);

/*Добавить задачи*/
INSERT INTO tasks (create_date, status, name, deadline_date, user_id, project_id)
VALUES ('01.01.2021', 0, 'Собеседование в IT компании', '01.03.2021', 1, 3),
('01.01.2021', 0, 'Выполнить тестовое задание', '04.02.2021', 1, 3),
('14.12.2020', 1, 'Сделать задание первого раздела', '21.12.2020', 1, 2),
('15.01.2021', 0, 'Встреча с другом', '22.02.2021', 1, 1),
('30.01.2021', 0, 'Купить корм для кота', '31.01.2021', 1, 4),
('01.02.2021', 0, 'Заказать пиццу', null, 1, 4);

/*Получить список всех проектов для одного пользователя*/
SELECT name FROM projects WHERE user_id = 1;
SELECT name FROM projects WHERE user_id = 2;

/*Получить список всех задач для одного проекта*/
SELECT * FROM tasks WHERE project_id = 1;
SELECT * FROM tasks WHERE project_id = 2;
SELECT * FROM tasks WHERE project_id = 3;
SELECT * FROM tasks WHERE project_id = 4;

/*Пометить задачу как выполненную*/
 UPDATE tasks SET status = 1 WHERE id = 4;

/*Обновить название задачи по её идентификатору*/
UPDATE tasks SET name = 'Сделать задание 4 раздела' WHERE id = 3;
