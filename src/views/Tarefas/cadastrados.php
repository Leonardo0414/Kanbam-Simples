<?php
//INCLUDES CAMIHO ABSOLUTO DO DIRETORORIO
require_once __DIR__ . '/../../controllers/CadastradosController.php';
$controller = new CadastradosController();
//ENVIO PARA FUNCOES
$tarefasFazer =   $controller->listarTarefasPorStatus('fazer');
$tarefasFazendo = $controller->listarTarefasPorStatus('fazendo');
$tarefasPronto =  $controller->listarTarefasPorStatus('pronto');
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tarefas Cadastradas</title>
    <link rel="stylesheet" href="../../../assets/css/style.css"><!--CSS-->
</head>
<body>
         <!--BARRA CSS-->
    <header class="navbar">
        <h1>Gerenciamento de Tarefas</h1>
        <ul>
              <!--CAMMINHOS DAS TELAS-->
            <li><a href="../../../index.php">Início</a></li>
            <li><a href="index.php">Cadastro de Tarefas</a></li>
            <li><a href="../Usuarios/index.php">Cadastro de Usuários</a></li>
        </ul>
    </header>

    <main class="content-section">
        <!-- <div class="tarefas-container"> -->
            <div class="colunas-tarefas">
                
<!--1° COLUNA DO FAZER -->
     <div class="coluna">
        <h3>A Fazer</h3>
            <?php foreach ($tarefasFazer as $tarefa): ?>
                <div class="card">
                    <p><strong>Descrição:</strong> <?= $tarefa['descricao'] ?></p>
                     <p><strong>Setor:</strong> <?= $tarefa['setor'] ?></p>
                     <p><strong>Prioridade:</strong> <?= $tarefa['prioridade'] ?></p>
                     <p><strong>Vinculado a:</strong> <?= $tarefa['nome_usuario'] ?></p>
                     <form action="../../controllers/CadastradosController.php?acao=alterarStatus" method="POST">
                        <input type="hidden" name="id_tarefa" value="<?= $tarefa['id_tarefa'] ?>">
                        <select name="situacao" required>
                          <option value="">Escolha...</option>
                           <option value="Fazendo">Fazendo</option>
                          <option value="Pronto">Pronto</option>
                         </select>
                            <button type="submit">Alterar Status</button>
                       </form>
                         <a href="index.php?id_tarefa=<?= $tarefa['id_tarefa'] ?>" class="btn-link">Editar</a> 
                        <a href="../../controllers/CadastradosController.php?acao=excluir&id_tarefa=<?= $tarefa['id_tarefa'] ?>" class="btn-link">Excluir</a>
                </div>
             <?php endforeach; ?>
      </div>

 <!-- 2° COLUNA DO FAZENDO -->
   <div class="coluna">
      <h3>Fazendo</h3>
                    <?php foreach ($tarefasFazendo as $tarefa): ?>
                        <div class="card">
                            <p><strong>Descrição:</strong> <?= $tarefa['descricao'] ?></p>
                            <p><strong>Setor:</strong>      <?= $tarefa['setor'] ?></p>
                            <p><strong>Prioridade:</strong> <?= $tarefa['prioridade'] ?></p>
                            <p><strong>Vinculado a:</strong> <?= $tarefa['nome_usuario'] ?></p>
                            <form action="../../controllers/CadastradosController.php?acao=alterarStatus" method="POST">
                                <input type="hidden" name="id_tarefa" value="<?= $tarefa['id_tarefa'] ?>">
                                <select name="situacao" required>
                                    <option value="">Escolha...</option>
                                    <option value="fazer">A Fazer</option>
                                    <option value="pronto">Pronto</option>
                                </select>
                                <button type="submit">Alterar Status</button>
                            </form>
                            <a href="index.php?id_tarefa=<?= $tarefa['id_tarefa'] ?>" class="btn-link">Editar</a>
                            <a href="../../controllers/CadastradosController.php?acao=excluir&id_tarefa=<?= $tarefa['id_tarefa'] ?>" class="btn-link">Excluir</a>
                        </div>
                    <?php endforeach; ?>
                </div>

                <!-- 3 COLUNA DO PRONTO -->
                <div class="coluna">
                    <h3>Pronto</h3>
                    <?php foreach ($tarefasPronto as $tarefa): ?>
                        <div class="card">
                            <p><strong>Descrição:</strong> <?= $tarefa['descricao'] ?></p>
                            <p><strong>Setor:</strong> <?= $tarefa['setor'] ?></p>
                            <p><strong>Prioridade:</strong> <?= $tarefa['prioridade'] ?></p>
                            <p><strong>Vinculado a:</strong> <?= $tarefa['nome_usuario'] ?></p>
                            <form action="../../controllers/CadastradosController.php?acao=alterarStatus" method="POST">
                                <input type="hidden" name="id_tarefa" value="<?= $tarefa['id_tarefa'] ?>">
                                <select name="situacao" required>
                                    <option value="">Escolha...</option>
                                    <option value="fazer">A Fazer</option>
                                    <option value="fazendo">Fazendo</option>
                                </select>
                                <button type="submit">Alterar Status</button>
                            </form>
                            <a href="index.php?id_tarefa=<?= $tarefa['id_tarefa'] ?>" class="btn-link">Editar</a>
                            <a href="../../controllers/CadastradosController.php?acao=excluir&id_tarefa=<?= $tarefa['id_tarefa'] ?>" class="btn-link">Excluir</a>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </main>
</body>
</html>
