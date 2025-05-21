<?php
    
    $testeArray = ["Comédia","Ação","Romance","Ficção-Científica","Aventura","Fantasia"];

        

    class Livro{
        private string $categoriaString;
        function __construct(
            public readonly string $nome,
            public readonly string $autor,
            public readonly INT $categoriaNum,
            private INT $quantidade
        ){
            $this->categoriaString = $this->verificarCategoria($categoriaNum);
        }
        public function verificarCategoria($num):string{
            $countArray = count($testeArray);
        }

    }
    



?>