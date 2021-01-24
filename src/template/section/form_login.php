<section class="service wrapper contact background-grey">
    <div class="container form">
        <h2>Se connecter</h2>
        <?php 
                getFlash('login');
                getFlash('csrf_token');
        ?>
        <form id="login-form" name="login-form" method="POST" 
        action="src/action/login.php">
            <div class="form-group">
                <label for="email">Email</label>
                <input class="form-control" type="text" id="email" name="email" placeholder="Merci de saisir votre email" required>
            </div>
            <div class="form-group">
                <label for="password">Mot de passe</label>
                <input class="form-control" type="password" id="password" name="password" placeholder="Merci de saisir votre mot de passe" required>
            </div>
            <div class="form-group">
                <a href="forgot_password.php">Mot de passe oublié</a>
            </div>
            <div>
                <input type="hidden" value="login-form" name="form-name">
                <input type="hidden" value="<?= generateCsrfToken('login-form') ?>" name="token">
                <input  class="black-button" type="submit" value="Valider">
            </div>
        </form>
    </div>
</section>