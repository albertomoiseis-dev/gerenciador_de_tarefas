<?php
include 'conexao.php';

$acao = $_POST['acao'] ?? null;

if ($acao === 'adicionar') {
    $titulo = $_POST['titulo'];
    $descricao = $_POST['descricao'];
    $prazo = $_POST['prazo'];

    $stmt = $conexao->prepare("INSERT INTO tarefas (titulo, descricao, prazo) VALUES (?, ?, ?)");
    $stmt->execute([$titulo, $descricao, $prazo]);
    echo "Tarefa adicionada com sucesso!";
} elseif ($acao === 'listar') {
    $stmt = $conexao->query("SELECT * FROM tarefas");
    echo json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));
} elseif ($acao === 'concluir') {
    $id = $_POST['id'];
    $stmt = $conexao->prepare("UPDATE tarefas SET status = 'concluida' WHERE id = ?");
    $stmt->execute([$id]);
    echo "Tarefa marcada como concluída!";
} elseif ($acao === 'remover') {
    $id = $_POST['id'];
    $stmt = $conexao->prepare("DELETE FROM tarefas WHERE id = ?");
    $stmt->execute([$id]);
    echo "Tarefa removida com sucesso!";
}
