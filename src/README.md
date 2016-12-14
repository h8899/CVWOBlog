### Creating the MySQL Database

Create database "login" and create tables "members" and "loginAttempts" :

```sql
CREATE TABLE `login`.`members` ( 
`id` INT(25) NOT NULL ,
`username` VARCHAR(25) NOT NULL , 
`password` INT(25) NOT NULL ,
`email` VARCHAR(25) NOT NULL ) ENGINE = InnoDB;

CREATE TABLE `login`.`posts` ( `
id` INT(25) NOT NULL , 
`author` VARCHAR(25) NOT NULL , 
`title` VARCHAR(25) NOT NULL , 
`content` TEXT NOT NULL , 
`tags` VARCHAR(25) NOT NULL ) ENGINE = InnoDB;
```
### Setup the `code/login/dbconf.php` file
```php
<?php
    //DATABASE CONNECTION VARIABLES
    $host = "localhost"; // Host name
    $username = "user"; // Mysql username
    $password = ""; // Mysql password
    $db_name = "login"; // Database name

