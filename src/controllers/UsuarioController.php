<?php
require_once '../services/BancoDeDados.php';
class UsuarioController {
    private $banco;
    public function __construct() {
        $this->banco = new BancoDeDados();
    }

    // FUNCAO PARA SALVAR USUARIO
    public function salvar() {
        $nome = $_POST['nome'];
        $email = $_POST['email'];
            $sql = "INSERT INTO usuarios (nome, email) VALUES (?, ?)";
            $this->banco->executarComando($sql, [$nome, $email]);
            echo "<script>
                    alert('Usuário cadastrado com sucesso!');
                    window.location.href = '../views/Usuarios/index.php';
                  </script>";
                  exit;
    }
}

// CONTLROLE DE ROTAS
if (isset($_GET['acao']) & $_GET['acao'] == 'salvar') {
    $controller = new UsuarioController();
    $controller->salvar();
}
