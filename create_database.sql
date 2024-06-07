
-- Script de criação do banco de dados

CREATE DATABASE projeto;

USE projeto;

-- Tabela de Usuários
CREATE TABLE USUARIOS (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    telefone VARCHAR(15) NOT NULL,
    sexo VARCHAR(10) NOT NULL,
    data_nascimento DATE NOT NULL,
    cidade VARCHAR(100) NOT NULL,
    estado VARCHAR(50) NOT NULL,
    endereco VARCHAR(255) NOT NULL,
    senha VARCHAR(255) NOT NULL,
    tipo_usuario ENUM('aluno', 'gestor') NOT NULL DEFAULT 'aluno'
);

-- Usuário gestor padrão
INSERT INTO USUARIOS (nome, email, telefone, sexo, data_nascimento, cidade, estado, endereco, senha, tipo_usuario)
VALUES ('Admin', 'admin@example.com', '000000000', 'Outro', '2000-01-01', 'Cidade', 'Estado', 'Endereço', 'senha_hash_aqui', 'gestor');
