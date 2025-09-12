<?php
use App\Models\Livro\LivroDAO;

session_start();
// Verifica se há uma mensagem na sessão
if (isset($_SESSION['mensagem'])) {
    echo "<p>" . $_SESSION['mensagem'] . "</p>";
    // Limpa a mensagem
    unset($_SESSION['mensagem']);
}

$livroDao = new LivroDAO();
$livro = $livroDao->findById($id);

if (!$livro) {
    echo "livro não encontrada.";
    exit();
}

$title = 'Home - Sistema de Usuários'; 
$page = 'editar';
$basePath = '/biblioteca'; 
$publicPath = $basePath . '/public';

?>

<!DOCTYPE html>
<html>

<head>
    <title>Editar livro</title>
    <link rel="stylesheet" type="text/css" href="<?=$publicPath . '/css/form.css'?>" media="screen" />
</head>

<body>
    <h1>Editar</h1>
    <form action="<?=$basePath . '/livro/update' ?>" method="POST">
        <input type="hidden" name="id" value="<?= $id ?>" />
         <label for="titulo">Título:</label>
        <input type="text" name="titulo" value="<?= htmlspecialchars($livro['titulo']) ?>" required>
        <label for="autor">Autor:</label>
        <input type="text" name="autor" value="<?= htmlspecialchars($livro['autor']) ?>" required>
        <label for="isbn">ISBN:</label>
        <input type="text" id="isbn" name="isbn" value="<?= htmlspecialchars($livro['isbn']) ?>" required>
        <label for="ano">Ano:</label>
        <input type="date" name="ano" value="<?= htmlspecialchars($livro['ano']) ?>">
        <button type="submit">Editar</button>
    </form>
    <form action="<?=$basePath . '/livro'?>" method="GET">
        <button type="submit">Voltar</button>
    </form>

</body>

</html>
