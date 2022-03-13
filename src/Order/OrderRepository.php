<?php

namespace D365\Order;

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

    public function get(int $orderId): Order
    {

    }
}
