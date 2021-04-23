create database login_example;
use login_example;

create table usuarios(id int AUTO_INCREMENT primary key,user varchar(50) not null, password varchar(50) not null);

insert into usuarios(user,password) values ("erihucor","12345");
insert into usuarios(user,password) values ("admin","admin");
