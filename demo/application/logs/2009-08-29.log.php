<?php defined('SYSPATH') or die('No direct script access.'); ?>

2009-08-29 12:10:18 +02:00 --- error: Uncaught PHP Error: mysql_connect() [<a href='function.mysql-connect'>function.mysql-connect</a>]: Access denied for user 'dbuser'@'localhost' (using password: YES) in file system/libraries/drivers/Database/Mysql.php on line 61
2009-08-29 12:10:51 +02:00 --- error: Uncaught Kohana_Database_Exception: There was an error connecting to the database: Unknown database 'kohana' in file system/libraries/Database.php on line 223
2009-08-29 12:10:51 +02:00 --- error: Uncaught Kohana_Database_Exception: There was an error connecting to the database: Unknown database 'kohana' in file system/libraries/Database.php on line 223
2009-08-29 12:17:52 +02:00 --- error: Uncaught Kohana_Database_Exception: There was an SQL error: Unknown column 'contact_id' in 'order clause' - SELECT SQL_CALC_FOUND_ROWS(`id`), `text`, `date`
FROM (`demotable`)
ORDER BY `contact_id` ASC
LIMIT 0, 10 in file system/libraries/drivers/Database/Mysql.php on line 371
2009-08-29 12:17:53 +02:00 --- error: Uncaught Kohana_Database_Exception: There was an SQL error: Unknown column 'contact_id' in 'order clause' - SELECT SQL_CALC_FOUND_ROWS(`id`), `text`, `date`
FROM (`demotable`)
ORDER BY `contact_id` ASC
LIMIT 0, 10 in file system/libraries/drivers/Database/Mysql.php on line 371
2009-08-29 12:18:30 +02:00 --- error: Uncaught Kohana_Exception: Unknown property in file modules/YAG/libraries/Field.php on line 131
