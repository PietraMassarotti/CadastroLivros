<?php
session_start();
// Verifica se há uma mensagem na sessão
if (isset($_SESSION['mensagem'])) {
    echo "<p>" . $_SESSION['mensagem'] . "</p>";
    // Limpa a mensagem
    unset($_SESSION['mensagem']);
}

$title = 'Home - Sistema de Usuários'; 
$page = 'cadastro';
$basePath = '/biblioteca'; 
$publicPath = $basePath . '/public';
?>

<!DOCTYPE html>
<html>

<head>
    <title>Cadastro</title>
    <link rel="stylesheet" type="text/css" href="<?=$publicPath . '/css/form.css'?>" media="screen" />
</head>

<body>
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
</body>

</html>
