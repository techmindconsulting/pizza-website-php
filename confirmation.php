<!DOCTYPE html>
<html lang="fr">
    <head>
        <?php include 'src/includes/shared/head.php'; ?>
    </head>
    <body>
    <header id="header" class="header">
        <?php 
        $currentPage = 'contact'; 
        include 'src/includes/shared/menu.php'; ?>
    </header>
    <section id="contact" class="wrapper background-grey">
        <div class="container">
            <h2>Merci pour votre commande</h2>
            <?php
            if (isset($_GET['confirm']) && $_GET['confirm'] === 'ok') { 
                        $orderId = isset($_GET['order_id']) ? $_GET['order_id'] : null;
                        ?>
                        <p class="alert alert-success"><i class="fas fa-hamburger"></i> Voici votre numéro de commande <?= $orderId; ?></p>
            <?php   } ?>
            <?php 
                    if (isset($_GET['confirm']) && $_GET['confirm'] === 'ko') { ?>
                        <p class="alert alert-error">Un problème a eu lieu lors de la commande, merci de contacter le support.</p>
            <?php   } ?>
            <?php $orderItems = getOrderItems($orderId); ?>
            <p><?= CONTACT_ADDRESS ?></p>
            <p><?= CONTACT_PHONE ?></p>

            <div class="table-wrapper">
                <table>
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
                            foreach($orderItems as $orderItem) {  ?>
                                <tr>
                                    <td><?= $orderItem['type']; ?></td>
                                    <td><?= $orderItem['name']; ?></td>
                                    <td><?= $orderItem['quantity']; ?></td>
                                    <td><?= $orderItem['price']; ?> €</td>
                                    <td><?= $orderItem['total']; ?> €</td>
                                </tr>
                    <?php   } ?>
                        </tr>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th colspan="4">Total</th>
                            <td><?= array_sum(array_column($orderItems, 'total')); ?> €</td>
                        </tr>
                    </tfoot>
                </table>
            </div>
            <p>Bonne apétit</p>
        </div>
    </section>
    <?php include 'src/includes/shared/footer.php'; ?>
    <?php include 'src/includes/shared/button_whatsapp.php'; ?>
    </body>
</html>