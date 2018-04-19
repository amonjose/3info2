<?php


/**
 * Created by PhpStorm.
 * User: aluno
 * Date: 01/03/18
 * Time: 16:39
 */

class BDConection
{
    const HOST      = "localhost";
    const NOMEBANCO = "3info2";
    const USUARIO   = "3info2";
    const SENHA     = "3info2";

    public static function getConexao(){
        $conexao = new PDO("mysql:host=".self::HOST.";dbname=".self::NOMEBANCO, self::USUARIO, self::SENHA);

        return $conexao;
    }

}

