<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header("Location: ../login/login.php");
    exit();
}

use App\Models\Livro\LivroDAO;

$usuario = $_SESSION['usuario']['id'];
$livroDao = new LivroDAO();
$resultado = $livroDao->buscarUsuario($usuario);

$title = 'Livros - Sistema Biblioteca';
$page = 'livro';
$basePath = '/biblioteca/public';
?>

<h2>Meus livros:</h2>
<div class="top-actions">
    <a href="<?= $basePath . '/livro/create' ?>" class="btn btn-create">Adicionar livro</a>
</div>
<br>
<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Título</th>
            <th>Autor</th>
            <th>ISBN</th>
            <th>Ano</th>
            <th>Criado em</th>
            <th>Atualizado em</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        <?php
        foreach ($resultado as $row): ?>
            <tr>
                <td><?= $row["id"] ?></td>
                <td><?= $row['titulo'] ?></td>
                <td><?= $row['autor'] ?></td>
                <td><?= $row['isbn'] ?></td>
                <td><?= $row['ano'] ?></td>
                <td><?= $row['created_at'] ?></td>
                <td><?= $row['update_at'] ?></td>
                <div class="btn-actions">
                    <td>
                        <a href="<?= $basePath . '/livro/edit/' . $row['id'] ?>" class="btn btn-edit">Editar</a>
                        <a href="<?= $basePath . '/livro/delete/' .  $row['id'] ?>" class="btn btn-delete">Deletar</a>
                    </td>
                </div>
            </tr>
        <?php
        endforeach;
        ?>
    </tbody>
</table>
<div class="actions">
    <a href="<?= $basePath . '/login/logout' ?>" class="btn btn-create">Sair</a>
</div>