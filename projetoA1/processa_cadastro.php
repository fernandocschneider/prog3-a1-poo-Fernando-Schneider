<?php
require_once 'classes/Autenticador.php';

// Verifica se o formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Sanitização dos dados
    $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_SPECIAL_CHARS);
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $senha = $_POST['senha'];
    
    // Validação básica
    if (empty($nome) || empty($email) || empty($senha)) {
        header('Location: cadastro.php?erro=campos_vazios');
        exit;
    }
    
    // Validação de e-mail
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header('Location: cadastro.php?erro=email_invalido');
        exit;
    }
    
    // Tenta registrar o usuário
    $cadastroRealizado = Autenticador::registrar($nome, $email, $senha);
    
    if ($cadastroRealizado) {
        header('Location: login.php?cadastro=sucesso');
        exit;
    } else {
        header('Location: cadastro.php?erro=email_existente');
        exit;
    }
} else {
    // Se alguém tentou acessar diretamente este arquivo
    header('Location: cadastro.php');
    exit;
}
?>