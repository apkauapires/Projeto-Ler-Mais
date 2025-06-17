<?php
require __DIR__ . "/../config/config.php";

class daoDoacao{
    private $conexao;

    public function __construct(mysqli $conexao) {
            $this->conexao = $conexao;
        }
    
    public function insert(Doacao $d){
        $nome = $d->getNome();
        $autor = $d->getAutor();
        $descricao = $d->getDescricao();
        $quantidade = $d->getQuantidade();

        $stmt = $this->conexao->prepare("INSERT into doacao(nome_livro, autor_livro, qtd_doacao, descricao) values (?, ?, ?, ?)");
        $stmt->bind_param('ssis', $nome, $autor, $quantidade, $descricao);
        $stmt->execute(); 
        $stmt->close();
        }


}


?>