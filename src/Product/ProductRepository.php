<?php

namespace D365\Product;
use D365\Product\ProductInterface;
use PDO;

class ProductRepository
{
    /**
     * @var PDO
     */
    private $pdo;
    private $product;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
        $this->product = new Product();
    }
}