<section class="service wrapper background-grey">
    <div class="container">
        <h2>Faites vous plaisir !</h2>
        <div class="cards products">
            <?php 
                $products = getProducts($_GET['product-type-id']);

                if (!empty($products)) {
                    foreach($products as $product) { 
                        ?>
                                <div class="card product">
                                    <h4 class="product-type"><?= $product['name']; ?></h4>
                                <figure>
                                    <img src="<?= $product['image'] ?>" alt="<?= $product['description']; ?>" width="250">
                                    <figcaption><?= $product['description'] ?></figcaption>
                                </figure>
                                    
                                </div>
            <?php   }   ?>
        <?php   } ?>
        </div>
    </div>
</section>