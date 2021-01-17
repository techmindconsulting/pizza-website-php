<?php 

function createOrder(int $userId, array $data): int 
{
    try {
        global $connexion;

        $sql = "INSERT INTO `order` (user_id, ordered_at, status, total) VALUES (:user_id, :ordered_at, :status, :total)";

        $status = PAYMENT_STATUS_PENDING;
        $orderedAt = (new DateTime())->format('Y-m-d H:i:s');
        $statement = $connexion->prepare($sql);

        $statement->bindParam(':user_id', $userId);
        $statement->bindParam(':ordered_at', $orderedAt);
        $statement->bindParam(':status', $status);
        $statement->bindParam(':total', $data['cart_total']);

        $statement->execute();

        return $connexion->lastInsertId();
    
    } catch(Exception $exception) {
        echo $exception->getMessage();
        die;
    }
}

function createOrderItem(array $data): void 
{    
    try {
        global $connexion;

        $sql = "INSERT INTO `order_item` (order_id, product_id, quantity) VALUES (:order_id, :product_id, :quantity)";
        $statement = $connexion->prepare($sql);
        $connexion->beginTransaction();

        $orderId = $data['order_id'];
        foreach($data['cart_item']  as $productId => $item) {
            $statement->bindParam(':order_id', $orderId);
            $statement->bindParam(':product_id', $productId);
            $statement->bindParam(':quantity', $item['quantity']);
            $statement->execute();
        }
        
        $connexion->commit();        
    } catch(Exception $exception) {
        echo $exception->getMessage();
        die;
    }
}

function getOrderItems($id)
{
    global $connexion;

    $sql = "SELECT o.id, o.ordered_at, pt.type, p.name, p.price, ot.quantity, (p.price * ot.quantity) as total 
    FROM `order` o
    INNER JOIN order_item ot ON ot.order_id = o.id 
    INNER JOIN product p ON p.id = ot.product_id
    INNER JOIN product_type pt ON pt.id = p.product_type_id
    WHERE o.id = :order_id";

    $statement = $connexion->prepare($sql);
    $statement->bindParam(':order_id', $id);
    $statement->setFetchMode(PDO::FETCH_ASSOC);

    $statement->execute();

    return $statement->fetchAll();
}