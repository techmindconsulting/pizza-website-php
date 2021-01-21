<section class="service wrapper contact background-grey">
    <div class="container form">
        <h2>Se connecter</h2>
        <?php 
                getFlash('login');
        ?>
        <form id="login-form" name="login-form" method="POST" action="src/action/login.php">
            <div class="form-group">
                <label for="fullname">Email</label>
                <input class="form-control" type="text" id="email" name="email" placeholder="Merci de saisir votre email" required>
            </div>
            <div class="form-group">
                <label for="address">Mot de passe</label>
                <input class="form-control" type="password" id="password" name="password" placeholder="Merci de saisir votre mot de passe" required>
            </div>
            <div>
                <input  class="black-button" type="submit" value="Valider">
            </div>
        </form>
    </div>
</section>