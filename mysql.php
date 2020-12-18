<?php
//12. Виконати нормалізацію (MySQL).
//Виконати нормалізацію даного відношення реляційної БД до ЗНФ, ідентицікувавши первинний ключ та функціональні залежності. Представити реляційну схему отриманої БД.
//Бібліотека (id абонента, ім'я абонента, рік народження абонента, стать абонента, адреса абонента, ід книги, назва книги, автор книги, рік видання книги, видавництво книги, дата видачі книги на руки, дата повернення книги у бібліотеку).

$pic = 'Task/db_schema.jpg';

// 13. Виконати вибірку (MySQL).
//Створити таблиці.

$mysql = "CREATE TABLE `migration` (
                            migration_id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
                            migration_name INT);
CREATE INDEX idx_migration_id
   ON migration (migration_id);

INSERT INTO `migration` (migration_id, migration_name) VALUES (1, 10), (2, 11), (3, 12)";

$mysql = "CREATE TABLE `user` (
                     user_id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
                     user_name varchar(128));
CREATE INDEX idx_user_id
   ON user (user_id);

INSERT INTO `user` (user_id, user_name) VALUES (1, 'Igor'), (2, 'Ira'), (3, 'Max')";

$mysql = "CREATE TABLE `relations` (
                            no INT NOT NULL AUTO_INCREMENT,
                            user_id INT NOT NULL,
                            migration_id INT NOT NULL,

                                PRIMARY KEY(no),
                            INDEX (user_id),
                            INDEX (migration_id),

                            FOREIGN KEY (user_id)
                                REFERENCES user(user_id)
                                ON UPDATE CASCADE ON DELETE RESTRICT,

                            FOREIGN KEY (migration_id)
                                REFERENCES migration(migration_id))

INSERT INTO `relations` (user_id, migration_id) VALUES (1, 3), (2, 2), (3, 1), (3,3), (3,2), (1,2)";

// Потрібно написати вибірку даних

$mysql = "SELECT u.user_name, m.migration_name FROM relations
INNER JOIN migration m ON relations.migration_id = m.migration_id
INNER JOIN user u ON relations.user_id = u.user_id";

//14. Виконати вибірку (MySQL).
//Є дві таблиці:
//user - таблиця з користувачами (users_id, name)
//order - таблиця із замовленнями (orders_id, users_id, status)
//Вибрати всіх користувачів з таблиці user, у яких більше 5 записів в таблиці order мають status = 1

$mysql = "SELECT u.user_id, u.user_name FROM `order` o
    JOIN user u ON u.user_id = o.user_id
        WHERE o.status = 1 
        GROUP BY o.user_id
        HAVING COUNT(o.status) > 5";

//15. Вивести унікальні значення (MySQL).
//Написати запит, який виведе тільки унікальні значення із стовпця name.

$mysql = "SELECT name FROM `user` GROUP BY name HAVING COUNT(name) = 1";