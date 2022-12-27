<?php require_once("templates/dashboard-sidemenu.php") ?>

<div class="col py-3 align-items-center">
    <h4 class="text-center">Editar perfil</h4>
    <p class="text-center">Edite o seu perfil alterando os campos abaixo</p>
    <hr>

    <?php if(!empty($flassMessage["msg"])): ?>
        <div class="msg-container">
            <p class="msg <?= $flassMessage["type"] ?>"><?= $flassMessage["msg"]?></p>
        </div>
    <?php endif ?>

    <form method="POST" action="<?= $BASE_URL ?>user_process.php" enctype="multipart/form-data">
        <input type="hidden" name="type" value="update">
        <div class="p-3 d-flex justify-content-between flex-wrap flex-md-nowrap">

            <div class="col-md-4">
                <div class="form-group">
                    <img class="img-fluid" id="profile-image" src="<?= $BASE_URL ?>img/users/<?= $userData->image ?>" alt="<?= $userData->name ?>">

                    <h4 class="mt-2"><?= $userData->name ?></h4>
                    <hr>

                    <div class="form-group">
                        <label for="image" class="form-label"> <b>Alterar imagem:</b></label>
                        <input type="file" name="image" class="form-control-file">
                    </div>
                </div>

                <div class="form-group mt-3">
                    <label for="name" class="form-label"><b>Nome Completo</b></label>
                    <input type="text" class="form-control" id="nome" name="name" placeholder="Insira o nome" value="<?= $userData->name ?>">
                </div>

                <div class="form-group mt-3">
                    <label for="nuit" class="form-label"><b>Nuit</b></label>
                    <input type="text" class="form-control" id="nuit" name="nuit" placeholder="Insira o NUIT" value="<?= $userData->nuit ?>">
                </div>

                <div class="form-group mt-3">
                    <label for="username" class="form-label"><b>Nome do usuário</b></label>
                    <input type="text" class="form-control" id="username" name="username" disabled value="<?= $userData->username ?>">
                </div>

            </div>

            <div class="col-md-4">
                <div class="form-group mt-3">
                    <div class="form-group">
                        <label for="province" class="form-label"><b>Provincia</b></label>
                        <select class="form-select w-100" id="province" name="province">
                            <option selected disabled value="Seleciona a sua provincia"><?= $userData->province ?></option>
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

                    <div class="form-group mt-3">
                        <label for="city" class="form-label"><b>Cidade</b></label>
                        <input type="text" class="form-control" id="city" name="city" placeholder="Insira a sua cidade" value="<?= $userData->city ?>">
                    </div>

                    <div class="form-group mt-3">
                        <label for="phone_number" class="form-label"><b>Contacto</b></label>
                        <input type="text" class="form-control" id="phone_number" name="phone_number" placeholder="Insira o contacto" value="<?= $userData->phone_number ?>">
                    </div>

                    <div class="col-md-12 mt-3">
                        <label for="bio" class="form-label"> <b>Biografia</b></label>
                        <textarea type="text" name="bio" class="form-control" id="bio" placeholder="Descreva o Produto"><?= $userData->bio ?></textarea>
                    </div>

                    <input type="submit" class="form-btn btn btn-success w-100 mt-3" value="Alterar">
                </div>
            </div>
        </div>
    </form>
</div>