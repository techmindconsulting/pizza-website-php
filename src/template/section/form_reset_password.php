<section class="service wrapper contact background-grey">
    <div class="container form">
        <h2>Nouveau mot de passe</h2>
        <?php 
                getFlash('login');
        ?>
        <form id="login-form" name="login-form" method="POST" action="src/action/update_password.php">
            <div class="form-group">
                <label for="new_password">Nouveau mot de passe</label>
                <input class="form-control" type="password" id="new_password" name="new_password" placeholder="Minimum de 4 caractères" minlength="4" required>
            </div>
            <div class="form-group">
                <label for="repeat_password">Répéter le mot de passe</label>
                <input class="form-control" type="password" id="repeat_password" name="repeat_password" placeholder="Minimum de 4 caractères" minlength="4" required>
            </div>
            <div>
                <input type="hidden" name="token" value="<?= $token ?>">
                <input type="hidden" name="email" value="<?= $email ?>">
                <input  class="black-button" type="submit" value="Valider">
            </div>
        </form>
    </div>
</section>