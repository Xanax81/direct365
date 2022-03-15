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

    public function getProducts(): array
    {
        $sql = 'SELECT * FROM products';
        $products = $this->pdo->query($sql)->fetchAll();

        return $products;
    }

    public function getProduct($sku): string
    {
        $sql = 'SELECT * FROM products WHERE sku = $sku LIMIT 1';
        $product = $this->pdo->query($sql);

        return $product;
    }
}