<?php require_once("templates/dashboard-sidemenu.php"); ?>

<div class="col offset-2 mt-4">
    <div class="text-center">
        <h4>Alterar crendenciais</h4>
        <p>Por favor, preencha os campos abaixo para alterar as credenciais e clique em gravar</p>
    </div>
    <hr>

    <?php if (!empty($flassMessage["msg"])) : ?>
        <div class="msg-container">
            <p class="msg <?= $flassMessage["type"] ?>"><?= $flassMessage["msg"] ?></p>
        </div>
    <?php endif ?>

    <div class="col-md-4 align-items-center">
        <form method="POST" action="<?= $BASE_URL ?>user_process.php">
            <input type="hidden" name="type" value="changeEmail">
            <div class="form-group mt-5">
                <h4 class="text-center">Alterar email</h4>
                <div class="form-group mt-3">
                    <label for="email" class="form-label"><b>Email actual</b></label>
                    <input type="email" class="form-control" id="email" disabled value="<?= $userData->email ?>">
                </div>

                <div class="form-group mt-3">
                    <label for="email" class="form-label"><b>Novo email</b></label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Insira o novo email" required>
                </div>
            </div>
            <input type=submit class="form-btn btn btn-success w-100 mt-3" value="Alterar">
        </form>

        <form method="POST" action="<?= $BASE_URL ?>user_process.php">
            <input type="hidden" name="type" value="changePassword">
            <div class="col-md-12 mt-5">
                <h4 class="text-center"> Alterar a palavra-passe</h4>
                <div class="form-group mt-3">
                    <label for="current_password" class="form-label"><b>Palavra-Passe actual</b></label>
                    <input type="password" class="form-control" id="current_password" name="current_password" placeholder="Insira a palavra-passe actual" required>
                </div>

                <div class="form-group mt-3">
                    <label for="new_password" class="form-label"><b>Nova palavra-Passe</b></label>
                    <input type="password" class="form-control" id="new_password" name="new_password" placeholder="Insira a nova palavra-passe actual" required>
                </div>

                <div class="form-group mt-3">
                    <label for="confirm_password" class="form-label"><b>Confirmar a Palavra-Passe</b></label>
                    <input type="password" class="form-control" id="confirm_password" name="confirm_password" placeholder="Confirma a nova palavra-passe" required>
                </div>
            </div>
            <input type=submit class="form-btn btn btn-success w-100 mt-3" value="Alterar">
        </form>
    </div>
</div>