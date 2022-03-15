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

        $arr = [];
        foreach ($products as $product)
        {
            $temp = new Product();
            $temp->setName($product['name']);
            $temp->setSku($product['sku']);
            $temp->setPrice($product['price']);
            $temp->setDescription($product['description']);
            array_push($arr, $temp);
        }

        return $arr;
    }

    public function getProduct($sku): Product
    {
        $sql = 'SELECT * FROM products WHERE sku = '. '\'' . $sku . '\'' .' LIMIT 1';
        $product = $this->pdo->query($sql)->fetch();
        $actualProduct = new Product();
        $actualProduct->setName($product['name']);
        $actualProduct->setSku($product['sku']);
        $actualProduct->setPrice($product['price']);
        $actualProduct->setDescription($product['description']);

        return $actualProduct;
    }
}
