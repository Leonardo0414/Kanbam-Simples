<?php
require_once __DIR__ . '/../services/BancoDeDados.php';
class TarefaController {
    private $banco;
    public function __construct() {
        $this->banco = new BancoDeDados();
    }

    // FUNCAO PARA ATUALIZAR TAREFA OU SALVAR
    public function salvarTarefa($dados) {
            if ($dados['id_tarefa'] == 'NOVO') {
                $sql = "INSERT INTO tarefas (descricao, setor, prioridade, situacao, id_usuario) 
                        VALUES (?, ?, ?, ?, ?)";
                $this->banco->executarComando($sql, [
                    $dados['descricao'],
                    $dados['setor'],
                    $dados['prioridade'],
                    $dados['situacao'],
                    $dados['id_usuario']
                ]);
                echo "<script>
                        alert('Tarefa salva com sucesso!');
                        window.location.href = '../views/Tarefas/cadastrados.php';
                      </script>";
            } else {
                $sql = "UPDATE tarefas SET descricao = ?, setor = ?, prioridade = ?, situacao = ?, id_usuario = ? 
                        WHERE id_tarefa = ?";
                $this->banco->executarComando($sql, [
                    $dados['descricao'],
                    $dados['setor'],
                    $dados['prioridade'],
                    $dados['situacao'],
                    $dados['id_usuario'],
                    $dados['id_tarefa']
                ]);
                echo "<script>
                        alert('Tarefa atualizada com sucesso!');
                        window.location.href = '../views/Tarefas/cadastrados.php';
                      </script>";

                      exit;
            }
    }
}

// CONTROLE DE ROTAS
if (isset($_GET['acao'])) {
    $controller = new TarefaController();
    switch ($_GET['acao']) {
        case 'salvar':
            $controller->salvarTarefa($_POST);
            break;
    }
}
