
<div class="container form">
    <h2>Contact</h2>
    <?php 
            if (isset($_GET['sent']) && $_GET['sent'] === 'ok') { ?>
                <p class="alert alert-success">Votre email a bien été envoyé</p>
    <?php   } ?>

    <?php 
            if (isset($_GET['sent']) && $_GET['sent'] === 'ko') { ?>
                <p class="alert alert-error">Un problème a eu lieu lors de l'envoi d'email, merci de contacter le support.</p>
    <?php   } ?>

    <p>Envoyez nous vos messages, nous serons heureux de vous répondre!</p>
    <form name="contact-form" method="POST" action="scripts/send_email.php">
        <div class="form-group">
            <label for="lastname">Nom</label>
            <input class="form-control" type="text" id="lastname" name="lastname" placeholder="Nom" required>
        </div>
        <div class="form-group">
            <label for="firstname">Prénom</label>
            <input class="form-control" type="text" id="firstname" name="firstname" placeholder="Prénom" required> 
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input class="form-control" type="email" id="email" name="email" placeholder="Email" required>
        </div>
        <div class="form-group">
            <label for="phone">Téléphone</label>
            <input class="form-control" type="tel" id="phone" name="phone" placeholder="Numéro de téléphone" required>
        </div>
        <div class="form-group">
            <label for="message">Message</label>
            <textarea name="message" id="message" placeholder="Message" rows="6" required></textarea>
        </div>
        <div>
            <input  class="black-button" type="submit" value="Envoyer">
        </div>
    </form>
</div>