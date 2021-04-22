create database poemas;
use poemas;

create table poema(id int AUTO_INCREMENT PRIMARY KEY,autor varchar(60),contenido varchar(800),titulo varchar(100));

/*
CSV TO SQL TABLE (MySQL console)
LOAD DATA LOCAL INFILE 'C:\\wamp64\\www\\php_proyect\\datasets\\poemas.csv' INTO TABLE poema FIELDS TERMINATED BY ',' ENCLOSED BY '"' IGNORE 1 ROWS;
https://phoenixnap.com/kb/import-csv-file-into-mysql
*/

/*Agregar campo ID, debe ser PK o sale error
alter table poema add id int auto_increment primary key;
*/
