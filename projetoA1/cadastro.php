<?php
require_once 'classes/Sessao.php';

// Verifica se já está logado
if (Sessao::estaLogado()) {
    header('Location: dashboard.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Usuário</title>
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
        input[type="text"],
        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 8px;
            box-sizing: border-box;
        }
        button {
            padding: 10px 15px;
            background-color:rgb(154, 253, 255);
            color: white;
            border: none;
            cursor: pointer;
        }
        .error {
            color: red;
            margin-bottom: 15px;
        }
        .links {
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <h1>Cadastro de Usuário</h1>
    
    <?php if (isset($_GET['erro'])): ?>
        <div class="error">
            <?php 
            $erro = $_GET['erro'];
            if ($erro === 'email_existente') {
                echo 'Este e-mail já está cadastrado.';
            } elseif ($erro === 'campos_vazios') {
                echo 'Todos os campos são obrigatórios.';
            } else {
                echo 'Ocorreu um erro no cadastro. Tente novamente.';
            }
            ?>
        </div>
    <?php endif; ?>
    
    <form action="processa_cadastro.php" method="post">
        <div class="form-group">
            <label for="nome">Nome:</label>
            <input type="text" id="nome" name="nome" required>
        </div>
        
        <div class="form-group">
            <label for="email">E-mail:</label>
            <input type="email" id="email" name="email" required>
        </div>
        
        <div class="form-group">
            <label for="senha">Senha:</label>
            <input type="password" id="senha" name="senha" required>
        </div>
        
        <button type="submit">Cadastrar</button>
    </form>
    
    <div class="links">
        <p>Já possui conta? <a href="login.php">Faça login</a></p>
    </div>
</body>
</html>