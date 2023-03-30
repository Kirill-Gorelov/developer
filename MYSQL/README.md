[# MySQL: Полный список часто используемых и полезных команд](https://artkiev.com/blog/mysql-full-list-commands.htm)  
[# MySQL: Извлечение из дампа только структуры](https://artkiev.com/blog/mysql-dump-extract-one-table.htm)  
[# MySQL - выбираем тип хранения данных MyISAM или InnoDB](https://artkiev.com/blog/mysql-myisam-or-innobd.htm)  
[# Клонирование таблиц в MySQL](https://artkiev.com/blog/mysql-clone-table.htm)  
[# MySQL - конвертация базы из Win-1251 в UTF-8](https://artkiev.com/blog/mysql-cp1251-to-utf8.htm)  
[[Сравнение таблиц в MySQL](https://artkiev.com/blog/mysql-compare-table.htm)](https://artkiev.com/blog/mysql-compare-table.htm)  
[[Как узнать самые ненужные индексы в MySQL](https://artkiev.com/blog/mysql-unnecessary-indexes.htm)](https://artkiev.com/blog/mysql-unnecessary-indexes.htm)  
[[MySQL - удаление одним запросом записей в нескольких таблицах](https://artkiev.com/blog/mysql-one-query-delete.htm)](https://artkiev.com/blog/mysql-one-query-delete.htm)  
[[Если забыл пароль от root](https://help.reg.ru/support/hosting/bazy-dannykh/kak-sbrosit-root-parol-v-mysql)]

```sql
/opt/lampp/bin/mysql -uroot -p  
SHOW DATABASES;  
DROP DATABASE kbm;  
CREATE DATABASE kbm;  
```

mysql -h pooh.ilay.pp.ru -udan -p igrajdanin_main_2 < /opt/lampp/htdocs/coin/igrajdanin_main.sql;  
```sql
/opt/lampp/bin/mysql -uroot igrajdanin_main < /opt/lampp/htdocs/coin/igrajdanin_main.sql  
```


Сделать дамп структуры одной таблицы mysql (без данных):  
```
mysqldump -u[user] -p[password] -h[host] [database] [table_name] --no-data > /path/dump_name.sql 
``` 

Например, задампим таблицу users из базы данных mydatabase:  
```
mysqldump -uroot mydatabase users > users.dump.sql  
```


Сделать бэкап базы database в файл dump_name.sql  
```
mysqldump -u [username] -p [password] [database] > [dump_name.sql]  
```

// вывести одинаковые значения  
```sql
select email from block_users t1 where exists (select 1 from block_users t2 where t1.email=t2.email and t1.uid<>t2.uid)   
```

<hr>  

```sql
CREATE TABLE `copy` SELECT * FROM `origin` // копия отдельной таблицы  
SELECT `cur`, count(`cur`) FROM `currencies` Group by `cur` having Count(*) > 1  
```

```sql
TRUNCATE TABLE `fff`  
DROP TABLE `coins` 
``` 

Если таблица не существует, вы можете создать ее с такой же схемой:  
```sql
CREATE TABLE table2 LIKE table1;  
```

Затем, чтобы скопировать данные:  
```sql
INSERT INTO table2 SELECT * FROM table1 
``` 


Вывести размер таблиц в БД с сортировкой по уменьшения
```sql
SELECT table_name AS `Table`, round(((data_length + index_length) / 1024 / 1024), 2) `Size in MB` FROM information_schema.TABLES WHERE table_schema = "имя_БД" ORDER BY `Size in MB` DESC
```

Вывести размер отдельной таблицы в БД
```sql
SELECT 
    table_name AS `Table`, 
    round(((data_length + index_length) / 1024 / 1024), 2) `Size in MB` 
FROM information_schema.TABLES 
WHERE table_schema = "имя_БД"
    AND table_name = "имя_таблицы";
```

Вывести все тяженые таблицы из всех БД
```sql
SELECT 
     table_schema as `Database`, 
     table_name AS `Table`, 
     round(((data_length + index_length) / 1024 / 1024), 2) `Size in MB` 
FROM information_schema.TABLES 
ORDER BY (data_length + index_length) DESC;
```

> источник https://pacificsky.ru/recepty/sql/mysql/140-mysql-kak-uznat-razmer-tablicy-v-baze-dannyh.html


Вывести размеб всех БД по уменьшению
```sql 
SELECT table_schema "database_name", sum( data_length + index_length )/1024/1024 "database size in MB" FROM information_schema.TABLES GROUP BY table_schema ORDER BY `database size in MB` DESC
```

Вывести размер только одной БД  
```sql
SELECT table_schema "database_name", sum( data_length + index_length )/1024/1024 "database size in MB" FROM information_schema.TABLES WHERE table_schema="имя_БД"
```
>Источник https://vds-admin.ru/mysql/%D1%83%D0%B7%D0%BD%D0%B0%D1%82%D1%8C-%D1%80%D0%B0%D0%B7%D0%BC%D0%B5%D1%80-%D0%B1%D0%B0%D0%B7%D1%8B-%D0%B4%D0%B0%D0%BD%D0%BD%D1%8B%D1%85-%D1%87%D0%B5%D1%80%D0%B5%D0%B7-%D0%BA%D0%BE%D0%BD%D1%81%D0%BE%D0%BB%D1%8C-mysql