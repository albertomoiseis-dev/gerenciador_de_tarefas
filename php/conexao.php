<?php
$servidor = 'localhost';
$banco = 'gerenciador_tarefas';
$usuario = 'root'; // Altere para o seu usuário
$senha = '074611'; // Altere para sua senha

try {
    $conexao = new PDO("mysql:host=$servidor;dbname=$banco", $usuario, $senha);
    $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $erro) {
    die("Erro ao conectar com o banco de dados: " . $erro->getMessage());
}
?>
