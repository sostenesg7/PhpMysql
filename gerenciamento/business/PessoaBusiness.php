<?php
require_once(dirname(__FILE__) . "/../model/Pessoa.php");

class PessoaBusiness
{
    private $rep;

    public function __construct($pessoaRepository)
    {
        $this->rep = $pessoaRepository;
    }

    public function insert(Pessoa $pessoa){
        try{
            $this->rep->insert($pessoa->getCpf(), $pessoa->getNome());
        }catch (Error $err){
            echo $err->getMessage();
        }
    }

    public function findByCpf($cpf)
    {
        try{
            return $this->rep->findByCpf($cpf);
        }catch (Exception $ex){
            throw new Error($ex->getMessage());
        }
    }
}

