<?php
    include '../database/config.php';
    include '../utils/upload.php';

    if(isset($_POST['btnCadastrar'])){
      $descricao = $_POST['descricao'];
      $preco = $_POST['preco'];
      $quantidade = $_POST['quantidade'];
      $unidade = $_POST['unidade'];
      $img = $_FILES['img'];

      if(validaImagem($img) == true){
        echo 'Imagem incorreta';
      } else {
        $img = uploadFile($img);
        echo $img;
        $product = $conn->prepare("INSERT INTO product(descricao, preco, quantidade, unidade, imagem)".
                                "VALUES (?, ?, ?, ?, ?)");
        $product -> bindParam(1, $descricao);
        $product -> bindParam(2, $preco);
        $product -> bindParam(3, $quantidade);
        $product -> bindParam(4, $unidade);
        $product -> bindParam(5, $img);
        $product -> execute(); 
        echo 'Produto Cadastrado com sucesso';
        header('Location: ../frontend/listarProduto.php');
      }
    }
?>