<?php
// Includes e consulta
require_once '../../services/BancoDeDados.php';
$banco = new BancoDeDados();

$id_tarefa = $_GET['id_tarefa'] ?? null;

if ($id_tarefa) {
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
            id_tarefa = ?";
    $tarefa = $banco->consultar($sql, [$id_tarefa]);
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Tarefas</title>
    <link rel="stylesheet" href="../../../assets/css/style.css">
</head>
<body>
      <!--BARRA CSS-->
    <header class="navbar">
        <h1>Gerenciamento de Tarefas</h1>
        <ul>
              <!--CAMMINHOS DAS TELAS-->
            <li><a href="../../../index.php">Início</a></li>
            <li><a href="../Usuarios/index.php">Cadastro de Usuários</a></li>
            <li><a href="cadastrados.php">Tarefas Cadastradas</a></li>
        </ul>
    </header>

    <main class="content-section">
        <h2>Cadastro de Tarefas</h2>
        <form action="../../controllers/TarefaController.php?acao=salvar" method="POST" class="form-container"> <!--ENVIO DOS DADOS +FORMUALRIO CSS-->
            <!-- CAMPO DO ID -->
            <div class="form-group">
                <label for="txt_IDTarefa">ID</label>
                <input type="text" id="txt_IDTarefa" name = "id_tarefa" value="NOVO" readonly>
            </div>
            <!--CAMPO DA DESCRICAO-->
            <div class="form-group">
                <label for="txt_descricao">Descrição</label>
                <input type="text" id="txt_descricao" name = "descricao" required>
            </div>
            <!--CAMPO DO SETOR-->
            <div class="form-group">
                <label for="txt_setor">Setor:</label>
                <input type="text" id="txt_setor" name = "setor" required>
            </div>
            <!--CAMPO DO LISTAR USUARIOS-->
            <div class="form-group">
                <label for="txt_listUsuario">Usuário:</label>
                <select name="id_usuario" id="txt_listUsuario" required>
                    <!--VALOR RETORNO DA CONSULTA ID-->
                    <?php
                    $usuarios = $banco->consultar("SELECT id_usuario, nome FROM usuarios", [], true);
                    foreach ($usuarios as $usuario) {
                        echo "<option value='{$usuario['id_usuario']}'>{$usuario['nome']}</option>";
                    }
                    ?>
                </select>
            </div>
            <!--LISTA DE OPCAO-->
            <div class="form-group">
                <label for="txt_listPrioridade">Prioridade:</label>
                <select name="prioridade" id="txt_listPrioridade" required>
                    <option value="Alta">Alta</option>
                    <option value="Média">Média</option>
                    <option value="Baixa">Baixa</option>
                </select>
            </div>

            <!-- CAMPO OCULTO DA SITUACAO -->
            <input type="hidden" name="situacao" value="fazer">
            <!--CAMPO DO BOTAO-->
            <div class="form-group">
                <button type="submit">Salvar</button>
            </div>
        </form>

        <!-- SCRIPT SE TIVER DADOS NA URL-->
        <?php if (!empty($tarefa)): ?>
        <script>
            document.getElementById('txt_IDTarefa').value = "<?= $tarefa['id_tarefa'] ?>";
            document.getElementById('txt_descricao').value = "<?= $tarefa['descricao'] ?>";
            document.getElementById('txt_setor').value = "<?= $tarefa['setor'] ?>";
            document.getElementById('txt_listUsuario').value = "<?= $tarefa['id_usuario'] ?>";
            document.getElementById('txt_listPrioridade').value = "<?= $tarefa['prioridade'] ?>";
        </script>
        <?php endif; ?>
    </main>
</body>
</html>
