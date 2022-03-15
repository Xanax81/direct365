<?php

namespace D365\Order;
use D365\Order\OrderInterface;
use PDO;

class OrderRepository
{

    /**
     * @var \PDO
     */
    private $pdo;

    public function __construct(\PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function save(Order $order)
    {
        $subtotal = 0;
        $id = uniqid();
        $products = $order->getProducts();
        foreach ($products as $product)
        {
            $subtotal += $product[0]->getPrice();

            $statement = $this->pdo->prepare('INSERT INTO order_products (orderid, productid, qty, subtotal)
            VALUES (:orderid, :productid, :qty, :subtotal)');

            $productsku = $product[0]->getSku();
            $productprice = $product[0]->getPrice();
            $statement->bindParam(':orderid', $id);
            $statement->bindParam(':productid', $productsku);
            $statement->bindParam(':qty', $product[1]);
            $statement->bindParam(':subtotal', $productprice);
            $statement->execute();
        }
        $statement = $this->pdo->prepare('INSERT INTO orders (id, total)
            VALUES (:orderid, :total)');

        $statement->bindParam(':orderid', $id);
        $statement->bindParam(':total', $subtotal);
        $statement->execute();
    }

    public function getOrders(): array
    {
        $sql = 'SELECT * FROM orders';
        $orders = $this->pdo->query($sql)->fetchAll();

        return $orders;
    }

    public function get(string $orderId): Order
    {
        $order = new Order();
        $order->setId($orderId);

        return $order;
    }
}
