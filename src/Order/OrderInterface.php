<?php

namespace D365\Order;

use D365\Product\ProductInterface;

interface OrderInterface
{
    public function setId(int $id);
    public function getId(): ?int;
    public function addProduct(ProductInterface $product, int $qty = 1);
    public function removeProduct(ProductInterface $product);
    /**
     * @return ProductInterface[]
     */
    public function getProducts(): array;

}
