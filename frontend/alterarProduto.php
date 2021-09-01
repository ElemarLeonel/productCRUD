<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cadastrar Produto</title>

  <?php
  include_once '../utils/links_css.php';
  include_once '../utils/links_js.php';
  include_once '../database/config.php';

  if(isset($_GET['id'])){
    $id = $_GET['id'];
    $sql = "SELECT id, descricao, preco, quantidade, unidade, imagem FROM product WHERE id = '$id'";
    $prod = $conn->prepare($sql);
    $prod->execute();

    while($product = $prod->fetch(PDO::FETCH_ASSOC)):
  ?>
</head>

<body>
  <div class="container-fluid">
    <div class="row">
    <h1 class="mt-4">Alterar Produto</h1>
      <form action="../backend/editarProduto.php" method="POST" 
      enctype="multipart/form-data">

        <input type="hidden" name="id" value="<?php echo $product['id']; ?>">

        <div class="col-12 mt-3">
          <div class="input-group mb-3">
            <span class="input-group-text" id="inputGroup-sizing-default">Descrição</span>
            <input type="text" class="form-control" aria-label="Sizing example input" 
            aria-describedby="inputGroup-sizing-default" required name="descricao"
            value="<?php echo $product['descricao']; ?>">
          </div>
        </div>

        <div class="row mt-4">
          <div class="input-group mb-3 col">
            <span class="input-group-text">Preço</span>
            <input type="text" class="form-control" required name="preco"
            value="<?php echo $product['preco']; ?>"> 
          </div>
          
          <div class="input-group mb-3 col">
            <span class="input-group-text">Quantidade</span>
            <input type="number" class="form-control" required name="quantidade"
            value="<?php echo $product['quantidade']; ?>">
          </div>

          <div class="input-group mb-3 col">
            <label class="input-group-text" for="inputGroupSelect01">Unidades</label>
            <select class="form-select" id="inputGroupSelect01" required name="unidade"
            value="<?php echo $product['unidade']; ?>">
              <option selected disabled>Escolha...</option>
              <option value="PÇ">PÇ</option>
              <option value="MT">MT</option>
              <option value="KG">KG</option>
            </select>
          </div>

          <div class="col-12 mt-3">
            <div class="input-group mb-3">
              <input type="file" class="form-control" id="inputGroupFile02" name="img" required
              value="<?php echo $product['imagem']; ?>">
              <label class="input-group-text" for="inputGroupFile02">Imagem</label>
            </div>
          </div>

          <div class="row mt-3">
            <div class="col">
              <button type="submit" class="btn btn-success" name="btnAtualizar">Atualizar</button>
              <button type="reset" class="btn btn-warning m-1">Limpar</button>
            </div>
          </div>
        <?php endwhile; } ?>
        </div>
      </form>
    </div>
  </div>
</body>

</html>