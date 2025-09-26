<?php
declare(strict_types=1);

namespace App\Controllers;

use App\Models\Usuario\UsuarioDAO;
use App\Utils\Sanitizacao;
use App\Utils\SenhaValidacao;

class UserController extends BaseController
{
    /**
     * Mostra a lista de usuários
     * @return void
     */
    public function indexUser(): void
    {
        $this->render('cadastro');
    }

    /**
     * Mostra formulário de criação
     * @return void
     */
    public function createUser(): void
    {

        session_start();

        $nome = Sanitizacao::sanitizar($_POST['nome']);
        $email = Sanitizacao::sanitizar($_POST['email']);
        $senha = Sanitizacao::sanitizar($_POST['senha']);
        $mensagemErroSenha = SenhaValidacao::validarSenha($senha);

        if ($mensagemErroSenha) {
            $_SESSION['mensagem'] = $mensagemErroSenha;
            $this->redirect('/cadastro');
            exit();
        }

        $usuarioDAO = new UsuarioDAO();
        $usuario = $usuarioDAO->criarUser($nome, $email, $senha);

        if ($usuario) {
            $_SESSION['mensagem'] = "Usuário criado com sucesso! :)";
        } else {
            $_SESSION['mensagem'] = "Erro ao criar usuário :(. Esse email pode já estar sendo utilizado.";
        }

        $this->redirect('/cadastro');
        exit();
    }

    /**
     * Mostra formulário de edição
     * @param int $id ID do usuário
     * @return void
     */
    public function editUser(int $id): void
    {
        $this->render('users/edit');
    }

    /**
     * Salva usuário (criar ou atualizar)
     * @return void
     */
    public function saveUser(): void
    {
        $this->render('users/save');
    }

    /**
     * Deleta usuário
     * @param int $id ID do usuário
     * @return void
     */
    public function deleteUser(int $id): void
    {
        $this->render('users/delete');
    }
}
