<?php require_once("templates/dashboard-sidemenu.php") ?>

        <div class="col py-3 align-items-center">
            <h4 class="text-center">Editar perfil</h4>
            <p class="text-center">Edite o seu perfil alterando os campos abaixo</p>
            <hr>
            <div class="p-3 d-flex justify-content-between flex-wrap flex-md-nowrap">
                <div class="col-md-4">
                    <form method="POST" action="<?= $BASE_URL ?>auth_process.php" enctype="multipart/form-data">
                        <input type="hidden" name="type" value="signup">

                        <div class="form-group">
                            <img class="img-fluid" id="profile-image" src="<?= $BASE_URL ?>img/users/<?= $userData->image?>" alt="<?= $userData->name ?>">

                            <h4><?= $userData->name ?></h4>

                            <div class="form-group">
                                <label for="photo" class="form-label"> <b>Alterar imagem:</b></label>
                                <input type="file" name="photo" class="form-control-file">
                            </div>
                        </div>

                        <div class="form-group mt-3">
                            <label for="name" class="form-label"><b>Nome</b></label>
                            <input type="text" class="form-control" id="nome" name="name" placeholder="Insira o nome" value="<?= $userData->name ?>">
                        </div>
                
                        <div class="form-group mt-3">
                            <label for="nuit" class="form-label"><b>Nuit</b></label>
                            <input type="text" class="form-control" id="nuit" name="nuit" placeholder="Insira o NUIT" value="<?= $userData->nuit ?>">
                        </div>
                
                        <div class="form-group mt-3">
                            <label for="username" class="form-label"><b>Username</b></label>
                            <input type="text" class="form-control" id="username" name="username" placeholder="Insira o Username" value="<?= $userData->username ?>">
                        </div>
                    </form>
                </div>
                
                <div class="col-md-4">

                <div class="col-md-8 mt-3">
                            <label for="province" class="form-label"><b>Provincia</b></label>
                            <select class="form-select w-100" id="province" name="province" required>
                                <option selected disabled value=""><?= $userData->province ?></option>
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
                
                        <div class="cform-group mt-3">
                            <label for="city" class="form-label"><b>Cidade</b></label>
                            <input type="text" class="form-control" id="city" name="city" placeholder="Insira a sua cidade" value="<?= $userData->city ?>">
                        </div>

                        <div class="form-group mt-3">
                            <label for="phoneNumber" class="form-label"><b>Contacto</b></label>
                            <input type="tel" class="form-control" id="phoneNumber" name="phoneNumber" placeholder="Insira o contacto" value="<?= $userData->phoneNumber ?>">
                        </div>

                        <div class="col-md-12 mt-3">
                            <label for="bio" class="form-label"> <b>Biografia</b></label>
                            <textarea type="text" name="bio" class="form-control" id="bio" placeholder="Descreva o Produto"></textarea>
                        </div>

                        <button type="submit" class="form-btn btn btn-success w-100 mt-3">Alterar</button>
                </div>
              
            </div>
        </div>
