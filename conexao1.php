<?php 

try {

    $conexao = new PDO('mysql:host=localhost;dbname=pethugo','root','');

} catch(PDOException $erro) {

    
    echo 'Erro ao conectar:' . $erro->getMessage();



}


?>