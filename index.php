<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <title>Gerenciador de Tarefas</title>
</head>
<body>
<div class="container mt-5">
    <h1 class="text-center">Gerenciador de Tarefas</h1>

    <!-- Formulário para adicionar tarefa -->
    <form id="formTarefa" class="mb-4">
        <div class="mb-3">
            <label for="titulo" class="form-label">Título</label>
            <input type="text" class="form-control" id="titulo" name="titulo" required>
        </div>
        <div class="mb-3">
            <label for="descricao" class="form-label">Descrição</label>
            <textarea class="form-control" id="descricao" name="descricao" required></textarea>
        </div>
        <div class="mb-3">
            <label for="prazo" class="form-label">Prazo</label>
            <input type="date" class="form-control" id="prazo" name="prazo" required>
        </div>
        <button type="submit" class="btn btn-primary">Adicionar Tarefa</button>
    </form>

    <!-- Lista de tarefas -->
    <div id="listaTarefas"></div>
</div>

<script src="js/bootstrap.bundle.min.js"></script>
<script src="js/script.js"></script>
</body>
</html>
