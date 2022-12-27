<?php   require_once("templates/header.php")  ?>

    <section class="container login">
        <div class="row g-2 justify-content-around">
            <div class="col-md-7 d-flex justify-content-center align-items-center order-lg-2"> 
                <div class="p-3">
                    <img src="<?= $BASE_URL ?>img/site/header.jpg" alt="header" class="mx-auto d-block w-100 img-fluid">
                </div>                
            </div>
            <div class="col-md-5 d-flex justify-content-center align-items-center order-lg-2">
                <div class="p-3">
                    <form action="<?= $BASE_URL ?>auth_process.php" method="POST">
                        <input type="hidden" name="type" value="login">

                        <h4>Entrar</h4>
                         <p>Por favor, preencha o formulário abaixo para poder aceder na plataforma.</p>
                        <hr>
                
                        <div class="col-md-12 mt-3">
                            <label for="email" class="form-label"><b>Email</b></label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="Insira o email" required>
                        </div>
                
                        <div class="col-md-12 mt-3">
                            <label for="password" class="form-label"><b>Palavra-Passe</b></label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="Insira a Palavra-Passe" required>
                        </div>
                
                        <input type="submit" class="form-btn btn btn-success w-100 mt-3" value="Entrar">
                
                        <p class="mt-4">Ainda não tem uma conta? <a href="<?= $BASE_URL ?>signup.php">Registar</a></p>
                
                        <p class="mt-4">Voltar a <a href="<?= $BASE_URL ?>index.php">Pagina Inicial</a>.</p>
                
                    </form>
                </div>
            </div>
        </div>
    </section>
<?php   require_once("templates/footer.php")  ?>
