<?php
require_once 'Usuario.php';
require_once 'Sessao.php';

class Autenticador {
    private static $usuarios = [];
    
    public static function inicializar() {
        // Simula uma busca no banco de dados
        if (file_exists(__DIR__ . '/usuarios.php')) {
            self::$usuarios = include(__DIR__ . '/usuarios.php');
        }
    }
    
    public static function registrar($nome, $email, $senha) {
        // Verificar se o e-mail já está em uso
        foreach (self::$usuarios as $usuario) {
            if ($usuario->getEmail() === $email) {
                return false; // E-mail já cadastrado
            }
        }
        
        // Criar novo usuário
        $novoUsuario = new Usuario($nome, $email, $senha);
        self::$usuarios[] = $novoUsuario;
        
        // Salvar usuários (simula o banco de dados)
        self::salvarUsuarios();
        
        return true;
    }
    
    public static function autenticar($email, $senha) {
        foreach (self::$usuarios as $usuario) {
            if ($usuario->getEmail() === $email && $usuario->verificarSenha($senha)) {
                // Cria a sessão do usuário
                Sessao::set('usuario_logado', true);
                Sessao::set('usuario_nome', $usuario->getNome());
                Sessao::set('usuario_email', $usuario->getEmail());
                return true;
            }
        }
        return false;
    }
    
    public static function salvarUsuarios() {
        $conteudo = "<?php\nreturn [\n";
        
        foreach (self::$usuarios as $usuario) {
            $dados = $usuario->toArray();
            $conteudo .= "    new Usuario('{$dados['nome']}', '{$dados['email']}', '{$dados['senha']}', true),\n";
        }
        
        $conteudo .= "];\n";
        file_put_contents(__DIR__ . '/usuarios.php', $conteudo);
    }
    
    public static function logout() {
        Sessao::destruir();
    }
}

// Inicializa os usuários ao carregar a classe
Autenticador::inicializar();
?>