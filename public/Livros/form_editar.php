<?php

$id = $_GET["id"];

?>

<!DOCTYPE html>
<html>

<head>
    <title>Editar livro</title>
    <link rel="stylesheet" type="text/css" href="css/tabela.css" media="screen" />
</head>

<body>
    <h1>Editar</h1>
    <form action="editar_livro.php" method="POST">
        <input type="hidden" name="id" value="<?= $id ?>" />
        <label>Título:</label>
        <input type="text" name="titulo" required>
        <label>Autor:</label>
        <input type="text" name="autor" required>
        <label>ISBN:</label>
        <input type="text" name="isbn" required>
        <label>Ano:</label>
        <input type="number" name="ano">
        <button type="submit">Editar</button>
    </form>
    <form action="index.php" method="GET">
        <button type="submit">Voltar</button>
    </form>

</body>

</html>
