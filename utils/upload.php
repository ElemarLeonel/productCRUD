<?php

  function validaImagem($img){
    if ($img['type'] == 'image/jpeg' || $img['type'] == 'image/png'
          || $img['type'] == 'image/jpg'){
      echo 'Formato da imagem correta';
    } else {
      echo 'Formato da imagem incorreta';
    }
  }

  function uploadFile($file){
    $formatoImagem = explode('.',$file['name']); //assim vc pega o nome do arquivo
    $nomeImagem = uniqid().'.'.$formatoImagem[count($formatoImagem) - 1]; //vai gerar um id único
    if(move_uploaded_file($file['tmp_name'], "../images/".$nomeImagem)){
        return $nomeImagem;
    }else{
        return false;
    }
}

?>
