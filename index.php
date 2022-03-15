<?php

use D365\Order\Order;
use D365\Order\OrderInterface;
use D365\Order\OrderRepository;
use D365\Product\ProductInterface;
use D365\Product\ProductRepository;

require_once './vendor/autoload.php';

if($argc > 1) {
    $argument = strtolower($argv[1]);
} else {
    echo<<<HELP
Usage:
   php index.php listProducts
   php index.php addProduct
   php index.php listOrders
   php index.php getOrder
   php index.php placeOrder
HELP;
    die();
}

//prepare repositories
$path = 'sqlite:db.sqlite';
$pdo = new \PDO($path);
$productRepository = new ProductRepository($pdo);
$orderRepository = new OrderRepository($pdo);


//handle user input
switch ($argument){
    case 'listproducts':
    default:
        /** @var ProductInterface[] $products */
        $products = $productRepository->getProducts();
        foreach ($products as $product) {
            echo "{$product[2]} - {$product[1]} - £{$product[4]}\n";
        }

        break;

    case 'addproduct':
        $name = readline('Enter product name: ');
        $sku = readline('Enter product sku: ');
        $description = readline('Enter product description: ');
        $price = readline('Enter product price: ');

        $productRepository->save($name, $sku, $description, $price);

        break;

    case 'placeorder':
        $order = new Order();

        $add = true;
        while($add == true) {
            $sku = readline('Please enter a sku to add to the order. or Q to finish: ');

            if ($sku == 'Q') {
                $add = false;
            } else {
                /** @var ProductInterface $product */
                $product = $productRepository->getProduct($sku);
                $order->addProduct($product);
            }
        }

        $orderRepository->save($order);
        echo "Order created with ID: {$order->getId()}";
        break;

    case 'listorders':
        /** @var OrderInterface[] $orders */
        $orders = $orderRepository->getOrders();
        foreach ($orders as $order) {
            echo "{$order[0]} - £{$order[1]} - {$order[2]}\n";
        }
        break;

    case 'getorder':
        $orderNumber = readline('Order number: ');
        if(!is_numeric($orderNumber)) {
            die('Order number must be a number');
        }

        $order = $orderRepository->get($orderNumber);
        echo "products on order {$order->getId()};\n";

        /** @var ProductInterface $product */
        foreach ($order->getProducts() as $product) {
            echo "\t {$product->getSku()} - {$product->getName()} - {$product->getPrice()}\n";
        }

        break;
}



