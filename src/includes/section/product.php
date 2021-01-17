<?php 
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>
<section class="service wrapper background-grey">
    <div class="container">
        <h2>La carte</h2>
        <p><?= getProductType($_GET['product-type-id'], 'description'); ?></p>
        <p>
            <ul class="product-types-links">
                <?php 
                        $productTypes = getProductTypes();
                        foreach($productTypes as $productType) {
                            $linkProductType = 'carte.php?product-type-id='. $productType['id']; ?>
                            <li><a class="black-button <?php if ($_GET['product-type-id'] === $productType['id']) echo 'active'; ?>" href="<?= $linkProductType ?>"><?= $productType['type'] ?></a></li>
                <?php   } ?>
                </li>
            </ul>
        </p>
        <!-- Button to display shopping cart page -->
        <?php include 'src/includes/shared/button_cart.php' ?>
        <div class="table-wrapper">
            <table>
                <thead>
                    <tr>
                        <th></th>
                        <th>Description</th>
                        <th>Prix</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
            <?php 
                $products = getProducts($_GET['product-type-id']);
                if (!empty($products)) {
                    foreach($products as $product) { 
                        ?>
                        <tr>
                            <td><?= $product['name']; ?></td>
                            <td><?= $product['description']; ?></td>
                            <td><?= $product['price']; ?>€</td>
                            <td>
                                <form action="src/scripts/action/add_cart.php?action=add" method="post">
                                    <input type="number" class="product-quantity" name="quantity" value="1" min="1">
                                    <input type="hidden" name="product_id" value="<?= $product['id'] ?>">
                                    <button type="submit" class="green-button small-button"><i class="fas fa-cart-plus"></i></button>
                                </form>
                            </td>
                        </tr>

            <?php   }   ?>
        <?php   }  ?>
                </tbody>
        </table>
        <!-- Button to display shopping cart page -->
        <?php include 'src/includes/shared/button_cart.php' ?>
        </div>
    </div>
</section>