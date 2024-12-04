document.addEventListener('DOMContentLoaded', () => {
  const formTarefa = document.getElementById('formTarefa');
  const listaTarefas = document.getElementById('listaTarefas');

  // Função para carregar tarefas
  const carregarTarefas = async () => {
      const response = await fetch('php/acoes.php', {
          method: 'POST',
          headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
          body: 'acao=listar'
      });
      const tarefas = await response.json();

      listaTarefas.innerHTML = tarefas.map(tarefa => `
          <div class="card mb-3">
              <div class="card-body">
                  <h5 class="card-title">${tarefa.titulo} (${tarefa.status})</h5>
                  <p class="card-text">${tarefa.descricao}</p>
                  <p class="card-text"><small>Prazo: ${tarefa.prazo}</small></p>
                  <button class="btn btn-success" onclick="concluirTarefa(${tarefa.id})">Concluir</button>
                  <button class="btn btn-danger" onclick="removerTarefa(${tarefa.id})">Remover</button>
              </div>
          </div>
      `).join('');
  };

  // Adicionar tarefa
  formTarefa.addEventListener('submit', async (e) => {
      e.preventDefault();
      const formData = new FormData(formTarefa);
      formData.append('acao', 'adicionar');

      await fetch('php/acoes.php', {
          method: 'POST',
          body: formData
      });

      formTarefa.reset();
      carregarTarefas();
  });

  // Concluir tarefa
  window.concluirTarefa = async (id) => {
      await fetch('php/acoes.php', {
          method: 'POST',
          headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
          body: `acao=concluir&id=${id}`
      });
      carregarTarefas();
  };

  // Remover tarefa
  window.removerTarefa = async (id) => {
      await fetch('php/acoes.php', {
          method: 'POST',
          headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
          body: `acao=remover&id=${id}`
      });
      carregarTarefas();
  };

  // Inicializa a lista de tarefas
  carregarTarefas();
});
