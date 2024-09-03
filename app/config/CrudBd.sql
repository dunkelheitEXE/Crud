CREATE DATABASE CrudDb;
USE CrudDb;

CREATE TABLE users(
    user_id BIGINT NOT NULL AUTO_INCREMENT,
    user_name VARCHAR(255) NOT NULL,
    user_email VARCHAR(255) NOT NULL,
    user_password VARCHAR(255) NOT NULL,
    PRIMARY KEY(user_id)
);

SELECT * FROM users;