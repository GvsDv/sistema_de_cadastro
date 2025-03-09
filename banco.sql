CREATE DATABASE IF NOT EXISTS tarefas_db;
USE tarefas_db;

CREATE TABLE IF NOT EXISTS usuarios (
    Id int AUTO_INCREMENT PRIMARY KEY,
    Nome varchar(255) NOT NULL,
    Idade int NOT NULL,
    Email varchar(255) NOT NULL,
    Tarefas varchar(255) NOT NULL
); 
