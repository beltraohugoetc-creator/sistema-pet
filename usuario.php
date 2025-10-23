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
        $this->$senhaHash = password_hash ($senha,PASSWORD_DEFAULT);
    }

    public function getId(){
        return $this->usuario_id;
    }

    public function salvar (){
        $sql = "INSERT INTO usuarios (nome, endereco, telefone, email, senha) VALUES (?, ?, ?, ?, ?)"; 
        $stmt = $this->conn->prepare($sql);

        if($stmt->execute([$this->nome, $this->endereco, $this->telefone, $this->email, $this->senhaHash])){
            $this->usuario_id = $this->conn->lastInsertId();
            return $this->usuario_id;
        } else {
            throw new Exception ("Erro ao salvar o usuario");
        };
    }



}

?>