<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Listar Produtos</title>

  <?php
  include '../utils/links_css.php';
  include '../utils/links_js.php';
  include '../database/config.php';
  ?>
</head>

<body>
  <div class="container-fluid">
    <h1 class="mt-4">Listar Produtos</h1>
    <table class="table table-striped table-responsive">
      <thead>
        <tr>
          <th scope="col">Id</th>
          <th scope="col">Descrição</th>
          <th scope="col">Preço</th>
          <th scope="col">Quantidade</th>
          <th scope="col">Unidade</th>
          <th scope="col">Imagem</th>
          <th scope="col">Ações</th>
        </tr>
      </thead>
      <tbody>

        <?php
          $sql = "SELECT id, descricao, preco, quantidade, unidade, imagem FROM product";
          $stmt = $conn->prepare($sql);
          $stmt -> execute();

          while($product = $stmt->fetch(PDO::FETCH_ASSOC)):
        ?>

        <tr>
        <?php 
          require './excluirProduto.php'; 
          require './visualizarProduto.php';
        ?>

          <th scope="row"><?php echo $product['id']; ?></th>
          <td><?php echo $product['descricao']; ?></td>
          <td><?php echo $product['preco']; ?></td>
          <td><?php echo $product['quantidade']; ?></td>
          <td><?php echo $product['unidade']; ?></td>
          <td><?php echo $product['imagem']; ?></td>
          <td>
            <button type="button" class="btn btn-secondary btn-sm" data-bs-toggle="modal" data-bs-target="#visualizarProduto<?php echo $product['id']; ?>">
              <i class="fas fa-eye"></i>
            </button>
            <a class="btn btn-primary btn-sm" href="alterarProduto.php?id=<?php echo $product['id']; ?>">
              <i class="fas fa-edit"></i>
            </a>
            <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#excluirProduto<?php echo $product['id']; ?>">
              <i class="fas fa-trash"></i>
            </button>
          </td>
        </tr>
        <?php endwhile; ?>
      </tbody>
    </table>
    <div class="mx-auto" style="padding-left: 500px;">
      <a class="btn btn-primary btn-block col-md-4" href="cadastrarProduto.php">Cadastrar Produto</a>
    </div>
  </div>
</body>

</html>