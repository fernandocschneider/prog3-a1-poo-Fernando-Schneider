<?php
require_once 'classes/Autenticador.php';

// Verifica se o formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Sanitização dos dados
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $senha = $_POST['senha'];
    $lembrar = isset($_POST['lembrar']);
    
    // Tentar autenticar o usuário
    $autenticado = Autenticador::autenticar($email, $senha);
    
    if ($autenticado) {
        // Definir cookie para lembrar o e-mail se solicitado
        if ($lembrar) {
            setcookie('email_usuario', $email, time() + (86400 * 30), "/"); // 30 dias
        } else {
            // Remover o cookie se existir e não quiser lembrar
            if (isset($_COOKIE['email_usuario'])) {
                setcookie('email_usuario', '', time() - 3600, "/");
            }
        }
        
        // Redirecionar para a dashboard
        header('Location: dashboard.php');
        exit;
    } else {
        // Autenticação falhou
        header('Location: login.php?erro=credenciais');
        exit;
    }
} else {
    // Se alguém tentou acessar diretamente este arquivo
    header('Location: login.php');
    exit;
}
?>