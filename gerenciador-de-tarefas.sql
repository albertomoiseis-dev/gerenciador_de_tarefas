CREATE DATABASE gerenciador_tarefas;

USE gerenciador_tarefas;

CREATE TABLE tarefas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    titulo VARCHAR(100) NOT NULL,
    descricao TEXT NOT NULL,
    prazo DATE NOT NULL,
    status ENUM('pendente', 'concluida') DEFAULT 'pendente'
);
