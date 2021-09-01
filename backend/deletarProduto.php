<?php
    include_once '../database/config.php';

    if (isset($_POST['btnDeletar'])){
      $id = $_POST['id'];

      $sql = "DELETE FROM product WHERE id = $id";
      $product = $conn->prepare($sql);
      $product->execute();

      if($product){
        echo "<div class='alert alert-success alert-dismissible fade show col-md-s6 text-center' role='alert'> Deletado com sucesso
        <button type='button' class='close' data-dismiss='alert' aria-label='Close'> <span aria-hidden='true'>&times;</span> </button> </div>";
        header('Location: ../frontend/listarProduto.php');
      } else {
        echo "<div class='alert alert-danger alert-dismissible fade show col-md-s6 text-center' role='alert'> Erro ao deletar
        <button type='button' class='close' data-dismiss='alert' aria-label='Close'> <span aria-hidden='true'>&times;</span> </button> </div>";
        header('Location: ../frontend/listarProduto.php');
      }
    }
?>