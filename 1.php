<?php
/*
CREATE TABLE `users` (
    `id` INT(11) NOT NULL AUTO_INCREMENT,
	`name` VARCHAR(255) DEFAULT NULL,
	`gender` TINYINT NOT NULL COMMENT '1 - мужчина, 2 - женщина.',
	`age` INT(11) NOT NULL COMMENT 'Возраст',
	PRIMARY KEY (`id`)
);

CREATE INDEX index_name ON users (name);
CREATE INDEX index_gender ON users (gender);
CREATE INDEX index_age ON users (age);

CREATE TABLE `phone_numbers` (
    `id` INT(11) NOT NULL AUTO_INCREMENT,
	`user_id` INT(11) NOT NULL,
	`phone`	VARCHAR(255) DEFAULT NULL,
	PRIMARY KEY (`id`)
);

CREATE INDEX index_user_id ON phone_numbers (user_id);

Поле gender в таблице users нет необходимости создавать с типом int. Достаточно типа tinyint. Это позволит экономить пространство на диске.
Добавлены индексы для полей name, gender, age в таблице users и user_id в таблице phone_numbers для быстрой выборки данных.

SELECT
    name,
    COUNT(phone_numbers.user_id) as number_cnt
FROM
    users
LEFT JOIN phone_numbers ON
    phone_numbers.user_id = users.id
WHERE
    users.gender = 2 AND
    users.age BETWEEN 18 AND 20
GROUP BY
users.id;

*/