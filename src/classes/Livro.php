<?php
class Livro{
        public array $testeArray = ["vazio","Ação","Romance","Ficção-Científica","Aventura","Fantasia"];
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
           $countArray = count($this->testeArray);
            for($i = 1 ;$i<=$countArray-1;$i++){
                if($i == $num){
                    $categoria = $this->testeArray[$i];
                    break;
                }else{
                    $categoria = "Categoria não cadastrada";
                }
            }
            return $categoria;
        }
        public function getCategoria():string{
            return $this->categoriaString;
        }    
    }
   /* $t = new Livro(
        "adsad",
        "adsaa",
        1,
        3,
    );
    $test = $t->getCategoria();
    echo $test;*/
?>