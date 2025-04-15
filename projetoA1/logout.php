<?php
require_once 'classes/Autenticador.php';

// Realizar logout
Autenticador::logout();

// Redirecionar para a página de login
header('Location: login.php?logout=sucesso');
exit;
?>