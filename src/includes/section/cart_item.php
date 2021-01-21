<?php 
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>

<section class="service wrapper background-grey">
    <div class="container">
        <h2>Panier</h2>
        <?php
            if (isset($_SESSION['cart_item']) && !empty($_SESSION['cart_item'])) {
                include 'src/includes/shared/button_shopping_cart.php';
        ?>
        <div class="table-wrapper">
            <table>
                <thead>
                    <tr>
                        <th>Type de produit</th>
                        <th>Produit</th>
                        <th>Quantité</th>
                        <th>Price</th>
                        <th>Total</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        foreach($_SESSION['cart_item'] as $productId => $item) {  ?>
                            <tr>
                                <td><?= getProductType($item['product_type_id']); ?></td>
                                <td><?= $item['name']; ?></td>
                                <td>
                                    <form action="src/scripts/action/add_cart.php?action=update" method="post">
                                        <input type="number" value="<?= $item['quantity'];  ?>" name="quantity" size="1" min="1" max="9"> 
                                        <input type="hidden" name="product_id" value="<?= $productId; ?>">
                                        <button class="green-button small-button" type="submit"><i class="fas fa-pen"></i></button>
                                    </form>
                                </td>
                                <td><?= $item['price']; ?> €</td>
                                <td><?= $item['price'] * $item['quantity'] ?> €</td>
                                <td>
                                    <a href="src/scripts/action/remove_cart.php?product_id=<?= $productId ?>" class="red-button small-button"> <i class="fas fa-trash-alt"></i></a>
                                </td>
                            </tr>
                <?php   } ?>
                    </tr>
                </tbody>
                <tfoot>
                    <tr>
                        <th colspan="4">Total</th>
                        <td><?= computeTotalOrder($_SESSION['cart_item']); ?> €</td>
                        <td></td>
                    </tr>
                </tfoot>
            </table>
            <?php 
                include 'src/includes/shared/button_shopping_cart.php';
            ?>
        </div>
        <?php } else { ?>
            <p>Le panier est vide</p>
            <a class="red-button" href="carte.php?product-type-id=2">Commander</a>
        <?php } ?> 
    </div>
</section>

