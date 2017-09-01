<?php

class Connection{
    private $connection;
    private $user;
    private $pass;
    private $host;
    private $database;

    public function __construct($user, $pass, $host, $database)
    {
        $this->pass = $pass;
        $this->user = $user;
        $this->host = $host;
        $this->database = $database;
    }

    public function open(){
        $this->connection = new mysqli($this->host, $this->user, $this->pass, $this->database);
        if($this->connection->connect_errno)
        {
            echo $this->connection->connect_error;
            throw new Error("Erro ao tentar abrir a conexao.");
        }
    }

    public function query($query){
        $result = $this->connection->query($query);
        if(!$result){
            throw new Error($this->connection->error);
        }
        return $result;
    }

    public function escape($dados)
    {
        return $this->connection->real_escape_string($dados);
    }

    public function close(){
        $this->connection->close();
    }
}