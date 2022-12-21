<?php require_once("templates/dashboard-sidemenu.php"); ?>

<div class="col py-3">

    <form method="POST" action="<?= $BASE_URL ?>auth_process.php">
        <div class="form-group mt-5">
            <h4 class="text-center">Alterar email</h4>
            <div class="form-group t-3">
                <label for="email" class="form-label"><b>Email</b></label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Insira o email" required>
            </div>

            <div class="fform-groupmt-3">
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
                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
            </div>
        </div>
        <button type=submit class="form-btn btn btn-success w-100 mt-3">Registar Conta</button>
    </form>
</div>