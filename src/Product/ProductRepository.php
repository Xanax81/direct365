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

    public function save($name, $sku, $description, $price)
    {
        $this->product->setName($name);
        $this->product->setSku($sku);
        $this->product->setDescription($description);
        $this->product->setPrice($price);

        $this->saveToDatabase();
    }

    private function saveToDatabase()
    {
        $name = $this->product->getName();
        $sku = $this->product->getSku();
        $description = $this->product->getDescription();
        $price = $this->product->getPrice();

        $statement = $this->pdo->prepare('INSERT INTO products (name, sku, description, price)
            VALUES (:name, :sku, :description, :price)');
        $statement->bindParam(':name', $name);
        $statement->bindParam(':sku', $sku);
        $statement->bindParam(':description', $description);
        $statement->bindParam(':price', $price);
        $statement->execute();
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
