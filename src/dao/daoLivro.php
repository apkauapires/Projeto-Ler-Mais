<?php
    require __DIR__ . "/../config/config.php";

    class DaoLivro {
        private $conexao;

        public function __construct(mysqli $conexao) {
            $this->conexao = $conexao;
        }

        public function insert(Livro $l){
        $nome = $l->getNome();
        $autor = $l->getAutor();
        $categoria = $l->getCategoria();
        $quantidade = $l->getQuantidade();

        $stmt = $this->conexao->prepare("INSERT into livro(nome_livro, autor_livro, estoque_livro, fk_id_categoria) values (?, ?, ?, ?)");
        $stmt->bind_param('ssii', $nome, $autor, $quantidade, $categoria);
        $stmt->execute(); 
        $stmt->close();
        }

        public function listarLivros() {
            $sql = "SELECT * FROM livro ORDER BY nome_livro ASC";
            $resultado = mysqli_query($this->conexao, $sql);
            $livros = [];
            while ($livro = mysqli_fetch_assoc($resultado)) {
                $livros[] = $livro;
            }
            return $livros;
        }       
        public function buscarLivro($id) {
            $livro=[];
            $sql = "SELECT * FROM categoria WHERE id_categoria = ?";
            $stmt = $this->conexao->prepare($sql);
            $stmt->bind_param("i", $id);
            $stmt->execute();
            $resultado = $stmt->get_result();
            $livro[] = mysqli_fetch_assoc($resultado);
            $stmt->close();
            return $livro;
        }
    }