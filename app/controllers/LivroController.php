<?php

/**
 * Controlador de Usuários
 */

declare(strict_types=1);

namespace App\Controllers;

use App\Models\Livro\LivroDAO;
use App\Utils\Sanitizacao;
use App\Utils\IsbnValidacao;


class LivroController extends BaseController
{
    /**
     * Mostra a lista de usuários
     * @return void
     */
    public function indexLivro(): void
    {
        $this->render('livro');
    }

    /**
     * Mostra formulário de criação
     * @return void
     */
    public function createLivro(): void
    {
        $this->render('adicionar');
    }


    /**
     * Mostra formulário de edição
     * @param int $id ID do usuário
     * @return void
     */
    public function editLivro(int $id): void
    {
        $this->render('editar', ['id' => $id]);
    }

  

    public function updateLivro(): void
    {
        session_start();

        if (!isset($_SESSION['usuario'])) {
            $this->redirect('/login');
            exit();
        }

        // Sanitiza as entradas
        $id = Sanitizacao::sanitizar($_POST['id']);
        $titulo = Sanitizacao::sanitizar($_POST['titulo']);
        $autor = Sanitizacao::sanitizar($_POST['autor']);
        $isbn = Sanitizacao::sanitizar($_POST['isbn']); // <-- Corrigido aqui
        $ano = Sanitizacao::sanitizar($_POST['ano']);

        // Valida o ISBN corretamente (sem sobrescrever o valor original)
        $mensagemErroIsbn = IsbnValidacao::validar($isbn); // <-- Corrigido aqui

        if ($mensagemErroIsbn) {
            $_SESSION['mensagem'] = $mensagemErroIsbn;
            $this->redirect('/livro/edit/' . $id);
            exit(); // <-- Importante garantir que não continue
        }

        $LivroDAO = new LivroDAO();
        $LivroDAO->editarLivro($id, $titulo, $autor, $isbn, $ano);
        $this->redirect('/livro');
    }

    /**
     * Salva usuário (criar ou atualizar)
     * @return void
     */
    public function saveLivro(): void
    {
        session_start();

        if (!isset($_SESSION['usuario'])) {
            $this->redirect('/login');
            exit();
        }

        // Sanitiza as entradas
        $titulo = Sanitizacao::sanitizar($_POST['titulo']);
        $autor = Sanitizacao::sanitizar($_POST['autor']);
        $isbn = Sanitizacao::sanitizar($_POST['isbn']);
        $ano = Sanitizacao::sanitizar($_POST['ano']);

        // Valida ISBN
        $mensagemErroIsbn = IsbnValidacao::validar($isbn);

        if ($mensagemErroIsbn) {
            $_SESSION['mensagem'] = $mensagemErroIsbn;
            $this->redirect('/livro/create');
            exit();
        }

        // Salva no banco
        $LivroDAO = new LivroDAO();
        $LivroDAO->criarLivro($titulo, $autor, $isbn, $ano, $_SESSION['usuario']['id']);

        $this->redirect('/livro');
    }

    /**
     * Deleta usuário
     * @param int $id ID do usuário
     * @return void
     */
    public function deleteLivro(int $id): void
    {
        session_start();

        if (!isset($_SESSION['usuario'])) {
            $this->redirect('/login');
            exit();
        }

        // Sanitiza as entradas
        $id = Sanitizacao::sanitizar($id);

        $LivroDAO = new LivroDAO();
        $LivroDAO->deletarLivro($id);

        $this->redirect('/livro');
    }
}
