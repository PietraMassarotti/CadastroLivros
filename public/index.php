<?php

declare(strict_types=1);
require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../app/controllers/BaseController.php';
require_once __DIR__ . '/../app/controllers/HomeController.php';
require_once __DIR__ . '/../app/controllers/LoginController.php';
require_once __DIR__ . '/../app/controllers/LivroController.php';
require_once __DIR__ . '/../app/controllers/UserController.php';

$fullUri = $_SERVER['REQUEST_URI'];

$basePath = '/biblioteca/public';

$uri = $fullUri;
if (strpos($uri, $basePath) === 0) {
    $uri = substr($uri, strlen($basePath));
}

if ($uri === '' || $uri === '/') {
    $uri = '/';
}

if (strpos($uri, '?') !== false) {
    $uri = substr($uri, 0, strpos($uri, '?'));
}

switch ($uri) {
    case '/':
    case '':
        $controller = new \app\controllers\HomeController();
        $controller->index();
        break;

    case '/login':
        $controller = new \app\controllers\LoginController();
        $controller->showLogin();
        break;

    case '/login/entrar':
        $controller = new \app\controllers\LoginController();
        $controller->login();
        break;

    case '/login/logout':
        $controller = new \app\controllers\LoginController();
        $controller->logout();
        break;

    case '/cadastro':
        $controller = new \app\controllers\UserController();
        $controller->indexUser();
        break;

    case '/cadastro/create':
        $controller = new \app\controllers\UserController();
        $controller->createUser();
        break;

    case '/livro':
        $controller = new \app\controllers\LivroController();
        $controller->indexLivro();
        break;

    case '/livro/create':
        $controller = new \app\controllers\LivroController();
        $controller->createLivro();
        break;

    case (preg_match('/\/livro\/edit\/(\d+)/', $uri, $matches) ? true : false):
        $controller = new \app\controllers\LivroController();
        $controller->editLivro((int)$matches[1]);
        break;

    case '/livro/save':
        $controller = new \app\controllers\LivroController();
        $controller->saveLivro();
        break;

    case '/livro/update':
        $controller = new \app\controllers\LivroController();
        $controller->updateLivro();
        break;

    case (preg_match('/\/livro\/delete\/(\d+)/', $uri, $matches) ? true : false):
        $controller = new \app\controllers\LivroController();
        $controller->deleteLivro((int)$matches[1]);
        break;

    default:
        http_response_code(404);
        echo "<div class='container mt-4'><h1>404 - Página não encontrada</h1>";
        echo "<p>A página solicitada não existe.</p>";
        echo "<a href='{$basePath}/' class='btn btn-primary'>Voltar para Home</a></div>";
        break;
}
