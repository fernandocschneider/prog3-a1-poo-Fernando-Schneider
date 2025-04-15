<?php
class Sessao {
    public static function iniciar() {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
    }

    public static function set ($chave, $valor) {
        self::iniciar();
        $_SESSION[$chave] = $valor;
    }

    public static function get ($chave) {
        self::iniciar();
        return isset($_SESSION[$chave]) ? $_SESSION[$chave] : null;
    }

    public static function existe($chave) {
        self::iniciar();
        return isset($_SESSION[$chave]);
    }

    public static function destruir() {
        self::iniciar();
        session_unset();
        session_destroy();
    }

    public static function estaLogado() {
        return self:: existe('usuario_logado') && self::existe('usuario_email');
    }
}
?>