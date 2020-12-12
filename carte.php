<!DOCTYPE html>
<html lang="fr">
    <head>
        <?php include 'includes/head.php'; ?>
    </head>
    <body>
    <header id="header" class="header">
        <?php 
        $currentPage = 'contact';
        include 'includes/menu.php'; ?>
    </header>
    <section class="service wrapper background-grey">
        <div class="container">
                <h2>Faites vous plaisir !</h2>
                <div class="cards products">
                    <?php 
                        $productTypes = getProductTypes();
                        foreach($productTypes as $productType) { 
                    ?>
                        <div class="card product">
                            <h3 class="product-type"><?= $productType['type']; ?></h3>
                            <img src="<?= $productType['image']; ?>" alt="<?= $productType['description']; ?>" width="250">
                            <a class="red-button" href="#">Voir la carte</a>
                        </div>

                    <?php } ?>
            
                </div>
               
            </div>


    </section>
    <?php include 'includes/footer.php'; ?>
    <?php include 'includes/button_whatsapp.php'; ?>
    </body>
</html>