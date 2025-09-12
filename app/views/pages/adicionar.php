<?php
session_start();

if (!isset($_SESSION['usuario'])) {
    header("Location: ../login/login.php");
    exit();
}

if (isset($_SESSION['mensagem'])) {
    echo "<p>" . $_SESSION['mensagem'] . "</p>";
    // Limpa a mensagem
    unset($_SESSION['mensagem']);
}

use App\Models\Livro\LivroDAO;

$usuario = $_SESSION['usuario']['id'];
$livroDao = new LivroDAO();
$resultado = $livroDao->buscarUsuario($usuario);

$page = 'adicionar';
$basePath = '/biblioteca';
$publicPath = $basePath . '/public';
?>
<!DOCTYPE html>
<html>

<head>
    <title>Adicionar livro</title>
    <link rel="stylesheet" type="text/css" href="<?= $publicPath . '/css/form.css' ?>" media="screen" />
</head>

<body>
    <h1>Adicionar Livro</h1>

    <form action="<?= $basePath . '/livro/save' ?>" method="POST">
        <label>Título:</label>
        <input type="text" name="titulo" required>

        <label>Autor:</label>
        <input type="text" name="autor" required>

        <label>ISBN:</label>
        <input type="text" id="isbn" name="isbn" required>

        <label>Ano:</label>
        <input type="date" name="ano">

        <input type="hidden" name="usuarios_id" value="<?= $usuario ?>" />

        <button type="submit">Adicionar</button>
    </form>

    <form action="<?= $basePath . '/livro' ?>" method="GET">
        <button type="submit">Voltar</button>
    </form>

</body>

</html>