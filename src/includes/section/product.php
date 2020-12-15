<section class="service wrapper background-grey">
    <div class="container">
        <h2>La carte</h2>
        <p><?= getProductTypeDescription($_GET['product-type-id']); ?></p>
        <p>
            <ul class="product-types-links">
               
                <?php 
                    $productTypes = getProductTypes();
                    foreach($productTypes as $productType) {
                        $linkProductType = 'carte.php?product-type-id='. $productType['id']; ?>
                        <li><a class="black-button <?php if ($_GET['product-type-id'] === $productType['id']) echo 'active'; ?>" href="<?= $linkProductType ?>"><?= $productType['type'] ?></a></li>
                <?php  } ?>
                </li>
            </ul>
        </p>
        <div class="table-wrapper">
            <table>
                <thead>
                    <tr>
                        <th></th>
                        <th>Description</th>
                        <th>Prix</th>
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
                        </tr>
                        
            <?php   }   ?>
        <?php   }  ?>
                </tbody>
        </table>
        </div>
    </div>
</section>