<?php require_once("templates/dashboard-sidemenu.php") ?>
<div class="col offset-2">
    <div class="col-md-12 ms-sm-auto col-lg-12 px-md-4 mt-4">
        <div class="text-center">
            <h4>Adicione um produto a montra</h4>
            <p>Por favor preencha o formulário abaixo para e clique em gravar</p>
        </div>
        <hr>
        <form method="post" action="<?= $BASE_URL ?>product_process.php" enctype="multipart/form-data">
            <input type="hidden" name="type" value="create">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap border-bottom">
                <div class="column-1 me-5">
                    <div class="col-md-12 mt-3">
                        <label for="product_name" class="form-label"><b>Nome do Produto</b></label>
                        <input type="text" class="form-control" id="product_name" name="product_name" placeholder="Insira o nome do produto" required>
                    </div>

                    <div class="col-md-12 mt-3">
                        <label for="category" class="form-label"><b>Categoria</b></label>
                        <select class="form-select w-100" id="category" name="category" required>
                            <option selected disabled value="">Escolha a categoria do produto</option>
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
                        <input type="number" step=".01" class="form-control" id="price" name="price" placeholder="0.00" required>
                    </div>

                    <div class="col-md-12 mt-3">
                        <label for="unit" class="form-label"><b>Unidade de Medida</b></label>
                        <select class="form-select w-100" id="unit" name="unit" required>
                            <option selected disabled value="">Escolha a quantidade</option>
                            <option value="gramas">Gramas</option>
                            <option value="kg">Kilogramas (kg)</option>
                            <option value="unidades">Unidades</option>
                            <option value="sacos">Saco</option>
                            <option value="outros">Outro</option>
                        </select>
                    </div>

                    <div class="col-md-12 mt-3">
                        <label for="sold_off" class="form-label"><b>Esgotado</b></label>
                        <input type="checkbox" id="sold_off" name="sold_off" value="0">
                    </div>

                    <div class="col-md-12 mt-3">
                        <label for="datainicio">Data inicial</label>
                        <input type="date" id="date_start" name="date_start" required>
                    </div>

                    <div class="col-md-12 mt-3">
                        <label for="datafim">Data Final</label>
                        <input type="date" id="date_end" name="date_end" required>
                    </div>
                </div>

                <div class="colomun-2">

                    <div class="col-md-12 mt-3">
                        <label for="province" class="form-label"><b>Província</b></label>
                        <select class="form-select w-100" id="province" name="province" required>
                            <option selected disabled value="">Escolha a provincia</option>
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
                        <input type="text" class="form-control" id="city" name="city" placeholder="Insira a cidade" required>
                    </div>

                    <div class="col-md-12 mt-3">
                        <label for="description" class="form-label"> <b>Descrição do Produto:</b></label>
                        <textarea type="text" name="description" class="form-control" id="description" placeholder="Descreva o Produto" required></textarea>
                    </div>

                    <div class="col-md-12 mt-3">
                        <label for="image" class="form-label"> <b>Seleccionar imagem:</b></label>
                        <input type="file" id="image" class="form-control" name="image" accept="image/*" required>
                    </div>

                    <div class="col-12 mt-3">
                        <input class="btn btn-success w-100" name="productSubmit" type="submit" value="Adicionar">
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