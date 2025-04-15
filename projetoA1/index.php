<?php
require_once 'classes/Sessao.php';

// Redireciona para a página de dashboard se já estiver logado
if (Sessao::estaLogado()) {
    header('Location: dashboard.php');
    exit;
} else {
    header('Location: login.php');
    exit;
}
?>