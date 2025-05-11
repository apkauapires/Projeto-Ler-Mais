<?php
require "../config.php";

class UsuarioDaoMysql {

    private $conn;

    public function __construct(mysqli $driver){
        $this->conn = $driver;
    }

    public function insert(Usuario $u){
        $nome = $u->getNome();
        $email = $u->getEmail();
        $contato = $u->getContato();
        $senha = $u->getSenha();

        $stmt = $this->conn->prepare("INSERT into Usuario(nome,email,contato,senha) values (?,?,?,?)");
        $stmt->bind_param('ssss', $nome, $email, $contato, $senha);
        $stmt->execute();  // Correção aqui
        $stmt->close();
    }
}
?>