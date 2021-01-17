<?php if (isset($_SESSION['cart_item']) && !empty($_SESSION['cart_item'])) { 
            $nbItemsQuantity = getNbItemsQuantity($_SESSION['cart_item']);
?>
            <a class="blue-button" href="shopping_cart.php">  
                <i class="fas fa-shopping-cart"></i> 
                <span><?=  $nbItemsQuantity?> produit(s)</span>
            </a>
<?php } ?>