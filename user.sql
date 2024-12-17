CREATE DATABASE utilisateurs_data;

USE utilisateurs_data;

CREATE TABLE utilisateurs (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    email VARCHAR(100) NOT NULL,
    adresse VARCHAR(50) NOT NULL,
    ville VARCHAR(50) NOT NULL,
    code_postal VARCHAR(5) NOT NULL
);