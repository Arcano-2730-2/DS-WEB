CREATE DATABASE flor;
CREATE TABLE usuario (id int PRIMARY KEY AUTO_INCREMENT, nome varchar(30), email varchar(40), senha varchar(9));
CREATE TABLE produto (id int PRIMARY KEY AUTO_INCREMENT, nome varchar(30), descricao varchar(90),valor float);
