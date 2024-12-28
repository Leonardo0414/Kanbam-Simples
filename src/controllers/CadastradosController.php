<?php
//CAMINHO
require_once __DIR__ . '/../services/BancoDeDados.php';
class CadastradosController {
    private $banco;
    public function __construct() {
        $this->banco = new BancoDeDados();
    }

    // LISTAR TAREFAS POR STATUS
    public function listarTarefasPorStatus($status) {
        $sql = "
            SELECT 
                tarefas.*, 
                usuarios.nome AS nome_usuario 
            FROM 
                tarefas 
            LEFT JOIN 
                usuarios 
            ON 
                tarefas.id_usuario = usuarios.id_usuario 
            WHERE 
                situacao = ?
        ";
        return $this->banco->consultar($sql, [$status], true);
    }

    // FUNCAO PARA ALTERAR O STATUS
    public function alterarStatus($id_tarefa, $novoStatus) {
       
            $sql = "UPDATE tarefas SET situacao = ? WHERE id_tarefa = ?";
            $this->banco->executarComando($sql, [$novoStatus, $id_tarefa]);
            header("Location: ../views/Tarefas/cadastrados.php");
            exit;
    }

    //FUNCAO EXCLUIR TAREFA
    public function excluirTarefa($id_tarefa) {
            $sql = "DELETE FROM tarefas WHERE id_tarefa = ?";
            $this->banco->executarComando($sql, [$id_tarefa]);
            header("Location: ../views/Tarefas/cadastrados.php");
            exit;

    }
}

// CONTROLE DE ROTAS
if (isset($_GET['acao'])) {
    $controller = new CadastradosController();
    switch ($_GET['acao']) {
        case 'alterarStatus':
            $controller->alterarStatus($_POST['id_tarefa'], $_POST['situacao']);
            break;

        case 'excluir':
            $controller->excluirTarefa($_GET['id_tarefa']);
            break;
    }
}
