<?php

Class Doacao{

    private int $id;
    private string $nome;
    private string $autor;
    private int $quantidade;
    private string $descricao;


    public function __construct($id,$nome,$autor,$quantidade,$descricao){
        $this->id = $id;
        $this->nome = $nome;
        $this->autor = $autor;
        $this->quantidade = $quantidade;
        $this->descricao = $descricao;
    }

    public function setId($i){
        $this->id = $i;
    }

    public function getId(){
        return $this->id;
    }

    public function setNome($i){
        $this->nome = $i;
    }

    public function getNome(){
        return $this->nome;
    }

}

?>