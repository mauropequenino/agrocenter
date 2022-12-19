<?php require_once("templates/header.php") ?>
    <section class="container ">
        <div class="row g-2 justify-content-around">
            <div class="col-md-12 d-flex justify-content-center align-items-center order-lg-2">
                <div class="p-3">
                    <form method="POST" action="<?= $BASE_URL ?>auth_process.php">
                        <input type="hidden" name="type" value="signup">
                        <h4 class="text-center">Editar perfil</h4>
                        <p class="text-center">Por favor preencha o formulário abaixo para se registar </p>
                        <hr>
                
                        <div class="col-md-12">
                            <label for="nome" class="form-label"><b>Nome</b></label>
                            <input type="text" class="form-control" id="nome" name="nome" placeholder="Insira o nome" required>
                        </div>
                
                        <div class="col-md-12 mt-3">
                            <label for="nuit" class="form-label"><b>Nuit</b></label>
                            <input type="text" class="form-control" id="nuit" name="nuit" placeholder="Insira o NUIT" required>
                        </div>
                
                        <div class="col-md-12 mt-3">
                            <label for="username" class="form-label"><b>Username</b></label>
                            <input type="text" class="form-control" id="username" name="username" placeholder="Insira o Username" required>
                        </div>
                
                        <div class="col-md-8 mt-3">
                            <label for="provincia" class="form-label"><b>Provincia</b></label>
                            <select class="form-select w-100" id="provincia" name="provincia" required>
                                <option selected disabled value="">Escolha a Provincia:</option>
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
                            <label for="cidade" class="form-label"><b>Cidade</b></label>
                            <input type="text" class="form-control" id="cidade" name="cidade" placeholder="Insira a sua cidade " required>
                        </div>

                        <div class="col-md-12 mt-3">
                            <label for="contacto" class="form-label"><b>Contacto</b></label>
                            <input type="tel" class="form-control" id="contacto" name="contacto" placeholder="Insira o contacto" required>
                        </div>
                    </form>

                    <form method="POST" action="<?= $BASE_URL ?>auth_process.php">
                        <div class="col-md-12 mt-5">
                            <h4 class="text-center">Alterar email</h4>
                            <div class="form-group t-3">
                                <label for="email" class="form-label"><b>Email</b></label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="Insira o email" required>
                            </div>

                            <div class="form-group mt-3">
                                <label for="email" class="form-label"><b>Novo email</b></label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="Insira o novo email" required>
                            </div>
                        </div>
                    </form>

                    <form method="POST" action="<?= $BASE_URL ?>auth_process.php">
                        <div class="col-md-12 mt-5">
                            <h4 class="text-center"> Alterar a palavra-passe</h4>
                            <div class="form-group mt-3">
                                <label for="password" class="form-label"><b>Palavra-Passe</b></label>
                                <input type="password" class="form-control" id="password" name="password" placeholder="Insira a Palavra-Passe" required>
                            </div>
                    
                            <div class="form-group mt-3">
                                <label for="password_confirmation" class="form-label"><b>Confirmar a Palavra-Passe</b></label>
                                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
                            </div>
                        </div>
                        <button type=submit class="form-btn btn btn-success w-100 mt-3">Registar Conta</button>
                    </form>
        
                </div>
            </div>
        </div>
    </section>
<?php require_once("templates/footer.php") ?>