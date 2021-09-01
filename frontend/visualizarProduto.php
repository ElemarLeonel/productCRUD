<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Visualizar Produto</title>
  <?php
  include_once '../utils/links_css.php';
  include_once '../utils/links_js.php';
  include_once '../utils/upload.php';
  ?>
</head>

<body>
  <div class="modal fade text-center" id="visualizarProduto<?php echo $product['id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Detalhes do Produto</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <?php echo '<img class="rounded" width="150" height="150" src="../images/'.$product['imagem'].'"><br>'; ?>
          <h4><?php echo $product['descricao']; ?></h4>
          <h6><?php echo "Preço: "."R$ ".$product['preco']; ?></h6>
          <h6><?php echo "Quantidade: ".$product['quantidade']." ".$product['unidade']; ?></h6>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Fechar</button>
        </div>
      </div>
    </div>
  </div>
</body>

</html>