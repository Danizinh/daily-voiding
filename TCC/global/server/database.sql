CREATE DATABASE IF NOT EXISTS dados;

USE dados;

CREATE TABLE
    IF NOT EXISTS usuarios (
        id INT AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(30),
        sobrenome VARCHAR(40),
        email VARCHAR(50) UNIQUE,
        senha_crypt VARCHAR(255)
    );

CREATE TABLE
    IF NOT EXISTS medico (
        id INT AUTO_INCREMENT PRIMARY KEY,
        nameMedico VARCHAR(225),
        crm VARCHAR(15),
        idUsuario INT,
        FOREIGN KEY (idUsuario) REFERENCES usuarios(id)
    );

CREATE TABLE
    IF NOT EXISTS pacientes (
        id INT AUTO_INCREMENT PRIMARY KEY,
        aniversario DATE,
        tel VARCHAR(15),
        CEP VARCHAR(9),
        endereco VARCHAR (225),
        bairro VARCHAR(225),
        cidade VARCHAR(255),
        UF VARCHAR(3),
        genero VARCHAR(1),
        CPF VARCHAR(11),
        id_medico INT,
        id_usuario INT NOT NULL,
        FOREIGN KEY (id_usuario) REFERENCES usuarios(id)
    );

CREATE TABLE
    IF NOT EXISTS miccao (
        id INT AUTO_INCREMENT PRIMARY KEY,
        urgencia VARCHAR(30) DEFAULT ' ',
        horario DATETIME,
        tipo int not null,
        volumeUrinado INT NOT NULL,
        idPaciente INT NOT NULL,
        FOREIGN KEY (idPaciente) REFERENCES pacientes(id)
    );

CREATE TABLE
reset (
        id INT AUTO_INCREMENT PRIMARY KEY,
        code VARCHAR(255) NOT NULL,
        email VARCHAR(255) NOT NULL
    );

SELECT * FROM usuarios;

SELECT * FROM pacientes;

SELECT * FROM miccao;

SELECT * FROM medico;

DROP DATABASE dados;

DELETE FROM miccao;