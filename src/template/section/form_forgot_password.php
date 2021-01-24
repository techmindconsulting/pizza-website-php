<section class="service wrapper contact background-grey">
    <div class="container form">
        <h2>Mot de passe oublié</h2>
        <?php 
                getFlash('login');
                getFlash('csrf_token');
        ?>
        <form id="forgot-password-form" name="forgot-password-form" method="POST" 
            action="src/action/send_reset_link_password.php">
            <div class="form-group">
                <label for="email">Email</label>
                <input class="form-control" type="email" id="email" name="email" placeholder="Merci de saisir votre email" required>
            </div>
            <div>
                <input type="hidden" value="forgot-password-form" name="form-name">    
                <input type="hidden" value="<?= generateCsrfToken('forgot-password-form') ?>" name="token">
                <input  class="black-button" type="submit" value="Valider">
            </div>
        </form>
    </div>
</section>