<?php  if(!isset($_GET['order_id']))  { ?>
            <h2>Mes commandes</h2>
            <table>
                <tr>
                    <th>N°</th>
                    <th>Date commande</th>
                    <th>Total</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>

                <?php 
                foreach($statOrder['list'] as $order) { 
                    $link = "profile.php?order_id={$order['id']}";
                    ?>
                    <tr>
                        <td><a class="order-id" href="<?= $link ?>"><?= $order['id']; ?></a></td>
                        <td><?= $order['ordered_at']; ?></td>
                        <td><?= $order['total']; ?> €</td>
                        <td><span class="status <?= strtolower($order['status']) ?>"></span></td>
                        <td>
                            <?php 
                            if ("PAYMENT_STATUS_PENDING" === $order['status']) {
                                $formId = "cancel_order_". $order['id'];
                            ?>
                                <form id="<?= $formId ?>" action="src/action/cancel_order.php" method="post">
                                    <input type="hidden" value="<?= $order['id'];  ?>" name="order_id"> 
                                    <input type="hidden" value="<?= generateCsrfToken($formId) ?>" name="token">
                                    <button class="red-button small-button" type="submit"><i class="fas fa-trash"></i></button>
                                </form><?php
                            }   ?>
                        </td>
                    </tr> <?php
                } ?>
            </table>
<?php   } else {
            $orderItems = getOrderItems($_GET['order_id']);
        ?>
            <table>
                <caption><i class="fas fa-euro"></i> Total : <span> <?= computeTotalOrder($orderItems); ?> </span>€</caption>
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
                        foreach($orderItems as $productId => $item) { ?>
                            <tr>
                                <td><?= $item['type']; ?></td>
                                <td><?= $item['name']; ?></td>
                                <td><?= $item['quantity']; ?></td>
                                <td><?= $item['price']; ?> €</td>
                                <td><?= $item['price'] * $item['quantity'] ?> €</td>
                            </tr>
                <?php   } ?>
                </tbody>
                <tfoot>
                    <tr>
                        <th colspan="4">Total</th>
                        <td><?= computeTotalOrder($orderItems) ?> €</td>
                    </tr>
                </tfoot>
            </table>
            <a class="black-button" href="../../profile.php">Retour liste</a>
<?php }?>
