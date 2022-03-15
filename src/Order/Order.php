<?php

namespace D365\Order;

use D365\Product\Product;
use D365\Product\ProductInterface;

class Order implements OrderInterface
{
    /** @var int */
    private $id;
    /** @var array */
    private $basket = [];

    public function __construct()
    {

    }

    /**
     * Adds a product to basket
     * @param Product $product
     * @param int $qty
     */
    public function addProduct(Product $product, int $qty = 1)
    {
        array_push($this->basket, [$product, $qty]);
    }

    /**
     * Removes a product from basket
     * @param Product $product
     */
    public function removeProduct(Product $product)
    {
        unset($this->basket[$product->getSku()]);
    }

    /** Return list of products from basket */
    public function getProducts(): array
    {
        return $this->basket;
    }

    public function getId(): ?string
    {
        return $this->id;
    }

    public function setId(string $id)
    {
        $this->id = $id;
    }
}
