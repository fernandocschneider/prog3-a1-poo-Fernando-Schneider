<?php
require_once 'classes/Sessao.php';

// Verifica se já está logado
if (Sessao::estaLogado()) {
    header('Location: dashboard.php');
    exit;
}

// Verifica se existe cookie de e-mail
$emailSalvo = isset($_COOKIE['email_usuario']) ? $_COOKIE['email_usuario'] : '';
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
        }
        .form-group {
            margin-bottom: 15px;
        }
        label {
            display: block;
            margin-bottom: 5px;
        }
        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 8px;
            box-sizing: border-box;
        }
        button {
            padding: 10px 15px;
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
        }
        .error {
            color: red;
            margin-bottom: 15px;
        }
        .success {
            color: green;
            margin-bottom: 15px;
        }
        .links {
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <h1>Login</h1>
    
    <?php if (isset($_GET['erro']) && $_GET['erro'] === 'credenciais'): ?>
        <div class="error">E-mail ou senha incorretos.</div>
    <?php endif; ?>
    
    <?php if (isset($_GET['cadastro']) && $_GET['cadastro'] === 'sucesso'): ?>
        <div class="success">Cadastro realizado com sucesso! Faça login para continuar.</div>
    <?php endif; ?>
    
    <?php if (isset($_GET['logout']) && $_GET['logout'] === 'sucesso'): ?>
        <div class="success">Você saiu com sucesso.</div>
    <?php endif; ?>
    
    <form action="processa_login.php" method="post">
        <div class="form-group">
            <label for="email">E-mail:</label>
            <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($emailSalvo); ?>" required>
        </div>
        
        <div class="form-group">
            <label for="senha">Senha:</label>
            <input type="password" id="senha" name="senha" required>
        </div>
        
        <div class="form-group">
            <label>
                <input type="checkbox" name="lembrar" <?php echo !empty($emailSalvo) ? 'checked' : ''; ?>>
                Lembrar meu e-mail
            </label>
        </div>
        
        <button type="submit">Entrar</button>
    </form>
    
    <div class="links">
        <p>Não possui conta? <a href="cadastro.php">Cadastre-se</a></p>
    </div>
</body>
</html>