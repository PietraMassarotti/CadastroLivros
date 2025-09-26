<?php 
session_start();
// Verifica se há uma mensagem na sessão
if (isset($_SESSION['mensagem'])) {
    echo "<p>" . $_SESSION['mensagem'] . "</p>";
    // Limpa a mensagem
    unset($_SESSION['mensagem']);
}

$title = 'Login - Sistema Biblioteca'; 
$page = 'login';
$basePath = '/biblioteca/public'; 
?>

<h1>Login</h1>
<form action="<?=$basePath . '/login/entrar'?>" method="POST">
    <label>Email:</label>
    <input type="email" name="email" required>
    <label>Senha:</label>
    <input type="password" name="senha" required>
    <button type="submit">Entrar</button>
</form>
<form action="<?=$basePath . '/'?>" method="GET">
    <button type="submit">Voltar</button>
</form>

