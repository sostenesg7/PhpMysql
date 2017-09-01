<?php
/**
 * Created by PhpStorm.
 * User: Sostenes
 * Date: 13/08/2017
 * Time: 06:20
 */

class Pessoa
{
    private $nome;
    private $cpf;

    public function __construct($cpf, $nome)
    {
        $this->nome = $nome;
        $this->cpf = $cpf;
    }

    public function getNome()
    {
        return $this->nome;
    }

    public function setNome($nome){
        $this->nome = $nome;
    }

    public function getCpf()
    {
        return $this->cpf;
    }

    public function setCpf($cpf)
    {
        $this->cpf = $cpf;
    }
}