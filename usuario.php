<?php 

class usuario{

    private $conn;
    private $usuario_id;
    public $nome_usuario;
    public $endereco;
    public $telefone;
    public $email;
    protected $senhaHash;

    public function __construct($conn, $nome_usuario, $endereco, $telefone, $email, $senha){
        $this->conn = $conn;
        $this->nome_usuario = $trim($nome_usuario);
        $this->endereco = $endereco;
        $email = strtolower(trim($email));

        if(!filter_var ($email, FILTER_VALIDATE_EMAIL)){
            throw new Excpetion("Erro existente");
        }

        $this->email=($email);
    }

}

?>