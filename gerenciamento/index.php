<?php
/**
 * Created by PhpStorm.
 * User: Sostenes
 * Date: 13/08/2017
 * Time: 10:06
 */

require_once "persistence/PessoaRepository.php";
require_once "model/Connection.php";
require_once "model/Pessoa.php";
require_once "business/PessoaBusiness.php";

header('Content-Type: text/html; charset=utf-8');

$request = $_SERVER["REQUEST_METHOD"];
switch ($request) {
    case "POST":
        if (isset($_POST["cpf"], $_POST["nome"])) {
            if (is_numeric($_POST["cpf"])) {
                $connection = new Connection("root", "12345", "localhost", "teste");
                try {
                    $connection->open();
                    $pesRep = new PessoaRepository($connection);
                    $pesBus = new PessoaBusiness($pesRep);
                    $cpf = testInput($connection->escape($_POST["cpf"]));
                    $nome = testInput($connection->escape($_POST["nome"]));
                    $pessoa = new Pessoa($cpf, $nome);
                    $pesBus->insert($pessoa);
                } catch (Error $err) {
                    echo "Erro " . $err->getMessage();
                }
            } else {
                echo "CPF incorreto";
            }
        } else {
            echo "Preencha todos os parametros";
        }
        break;
    case "GET": {
        if(isset($_GET["cpf"])){
            $connection = new Connection("root", "12345", "localhost", "teste");
            try {
                $connection->open();
                $pesRep = new PessoaRepository($connection);
                $pesBus = new PessoaBusiness($pesRep);
                $cpf = testInput($connection->escape($_GET["cpf"]));
                $res = $pesBus->findByCpf($cpf);
                while ($obj = $res->fetch_object())
                {
                    printf("%s %s", $obj->cpf, $obj->nome);
                }
            } catch (Error $err) {
                echo "Erro " . $err->getMessage();
            }
        }
    }
}

function testInput($input){
    $data = trim($input);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
