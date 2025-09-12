<?php

namespace App\Utils;

class SenhaValidacao
{
    public static function validarSenha(string $senha)
    {
        if (strlen($senha) < 8) {
            return "A senha precisa de no mínimo 8 caracteres";
            exit();
        }
        if (!preg_match('/[A-Z]/', $senha)) {
            return "A senha precisa de no mínimo 1 letra maiúscula";
            exit();
        }
        if (!preg_match('/[a-z]/', $senha)) {
            return "A senha precisa de no mínimo 1 letra minúscula";
            exit();
        }
        if (!preg_match('/[0-9]/', $senha)) {
            return "A senha precisa de no mínimo 1 número";
            exit();
        }
        return;
    }
}
?>
