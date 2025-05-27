<?php
    require __DIR__ . "/../config/config.php";

    class DaoLivro {
        private $conexao;

        public function __construct(mysqli $conexao) {
            $this->conexao = $conexao;
        }
        public function listarLivros() {
            $sql = "SELECT * FROM categoria ORDER BY nome_categoria";
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