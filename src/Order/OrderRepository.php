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

    public function get(string $orderId): Order
    {
        $order = new Order();
        $order->setId($orderId);

        return $order;
    }
}
