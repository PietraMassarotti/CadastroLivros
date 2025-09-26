<?php
session_start();
// Verifica se há uma mensagem na sessão
if (isset($_SESSION['mensagem'])) {
    echo "<p>" . $_SESSION['mensagem'] . "</p>";
    // Limpa a mensagem
    unset($_SESSION['mensagem']);
}

$title = 'Cadastro - Sistema Biblioteca'; 
$page = 'cadastro';
$basePath = '/biblioteca/public'; 
?>

<h1>Cadastro</h1>
<form action="<?=$basePath . '/cadastro/create'?>" method="POST">
    <label>Nome Completo:</label>
    <input type="text" name="nome" required>
    <label>Email:</label>
    <input type="email" name="email" required>
    <label>Senha:</label>
    <input type="password" name="senha" required>
    <button type="submit">Criar</button>
</form>
<form action="<?=$basePath . '/'?>" method="GET">
    <button type="submit">Voltar</button>
</form>

