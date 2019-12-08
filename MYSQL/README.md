[# MySQL: Полный список часто используемых и полезных команд](https://artkiev.com/blog/mysql-full-list-commands.htm)  
[# MySQL: Извлечение из дампа только структуры](https://artkiev.com/blog/mysql-dump-extract-one-table.htm)  
[# MySQL - выбираем тип хранения данных MyISAM или InnoDB](https://artkiev.com/blog/mysql-myisam-or-innobd.htm)  
[# Клонирование таблиц в MySQL](https://artkiev.com/blog/mysql-clone-table.htm)  
[# MySQL - конвертация базы из Win-1251 в UTF-8](https://artkiev.com/blog/mysql-cp1251-to-utf8.htm)  
[[Сравнение таблиц в MySQL](https://artkiev.com/blog/mysql-compare-table.htm)](https://artkiev.com/blog/mysql-compare-table.htm)  
[[Как узнать самые ненужные индексы в MySQL](https://artkiev.com/blog/mysql-unnecessary-indexes.htm)](https://artkiev.com/blog/mysql-unnecessary-indexes.htm)  
[[MySQL - удаление одним запросом записей в нескольких таблицах](https://artkiev.com/blog/mysql-one-query-delete.htm)](https://artkiev.com/blog/mysql-one-query-delete.htm)  


/opt/lampp/bin/mysql -uroot -p  
SHOW DATABASES;  
DROP DATABASE kbm;  
CREATE DATABASE kbm;  

mysql -h pooh.ilay.pp.ru -udan -p igrajdanin_main_2 < /opt/lampp/htdocs/coin/igrajdanin_main.sql;  
/opt/lampp/bin/mysql -uroot igrajdanin_main < /opt/lampp/htdocs/coin/igrajdanin_main.sql  


Сделать дамп структуры одной таблицы mysql (без данных):  
mysqldump -u[user] -p[password] -h[host] [database] [table_name] --no-data > /path/dump_name.sql  

Например, задампим таблицу users из базы данных mydatabase:  
mysqldump -uroot mydatabase users > users.dump.sql  


Сделать бэкап базы database в файл dump_name.sql  
mysqldump -u [username] -p [password] [database] > [dump_name.sql]  

// вывести одинаковые значения  
select email from block_users t1 where exists (select 1 from block_users t2 where t1.email=t2.email and t1.uid<>t2.uid)   

<hr>  
CREATE TABLE `copy` SELECT * FROM `origin` // копия отдельной таблицы  
SELECT `cur`, count(`cur`) FROM `currencies` Group by `cur` having Count(*) > 1  

TRUNCATE TABLE `fff`  
DROP TABLE `coins`  

Если таблица не существует, вы можете создать ее с такой же схемой:  
CREATE TABLE table2 LIKE table1;  
Затем, чтобы скопировать данные:  

INSERT INTO table2 SELECT * FROM table1  
