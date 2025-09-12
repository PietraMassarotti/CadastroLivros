<?php

/**
 * Ponto de entrada da aplicação - Versão com controllers
 */

declare(strict_types=1);

// Incluir os controllers manualmente (temporário)
require_once __DIR__ . '/app/controllers/BaseController.php';
require_once __DIR__ . '/app/controllers/HomeController.php';
require_once __DIR__ . '/app/controllers/LoginController.php';
require_once __DIR__ . '/app/controllers/LivroController.php';
require_once __DIR__ . '/app/controllers/UserController.php';

// Obter a URI completa
$fullUri = $_SERVER['REQUEST_URI'];

// Definir o path base da sua aplicação
// $basePath = '/aulas/repo-pw/pw3/POO/app-poo/project-app/public';
// Novo caminho BASE
$basePath = '/biblioteca';

// Remover o path base da URI
$uri = $fullUri;
if (strpos($uri, $basePath) === 0) {
    $uri = substr($uri, strlen($basePath));
}

// Se ficar vazio, redirecionar para home
if ($uri === '' || $uri === '/') {
    $uri = '/';
}

// Remover parâmetros da query string
if (strpos($uri, '?') !== false) {
    $uri = substr($uri, 0, strpos($uri, '?'));
}

// Debug - para ver o que está acontecendo
// echo "Full URI: " . $fullUri . "<br>";
// echo "Base Path: " . $basePath . "<br>";
// echo "Processed URI: " . $uri . "<br>";


spl_autoload_register(function ($class) {
    // Substitui o namespace "App\" pelo caminho da pasta "app/"
    $prefix = 'App\\';
    $base_dir = __DIR__ . '/app/';

    // Verifica se a classe usa o namespace App\
    $len = strlen($prefix);
    if (strncmp($prefix, $class, $len) !== 0) {
        return; // Sai se não for do namespace App\
    }

    // Remove o prefixo do namespace
    $relative_class = substr($class, $len);

    // Monta o caminho do arquivo
    $file = $base_dir . str_replace('\\', '/', $relative_class) . '.php';

    // Se o arquivo existir, inclui ele
    if (file_exists($file)) {
        require $file;
    } else {
        die("Arquivo da classe não encontrado: $file");
    }
});

// Definir rotas
switch ($uri) {
    case '/':
    case '':
        $controller = new \app\controllers\HomeController();
        $controller->index();  // Garante que o HomeController seja chamado
        break;

    case '/login':  // Aqui, o login chama o método showLogin
        $controller = new \app\controllers\LoginController();
        $controller->showLogin();
        break;

    case '/login/entrar':
        $controller = new \app\controllers\LoginController();
        $controller->login();  // Processa o login
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
