drop database if exists basic;

create database if not exists basic;

use basic;

create table user(
    id int AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(225),
    email VARCHAR(225),
    password varchar(225)
);