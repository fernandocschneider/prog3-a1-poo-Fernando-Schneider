<?php
require_once 'classes/Sessao.php';

// Verificar se o usuário está logado
if (!Sessao::estaLogado()) {
    header('Location: login.php');
    exit;
}

// Obter dados da sessão
$nomeUsuario = Sessao::get('usuario_nome');
$emailUsuario = Sessao::get('usuario_email');

// Verificar se existe cookie com o e-mail
$emailCookie = isset($_COOKIE['email_usuario']) ? $_COOKIE['email_usuario'] : '';
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
        }
        .welcome {
            margin-bottom: 20px;
        }
        .card {
            background-color: #f9f9f9;
            padding: 20px;
            border-radius: 5px;
            margin-bottom: 20px;
        }
        .logout-btn {
            padding: 8px 15px;
            background-color: #f44336;
            color: white;
            border: none;
            cursor: pointer;
            text-decoration: none;
            display: inline-block;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>Painel do Usuário</h1>
        <a href="logout.php" class="logout-btn">Sair</a>
    </div>
    
    <div class="welcome">
        <h2>Bem-vindo, <?php echo htmlspecialchars($nomeUsuario); ?>!</h2>
        <p>Seu e-mail: <?php echo htmlspecialchars($emailUsuario); ?></p>
    </div>
    
    <?php if (!empty($emailCookie)): ?>
    <div class="card">
        <h3>Cookie ativo</h3>
        <p>Seu e-mail está salvo em um cookie: <?php echo htmlspecialchars($emailCookie); ?></p>
        <p>Na próxima vez que acessar, seu e-mail será preenchido automaticamente.</p>
    </div>
    <?php else: ?>
    <div class="card">
        <h3>Cookie não ativo</h3>
        <p>Você optou por não salvar seu e-mail em cookie.</p>
        <p>Na próxima vez que acessar, precisará digitar seu e-mail novamente.</p>
    </div>
    <?php endif; ?>
</body>
</html>