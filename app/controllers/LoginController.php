<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Utils\Sanitizacao;

class LoginController extends BaseController
{
    /**
     * Mostra a página de login
     * @return void
     */
    public function showLogin(): void
    {
        $this->render('login');
    }

    /**
     * Processa o login
     * @return void
     */
    public function login(): void
    {
        session_start();
        // Sanitiza as entradas
        $email = Sanitizacao::sanitizar($_POST['email']);
        $senha = Sanitizacao::sanitizar($_POST['senha']);

        // Valida o login
        $usuarioDAO = new \App\Models\Usuario\UsuarioDAO();
        $usuario = $usuarioDAO->validarLogin($email, $senha);

        if ($usuario) {
            session_start();
            $_SESSION['logado'] = true;
            $_SESSION['usuario'] = [
                "id" => $usuario->getId()
            ];
            $this->redirect('/livro');
        } else {
            $mensagemErroSenha = 'E-mail e/ou senhas incorretos';

        if ($mensagemErroSenha) {
            $_SESSION['mensagem'] = $mensagemErroSenha;
            $this->redirect('/login');
            exit();
        }
        }
    }

    /**
     * Faz logout
     * @return void
     */
    public function logout(): void
    {
        session_start();
        session_destroy();
        $this->redirect('/');
        exit();
    }
}
