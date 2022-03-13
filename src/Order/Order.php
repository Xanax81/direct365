<?php

namespace D365\Order;

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
     * @param ProductInterface $product
     * @param int $qty
     */
    public function addProduct(ProductInterface $product, int $qty = 1)
    {
        array_push($this->basket, [$product, $qty]);
    }

    /**
     * Removes a product from basket
     * @param ProductInterface $product
     */
    public function removeProduct(ProductInterface $product)
    {
        unset($this->basket[$product->getSku()]);
    }

    /** Return list of products from basket */
    public function getProducts(): array
    {

    }

    public function getId(): ?int
    {
        
    }

    public function setId()
    {
        
    }
}
