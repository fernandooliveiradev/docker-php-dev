-- Script de inicialização do banco de dados
-- Este script será executado quando o contêiner MySQL for iniciado pela primeira vez

CREATE DATABASE IF NOT EXISTS app_db CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

USE app_db;

-- Criar tabela de usuários
CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Inserir usuário admin padrão (senha: admin123)
INSERT INTO users (name, email, password) VALUES
('Administrador', 'admin@example.com', '$2y$10$8b2erCnTZ6NYAm91..1YJOtNwnkBctqEpN4pw00Rt4qfr.TD2QZ0i');

-- Criar tabela de leads
CREATE TABLE IF NOT EXISTS leads (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    phone VARCHAR(20),
    email VARCHAR(100),
    source VARCHAR(50) DEFAULT 'site',
    status ENUM('Novo', 'Em contato', 'Proposta enviada', 'Negociação', 'Fechado') DEFAULT 'Novo',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- Inserir alguns leads de exemplo
INSERT INTO leads (name, phone, email, source, status) VALUES
('Carlos Silva', '(11) 99999-1234', 'carlos.silva@email.com', 'site', 'Novo'),
('Maria Oliveira', '(21) 98888-5678', 'maria.oliveira@email.com', 'indicação', 'Em contato'),
('João Santos', '(31) 97777-9012', 'joao.santos@email.com', 'anúncio', 'Proposta enviada');
</content>
</content>