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
    }

    public function getOrders(): array
    {
        $sql = 'SELECT * FROM orders';
        $orders = $this->pdo->query($sql)->fetchAll();

        return $orders;
    }

    public function get(int $orderId): Order
    {
        $sql = 'SELECT * FROM products WHERE sku = $sku LIMIT 1';
        $product = $this->pdo->query($sql);

        return $product;
    }
}
