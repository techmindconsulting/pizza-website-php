<!DOCTYPE html>
<html lang="fr">
    <head>
        <?php include 'src/template/shared/head.php'; ?>
    </head>
    <body>
    <header id="header" class="header">
        <?php 
        $currentPage = 'contact'; 
        include 'src/template/shared/menu.php'; ?>
    </header>
    <section id="contact" class="wrapper background-grey">
        <div class="container">
            <h2>Merci pour votre commande</h2>
            <?php 
                $orderId = $_GET['order_id'] ?? $_GET['order_id']; 
                getFlash('confirm-cart');
            ?>
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
                            <td><?= computeTotalOrder($orderItems); ?> €</td>
                        </tr>
                    </tfoot>
                </table>
            </div>
            <p>Bon Appétit</p>
            <a href="profile.php" class="black-button">Mon compte</a>
        </div>
    </section>
    <?php include 'src/template/shared/footer.php'; ?>
    <?php include 'src/template/shared/button_whatsapp.php'; ?>
    </body>
</html>