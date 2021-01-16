<div class="shopping-cart-action">
    <a class="red-button" href="src/scripts/action/remove_cart.php">  <i class="fas fa-trash-alt"></i> Vider  <span></span></a>
    <a class="blue-button" href="carte.php?product-type-id=2">  <i class="fas fa-shopping-cart"></i> Continuer  <span></span></a>
    <a class="green-button" href="checkout.php"> <i class="fas fa-credit-card"></i> Payer  <span><?= array_sum(array_column($_SESSION['cart_item'], 'total')); ?> €</span></a>
</div>
<br>