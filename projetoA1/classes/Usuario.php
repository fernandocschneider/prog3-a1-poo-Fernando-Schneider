<?php
class Usuario {
    private $nome;
    private $email;
    private $senha;

    public function __construct($nome, $email, $senha, $senhaJaHasheada = false) {
        $this->nome = $nome;
        $this->email = $email;
        // Verifica se a senha já está hasheada
        if ($senhaJaHasheada) {
            $this->senha = $senha;
        } else {
            $this->senha = password_hash($senha, PASSWORD_DEFAULT);
        }
    }

    public function getNome() {
        return $this->nome;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getSenha() {
        return $this->senha;
    }

    public function verificarSenha($senha) {
        return password_verify($senha, $this->senha);
    }
    
    public function toArray() {
        return [
            'nome' => $this->nome,
            'email' => $this->email,
            'senha' => $this->senha
        ];
    }
}
?>