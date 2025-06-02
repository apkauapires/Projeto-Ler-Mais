<?php 

    class LivroAluguel{
        private string $data_devolucao;
        public function __construct(
            public readonly string $id_usuario,
            public readonly string $data_coleta,
            private array $livros,
            private int $dias_aluguel,
        ){
            $this->data_devolucao = $this->dataDevolver($this->data_coleta, $this->dias_aluguel);
        }
        public function dataDevolver($data_coleta, $dias_alugel):string{

            $data = new DateTime($data_coleta);
            $data->modify("+$dias_alugel days");
            return $data->format('d-m-Y');
        }


    }