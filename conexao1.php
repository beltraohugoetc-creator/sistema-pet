<?php 

try {

    $conexao = new PDO('mysql:host=localhost;dbname=pet2','root','');

} catch(PDOException $erro) {

    
    echo 'Erro ao conectar:' . $erro->getMessage();



}


?>