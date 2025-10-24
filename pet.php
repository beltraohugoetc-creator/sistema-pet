<?php

class pet{

    private $conn;
    public $nome;
    public $sexo;
    public $porte;
    public $raca;


public function __construct($conn, $nome, $sexo, $porte, $raca, $usuario_id, $foto=null){

    $this->conn=$conn;
    $this->nome=$nome;
    $this->sexo=$sexo;
    $this->porte=$porte;
    $this->raca=$raca;
    $this->usuario_id=$usuario_id;
    $this->foto=$foto;

}

public function salvar(){
    $sql = "INSERT INTO pets(nome, sexo, porte, raca, usuario_id, foto)
    values (?, ?, ?, ?, ?)";
    $stmt = $this->conn->prepare($sql);

    if($stmt->execute([$this->nome,$this->sexo,$this->porte,$this->raca,$this->usuario_id,$this->foto])){
        $this->usuario_id = $this->conn->lastInsertId();
        return $this->usuario_id;
    } else {
        throw new Exception
        ("Erro ao salvar o pet");
    }
}

}

?>