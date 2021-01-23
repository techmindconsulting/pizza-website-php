<section class="service wrapper contact background-grey">
    <div class="container form">
        <h2>Mot de passe oublié</h2>
        <?php 
                getFlash('login');
        ?>
        <form id="login-form" name="login-form" method="POST" action="src/action/send_reset_link_password.php">
            <div class="form-group">
                <label for="email">Email</label>
                <input class="form-control" type="email" id="email" name="email" placeholder="Merci de saisir votre email" required>
            </div>
            <div>
                <input  class="black-button" type="submit" value="Valider">
            </div>
        </form>
    </div>
</section>