<?php
    require __DIR__ . "/../config/config.php";

    class DaoLivro {
        private $conexao;

        public function __construct($conexao) {
            $this->conexao = $conexao;
        }
        public function listarLivros($ordem) {
            $sql = "SELECT * FROM livro ORDER BY $ordem";
            $resultado = mysqli_query($this->conexao, $sql);
            $livros = [];
            while ($livro = mysqli_fetch_assoc($resultado)) {
                $livros[] = $livro;
            }
            return $livros;
        }       
        public function buscarLivro($id) {
            $sql = "SELECT * FROM livro WHERE id = ?";
            $stmt = mysqli_prepare($this->conexao, $sql);
            mysqli_stmt_bind_param($stmt, "i", $id);
            mysqli_stmt_execute($stmt);
            $resultado = mysqli_stmt_get_result($stmt);
            $livro = mysqli_fetch_assoc($resultado);
            mysqli_stmt_close($stmt);
            return $livro;
        }
    }