<?php
/**
 * Created by PhpStorm.
 * User: Sostenes
 * Date: 13/08/2017
 * Time: 09:17
 */

class PessoaRepository
{
    private $connection;

    public function __construct($conn)
    {
        $this->connection = $conn;
    }

    public function insert($cpf, $nome)
    {
        $sql = "INSERT INTO pessoa (cpf, nome) VALUES ('{$cpf}', '{$nome}')";
        try{
            $this->connection->query($sql);
        }catch (Exception $ex) {
           throw new Error($ex->getMessage());
        }
    }

    public function findByCpf($cpf)
    {
        try{
            $sql = "SELECT * FROM pessoa WHERE cpf = '{$cpf}'";
            //$this->connection = new mysqli("",",","","");
            $res = $this->connection->query($sql);
            return $res;
        }catch (Exception $ex){
            throw new Error($ex->getMessage());
        }
    }

}