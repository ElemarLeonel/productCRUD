<?php
include_once '../database/config.php';
include '../utils/upload.php';

if (isset($_POST['btnAtualizar'])) {
  $id = $_POST['id'];
  $descricao = $_POST['descricao'];
  $preco = $_POST['preco'];
  $quantidade = $_POST['quantidade'];
  $unidade = $_POST['unidade'];
  $img = $_FILES['img'];

  if(validaImagem($img)){
    echo 'Imagem incorreta';
  } else {
  $img = uploadFile($img);
  echo $img;
  $sql = "UPDATE product SET descricao = '$descricao', 
          preco = '$preco', 
          quantidade = '$quantidade', 
          unidade = '$unidade', 
          imagem = '$img' 
          WHERE id = '$id'";
  $product = $conn->prepare($sql);
  $product -> execute();

  if($product){
    echo 'Produto alterado com sucesso';
    header('Location: ../frontend/listarProduto.php');
  } else {
    echo 'Erro ao alterar o produto';
  }
}
}
