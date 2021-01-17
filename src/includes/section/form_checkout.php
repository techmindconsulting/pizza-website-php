<?php 
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
?>
<section class="service wrapper contact background-grey">
    <div class="container form">
        <h2>Validation du panier</h2>

        <form id="checkout-form" name="checkout-form" method="POST" action="src/scripts/action/confirm_cart.php">
            <div class="form-group">
                <label for="fullname">Nom complet</label>
                <input class="form-control" type="text" id="fullname" name="fullname" placeholder="Nom complet" required>
            </div>
            <div class="form-group">
                <label for="address">Addresse complete</label>
                <input class="form-control" type="text" id="address" name="address" placeholder="Addresse complete" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input class="form-control" type="email" id="email" name="email" placeholder="Email" required onkeyUp=checkEmail(this.value) >
                <p class="caption"></p>
            </div>
            <div class="form-group">
                <label for="phone">Téléphone</label>
                <input class="form-control" 
                type="tel" 
                id="phone"
                name="phone" 
                placeholder="Numéro de téléphone" 
                pattern="^(?:0|\(?\+33\)?\s?|0033\s?)[1-79](?:[\.\-\s]?\d\d){4}$"
                required>
            </div>
            <div class="form-group">
                <label for="email">Mot de passe</label>
                <input class="form-control" type="password" id="password" name="password" placeholder="Mot de passe" required>
            </div>
        </form>
        <table>
            <caption><i class="fas fa-shopping-cart"></i> Votre panier : <span> <?= computeTotalOrder($_SESSION['cart_item']); ?> </span>€</caption>
            <thead>
                <tr>
                    <th>Type de produit</th>
                    <th>Produit</th>
                    <th>Quantité</th>
                    <th>Price</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    foreach($_SESSION['cart_item'] as $productId => $item) {  ?>
                        <tr>
                            <td><?= getProductType($item['product_type_id']); ?></td>
                            <td><?= $item['name']; ?></td>
                            <td><?= $item['quantity']; ?></td>
                            <td><?= $item['price']; ?> €</td>
                            <td><?= $item['price'] * $item['quantity'] ?> €</td>
                        </tr>
            <?php   } ?>
            </tbody>
            <tfoot>
                <tr>
                    <th colspan="4">Total</th>
                    <td><?= computeTotalOrder($_SESSION['cart_item']) ?> €</td>
                </tr>
            </tfoot>
        </table>
        <div class="shopping-cart-action">
            <p class="info-order">Précisez votre numéro de commande au compteur lors du retrait.</p>
            <a class="blue-button" href="carte.php?product-type-id=2">  <i class="fas fa-shopping-cart"></i> Retour  <span></span></a>
            <button id="checkout" class="green-button" type="submit" form="checkout-form"><i class="fas fa-money-bill"></i> Payer <?= array_sum(array_column($_SESSION['cart_item'], 'total')); ?> € </button>
        </div>
    </div>
</section>
<?php 
    ob_start();
?>
<script>
    function checkEmail(data)
    {
        if (data.length !== 0) {
            const xmlHttp = new XMLHttpRequest();
            
            xmlHttp.onreadystatechange = function() {
                if (this.readyState === 4 && this.status === 200) {
                    const result = JSON.parse(this.responseText);
                    if (result.exists) {
                        document.getElementById('email').style.border = '2px solid red';
                        document.getElementById('checkout').disabled = true;
                        document.querySelector('p.caption').innerText = 'Email deja existant';
                    } else {
                        document.getElementById('email').style.border = '2px solid green';
                        document.getElementById('checkout').removeAttribute("disabled");
                        document.querySelector('p.caption').innerText = '';
                    }
                }
            }
            xmlHttp.open('GET', 'src/scripts/action/check_email_exists.php?email=' + data, true);
            xmlHttp.send();
        }
    }
</script>
<?php
    $scriptJavascript = ob_get_contents();
    ob_end_clean();
?>