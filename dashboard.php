<?php

require_once("templates/dashboard-sidemenu.php");
require_once("dao/ProductDao.php");

$productDao = new ProductDao($conn, $BASE_URL);
$userProducts = $productDao->getProductsByUserId($userData->id);
?>
<div class="col offset-2">
  <div class="col-md-12 ms-sm-auto col-lg-12 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
      <h1 class="h2">Dashboard</h1>
      <div class="btn-toolbar mb-2 mb-md-0">
        <div class="btn-group me-2">
          <a href="<?= $BASE_URL ?>newproduct.php" class="btn btn-sm btn-success">+ Adicionar produto</a>
        </div>
      </div>
    </div>

    <?php if (!empty($flassMessage["msg"])) : ?>
      <div class="msg-container">
        <p class="msg <?= $flassMessage["type"] ?>"><?= $flassMessage["msg"] ?></p>
      </div>
    <?php endif ?>

    <h2>Produtos</h2>
    <div class="table-responsive">
      <table class="table table-striped table-sm text-center align-items-center">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Imagem</th>
            <th scope="col">Nome</th>
            <th scope="col">Descrição</th>
            <th scope="col">Categoria</th>
            <th scope="col">Provincia</th>
            <th scope="col">Cidade</th>
            <th scope="col">Unit/Medida</th>
            <th scope="col">Preço</th>
            <th scope="col">Data inicial</th>
            <th scope="col">Data final</th>
            <th scope="col" class="actions-column">Ações</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($userProducts as $products) : ?>
            <tr>
              <td><?= $products->id ?></td>
              <td><img src="<? $BASE_URL ?>img/products/<?= $products->image ?>" width="50px" height="50px" style="object-fit: cover;"></td>
              <td><?= $products->product_name ?></td>
              <td><?= $products->description ?></td>
              <td><?= $products->category ?></td>
              <td><?= $products->province ?></td>
              <td><?= $products->city ?></td>
              <td><?= $products->unit ?></td>
              <td><?= $products->price ?></td>
              <td><?= $products->date_start ?></td>
              <td><?= $products->date_end ?></td>
              <td class="actions-column d-flex justify-content-center  pb-3">
                <a href="<?= $BASE_URL ?>editProduct.php?id=<?= $products->id ?>" class="btn btn-warning"><i class="far fa-edit"></i></a>
                <form action="<?= $BASE_URL ?>product_process.php?id=<?= $products->id ?>" class="ms-2" method="POST">
                  <input type="hidden" name="type" value="delete">
                  <input type="hidden" name="id" value="<?= $products->id ?>">
                  <button type="submit" class="btn btn-danger"><i class="fas fa-times"></i></a>
                </form>
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </div>
</div>
</div>
</div>

</body>

</html>