<?php

namespace App\Utils;

class IsbnValidacao
{
    public static function validar($numero)
    {
        if (!preg_match('/^[0-9]{13,15}$/', $numero)) {
            return "O número deve ter entre 13 e 15 dígitos e não pode conter caracteres inválidos.";
            exit();
        }
        if ($numero < 0) {
            return "O número não pode ser negativo.";
            exit();
        }
        return;
    }
}
