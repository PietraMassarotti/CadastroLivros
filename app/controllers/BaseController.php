<?php
/**
 * Controlador Base
 * Fornece funcionalidades comuns para todos os controladores
 */

declare(strict_types=1);

namespace App\Controllers;

class BaseController 
{
    /**
     * Renderiza uma view
     * @param string $view Nome da view
     * @param array $data Dados para passar para a view
     * @return void
     */
    protected function render(string $view, array $data = []): void 
{
    // Extrair dados para variáveis
    extract($data);
    
    // Alterar o caminho para aceitar views de diferentes diretórios (como login, home, etc.)
    $viewPath = __DIR__ . '/../views/pages/' . $view . '.php';
    
    
    // Verificar se a view existe
    if (file_exists($viewPath)) {
        include $viewPath;
    } else {
        die("View não encontrada: " . $viewPath);
    }
}
    
    /**
     * Redireciona para uma URL
     * @param string $url URL de destino
     * @return void
     */
    protected function redirect(string $url): void 
    {
        $basePath = '/biblioteca'; 
        header("Location: " . $basePath . $url);
        exit();
    }
    
    /**
     * Método público para renderizar (para uso temporário)
     * @param string $view Nome da view
     * @param array $data Dados para passar para a view
     * @return void
     */
    public function renderView(string $view, array $data = []): void 
    {
        $this->render($view, $data);
    }
}


?>

