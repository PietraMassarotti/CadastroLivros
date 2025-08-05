<?php
session_start();
require_once __DIR__ . '/../../models/Livro/LivroDAO.php';
require_once __DIR__ . '/../../utils/Sanitizacao.php';
require_once __DIR__ . '/../../utils/IsbnValidacao.php';


if (!isset($_SESSION['usuario'])) {
    header("Location: /../login/login.php");
    exit();
}

// Sanitiza as entradas
$id = Sanitizacao::sanitizar($_POST['id']);
$titulo = Sanitizacao::sanitizar($_POST['titulo']);
$autor = Sanitizacao::sanitizar($_POST['autor']);
$isbn = IsbnValidacao::validar($_POST['isbn']);
$ano = Sanitizacao::sanitizar($_POST['ano']);

$LivroDAO = new LivroDAO();
$livro = $LivroDAO->editarLivro($id, $titulo, $autor, $isbn, $ano);
header("Location: index.php");

