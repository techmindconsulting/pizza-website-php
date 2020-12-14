<section class="service wrapper background-grey">
    <div class="container">
        <h2>Faites vous plaisir !</h2>
        <div class="cards products">
            <?php 
                $productTypes = getProductTypes();
                foreach($productTypes as $productType) { 
            ?>
                <?php 
                    $linkProductType = 'carte.php?product-type-id='. $productType['id'];
                ?>
                <a href="<?= $linkProductType ?>">
                    <div class="card product">
                        <h3 class="product-type"><?= $productType['type']; ?></h3>
                        <img src="<?= $productType['image']; ?>" alt="<?= $productType['description']; ?>" width="250">
                    </div>
                </a>
            <?php } ?>
        </div>
    </div>
</section>