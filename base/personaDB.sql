CREATE DATABASE Persona;
USE Persona;
CREATE TABLE Personas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(50) NOT NULL,
    apellido VARCHAR(50) NOT NULL,
    email VARCHAR(100) NOT NULL,
    fecha_nacimiento DATE NOT NULL,
    telefono VARCHAR(20) NOT NULL,
    genero CHAR(1) NOT NULL,
    pais VARCHAR(50) NOT NULL
);