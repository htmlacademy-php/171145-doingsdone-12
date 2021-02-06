CREATE DATABASE doingsdone
  DEFAULT CHARACTER SET utf8
  DEFAULT COLLATE utf8_general_ci;

USE doingsdone;

CREATE TABLE users (
  user_id INT unsigned AUTO_INCREMENT PRIMARY KEY NOT NULL,
  date TIMESTAMP DEFAULT CURRENT_TIMESTAMP NOT NULL,
  email VARCHAR(128) UNIQUE NOT NULL,
  name VARCHAR(60) NOT NULL,
  password VARCHAR(64) NOT NULL,
);


CREATE TABLE tasks (
  task_id INT unsigned AUTO_INCREMENT PRIMARY KEY NOT NULL,
  add_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP NOT NULL,
  status TINYINT(1) DEFAULT 0 NOT NULL,
  title VARCHAR(255) NOT NULL,
  -- file BLOB,
  deadline_date TIMESTAMP NULL,
  user_id INT NOT NULL,
  FOREIGN KEY (user_id) REFERENCES users (user_id),
  project_id INT NOT NULL,
  FOREIGN KEY (project_id) REFERENCES projects (project_id)

);

CREATE TABLE projects (
  project_id INT unsigned AUTO_INCREMENT PRIMARY KEY NOT NULL,
  headline VARCHAR(255) UNIQUE NOT NULL,
  user_id INT NOT NULL,
  FOREIGN KEY (user_id) REFERENCES users (user_id)
);

