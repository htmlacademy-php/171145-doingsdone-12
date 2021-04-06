/*Добавить пользователей*/
INSERT INTO users (date_reg, email, password, name)
VALUES ('2020.12.01', 'macfly@mail.com', 'paSS123', 'Марти'),
('2020.12.12', 'beckett@mail.com', 'Pass321', 'Сэм');

/*Добавить список проектов для одного пользователя*/
INSERT INTO projects (name, user_id)
VALUES  ('Входящие', 1),
('Учёба', 1),
('Работа', 1),
('Домашние дела', 1),
('Авто', 1),
('Рабочие', 2),
('Здоровье', 2),
('Дом', 2);

/*Добавить задачи*/
INSERT INTO tasks (create_date, status, name, deadline_date, user_id, project_id)
VALUES ('2021.01.01', 0, 'Собеседование в IT компании', '2021.03.01', 1, 3),
('2021.01.01', 0, 'Выполнить тестовое задание', '2021.02.04', 1, 3),
('2020.12.14', 1, 'Сделать задание первого раздела', '2020.12.21', 1, 2),
('2021.01.15', 0, 'Встреча с другом', '2021.02.22', 1, 1),
('2021.01.30', 0, 'Купить корм для кота', '2021.01.31', 1, 4),
('2021.03.25', 0, 'Заказать пиццу', null, 1, 4),
('2021.01.01', 0, 'Разгрести балкон', '2021.04.20', 2, 8);

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
