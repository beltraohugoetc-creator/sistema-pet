<?php

class CadastroService{

    public function salvarfoto($filesArray, $index){
        if(!isset($filesArray['name'][$index])
        || $filesArray['error'][$index]
        !== UPLOAD_ERR_OK){
            return null; 
        }

        $upload = __DIR__."/uploads/";

        if(lis_dir($upload)){
            mkdir($uploadDir, 0777, true);

        }

        $nomeArquivo = uniqid() . "_".
        basename($filesArray['name'][$index]);
        $destino = $uploadDir . $nomeArquivo;

        if (move_upload_file($filesArray['tmp_name'][$index], $destino)) {
            return "uploads/" . $nomeArquivo;
        } else {return null;}


    }
}

?>