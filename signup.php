<?php require_once("templates/header.php") ?>
    <section class="container signup">
        <div class="row g-2 justify-content-around">
            <div class="col-md-7 d-flex justify-content-center order-lg-2"> 
                <div class="p-3">
                    <img src="<?= $BASE_URL ?>/img/site/header.jpg" alt="header" class="mx-auto d-block w-100 img-fluid">
                </div>                
            </div>
            <div class="col-md-5 d-flex justify-content-center align-items-center order-lg-2">
                <div class="p-3">
                    <form method="POST" action="<?= $BASE_URL ?>auth_process.php">
                        <input type="hidden" name="type" value="signup">
                        <h4>Registar</h4>
                        <p>Por favor preencha o formulário abaixo para se registar </p>
                        <hr>
                
                        <div class="col-md-12">
                            <label for="nome" class="form-label"><b>Nome Completo</b></label>
                            <input type="text" class="form-control" id="nome" name="name" placeholder="Insira o nome" required>
                        </div>

                        <div class="col-md-12 mt-3">
                            <label for="username" class="form-label"><b>Username</b></label>
                            <input type="text" class="form-control" id="username" name="username" placeholder="Insira o Username" required>
                        </div>
                
                        <div class="col-md-8 mt-3">
                            <label for="province" class="form-label"><b>Provincia</b></label>
                            <select class="form-select w-100" id="province" name="province" required>
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
                            <label for="city" class="form-label"><b>Cidade</b></label>
                            <input type="text" class="form-control" id="city" name="city" placeholder="Insira a sua cidade" required>
                        </div>
                
                        <div class="col-md-12 mt-3">
                            <label for="email" class="form-label"><b>Email</b></label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="Insira o email" required>
                        </div>
                
                        <div class="col-md-12 mt-3">
                            <label for="password" class="form-label"><b>Palavra-Passe</b></label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="Insira a Palavra-Passe" required>
                        </div>
                
                        <div class="col-md-12 mt-3">
                            <label for="password_confirmation" class="form-label"><b>Confirmar a Palavra-Passe</b></label>
                            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
                        </div>
                
                        <div class="form-check mt-3">
                            <input class="form-check-input" type="checkbox" id="invalidCheck" required>
                            <label class="form-check-label" for="invalidCheck">
                                Criando uma conta na nossa plataforma está a concordar com os nossos Termos e Condições em matéria de privacidade
                            </label>
                        </div>
                
                        <button type=submit class="form-btn btn btn-success w-100 mt-3">Registar Conta</button>
                
                        <p class="mt-4">Já tem uma conta? <a href=" login_form.php">Entrar</a></p>
                
                        <p class="mt-4">Voltar a <a href="index.php">Pagina Inicial</a></p>

                    </form>
                </div>
            </div>
        </div>
    </section>
<?php require_once("templates/footer.php") ?>