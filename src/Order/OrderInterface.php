<?php

namespace D365\Order;

use D365\Product\Product;

interface OrderInterface
{
    public function setId(string $id);
    public function getId(): ?string;
    public function addProduct(Product $product, int $qty = 1);
    public function removeProduct(Product $product);
    /**
     * @return Product[]
     */
    public function getProducts(): array;

}
