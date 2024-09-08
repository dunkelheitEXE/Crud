CREATE DATABASE CrudDb;
USE CrudDb;

CREATE TABLE users(
    user_id BIGINT NOT NULL AUTO_INCREMENT,
    user_name VARCHAR(255) NOT NULL,
    user_email VARCHAR(255) NOT NULL,
    user_password VARCHAR(255) NOT NULL,
    PRIMARY KEY(user_id)
);

CREATE TABLE tasks (
    task_id BIGINT NOT NULL AUTO_INCREMENT,
    task_name VARCHAR(255) NOT NULL,
    task_description VARCHAR(255) NOT NULL,
    task_scale INT NOT NULL,
    task_user BIGINT NOT NULL,
    PRIMARY KEY(task_id),
    FOREIGN KEY(task_user) REFERENCES users(user_id) ON DELETE CASCADE ON UPDATE CASCADE
);

ALTER TABLE tasks ADD task_date DATETIME NOT NULL;

ALTER TABLE users MODIFY user_email VARCHAR(255) UNIQUE NOT NULL;

SELECT * FROM users;