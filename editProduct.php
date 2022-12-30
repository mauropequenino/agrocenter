<?php

require_once("templates/dashboard-sidemenu.php");
require_once("dao/ProductDao.php");
require_once("models/User.php");

$user = new User();
$productDao = new ProductDao($conn, $BASE_URL);

$id = filter_input(INPUT_GET, "id");

$product;

if (empty($id)) {
    $message->setMessage("O producto não foi encontrado!", "error", "index.php");
} else {
    $product = $productDao->findById($id);

    //Verificar se o filme existe
    if (!$product) {
        $message->setMessage("O producto não foi encontrado!", "error", "index.php");
    }
}
?>

<div class="col offset-2">
    <div class="col-md-12 ms-sm-auto col-lg-12 px-md-4 mt-2">
        <div class="text-center">
            <h4>Editar Producto</h4>
            <p>Altere os dados do producto no formulário abaixo</p>
        </div>
        <hr>
        <div class="form-group">
            <img class="img-fluid" id="product-image" src="<?= $BASE_URL ?>img/products/<?= $product->image ?>" alt="<?= $product->name ?>">
        </div>

        <form method="post" action="<?= $BASE_URL ?>product_process.php" enctype="multipart/form-data">
            <input type="hidden" name="type" value="update">
            <input type="hidden" name="id" value="<?= $product->id; ?>">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap border-bottom">
                <div class="column-1 me-5">
                    <div class="col-md-12 mt-3">
                        <label for="product_name" class="form-label"><b>Nome do Produto</b></label>
                        <input type="text" class="form-control" id="product_name" name="product_name" value="<?= $product->product_name; ?>" placeholder="Insira o nome do produto">
                    </div>

                    <div class="col-md-12 mt-3">
                        <label for="category" class="form-label"><b>Categoria</b></label>
                        <select class="form-select w-100" id="category" name="category">
                            <option value=""><?= $product->category ?></option>
                            option value="gramas">Gramas</option>
                            <option value="cereais">Cereais</option>
                            <option value="legumes">Legumes</option>
                            <option value="tuberculos">tubérculos</option>
                            <option value="plantas-medicinais">Plantas Medicinais</option>
                            <option value="temperos-especiarias">Temperos e Especiarias</option>
                            <option value="xpto">XPTO</option>
                        </select>
                    </div>

                    <div class="col-md-12 mt-3">
                        <label for="price" class="form-label"><b>Preço do Produto/Unidade</b></label>
                        <input type="number" step=".01" class="form-control" id="price" name="price" placeholder="0.00" value="<?= $product->price ?>">
                    </div>

                    <div class="col-md-12 mt-3">
                        <label for="unit" class="form-label"><b>Unidade de Medida</b></label>
                        <select class="form-select w-100" id="unit" name="unit">
                            <option selected disabled value=""><?= $product->unit ?></option>
                            <option value="gramas">Gramas</option>
                            <option value="kg">Kilogramas (kg)</option>
                            <option value="unidades">Unidades</option>
                            <option value="sacos">Saco</option>
                            <option value="outros">Outro</option>
                        </select>
                    </div>

                    <div class="col-md-12 mt-3">
                        <label for="sold_off" class="form-label"><b>Esgotado</b></label>
                        <input type="checkbox" id="sold_off" name="sold_off" value="<?= $product->sold_off ?>">
                    </div>

                    <div class="col-md-12 mt-3">
                        <label for="datainicio">Data inicial</label>
                        <input type="date" id="date_start" name="date_start" value="<?= $product->date_start ?>">
                    </div>

                    <div class="col-md-12 mt-3">
                        <label for="datafim">Data Final</label>
                        <input type="date" id="date_end" name="date_end" value="<?= $product->date_end ?>">
                    </div>
                </div>

                <div class="colomun-2">

                    <div class="col-md-12 mt-3">
                        <label for="province" class="form-label"><b>Província</b></label>
                        <select class="form-select w-100" id="province" name="province">
                            <option selected disabled value=""><?= $product->province ?></option>
                            <option value="Cabo-Delgado">Cabo Delgado</option>
                            <option value="Niassa">Niassa</option>
                            <option value="Nampula">Nampula</option>
                            <option value="Zambezia">Zambezia</option>
                            <option value="Tete">Tete</option>
                            <option value="Manica">Manica</option>
                            <option value="Sofala">Sofala</option>
                            <option value="Inhambane">Inhambane</option>
                            <option value="Gaza">Gaza</option>
                            <option value="Maputo">Maputo</option>
                        </select>
                    </div>

                    <div class="col-md-12 mt-3">
                        <label for="city" class="form-label"><b>Cidade</b></label>
                        <input type="text" class="form-control" id="city" name="city" placeholder="Insira a cidade" value="<?= $product->city ?>">
                    </div>

                    <div class="col-md-12 mt-3">
                        <label for="description" class="form-label"> <b>Descrição do Produto:</b></label>
                        <textarea type="text" name="description" class="form-control" id="description" placeholder="Descreva o Produto"><?= $product->description ?></textarea>
                    </div>

                    <div class="col-md-12 mt-3">
                        <label for="image" class="form-label"> <b>Seleccionar imagem:</b></label>
                        <input type="file" id="image" class="form-control" name="image" accept="image/*">
                    </div>

                    <div class="col-12 mt-3">
                        <input class="btn btn-success w-100" name="productSubmit" type="submit" value="Alterar">
                    </div>

                    <p class="mt-4">Voltar ao <a href="<?= $BASE_URL ?>dashbord.php">Dashboard</a>.</p>
                </div>
        </form>
    </div>
</div>
</div>
</div>

</body>

</html>