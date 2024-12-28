<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Usuarios</title>
    <link rel="stylesheet" href="../../../assets/css/style.css"><!--CSS-->
</head>
<body>

     <!--BARRA CSS-->
    <header class="navbar">
        <h1>Gerenciamento de Tarefas</h1>
        <ul>
             <!--CAMMINHOS DAS TELAS-->
            <li><a href="../../../index.php">Início</a></li>
            <li><a href="../Tarefas/index.php">Cadastro de Tarefas</a></li>
            <li><a href="../Tarefas/cadastrados.php">Tarefas Cadastradas</a></li>
        </ul>
    </header>

    <main class="content-section">
        <h2>Cadastro de Usuarios</h2>
        <form action="../../controllers/UsuarioController.php?acao=salvar" method="POST" class="form-container"><!--ENVIO DOS DADOS +FORMUALRIO CSS-->
            <!--CAMPO NOME-->
            <div class="form-group">
                <label for="txt_nome">Nome:</label>
                <input type="text" id="txt_nome" name="nome" placeholder="Nome" required>
            </div>
            <!--CAMPO EMAIL-->
            <div class="form-group">
                <label for="txt_email">E-mail:</label>
                <input type="email" id="txt_email" name= "email" placeholder="Email" required>
            </div>
            <!--CAMPO DO BOTAO-->
            <div class="form-group">
                <button type="submit">Cadastrar</button>
            </div>
        </form>
    </main>
    
</body>
</html>
