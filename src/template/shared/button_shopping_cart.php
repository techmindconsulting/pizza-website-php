<div class="shopping-cart-action">
    <a class="red-button" href="src/action/remove_cart.php">  <i class="fas fa-trash-alt"></i> Vider  <span></span></a>
    <a class="blue-button" href="carte.php?product-type-id=2">  <i class="fas fa-shopping-cart"></i> Continuer  <span></span></a>
    <a class="green-button" href="checkout.php"> <i class="fas fa-credit-card"></i> Payer  <span><?= computeTotalOrder($_SESSION['cart_item']); ?> €</span></a>
</div>
<br>