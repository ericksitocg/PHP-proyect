create database login_example;
use login_example;

create table usuarios(id int AUTO_INCREMENT primary key,user varchar(50) not null, password varchar(50) not null);
create table info_usuarios(id_info int AUTO_INCREMENT primary key,id_usuario int,nombre varchar(50),apellido varchar(50),descripcion varchar(300),FOREIGN KEY (id_usuario) REFERENCES usuarios(id));
insert into usuarios(user,password) values ("erihucor","12345");
insert into info_usuarios(id_usuario,nombre,apellido,descripcion) values (1,"Erick","Cordova Gavilanes","Descripcion de erick");

insert into usuarios(user,password) values ("admin","admin");
insert into info_usuarios(id_usuario,nombre,apellido,descripcion) values (2,"Nathaly","Gavilanes Ramirez","Descripcion de nathaly");
